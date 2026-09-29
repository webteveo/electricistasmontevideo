<section class="section wrap landing-section" id="barrio">
<div class="services-heading"><span class="pill">Zona de atención</span><h2>Electricista a domicilio en <?= e($bn) ?></h2></div>
<?php if ($foto): ?><figure class="landing-photo"><img src="<?= e(asset_ver($foto)) ?>" alt="<?= e($foto_alt) ?>" width="1200" height="800" loading="lazy"></figure><?php endif; ?>
<div class="landing-lead landing-lead--zone"><p><?= e($bp['intro']) ?></p></div>
<div class="landing-prose">
<?php foreach ($bp['secciones'] as $sec): ?><h2><?= e($sec['h2']) ?></h2><?php foreach ($sec['p'] as $p): ?><p><?= texto_enlaces($p) ?></p><?php endforeach; ?>
<?php endforeach; ?>
<h2>¿Qué servicios eléctricos hacemos en <?= e($bn) ?>?</h2>
<ul class="landing-list"><?php foreach ($servicios_landing as $id => $l): ?><li><?= icon('check') ?><span><a href="<?= e(app_url($l['slug'])) ?>"><?= e($l['crumb']) ?></a></span></li><?php endforeach; ?></ul>
<h2>¿Cómo coordinar la visita en <?= e($bn) ?>?</h2>
<p>Escribinos por WhatsApp al <?= e($empresa_telefono_sep) ?> con tu dirección aproximada, el tipo de inmueble y lo que necesitás resolver. Si podés, sumá una foto del tablero o del punto con problemas, sin abrir ni manipular nada. Te orientamos, confirmamos la disponibilidad y coordinamos día y hora. El presupuesto es sin costo y se aprueba antes de empezar.</p>
<p class="landing-updated">Actualizado: <?= e(date("d/m/Y", strtotime($page["mod"] ?? "now"))) ?></p>
</div>
</section>
