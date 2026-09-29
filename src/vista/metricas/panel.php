<?php
$pct = static fn($a, $b) => $b ? round(100 * $a / $b, 1) . '%' : '–';
$n = static fn($v) => number_format((int)$v, 0, ',', '.');
$maxdia = max(1, max(array_map(static fn($d) => $d['pv'], $por_dia)));
$maxwsp = max(1, max(array_map(static fn($d) => $d['wsp'], $por_dia)));
$rango = [7 => '7 días', 30 => '30 días', 90 => '90 días', 365 => '1 año'];
$dias_nombre = ['Lun', 'Mar', 'Mié', 'Jue', 'Vie', 'Sáb', 'Dom'];
$tabla = static function (array $rows, array $cols, callable $label, int $limit = 15) use ($n, $pct): string {
    if (!$rows) return '<p class="vacio">Sin datos en este período.</p>';
    $h = '<table><thead><tr><th>' . e($cols[0]) . '</th>'; foreach (array_slice($cols, 1) as $c) $h .= '<th class="num">' . e($c) . '</th>'; $h .= '</tr></thead><tbody>';
    foreach (array_slice($rows, 0, $limit, true) as $k => $r) {
        $h .= '<tr><td>' . e($label((string)$k, $r)) . '</td>';
        foreach (array_slice($cols, 1) as $c) {
            if ($c === 'Sesiones') $h .= '<td class="num">' . $n($r['ses']) . '</td>';
            elseif ($c === 'Vistas') $h .= '<td class="num">' . $n($r['pv']) . '</td>';
            elseif ($c === 'WhatsApp') $h .= '<td class="num strong">' . $n($r['wsp']) . '</td>';
            elseif ($c === 'Teléfono') $h .= '<td class="num">' . $n($r['tel'] ?? 0) . '</td>';
            elseif ($c === 'Entradas') $h .= '<td class="num">' . $n($r['entradas'] ?? 0) . '</td>';
            elseif ($c === 'Tasa') { $b = $r['ses'] ?? $r['pv'] ?? 0; $h .= '<td class="num">' . $pct($r['wsp'], $b) . '</td>'; }
            elseif ($c === 'Tiempo') $h .= '<td class="num">' . ($r['ses'] ? round($r['dur'] / $r['ses']) . ' s' : '–') . '</td>';
        }
        $h .= '</tr>';
    }
    return $h . '</tbody></table>';
};
?><!doctype html><html lang="es"><head><meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1"><meta name="robots" content="noindex, nofollow"><title>Métricas · Electricistas Montevideo</title>
<link rel="stylesheet" href="<?= e(asset_ver('css/fuentes.css')) ?>">
<style>
:root{--ink:#151c21;--muted:#616970;--line:#e3e6e1;--celeste:#0ea5e9;--verde:#25d366;--paper:#f6f7f4}
*{box-sizing:border-box}body{margin:0;background:var(--paper);color:var(--ink);font-family:'Host Grotesk',Arial,sans-serif;font-size:14px;line-height:1.5}
a{color:var(--celeste)}
.top{background:#fff;border-bottom:1px solid var(--line);position:sticky;top:0;z-index:5}.top .in{max-width:1240px;margin:auto;padding:14px 24px;display:flex;align-items:center;justify-content:space-between;gap:16px;flex-wrap:wrap}
.top h1{font-family:'Barlow Condensed',sans-serif;font-size:26px;margin:0;text-transform:uppercase;letter-spacing:.01em}.top h1 small{font-family:'Host Grotesk',sans-serif;font-size:12px;font-weight:400;color:var(--muted);text-transform:none;letter-spacing:0;margin-left:10px}
.rango{display:flex;gap:6px}.rango a{padding:7px 12px;border-radius:999px;border:1px solid var(--line);text-decoration:none;color:var(--ink);font-weight:600;font-size:13px}.rango a.on{background:var(--ink);color:#fff;border-color:var(--ink)}
.acciones{display:flex;gap:14px;font-size:13px;align-items:center}.acciones a{text-decoration:none}
.wrap{max-width:1240px;margin:auto;padding:24px}
.kpis{display:grid;grid-template-columns:repeat(auto-fit,minmax(150px,1fr));gap:12px;margin-bottom:24px}
.kpi{background:#fff;border:1px solid var(--line);border-radius:12px;padding:16px 18px}.kpi b{display:block;font-family:'Barlow Condensed',sans-serif;font-size:36px;line-height:1;font-weight:800}.kpi span{display:block;font-size:12px;color:var(--muted);margin-top:6px}.kpi.v b{color:var(--verde)}.kpi.c b{color:var(--celeste)}
.grid{display:grid;grid-template-columns:repeat(2,1fr);gap:18px;margin-bottom:18px}.grid.uno{grid-template-columns:1fr}
.card{background:#fff;border:1px solid var(--line);border-radius:12px;padding:18px 20px;min-width:0}.card h2{font-family:'Barlow Condensed',sans-serif;font-size:20px;text-transform:uppercase;margin:0 0 4px;letter-spacing:.01em}.card p.sub{margin:0 0 14px;color:var(--muted);font-size:12.5px}
table{width:100%;border-collapse:collapse;font-size:13px}th{text-align:left;font-size:11px;letter-spacing:.08em;text-transform:uppercase;color:var(--muted);padding:6px 8px;border-bottom:1px solid var(--line)}td{padding:8px;border-bottom:1px solid #eef0ec;vertical-align:top}td.num,th.num{text-align:right;white-space:nowrap;font-variant-numeric:tabular-nums}td.strong{font-weight:700;color:#159a47}tr:last-child td{border-bottom:0}td:first-child{max-width:380px;overflow:hidden;text-overflow:ellipsis;white-space:nowrap}code{font-size:11px;background:#f0f2ee;padding:2px 5px;border-radius:4px}
.vacio{color:var(--muted);font-size:13px;margin:0}
.chart{display:grid;grid-template-columns:repeat(<?= count($por_dia) ?>,1fr);gap:2px;align-items:end;height:160px;margin-top:8px}.chart .b{position:relative;display:flex;flex-direction:column;justify-content:flex-end;height:100%}.chart .pv{background:#cfe9f7;border-radius:3px 3px 0 0}.chart .w{background:var(--verde);border-radius:3px 3px 0 0;margin-top:2px}.chart .b:hover:after{content:attr(data-t);position:absolute;bottom:100%;left:50%;transform:translateX(-50%);background:var(--ink);color:#fff;font-size:11px;padding:4px 8px;border-radius:6px;white-space:nowrap;z-index:2}
.leyenda{display:flex;gap:16px;font-size:12px;color:var(--muted);margin-top:8px}.leyenda i{display:inline-block;width:10px;height:10px;border-radius:2px;margin-right:6px;vertical-align:middle}
.barras{display:grid;gap:6px}.barras div{display:grid;grid-template-columns:90px 1fr 50px;align-items:center;gap:10px;font-size:12.5px}.barras i{display:block;height:10px;background:var(--verde);border-radius:3px}.barras i.pv{background:#cfe9f7}.barras small{color:var(--muted);text-align:right}
.horas{display:grid;grid-template-columns:repeat(24,1fr);gap:3px;align-items:end;height:90px}.horas div{display:flex;flex-direction:column;justify-content:flex-end;height:100%;position:relative}.horas .w{background:var(--verde);border-radius:2px}.horas .pv{background:#cfe9f7;border-radius:2px}.horas span{position:absolute;top:100%;left:0;right:0;text-align:center;font-size:9px;color:var(--muted);margin-top:3px}
.nota{background:#fff8e1;border:1px solid #f3e2a0;border-radius:10px;padding:12px 16px;font-size:13px;margin-bottom:18px}
@media(max-width:900px){.grid{grid-template-columns:1fr}.wrap{padding:16px}.kpi b{font-size:30px}}
</style></head><body>
<div class="top"><div class="in"><h1>Métricas <small><?= e($desde->format('d/m/Y')) ?> – <?= e($hasta->format('d/m/Y')) ?></small></h1>
<div class="rango"><?php foreach ($rango as $d => $l): ?><a href="?d=<?= $d ?>" class="<?= $d === $dias ? 'on' : '' ?>"><?= e($l) ?></a><?php endforeach; ?></div>
<div class="acciones"><a href="<?= e(app_url('metricas/excluirme?v=' . ($excluido ? '0' : '1'))) ?>"><?= $excluido ? '✓ Tus visitas no se cuentan' : 'No contar mis visitas' ?></a><a href="<?= e(app_url('metricas/salir')) ?>">Salir</a></div></div></div>
<div class="wrap">
<?php if (!$eventos): ?><div class="nota">Todavía no hay datos en este período. Las visitas se empiezan a registrar apenas alguien navega el sitio con el script activo.</div><?php endif; ?>
<div class="kpis">
<div class="kpi v"><b><?= $n($tot['wsp']) ?></b><span>Clics en WhatsApp</span></div>
<div class="kpi"><b><?= $n($tot['tel']) ?></b><span>Clics en teléfono</span></div>
<div class="kpi c"><b><?= e($tasa) ?>%</b><span>Sesiones que hicieron clic en WhatsApp</span></div>
<div class="kpi"><b><?= $n($tot['pv']) ?></b><span>Páginas vistas</span></div>
<div class="kpi"><b><?= $n($tot['ses']) ?></b><span>Sesiones</span></div>
<div class="kpi"><b><?= $n($tot['vis']) ?></b><span>Visitantes únicos</span></div>
<div class="kpi"><b><?= $tot['ses'] ? number_format($tot['pv'] / $tot['ses'], 1, ',', '.') : '–' ?></b><span>Páginas por sesión</span></div>
<div class="kpi"><b><?= $dur_media ?> s</b><span>Tiempo medio por página</span></div>
</div>

<div class="grid uno"><div class="card"><h2>Evolución diaria</h2><p class="sub">Barras celestes: páginas vistas. Verdes: clics en WhatsApp. Pasá el mouse para ver el detalle.</p>
<div class="chart"><?php foreach ($por_dia as $d => $v): ?><div class="b" data-t="<?= e(date('d/m', strtotime($d))) ?> · <?= $v['pv'] ?> vistas · <?= count($v['ses']) ?> sesiones · <?= $v['wsp'] ?> WhatsApp"><div class="pv" style="height:<?= round(100 * $v['pv'] / $maxdia) ?>%"></div><div class="w" style="height:<?= $v['wsp'] ? max(4, round(60 * $v['wsp'] / $maxwsp)) : 0 ?>px"></div></div><?php endforeach; ?></div>
<div class="leyenda"><span><i style="background:#cfe9f7"></i>Páginas vistas</span><span><i style="background:var(--verde)"></i>Clics en WhatsApp</span></div></div></div>

<div class="grid">
<div class="card"><h2>De dónde viene la gente</h2><p class="sub">Fuente de cada sesión y cuántos clics en WhatsApp generó. La tasa es clics por sesión.</p><?= $tabla($por_fuente, ['Fuente', 'Sesiones', 'WhatsApp', 'Teléfono', 'Tasa'], static fn($k) => $k) ?></div>
<div class="card"><h2>Página de entrada</h2><p class="sub">Por qué página llegaron y qué tan bien convierte esa entrada.</p><?= $tabla($por_entrada, ['Página', 'Sesiones', 'WhatsApp', 'Tasa', 'Tiempo'], static fn($k) => $nombre_pagina($k)) ?></div>
</div>

<div class="grid">
<div class="card"><h2>Dónde hacen clic en WhatsApp</h2><p class="sub">Qué botón del sitio genera los clics.</p><?php if ($por_pl): $mx = max($por_pl); ?><div class="barras"><?php foreach ($por_pl as $k => $v): ?><div><span><?= e($pl_nombres[$k] ?? $k) ?></span><i style="width:<?= round(100 * $v / $mx) ?>%"></i><small><?= $n($v) ?> · <?= $pct($v, $tot['wsp']) ?></small></div><?php endforeach; ?></div><?php else: ?><p class="vacio">Sin clics en este período.</p><?php endif; ?></div>
<div class="card"><h2>Tipo de página</h2><p class="sub">Qué parte del sitio trae los clics: inicio, landings de servicio, zonas o servicio × zona.</p><?= $tabla($por_tipo, ['Tipo', 'Vistas', 'WhatsApp', 'Tasa'], static fn($k) => $k) ?></div>
</div>

<div class="grid">
<div class="card"><h2>Por servicio</h2><p class="sub">Suma de la landing general y todas sus páginas por zona.</p><?= $tabla($por_servicio, ['Servicio', 'Vistas', 'WhatsApp', 'Tasa'], static fn($k) => $nombre_servicio($k)) ?></div>
<div class="card"><h2>Por zona</h2><p class="sub">Suma del hub de la zona y sus 7 páginas de servicio.</p><?= $tabla($por_zona, ['Zona', 'Vistas', 'WhatsApp', 'Tasa'], static fn($k) => $nombre_zona($k), 20) ?></div>
</div>

<div class="grid uno"><div class="card"><h2>Páginas</h2><p class="sub">Las 25 con más clics en WhatsApp. "Entradas" es cuántas sesiones empezaron ahí.</p><?= $tabla($por_pagina, ['Página', 'Vistas', 'Entradas', 'WhatsApp', 'Teléfono', 'Tasa'], static fn($k, $r) => $nombre_pagina($k) . ' · /' . $k, 25) ?></div></div>

<div class="grid">
<div class="card"><h2>Dispositivo</h2><p class="sub">Móvil suele convertir más porque WhatsApp abre directo.</p><?= $tabla($por_dev, ['Dispositivo', 'Sesiones', 'WhatsApp', 'Tasa'], static fn($k) => $k) ?><br><?= $tabla($por_so, ['Sistema', 'Sesiones', 'WhatsApp', 'Tasa'], static fn($k) => $k, 6) ?></div>
<div class="card"><h2>Horario de los clics</h2><p class="sub">Hora del día (Uruguay) en que la gente hace clic en WhatsApp. Útil para saber cuándo tenés que estar atento.</p><?php $mh = max(1, max(array_map(static fn($x) => max($x['wsp'], 1), $por_hora))); $mpv = max(1, max(array_map(static fn($x) => $x['pv'], $por_hora))); ?><div class="horas"><?php foreach ($por_hora as $h => $v): ?><div title="<?= $h ?>:00 · <?= $v['pv'] ?> vistas · <?= $v['wsp'] ?> WhatsApp"><div class="pv" style="height:<?= round(60 * $v['pv'] / $mpv) ?>%"></div><div class="w" style="height:<?= $v['wsp'] ? max(3, round(40 * $v['wsp'] / $mh)) : 0 ?>%"></div><span><?= $h ?></span></div><?php endforeach; ?></div><br><br><div class="barras"><?php $md = max(1, max(array_map(static fn($x) => $x['wsp'], $por_dow))); foreach ($por_dow as $i => $v): ?><div><span><?= $dias_nombre[$i] ?></span><i style="width:<?= round(100 * $v['wsp'] / $md) ?>%"></i><small><?= $n($v['wsp']) ?> · <?= $n($v['pv']) ?> vistas</small></div><?php endforeach; ?></div></div>
</div>

<?php if ($por_camp): ?><div class="grid uno"><div class="card"><h2>Campañas (utm_campaign)</h2><p class="sub">Sesiones que llegaron con un enlace etiquetado, por ejemplo desde una publicación o un anuncio.</p><?= $tabla($por_camp, ['Campaña', 'Sesiones', 'WhatsApp', 'Tasa'], static fn($k) => $k) ?></div></div><?php endif; ?>

<div class="grid uno"><div class="card"><h2>Últimos 40 eventos</h2><p class="sub">Todo lo que registró el sitio, del más reciente al más viejo: vistas, clics, formulario y tiempo en página. "Visitante" es un código corto que se repite para la misma persona.</p>
<?php if ($ultimos_ev): ?><div style="overflow-x:auto"><table><thead><tr><th>Cuándo</th><th>Evento</th><th>Página</th><th>Detalle</th><th>Entró por</th><th>Fuente</th><th>Referencia / UTM</th><th>Dispositivo</th><th>Visitante</th></tr></thead><tbody><?php foreach ($ultimos_ev as $u): ?><tr><td><?= e(date('d/m H:i:s', strtotime($u['t']))) ?></td><td><?= e($u['ev']) ?><?= $u['nuevo'] ? ' <small style="color:var(--celeste)">· nueva sesión</small>' : '' ?></td><td title="/<?= e($u['p']) ?>"><?= e($nombre_pagina($u['p'])) ?></td><td><?= e($u['pl'] ?: ($u['dur'] ? $u['dur'] . ' s' : '–')) ?></td><td><?= e($nombre_pagina($u['entrada'])) ?></td><td><?= e($u['fuente']) ?></td><td title="<?= e($u['ref']) ?>"><?= e($u['utm'] !== '' ? 'UTM: ' . $u['utm'] : ($u['ref'] !== '' ? mb_substr(preg_replace('#^https?://#', '', $u['ref']), 0, 40) : '–')) ?></td><td><?= e(($u['dev'] === 'movil' ? 'Móvil' : 'Desktop') . ' · ' . $u['so'] . ' · ' . $u['nav'] . ($u['sw'] ? ' · ' . $u['sw'] . 'px' : '') . ($u['lang'] ? ' · ' . $u['lang'] : '')) ?></td><td><code><?= e($u['vid']) ?></code></td></tr><?php endforeach; ?></tbody></table></div><?php else: ?><p class="vacio">Sin eventos en este período.</p><?php endif; ?></div></div>
<div class="grid uno"><div class="card"><h2>Últimos clics en WhatsApp</h2><p class="sub">Los 40 más recientes, con la página donde ocurrió, por dónde entró esa persona al sitio y de dónde venía.</p>
<?php if ($ultimos): ?><table><thead><tr><th>Cuándo</th><th>Página del clic</th><th>Botón</th><th>Entró por</th><th>Fuente</th><th>Dispositivo</th></tr></thead><tbody><?php foreach ($ultimos as $u): ?><tr><td><?= e(date('d/m H:i', strtotime($u['t']))) ?></td><td><?= e($nombre_pagina($u['p'])) ?></td><td><?= e($u['pl']) ?></td><td><?= e($nombre_pagina($u['entrada'] ?? '')) ?></td><td><?= e($u['fuente']) ?></td><td><?= e($u['dev'] === 'movil' ? 'Móvil' : 'Desktop') ?></td></tr><?php endforeach; ?></tbody></table><?php else: ?><p class="vacio">Sin clics en este período.</p><?php endif; ?></div></div>
</div>
</body></html>
