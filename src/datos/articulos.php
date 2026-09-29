<?php
// Contenido editorial de confianza: nunca cargar archivos enviados por visitantes.
require_once __DIR__ . '/../../config/variables.php';
function ar_url(string $path = ''): string { return absolute_url($path); }
function ar_e($text): string { return htmlspecialchars((string)$text, ENT_QUOTES, 'UTF-8'); }
function ar_json(array $data): string { return json_encode($data, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_THROW_ON_ERROR); }
function ar_date(string $date): ?DateTimeImmutable {
    $d = DateTimeImmutable::createFromFormat('!Y-m-d', $date, new DateTimeZone('America/Montevideo'));
    return $d && $d->format('Y-m-d') === $date ? $d : null;
}
function ar_all(?string $directory = null, ?DateTimeImmutable $now = null): array {
    $now = $now ?? new DateTimeImmutable('now', new DateTimeZone('America/Montevideo'));
    $items = [];
    foreach (glob(($directory ?? APP_ROOT . '/content/articulos') . '/*.php') ?: [] as $file) {
        if (!preg_match('/^\d{4}-\d{2}-\d{2}-[a-z0-9-]+\.php$/D', basename($file))) continue;
        try { $a = (static function ($path) { return require $path; })($file); }
        catch (Throwable $e) { error_log('Artículo inválido: ' . basename($file)); continue; }
        if (!is_array($a) || ($a['borrador'] ?? false)) continue;
        $date = ar_date($a['fecha'] ?? ''); $updated = ar_date($a['actualizado'] ?? '');
        if (!$date || !$updated || $date > $now || $updated < $date || $updated > $now) continue;
        if (!preg_match('/^[a-z0-9]+(?:-[a-z0-9]+)*$/D', $a['slug'] ?? '') || $a['slug'] === 'feed') continue;
        if (basename($file) !== $a['fecha'] . '-' . $a['slug'] . '.php') continue;
        if (empty($a['titulo']) || empty($a['description']) || empty($a['secciones'])) continue;
        if (isset($items[$a['slug']])) { error_log('Slug duplicado: ' . $a['slug']); continue; }
        $items[$a['slug']] = $a;
    }
    uasort($items, static fn($a, $b) => strcmp($b['fecha'], $a['fecha']) ?: strcmp($a['slug'], $b['slug']));
    return $items;
}
// Markdown mínimo: texto escapado y enlaces [etiqueta](ruta). No se admite HTML.
function ar_rich(string $text): string {
    $result = ''; $offset = 0;
    preg_match_all('/\[([^\]]+)\]\(([^\s)]+)\)/u', $text, $matches, PREG_OFFSET_CAPTURE);
    foreach ($matches[0] as $i => $match) {
        $result .= ar_e(substr($text, $offset, $match[1] - $offset));
        $href = $matches[2][$i][0];
        if (preg_match('#^https?://#i', $href)) $url = $href;
        elseif (!preg_match('#^[/\\\\]|:|\.\.#', $href)) $url = app_url($href);
        else $url = '#';
        $result .= '<a href="' . ar_e($url) . '">' . ar_e($matches[1][$i][0]) . '</a>';
        $offset = $match[1] + strlen($match[0]);
    }
    return $result . ar_e(substr($text, $offset));
}
function ar_plain(string $text): string { return preg_replace('/\[([^\]]+)\]\([^)]+\)/u', '$1', strip_tags($text)); }
function ar_words(array $a): int {
    $parts = [$a['titulo'], $a['bajada'], $a['respuesta'], ...$a['puntos_clave']];
    $walk = function ($value) use (&$walk, &$parts) { foreach ($value as $k => $v) { if ($k === 'fotos') { foreach ($v as $foto) $parts[] = $foto['pie'] ?? ''; continue; } if (is_array($v)) $walk($v); elseif (is_string($v)) $parts[] = ar_plain($v); } };
    $walk($a['secciones']); $walk($a['faq']);
    return preg_match_all('/[\p{L}\p{N}]+(?:[’\x27-][\p{L}\p{N}]+)*/u', implode(' ', $parts));
}
function ar_blocks(array $s): void {
    foreach ($s['parrafos'] ?? [] as $p) echo '<p>' . ar_rich($p) . '</p>';
    // Fotos editoriales existentes: rutas locales, sin HTML ni descargas externas.
    foreach ($s['fotos'] ?? [] as $foto) {
        $src = $foto['src'] ?? '';
        if (!preg_match('#^(?:uploads|public/images)/[a-zA-Z0-9_./-]+\.(?:webp|jpe?g|png)$#D', $src) || str_contains($src, '..')) continue;
        $size = @getimagesize(APP_ROOT . '/' . $src);
        if (!$size) continue;
        echo '<figure class="ar-figure"><a href="' . ar_e(app_url($src)) . '" aria-label="' . ar_e('Ver foto completa: ' . ($foto['alt'] ?? '')) . '"><img src="' . ar_e(app_url($src)) . '" alt="' . ar_e($foto['alt'] ?? '') . '" width="' . (int)$size[0] . '" height="' . (int)$size[1] . '" loading="lazy" decoding="async" style="height:auto;max-height:none"></a>';
        if (!empty($foto['pie'])) echo '<figcaption>' . ar_e($foto['pie']) . '</figcaption>';
        echo '</figure>';
    }
    if (!empty($s['lista'])) {
        $tag = !empty($s['lista_ordenada']) ? 'ol' : 'ul'; echo "<$tag>";
        foreach ($s['lista'] as $p) echo '<li>' . ar_rich($p) . '</li>'; echo "</$tag>";
    }
    if (!empty($s['tabla'])) {
        echo '<table><thead><tr>'; foreach ($s['tabla']['cabecera'] as $h) echo '<th scope="col">' . ar_e($h) . '</th>';
        echo '</tr></thead><tbody>'; foreach ($s['tabla']['filas'] as $row) { echo '<tr>'; foreach ($row as $i => $cell) echo '<td data-label="' . ar_e($s['tabla']['cabecera'][$i] ?? '') . '">' . ar_rich($cell) . '</td>'; echo '</tr>'; } echo '</tbody></table>';
    }
    if (!empty($s['nota'])) echo '<aside class="ar-note">' . ar_rich($s['nota']) . '</aside>';
    foreach ($s['h3s'] ?? [] as $sub) { echo '<h3>' . ar_e($sub['h3']) . '</h3>'; ar_blocks($sub); }
}
function ar_card(array $a): void {
    echo '<article class="ar-card"><span class="ar-tag">' . ar_e($a['categoria']) . '</span><h2><a href="' . ar_e(app_url('articulos/' . $a['slug'])) . '">' . ar_e($a['titulo']) . '</a></h2><p>' . ar_e($a['description']) . '</p><time datetime="' . ar_e($a['fecha']) . '">' . ar_date($a['fecha'])->format('d/m/Y') . '</time></article>';
}
