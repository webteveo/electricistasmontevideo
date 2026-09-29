<?php
// Grilla de servicios. Fuera de la home ($corto) cada tarjeta muestra su frase corta. En una zona o un servicio × barrio,
// la tarjeta enlaza a la página de ese servicio en el barrio cuando existe.
$grid_corto = !empty($corto);
$grid_zona = in_array($tpl ?? '', ['zona', 'sz'], true) ? $bk : null;
?>
<div class="services-grid"><?php foreach ($services as $i=>$s): $img = 'images/servicios/' . $s['id'] . '.webp'; $has_img = is_file(APP_ROOT . '/public/' . $img); ?><article class="service-card<?= $has_img ? '' : ' service-card--noimg' ?>" id="<?= e($s['id']) ?>">
<?php if ($has_img): ?><img class="service-card-bg" src="<?= e(asset_ver($img)) ?>" alt="" width="800" height="1000" loading="lazy" aria-hidden="true"><?php endif; ?>
<div class="service-card-body"><span class="service-num"><?= sprintf('%02d', $i+1) ?></span><?php $card_url = app_url($grid_zona && sz_publicada($s['id'], $grid_zona) ? sz_url($s['id'], $grid_zona) : $servicios_landing[$s['id']]['slug']); ?><h3><a class="service-card-link" href="<?= e($card_url) ?>"><?= e($s['title']) ?></a></h3><p><?= e($grid_corto ? $s['corto'] : $s['text']) ?></p><a class="service-more" href="<?= e($card_url) ?>">Ver más <?= icon('arrow') ?></a><a class="button button-wsp button-small" href="<?= e(whatsapp_url('Hola, quiero consultar por ' . mb_strtolower($s['title']) . ' en Montevideo.')) ?>" aria-label="<?= e('Pedí tu presupuesto para ' . mb_strtolower($s['title'])) ?>"><?= icon('whatsapp') ?> Pedí tu presupuesto</a></div>
</article><?php endforeach; ?></div>
<div class="services-banner"><p>¿Necesitás un electricista? <strong>Presupuesto sin costo.</strong></p><a class="button button-wsp" href="<?= e(whatsapp_url()) ?>"><?= icon('whatsapp') ?> Pedí tu presupuesto</a></div>
