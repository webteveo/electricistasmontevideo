<?php if ($tpl === "servicio" || $tpl === "barrio"): ?>
<section class="wrap related-links" aria-label="Enlaces relacionados">
<div class="landing-links">
<p><span class="landing-links-label"><?= $tpl === "servicio" ? "Otros servicios:" : "Servicios:" ?></span> <?php $i=0; foreach ($servicios_landing as $id => $l): if ($tpl === "servicio" && $id === $page["servicio"]) continue; ?><?= $i++ ? " · " : "" ?><a href="<?= e(app_url($l["slug"])) ?>"><?= e($l["crumb"]) ?></a><?php endforeach; ?></p>
<p><span class="landing-links-label">Zonas:</span> <?php $i=0; foreach ($zonas_activas as $k => $z): if ($tpl === "barrio" && $k === $page["barrio_hub"]) continue; ?><?= $i++ ? " · " : "" ?><a href="<?= e(app_url("electricista-" . $k)) ?>"><?= e($z["nombre"]) ?></a><?php endforeach; ?> · <a href="<?= e(app_url("zonas")) ?>">Todas las zonas</a></p>
</div>
</section>
<?php endif; ?>
