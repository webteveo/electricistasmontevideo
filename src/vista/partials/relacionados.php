<?php if (in_array($tpl, ['servicio', 'zona', 'sz', 'region'], true)): ?>
<nav class="wrap related-links" aria-label="Enlaces relacionados">
<div class="landing-links">
<p><span class="landing-links-label"><?= $tpl === "servicio" ? "Otros servicios:" : "Servicios en Montevideo:" ?></span> <?php $i=0; foreach ($servicios_landing as $id => $l): if ($tpl === "servicio" && $id === $page["servicio"]) continue; ?><?= $i++ ? " · " : "" ?><a href="<?= e(app_url($l["slug"])) ?>"><?= e($l["crumb"]) ?></a><?php endforeach; ?></p>
<p><span class="landing-links-label">Zonas:</span> <?php $i=0; foreach ($regiones as $rk => $rg): if (!local_pagina(region_url($rk))) continue; ?><?= $i++ ? " · " : "" ?><a href="<?= e(app_url(region_url($rk))) ?>"><?= e($rg["nombre"]) ?></a><?php endforeach; ?><?= $i ? " · " : "" ?><a href="<?= e(app_url("zonas")) ?>">Todas las zonas</a></p>
</div>
</nav>
<?php endif; ?>
