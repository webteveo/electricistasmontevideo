<?php
// Página de región (/zonas/{region}): texto propio de content/regiones/{region}.php y una tarjeta por zona publicada.
$lista = zonas_de_region($rk);
?>
<section class="section wrap landing-section" id="region">
<div class="services-heading"><span class="pill">Zonas de atención</span><h2>Barrios de <?= e($region['nombre']) ?></h2></div>
<div class="landing-lead landing-lead--zone"><p><?= texto_enlaces($rc['intro']) ?></p><p class="landing-updated">Actualizado: <time datetime="<?= e($rc['mod']) ?>"><?= e(date('d/m/Y', strtotime($rc['mod']))) ?></time></p></div>
<div class="landing-prose">
<?php foreach ($rc['secciones'] as $sec): ?><h2><?= e($sec['h2']) ?></h2><?php foreach ($sec['p'] as $p): ?><p><?= texto_enlaces($p) ?></p><?php endforeach; ?>
<?php endforeach; ?>
</div>
<div class="region-zonas">
<?php foreach ($lista as $k => $z): $c = !empty($z['legacy']) ? $zonas_activas[$k] : zona_contenido($k); ?>
<article class="region-zona"><h3><a href="<?= e(app_url(zona_url($k))) ?>">Electricista en <?= e(zona_en($z)) ?></a></h3>
<p><?= e($c['description']) ?></p>
<?php $sl = array_filter(array_keys($servicios_zona), static fn($s)=>sz_publicada($s, $k)); if ($sl): ?><small><?php foreach (array_values($sl) as $i => $s): ?><?= $i ? ' · ' : '' ?><a href="<?= e(app_url(sz_url($s, $k))) ?>"><?= e($servicios_zona[$s]['h1']) ?></a><?php endforeach; ?></small><?php endif; ?>
</article>
<?php endforeach; ?>
</div>
</section>
