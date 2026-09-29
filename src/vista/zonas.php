<?php
// Índice de cobertura: enlaza solo zonas con página propia; el resto son anclas (#slug) de destino para las URLs antiguas redirigidas.
$agrupados = [];
foreach ($zonas_activas as $ak => $z) foreach ($z['cubre'] ?? [] as $ck) $agrupados[$ck] = $ak;
$por_depto = ['Montevideo'=>[], 'Canelones'=>[]];
foreach ($barrios_perfil as $k => $b) if (!isset($agrupados[$k]) && !isset($zonas_activas[$k])) $por_depto[$b['depto']][$k] = $b;
?>
<section class="section wrap landing-section" id="zonas-destacadas">
<div class="services-heading"><span class="pill">Páginas por zona</span><h2>Zonas con información propia</h2></div>
<p class="landing-lead">Estas zonas tienen su página con los trabajos más habituales del lugar y cómo coordinar la visita.</p>
<ul class="zonas-list zonas-list--wide"><?php foreach ($zonas_activas as $k => $z): ?><li><?= icon('pin') ?><span><a href="<?= e(app_url('electricista-' . $k)) ?>">Electricista en <?= e($z['en'] ?? $z['nombre']) ?></a><?php if (!empty($z['cubre'])): ?> <small>(<?= e(implode(', ', array_map(static fn($c)=>$barrios_perfil[$c]['nombre'] ?? $c, array_slice($z['cubre'], 0, 4)))) ?> y más)</small><?php endif; ?></span></li><?php endforeach; ?></ul>
</section>
<section class="section wrap landing-section" id="zonas-montevideo">
<div class="services-heading"><span class="pill">Montevideo</span><h2>Otros barrios de Montevideo</h2></div>
<p class="landing-lead">También atendemos el resto de Montevideo. Escribinos por WhatsApp con tu barrio y el tipo de trabajo, y te confirmamos la disponibilidad.</p>
<ul class="zonas-list zonas-list--wide"><?php foreach ($por_depto['Montevideo'] as $k => $b): ?><li id="<?= e($k) ?>"><?= icon('pin') ?><span><?= e($b['nombre']) ?></span></li><?php endforeach; ?></ul>
</section>
<section class="section wrap landing-section" id="zonas-canelones">
<div class="services-heading"><span class="pill">Canelones</span><h2>Otras localidades de Canelones</h2></div>
<p class="landing-lead">Además de <a href="<?= e(app_url('electricista-ciudad-de-la-costa')) ?>">Ciudad de la Costa</a> y la <a href="<?= e(app_url('electricista-costa-de-oro')) ?>">Costa de Oro</a>, consultanos por estas localidades. La disponibilidad se confirma según la distancia y el tipo de trabajo.</p>
<ul class="zonas-list zonas-list--wide"><?php foreach ($por_depto['Canelones'] as $k => $b): ?><li id="<?= e($k) ?>"><?= icon('pin') ?><span><?= e($b['nombre']) ?></span></li><?php endforeach; ?></ul>
<div class="landing-cols landing-cols--after">
<div class="landing-text"><h3>Qué trabajos hacemos en tu zona</h3><p>Los mismos servicios en Montevideo y Canelones: <a href="<?= e(app_url('reparaciones-electricas-montevideo')) ?>">reparaciones eléctricas</a> cuando salta la llave o un punto deja de funcionar, <a href="<?= e(app_url('instalaciones-electricas-montevideo')) ?>">instalaciones eléctricas</a> para reformas y obra nueva, <a href="<?= e(app_url('tableros-electricos-montevideo')) ?>">tableros y protecciones</a>, <a href="<?= e(app_url('iluminacion-montevideo')) ?>">iluminación</a>, <a href="<?= e(app_url('mantenimiento-electrico-montevideo')) ?>">revisión y mantenimiento</a>, <a href="<?= e(app_url('electricista-comercios-montevideo')) ?>">electricidad para comercios</a> y <a href="<?= e(app_url('cargador-vehiculo-electrico-montevideo')) ?>">cargadores para autos eléctricos</a>.</p></div>
<div class="landing-text"><h3>Cómo coordinar la visita</h3><p>Escribinos por WhatsApp con tu barrio o localidad, el tipo de inmueble y lo que necesitás resolver. Te orientamos, confirmamos la disponibilidad para tu zona y coordinamos día y hora. El presupuesto es sin costo.</p></div>
</div>
</section>
