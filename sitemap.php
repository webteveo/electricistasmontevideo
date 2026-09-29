<?php
require_once __DIR__ . '/config/variables.php';
require __DIR__ . '/src/datos/sitio.php';
require_once __DIR__ . '/src/datos/articulos.php';
header('Content-Type: application/xml; charset=utf-8');
$x = static fn($s)=>htmlspecialchars($s, ENT_XML1 | ENT_QUOTES, 'UTF-8');
$mtime = static fn(array $files)=>date('Y-m-d', max(array_map(static fn($f)=>filemtime(__DIR__ . '/' . $f), $files)));
$grupo = trim((string)($_GET['grupo'] ?? ''));
// lastmod real por página: 'mod' de cada página o archivo de contenido. Si falta, la fecha de los archivos del grupo.
$lastmod = [
    'paginas' => $mtime(['src/datos/sitio.php', 'src/vista/pagina.php']),
    'servicios' => $mtime(['src/datos/servicios.php', 'src/datos/servicios_preguntas.php', 'src/vista/servicio.php']),
    'zonas' => $mtime(['src/datos/barrios.php', 'src/datos/zonas.php', 'src/vista/local.php', 'src/vista/zonas.php']),
    'servicios-barrio' => $mtime(['src/datos/zonas.php', 'src/vista/local.php']),
];
$grupos = ['paginas'=>[], 'servicios'=>[], 'zonas'=>[], 'servicios-barrio'=>[]];
foreach ($pages as $path=>$page) {
    if (!empty($page['noindex'])) continue;
    if (!empty($page['barrio']) || !empty($page['barrio_hub']) || $path === 'zonas') $grupos['zonas'][$path] = $page['mod'] ?? null;
    elseif (!empty($page['servicio'])) $grupos['servicios'][$path] = $page['mod'] ?? null;
    else $grupos['paginas'][$path] = $page['mod'] ?? null;
}
foreach (local_urls() as $path => $u) $grupos[$u['grupo']][$path] = $u['mod'];
$articles = ar_all();
if ($grupo === '') {
    echo '<?xml version="1.0" encoding="UTF-8"?><sitemapindex xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';
    foreach ($grupos as $g=>$paths) {
        if (!$paths) continue;
        $max = max(array_map(static fn($m)=>$m ?? $lastmod[$g], $paths));
        echo '<sitemap><loc>'.$x(absolute_url('sitemap-'.$g.'.xml')).'</loc><lastmod>'.$x($max).'</lastmod></sitemap>';
    }
    if ($articles) echo '<sitemap><loc>'.$x(absolute_url('sitemap-articulos.xml')).'</loc><lastmod>'.$x(max(array_column($articles, 'actualizado'))).'</lastmod></sitemap>';
    echo '</sitemapindex>';
    exit;
}
echo '<?xml version="1.0" encoding="UTF-8"?><urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';
if (isset($grupos[$grupo])) {
    foreach ($grupos[$grupo] as $path => $mod) echo '<url><loc>'.$x(absolute_url($path)).'</loc><lastmod>'.$x($mod ?? $lastmod[$grupo]).'</lastmod></url>';
} elseif ($grupo === 'articulos' && $articles) {
    echo '<url><loc>'.$x(absolute_url('articulos')).'</loc><lastmod>'.$x(max(array_column($articles, 'actualizado'))).'</lastmod></url>';
    foreach ($articles as $a) echo '<url><loc>'.$x(absolute_url('articulos/'.$a['slug'])).'</loc><lastmod>'.$x($a['actualizado']).'</lastmod></url>';
}
echo '</urlset>';
