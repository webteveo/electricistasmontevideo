<?php
// CLI: C:\xampp\php\php.exe scripts/verificar_articulos.php [base local]
if (PHP_SAPI !== 'cli') { http_response_code(404); exit; }
require __DIR__ . '/../src/datos/articulos.php';
$base = rtrim($argv[1] ?? 'http://localhost/electricistasmontevideo', '/');
$checks = 0;
function check($ok, $label) { global $checks; $checks++; if (!$ok) throw new RuntimeException($label); }
function get_page($path, $expected = 200) {
    global $base;
    $c = curl_init($base . '/' . ltrim($path, '/'));
    curl_setopt_array($c, [CURLOPT_RETURNTRANSFER=>true,CURLOPT_TIMEOUT=>20]);
    $body = curl_exec($c); $status = curl_getinfo($c,CURLINFO_HTTP_CODE); curl_close($c);
    check($status===$expected,"HTTP $path: $status (esperado $expected)");
    check(!preg_match('/(?:Fatal error|Warning:|Parse error|Notice:)/', $body), 'Error PHP en ' . $path);
    return $body;
}
function schemas($html) {
    preg_match_all('#<script type="application/ld\+json">(.*?)</script>#s',$html,$m);
    return array_map(static fn($json)=>json_decode($json,true,512,JSON_THROW_ON_ERROR),$m[1]);
}
$list=get_page('articulos'); $rss=get_page('articulos/feed'); $map=get_page('sitemap.xml'); $mapArt=ar_all() ? get_page('sitemap-articulos.xml') : ''; $llms=get_page('llms.txt');
check(simplexml_load_string($rss)!==false,'RSS XML'); check(simplexml_load_string($map)!==false,'Sitemap XML');
check(in_array('CollectionPage',array_column(schemas($list),'@type')),'CollectionPage');
get_page('articulos/no-existe',404); get_page('articulos/feed/extra',404); get_page('articulos/../../nada',404);
get_page('content/articulos/_plantilla.php',403);
foreach(ar_all() as $a) {
    $slug=$a['slug']; $html=get_page('articulos/'.$slug); $data=schemas($html);
    check(count(array_filter($data,static fn($s)=>$s['@type']==='Article'))===1,'Article único');
    $types=[]; foreach(array_column($data,'@type') as $t) $types=array_merge($types,(array)$t);
    foreach(['Article','BreadcrumbList','FAQPage','Electrician'] as $type) check(in_array($type,$types,true),$type);
    check(substr_count($html,'<!doctype html>')===1,'Un solo head');
    check(str_contains($html,'<title>'.ar_e($a['title']).'</title>'),'Título');
    check(str_contains($html,'content="article"'),'OG Article');
    foreach([$list,$rss,$mapArt,$llms] as $index) check(str_contains($index,'articulos/'.$slug),'Presente en índice');
    check(ar_words($a)>=1200 && ar_words($a)<=2000,'1200–2000 palabras');
    check(mb_strlen($a['title'])>=55 && mb_strlen($a['title'])<=60,'Longitud title');
    check(mb_strlen($a['description'])>=140 && mb_strlen($a['description'])<=155,'Longitud description');
    check(count($a['secciones'])>=4,'Mínimo 4 H2');
    check(count($a['faq'])>=4 && count($a['faq'])<=6,'4–6 FAQ');
    check(count($a['fuentes'])>=2 && count($a['fuentes'])<=4,'2–4 fuentes');
    check(count($a['links'])>=3 && count($a['links'])<=6,'3–6 enlaces');
    foreach ($a['secciones'] as $section) foreach ($section['fotos'] ?? [] as $foto) {
        check(!empty($foto['alt']) && !empty($foto['pie']), 'Foto con alt y pie');
        $photoPath = rtrim(parse_url($base, PHP_URL_PATH) ?? '', '/') . '/' . $foto['src'];
        check(str_contains($html, 'src="'.ar_e($photoPath).'"'), 'Foto de sección renderizada');
        check((bool)getimagesize(APP_ROOT.'/'.$foto['src']), 'Imagen local válida');
        get_page($foto['src']);
    }
    foreach($a['links'] as $link) get_page($link['href']);
    preg_match_all('#href="https://electricistasmontevideo.com/([^"]*)"#',$html,$links);
    foreach(array_unique($links[1]) as $path) if($path!=='' && $path[0]!=='#') get_page(html_entity_decode($path));
    echo "$slug: ".ar_words($a)." palabras, ".mb_strlen($a['title'])." title, ".mb_strlen($a['description'])." description\n";
}
// Fixtures aislados fuera de la carpeta pública de artículos; limpieza solo de archivos propios.
$dir=sys_get_temp_dir().'/electricistas-articles-'.bin2hex(random_bytes(5)); mkdir($dir);
$all=ar_all(); $fixture=reset($all) ?: require APP_ROOT . '/content/articulos/_plantilla.php';
check((bool)$fixture,'Existe plantilla de prueba');
$files=[];
try {
    foreach(['publicado'=>['2026-09-08',false], 'borrador'=>['2026-09-08',true], 'futuro'=>['2026-09-09',false]] as $slug=>[$date,$draft]) {
        $f=$fixture; $f['slug']=$slug; $f['fecha']=$f['actualizado']=$date; $f['borrador']=$draft;
        $path="$dir/$date-$slug.php"; $files[]=$path; file_put_contents($path,'<?php return '.var_export($f,true).';');
    }
    $files[]="$dir/_oculto.php"; file_put_contents(end($files),'<?php throw new Exception("No debe ejecutarse");');
    $before=new DateTimeImmutable('2026-09-09T02:59:59+00:00');
    $after=new DateTimeImmutable('2026-09-09T03:00:00+00:00');
    check(array_keys(ar_all($dir,$before))===['publicado'],'Borradores y futuros ocultos antes de medianoche UY');
    check(array_keys(ar_all($dir,$after))===['futuro','publicado'],'Programación y orden a medianoche UY');
    check(ar_date('2026-02-30')===null,'Fecha imposible rechazada');
    check(ar_rich('[Servicio](servicios)')==='<a href="/servicios">Servicio</a>','Enlace relativo absoluto');
    check(!str_contains(ar_rich('<script>x</script> [x](javascript:alert)'),'<script>'),'Texto seguro');
} finally { foreach($files as $file) unlink($file); rmdir($dir); }
echo "OK: $checks comprobaciones\n";
