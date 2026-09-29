<?php
// Página de zona ($tpl 'zona') y de servicio × barrio ($tpl 'sz'). Variables de pagina.php:
// $bk (slug), $bp (datos de src/datos/zonas.php), $bn ("el Cerro"), $zc (texto propio: intro, secciones, faq, mod), $sz_serv.
$vecinos = array_values(array_filter($bp['vecinos'], static fn($v)=>zona_publicada($v)));
$servicios_barrio = array_filter(array_keys($servicios_zona), static fn($s)=>sz_publicada($s, $bk) && $s !== $sz_serv);
$fecha_mod = $zc['mod'] ?? $page['mod'] ?? null;
?>
<section class="section wrap landing-section" id="barrio">
<div class="services-heading"><span class="pill"><?= $tpl === 'sz' ? e($landing['crumb']) : 'Zona de atención' ?></span><h2><?= $tpl === 'sz' ? e($sz_h1) . ' a domicilio' : 'Electricista a domicilio en ' . e($bn) ?></h2></div>
<?php if ($foto): ?><figure class="landing-photo"><img src="<?= e(asset_ver($foto)) ?>" alt="<?= e($foto_alt) ?>" width="1200" height="800" loading="lazy"></figure><?php endif; ?>
<div class="landing-lead landing-lead--zone"><p><?= texto_enlaces($zc['intro']) ?></p><?php if ($fecha_mod): ?><p class="landing-updated">Actualizado: <time datetime="<?= e($fecha_mod) ?>"><?= e(date('d/m/Y', strtotime($fecha_mod))) ?></time></p><?php endif; ?></div>
<div class="table-wrap table-wrap--ficha"><table><caption class="visually-hidden">Datos de <?= e($bp['nombre']) ?></caption><tbody>
<tr><th scope="row">Zona</th><td><a href="<?= e(app_url(region_url($bp['region']))) ?>"><?= e($regiones[$bp['region']]['nombre']) ?></a><?= !empty($bp['oficial']) ? ' · Barrio oficial: ' . e($bp['oficial']) : '' ?></td></tr>
<tr><th scope="row">Vivienda típica</th><td><?= e($bp['vivienda']) ?></td></tr>
<tr><th scope="row">Edificación</th><td><?= e($bp['epoca']) ?></td></tr>
<tr><th scope="row">Cerca de la costa</th><td><?= $bp['costera'] ? 'Sí: humedad y salinidad' : 'No' ?></td></tr>
</tbody></table></div>
<div class="landing-prose">
<?php foreach ($zc['secciones'] as $sec): ?><h2><?= e($sec['h2']) ?></h2><?php foreach ($sec['p'] as $p): ?><p><?= texto_enlaces($p) ?></p><?php endforeach; ?>
<?php endforeach; ?>
</div>
</section>
<section class="section wrap landing-section" id="en-la-zona">
<div class="landing-cols">
<nav class="landing-text" aria-label="Servicios en <?= e($bp['nombre']) ?>"><h3>En <?= e($bn) ?> también</h3><ul class="zones-list zones-list--stack">
<?php if ($tpl === 'sz'): ?><li><a href="<?= e(app_url(zona_url($bk))) ?>">Electricista en <?= e($bn) ?></a></li><?php endif; ?>
<?php foreach ($servicios_barrio as $s): ?><li><a href="<?= e(app_url(sz_url($s, $bk))) ?>"><?= e($servicios_zona[$s]['h1']) ?> en <?= e($bn) ?></a></li><?php endforeach; ?>
<?php if ($tpl === 'sz'): ?><li><a href="<?= e(app_url($landing['slug'])) ?>"><?= e($landing['crumb']) ?>: qué incluye</a></li><?php endif; ?>
</ul></nav>
<?php if ($vecinos): ?><nav class="landing-text" aria-label="Barrios cercanos"><h3><?= $tpl === 'sz' ? e($landing['crumb']) . ' cerca' : 'Cerca' ?> <?= e(zona_de($bp)) ?></h3><ul class="zones-list zones-list--stack">
<?php foreach ($vecinos as $v): $vz = $zonas[$v]; $vu = $tpl === 'sz' && sz_publicada($sz_serv, $v) ? sz_url($sz_serv, $v) : zona_url($v); ?><li><a href="<?= e(app_url($vu)) ?>"><?= $tpl === 'sz' && sz_publicada($sz_serv, $v) ? e($servicios_zona[$sz_serv]['h1']) . ' en ' : 'Electricista en ' ?><?= e(zona_en($vz)) ?></a></li><?php endforeach; ?>
<li><a href="<?= e(app_url(region_url($bp['region']))) ?>">Todas las zonas de <?= e($regiones[$bp['region']]['nombre']) ?></a></li>
</ul></nav><?php endif; ?>
</div>
</section>
