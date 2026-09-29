<?php
require_once __DIR__ . '/config/variables.php';
header('Content-Type: text/plain; charset=utf-8');
echo "User-agent: *\nAllow: /\n";
foreach (['_archivo_base/','config/','src/','content/','scripts/','vendor/'] as $path) echo 'Disallow: ' . app_url($path) . "\n";
echo "\nSitemap: " . absolute_url('sitemap.xml') . "\n";
