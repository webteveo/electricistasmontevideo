<?php
// Aviso manual a IndexNow (Bing, Yandex, Seznam; ChatGPT Search usa el índice de Bing).
// Uso, SOLO después de subir los cambios al hosting:
//   C:/xampp/php/php.exe scripts/indexnow.php              → envía todas las URLs del sitemap
//   C:/xampp/php/php.exe scripts/indexnow.php ruta1 ruta2  → envía solo esas rutas (sin dominio)
// La clave está en la raíz como {clave}.txt y tiene que estar publicada. No se ejecuta sola.
if (PHP_SAPI !== 'cli') { http_response_code(404); exit; }
require __DIR__ . '/../config/variables.php';
$key = '9c35310688d8eb199783d15b6bfbc748';
$host = parse_url(SITE_URL, PHP_URL_HOST);
if ($argc > 1) {
    $urls = array_map(static fn($p) => absolute_url(ltrim($p, '/')), array_slice($argv, 1));
} else {
    $urls = [];
    $index = @simplexml_load_file(absolute_url('sitemap.xml'));
    if (!$index) { fwrite(STDERR, "No se pudo leer el sitemap publicado.\n"); exit(1); }
    foreach ($index->sitemap as $sm) { $set = @simplexml_load_file((string)$sm->loc); if ($set) foreach ($set->url as $u) $urls[] = (string)$u->loc; }
}
$payload = json_encode(['host'=>$host, 'key'=>$key, 'keyLocation'=>absolute_url($key . '.txt'), 'urlList'=>array_values(array_unique($urls))], JSON_UNESCAPED_SLASHES);
$c = curl_init('https://api.indexnow.org/indexnow');
curl_setopt_array($c, [CURLOPT_POST=>true, CURLOPT_POSTFIELDS=>$payload, CURLOPT_HTTPHEADER=>['Content-Type: application/json; charset=utf-8'], CURLOPT_RETURNTRANSFER=>true, CURLOPT_TIMEOUT=>20]);
$body = curl_exec($c); $code = curl_getinfo($c, CURLINFO_HTTP_CODE); curl_close($c);
echo 'IndexNow: HTTP ' . $code . ' para ' . count($urls) . " URLs (200/202 = recibido)\n";
if ($code >= 400) echo $body . "\n";
