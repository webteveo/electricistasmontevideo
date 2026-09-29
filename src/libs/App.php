<?php
namespace ElectricistasMontevideo;
class App {
    public static function iniciar(): void {
        global $empresa_nombre, $empresa_telefono, $empresa_telefono_sep, $empresa_whatsapp_visible, $empresa_zona_trabajo, $social_whatsapp;
        require APP_ROOT . '/src/datos/sitio.php';
        $route = trim((string)($_GET['url'] ?? ''), '/');
        $aliases = ['index/index'=>'', 'index'=>'', 'servicios/index'=>'servicios', 'contacto/index'=>'contacto', 'quienes_somos/index'=>'nosotros', 'proyectos/index'=>'trabajos', 'quienes_somos'=>'nosotros', 'proyectos'=>'trabajos', 'nosotros/index'=>'nosotros', 'trabajos/index'=>'trabajos'];
        if (array_key_exists($route, $aliases)) { header('Location: ' . app_url($aliases[$route]), true, 301); return; }
        if ($route === 'metricas' || str_starts_with($route, 'metricas/')) { require APP_ROOT . '/src/controlador/metricas.php'; return; }
        if ($route === 'llms.txt' || $route === 'articulos' || str_starts_with($route, 'articulos/')) {
            require APP_ROOT . '/src/controlador/articulos.php'; return;
        }
        $page = $pages[$route] ?? null;
        // Zonas (/zonas/{barrio}), regiones (/zonas/{region}) y servicio × barrio (/{servicio}/{barrio}): src/datos/zonas.php.
        if (!$page && ($page = local_pagina($route))) $pages[$route] = $page;
        if (!$page &&($destino = zona_redireccion($route, $barrios_perfil, $zonas_activas, $servicio_base_slug, $servicios_landing)) !== null) { header('Location: ' . app_url($destino), true, 301); return; }
        if (!$page) { http_response_code(404); $page = ['title'=>'Página no encontrada | Electricistas Montevideo', 'description'=>'La página que buscás no está disponible. Volvé al inicio o contactá a Electricistas Montevideo.', 'heading'=>'Esta página no está disponible.', 'noindex'=>true]; }
        $page_title = $page['title']; $page_description = $page['description'];
        $page_noindex = $page['noindex'] ?? false;
        $canonical_url = absolute_url($route);
        require APP_ROOT . '/src/vista/pagina.php';
    }
}
