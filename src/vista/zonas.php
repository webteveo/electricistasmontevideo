<?php
// Índice de zonas por región. Enlaza solo zonas con página propia; el resto son anclas (#slug) de destino para las URLs
// antiguas redirigidas, agrupadas al final.
$con_pagina = [];
foreach ($zonas as $k => $z) if (zona_publicada($k)) $con_pagina[$k] = true;
$agrupados = [];
foreach ($zonas_activas as $ak => $z) foreach ($z['cubre'] ?? [] as $ck) $agrupados[$ck] = $ak;
$alias_zona = ['figurita'=>'la-figurita', 'bella-vista'=>'capurro', 'villa-dolores'=>'parque-batlle', 'bolivar'=>'mercado-modelo', 'parque-guarani'=>'maronas', 'bella-italia'=>'punta-de-rieles', 'lavalleja'=>'penarol', 'goes'=>'villa-munoz', 'pajas-blancas'=>'casabo', 'melilla'=>'lezica', 'santiago-vazquez'=>'paso-de-la-arena'];
$otras = ['Montevideo'=>[], 'Canelones'=>[]];
foreach ($barrios_perfil as $k => $b) if (!isset($agrupados[$k]) && !isset($con_pagina[$alias_zona[$k] ?? $k])) $otras[$b['depto']][$k] = $b;
$zc_hub = $zonas_hub ?? [];
?>
<section class="section wrap landing-section" id="zonas-intro">
<div class="services-heading"><span class="pill">Zonas de atención</span><h2>Electricista en tu barrio</h2></div>
<div class="landing-lead landing-lead--zone"><?php foreach ($zc_hub['intro'] ?? [] as $p): ?><p><?= texto_enlaces($p) ?></p><?php endforeach; ?><?php if (!empty($page['mod'])): ?><p class="landing-updated">Actualizado: <time datetime="<?= e($page['mod']) ?>"><?= e(date('d/m/Y', strtotime($page['mod']))) ?></time></p><?php endif; ?></div>
<div class="landing-prose"><?php foreach ($zc_hub['secciones'] ?? [] as $sec): ?><h2><?= e($sec['h2']) ?></h2><?php foreach ($sec['p'] as $p): ?><p><?= texto_enlaces($p) ?></p><?php endforeach; ?><?php endforeach; ?></div>
</section>
<?php foreach ($regiones as $rk => $rg): $lista = zonas_de_region($rk); if (!$lista) continue; $r_url = local_pagina(region_url($rk)) ? region_url($rk) : null; ?>
<section class="section wrap landing-section" id="region-<?= e($rk) ?>">
<div class="services-heading"><span class="pill"><?= e($rg['depto']) ?></span><h2><?= e($rg['nombre']) ?></h2><?php if ($r_url): ?><a class="text-link dark-link" href="<?= e(app_url($r_url)) ?>">Ver la zona <?= icon('arrow') ?></a><?php endif; ?></div>
<?php if (!empty($zc_hub['regiones'][$rk])): ?><p class="landing-lead"><?= texto_enlaces($zc_hub['regiones'][$rk]) ?></p><?php endif; ?>
<ul class="zonas-list zonas-list--wide"><?php foreach ($lista as $k => $z): ?><li id="<?= e($k) ?>"><?= icon('pin') ?><span><a href="<?= e(app_url(zona_url($k))) ?>"><?= e($z['nombre']) ?></a></span></li><?php endforeach; ?></ul>
</section>
<?php endforeach; ?>
<?php if ($otras['Montevideo'] || $otras['Canelones']): ?>
<section class="section wrap landing-section" id="otras-zonas">
<div class="services-heading"><span class="pill">Más zonas</span><h2>Otras localidades</h2></div>
<p class="landing-lead">Consultanos por WhatsApp: la visita depende de la distancia.</p>
<ul class="zonas-list zonas-list--wide"><?php foreach (array_merge($otras['Montevideo'], $otras['Canelones']) as $k => $b): ?><li id="<?= e($k) ?>"><?= icon('pin') ?><span><?= e($b['nombre']) ?></span></li><?php endforeach; ?></ul>
</section>
<?php endif; ?>
