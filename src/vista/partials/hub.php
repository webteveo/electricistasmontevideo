<?php
// Texto propio de una página general (content/paginas/{ruta}.php): secciones con H2 en pregunta, tabla opcional,
// preguntas frecuentes y fecha de actualización. Mismos componentes visuales que las landings.
if (empty($hub)) return;
?>
<section class="section wrap landing-section" id="guia">
<?php if (!empty($hub['pill']) || !empty($hub['h2'])): ?><div class="services-heading"><?php if (!empty($hub['pill'])): ?><span class="pill"><?= e($hub['pill']) ?></span><?php endif; ?><?php if (!empty($hub['h2'])): ?><h2><?= e($hub['h2']) ?></h2><?php endif; ?></div><?php endif; ?>
<?php if (!empty($hub['intro'])): ?><div class="landing-lead landing-lead--zone"><?php foreach ((array)$hub['intro'] as $p): ?><p><?= texto_enlaces($p) ?></p><?php endforeach; ?></div><?php endif; ?>
<div class="landing-prose">
<?php foreach ($hub['secciones'] ?? [] as $sec): ?><h2><?= e($sec['h2']) ?></h2><?php foreach ($sec['p'] ?? [] as $p): ?><p><?= texto_enlaces($p) ?></p><?php endforeach; ?>
<?php if (!empty($sec['lista'])): ?><ul class="landing-list"><?php foreach ($sec['lista'] as $li): ?><li><?= icon('check') ?><span><?= texto_enlaces($li) ?></span></li><?php endforeach; ?></ul><?php endif; ?>
<?php if (!empty($sec['tabla'])): ?><div class="table-wrap"><table><thead><tr><?php foreach ($sec['tabla']['cabecera'] as $c): ?><th scope="col"><?= e($c) ?></th><?php endforeach; ?></tr></thead><tbody><?php foreach ($sec['tabla']['filas'] as $fila): ?><tr><?php foreach ($fila as $c): ?><td><?= texto_enlaces($c) ?></td><?php endforeach; ?></tr><?php endforeach; ?></tbody></table></div><?php endif; ?>
<?php endforeach; ?>
<?php if (!empty($hub['faq']) && empty($hub['faq_en_plantilla'])): ?><h2>Preguntas frecuentes</h2><div class="landing-accordion faq-list"><?php foreach ($hub['faq'] as $i => $f): ?><details<?= $i === 0 ? ' open' : '' ?>><summary><?= e($f['q']) ?><span class="landing-accordion-icon" aria-hidden="true"></span></summary><div class="landing-accordion-body"><p><?= texto_enlaces($f['a']) ?></p></div></details><?php endforeach; ?></div><?php endif; ?>
<?php if (!empty($hub['mod'])): ?><p class="landing-updated">Actualizado: <time datetime="<?= e($hub['mod']) ?>"><?= e(date('d/m/Y', strtotime($hub['mod']))) ?></time></p><?php endif; ?>
</div>
</section>
