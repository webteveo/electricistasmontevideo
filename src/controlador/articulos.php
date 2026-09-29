<?php
require_once APP_ROOT . '/src/datos/articulos.php';
$articles = ar_all();
if ($route === 'llms.txt') {
    header('Content-Type: text/plain; charset=utf-8');
    echo '# ' . $empresa_nombre . "\n\n> Consultas sobre trabajos eléctricos para hogares y comercios en Montevideo, Uruguay.\n\n";
    echo "Contacto: " . $empresa_whatsapp_visible . ". WhatsApp: " . $social_whatsapp . "\n\n## Páginas principales\n";
    foreach ($nav as $path=>$label) if (empty($pages[$path]['noindex'])) echo '- ['.$label.']('.ar_url($path).")\n";
    echo "\n## Servicios\n";
    foreach ($servicios_landing as $l) echo '- ['.$l['h1'].']('.ar_url($l['slug']).'): '.$l['description']."\n";
    echo "\n## Zonas con página propia\n";
    foreach ($zonas_activas as $zk=>$z) echo '- ['.$z['title'].']('.ar_url('electricista-'.$zk).")\n";
    echo '- [Todas las zonas de atención]('.ar_url('zonas').")\n";
    if ($articles) {
        echo "\n## Artículos\n";
        foreach ($articles as $a) echo '- ['.$a['titulo'].']('.ar_url('articulos/'.$a['slug']).'): '.$a['description']."\n";
    }
    return;
}
if ($route === 'articulos/feed') {
    header('Content-Type: application/rss+xml; charset=utf-8');
    $x = static fn($v)=>htmlspecialchars($v, ENT_XML1 | ENT_QUOTES, 'UTF-8');
    echo '<?xml version="1.0" encoding="UTF-8"?><rss version="2.0" xmlns:atom="http://www.w3.org/2005/Atom"><channel><title>'.$x($empresa_nombre.' — Artículos').'</title><link>'.ar_url('articulos').'</link><description>Guías de electricidad para hogares y comercios en Montevideo</description><language>es-UY</language><atom:link href="'.ar_url('articulos/feed').'" rel="self" type="application/rss+xml"/>';
    foreach (array_slice($articles,0,30) as $a) {
        $url=$x(ar_url('articulos/'.$a['slug']));
        echo '<item><title>'.$x($a['titulo']).'</title><link>'.$url.'</link><guid isPermaLink="true">'.$url.'</guid><pubDate>'.ar_date($a['fecha'])->format(DATE_RSS).'</pubDate><description>'.$x($a['description']).'</description></item>';
    }
    echo '</channel></rss>'; return;
}
$a = null;
if ($route !== 'articulos') {
    $slug=substr($route,strlen('articulos/')); $a=$articles[$slug] ?? null;
    if (!$a) http_response_code(404);
}
require APP_ROOT . '/src/vista/articulos/index.php';
