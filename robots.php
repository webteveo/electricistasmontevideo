<?php
require_once __DIR__ . '/config/variables.php';
header('Content-Type: text/plain; charset=utf-8');
$privado = ['_archivo_base/', 'config/', 'src/', 'content/', 'scripts/', 'vendor/', 'data/', 'metricas'];
echo "User-agent: *\nAllow: /\n";
foreach ($privado as $path) echo 'Disallow: ' . app_url($path) . "\n";
// Buscadores y asistentes de IA que citan fuentes: acceso explícito (las reglas de "*" no se heredan en grupos propios).
$bots = [
    'Buscadores' => ['Googlebot', 'Bingbot'],
    'Búsqueda y consultas de asistentes de IA (ChatGPT, Perplexity, Claude, Apple)' => ['OAI-SearchBot', 'ChatGPT-User', 'PerplexityBot', 'Perplexity-User', 'Claude-SearchBot', 'Claude-User', 'Applebot'],
    'Entrenamiento de modelos: permitido (no afecta la visibilidad en buscadores)' => ['GPTBot', 'ClaudeBot', 'Google-Extended', 'Applebot-Extended'],
];
foreach ($bots as $grupo => $lista) {
    echo "\n# " . $grupo . "\n";
    foreach ($lista as $b) {
        echo 'User-agent: ' . $b . "\nAllow: /\n";
        foreach ($privado as $path) echo 'Disallow: ' . app_url($path) . "\n";
    }
}
echo "\n# Scrapers sin beneficio para el sitio\nUser-agent: CCBot\nDisallow: /\nUser-agent: Bytespider\nDisallow: /\n";
echo "\nSitemap: " . absolute_url('sitemap.xml') . "\n";
