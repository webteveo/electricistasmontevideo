<section class="section wrap landing-section" id="detalle">
<div class="services-heading"><span class="pill">Qué hacemos</span><h2><?= e($landing['lista_titulo']) ?></h2></div>
<?php if ($foto): ?><figure class="landing-photo"><img src="<?= e(asset_ver($foto)) ?>" alt="<?= e($foto_alt) ?>" width="1200" height="800" loading="lazy"></figure><?php endif; ?>
<div class="landing-lead landing-lead--zone"><p><?= e($landing['intro']) ?></p></div>
<ul class="landing-list landing-list--grid"><?php foreach ($landing['lista'] as $item): ?><li><?= icon('check') ?><span><?= e($item) ?></span></li><?php endforeach; ?></ul>
<?php if (!empty($landing['preguntas'])): ?><div class="landing-prose">
<?php foreach ($landing['preguntas'] as $sec): ?><h2><?= e($sec['h2']) ?></h2><?php foreach ($sec['p'] as $p): ?><p><?= texto_enlaces($p) ?></p><?php endforeach; ?><?php if (!empty($sec['tabla'])): ?><div class="table-wrap"><table><thead><tr><?php foreach ($sec['tabla']['cabecera'] as $c): ?><th scope="col"><?= e($c) ?></th><?php endforeach; ?></tr></thead><tbody><?php foreach ($sec['tabla']['filas'] as $fila): ?><tr><?php foreach ($fila as $c): ?><td><?= e($c) ?></td><?php endforeach; ?></tr><?php endforeach; ?></tbody></table></div><?php endif; ?>
<?php endforeach; ?>
</div><?php endif; ?>
<div class="landing-accordion faq-list"><?php foreach ($landing['secciones'] as $i => $sec): ?><details<?= $i === 0 ? ' open' : '' ?>><summary><?= e($sec['h2']) ?><span class="landing-accordion-icon" aria-hidden="true"></span></summary><div class="landing-accordion-body"><?php foreach ($sec['p'] as $p): ?><p><?= e($p) ?></p><?php endforeach; ?></div></details><?php endforeach; ?></div>
<?php if (!empty($landing['fuentes'])): ?><div class="landing-sources"><h2>Normativa y fuentes</h2><ul><?php foreach ($landing['fuentes'] as $fu): ?><li><a href="<?= e($fu['url']) ?>" rel="noopener" target="_blank"><?= e($fu['label']) ?></a><?php if (!empty($fu['nota'])): ?> — <?= e($fu['nota']) ?><?php endif; ?></li><?php endforeach; ?></ul><p class="landing-updated">Actualizado: <?= e(date('d/m/Y', strtotime($page['mod'] ?? 'now'))) ?></p></div><?php endif; ?>
</section>
