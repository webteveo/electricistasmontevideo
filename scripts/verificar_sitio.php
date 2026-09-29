<?php
if (PHP_SAPI !== 'cli') { http_response_code(404); exit; }
require __DIR__ . '/../config/variables.php';
require __DIR__ . '/../src/datos/sitio.php';
require_once __DIR__ . '/../src/datos/articulos.php';
$published = ar_all();
$base = rtrim($argv[1] ?? 'http://localhost/electricistasmontevideo', '/');
$checks = 0; $visited = [];
function verify($ok, string $label): void { global $checks; $checks++; if (!$ok) throw new RuntimeException($label); }
function fetch_page(string $path, int $expected = 200): string {
    global $base, $visited;
    $c=curl_init($base.'/'.ltrim($path,'/'));
    curl_setopt_array($c,[CURLOPT_RETURNTRANSFER=>true,CURLOPT_TIMEOUT=>10]);
    $body=curl_exec($c); $status=curl_getinfo($c,CURLINFO_HTTP_CODE); curl_close($c);
    verify($status===$expected,"HTTP $path: $status (esperado $expected)");
    verify(!preg_match('/Fatal error|Warning:|Parse error|Notice:/',(string)$body),'Sin errores PHP: '.$path);
    $visited[$path]=true; return (string)$body;
}
$htmlPages=['','servicios','nosotros','contacto','trabajos','zonas','articulos']; $titles=[];
foreach ($htmlPages as $path) {
    $html=fetch_page($path);
    verify(!preg_match('/CA.?Containers|cacontainers|contenedor|91894140|davidausimour|G-FJM0Z4JLH8|yamsul585s|cloudinary|supabase|windsor/i',$html),'Sin identidad anterior: '.$path);
    verify(!preg_match('/94 ?633 ?956|94633956/',$html),'Sin teléfono anterior: '.$path);
    verify(!preg_match('/testimonial|google-g|Clientes<br>satisfechos|Años de<br>experiencia/',$html),'Sin reseñas ni cifras sin verificar: '.$path);
    verify(substr_count($html,'<h1')===1,'Un H1: '.$path);
    verify(substr_count($html,'<body>')===1 && substr_count($html,'<!doctype html>')===1,'Documento único: '.$path);
    $d=new DOMDocument(); @$d->loadHTML('<?xml encoding="utf-8" ?>'.$html); $xp=new DOMXPath($d);
    $title=$xp->evaluate('string(//title)'); verify($title!=='' && !in_array($title,$titles,true),'Título único: '.$path); $titles[]=$title;
    verify($xp->evaluate('string(//link[@rel="canonical"]/@href)')===absolute_url($path),'Canónica: '.$path);
    verify($xp->evaluate('string(//meta[@name="description"]/@content)')!=='','Descripción: '.$path);
    $indexable=$path === 'articulos' ? (bool)$published : empty($pages[$path]['noindex']);
    verify(str_contains($xp->evaluate('string(//meta[@name="robots"]/@content)'),$indexable?'index, follow':'noindex, follow'),'Indexabilidad: '.$path);
    foreach ($xp->query('//script[@type="application/ld+json"]') as $node) {
        $schema=json_decode($node->textContent,true,512,JSON_THROW_ON_ERROR);
        verify(!isset($schema['aggregateRating']) && !isset($schema['review']),'No atribuir reseñas sin verificar');
        if (in_array('Electrician',(array)($schema['@type'] ?? []),true)) verify($schema['telephone']==='+59897406456','Teléfono en schema');
    }
    foreach ($xp->query('//a[@href] | //link[@rel="stylesheet"] | //link[@rel="icon"] | //script[@src]') as $node) {
        $url=$node->getAttribute($node->hasAttribute('src')?'src':'href');
        if (str_starts_with($url,'https://wa.me/')) verify(str_starts_with($url,'https://wa.me/59897406456?text='),'WhatsApp correcto');
        if (str_starts_with($url,'tel:')) verify($url==='tel:+59897406456','Teléfono correcto');
        $prefix=parse_url($base,PHP_URL_PATH).'/';
        if (str_starts_with($url,$prefix)) {
            $target=substr($url,strlen($prefix)); $target=explode('#',$target)[0];
            if (!isset($visited[$target])) fetch_page($target);
        }
    }
}
$xml=simplexml_load_string(fetch_page('sitemap.xml')); verify($xml!==false,'Sitemap XML');
$urls=[]; foreach($xml->sitemap as $sm) { $child=simplexml_load_string(fetch_page(basename((string)$sm->loc))); verify($child!==false,'Sitemap hijo XML'); foreach($child->url as $node) $urls[]=(string)$node->loc; }
$expectedCount=count(array_filter($pages,static fn($p)=>empty($p['noindex'])))+count($published)+($published?1:0);
verify(count($urls)===$expectedCount && count(array_unique($urls))===$expectedCount,'Solo páginas con contenido en sitemap');
foreach(['','servicios','nosotros','contacto','zonas'] as $path) verify(in_array(absolute_url($path),$urls,true),'URL indexable en sitemap');
verify(str_contains(fetch_page('robots.txt'),'Sitemap: '.absolute_url('sitemap.xml')),'Robots usa dominio definitivo');
verify(!preg_match('/contenedor|cacontainers/i',fetch_page('llms.txt')),'LLMS sin contenido anterior');
fetch_page('public/images/social.png');
foreach(['no-existe','servicios/no-existe','contenedores-habitables-montevideo','casa-contenedor-uruguay','proyectos/mostrar/?trabajo=casa_40_pies','dashboard'] as $path) fetch_page($path,404);
foreach(['_archivo_base/','_archivo_base/trabajos.json','content/articulos/_plantilla.php','config/variables.php','src/vista/pagina.php','scripts/verificar_sitio.php','AGENTS.md','composer.json'] as $path) fetch_page($path,403);
fetch_page('servicios/index',301); fetch_page('quienes_somos',301); fetch_page('proyectos',301);
// Poda de la matriz barrio × servicio: las URLs antiguas redirigen con 301 y quedan fuera del sitemap.
foreach(['tableros-electricos-buceo','cargador-vehiculo-electrico-san-jacinto','electricista-comercios-pocitos','electricista-malvin','electricista-la-floresta','electricista-solymar','mantenimiento-electrico-la-floresta'] as $path) fetch_page($path,301);
verify(count($urls)<=40,'Sitemap acotado (fase 1): '.count($urls).' URLs');
echo "OK: $checks comprobaciones HTTP, identidad, enlaces y SEO\n";
