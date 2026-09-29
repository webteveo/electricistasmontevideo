# Electricistas Montevideo — entrega del plan SEO semántico local (25/09/2026)

Vista local: http://localhost/electricistasmontevideo/
Dominio: https://electricistasmontevideo.com/
Teléfono y WhatsApp: +598 97 406 456 (único en todo el sitio, definido en `config/variables.php`).
Plan y estado detallado: `plan_seo_semantico_local.md` (no subir).

## Qué cambió

- **Poda de páginas**: de 1.036 a 17 páginas indexables más el índice de artículos y 2 artículos. Las 896 URLs barrio × servicio y las 125 páginas antiguas de barrio redirigen con 301 (a la página del servicio, a la página de su grupo de zonas o a `/zonas#barrio`).
- **Zonas con página propia**: Pocitos, Carrasco, Centro, Ciudad de la Costa y Costa de Oro, cada una con texto propio.
- **Identidad**: un solo teléfono. Se quitaron los testimonios generados (con el logo de Google y estrellas), las cifras "500+ clientes" y "5+ años", la garantía "volvemos sin cargo" y la foto de stock que se presentaba como el equipo.
- **Contenido**: home con un primer párrafo que responde la búsqueda; las 7 páginas de servicio suman preguntas en H2, tablas y normativa UTE/URSEA citada con fecha. Se publicaron 2 artículos.
- **Técnico**: schema limpio (`areaServed`, `description`, `knowsAbout`, `sameAs` automático), `WebPage.dateModified`, sitemap con `lastmod` por página, `llms.txt` con servicios y zonas, IndexNow listo y verificadores actualizados.

## Paquete para subir

`_entrega/electricistasmontevideo.zip`. Extraer en la raíz del hosting y reemplazar los archivos existentes. Incluye: `index.php`, `.htaccess`, `robots.php`, `robots.txt`, `sitemap.php`, `trabajos.json`, `9c35310688d8eb199783d15b6bfbc748.txt`, `config/`, `src/`, `public/` y `content/`. Los scripts se usan en local y no hace falta subirlos.

**Borrar a mano en el servidor** (ya no existen):
- `src/datos/testimonios.php`
- `public/images/nosotros/equipo.webp`

No subir: `_archivo_base/`, `data/`, archivos `.md`, `composer.json`.

## Después de subir (en este orden)

1. Abrir https://electricistasmontevideo.com/ y probar el botón de WhatsApp: tiene que abrir el 097 406 456.
2. Probar un 301: https://electricistasmontevideo.com/tableros-electricos-buceo → `/tableros-electricos-montevideo`.
3. Search Console: reenviar `sitemap.xml` y pedir la indexación de la home y de las 7 páginas de servicio.
4. `C:/xampp/php/php.exe scripts/indexnow.php` (avisa a Bing y a los buscadores asociados).
5. Bing Webmaster Tools: importar el sitio desde GSC.

## Pendiente del negocio (sin esto hay bloques que no se pueden escribir)

Nombre y foto real de quien atiende, categoría UTE (si existe), base de salida y horario real, precios con fecha, ficha de Google Business Profile, redes reales y entre 20 y 30 fotos de trabajos. Detalle en `plan_seo_semantico_local.md` §10.

## Verificación

- `C:/xampp/php/php.exe scripts/verificar_sitio.php` → OK, 332 comprobaciones (HTTP, un H1, canónicas, schema, teléfono único, sin reseñas no verificadas, 301 de la poda, sitemap).
- `C:/xampp/php/php.exe scripts/verificar_articulos.php` → OK, 91 comprobaciones.
- Capturas en desktop (1366 px) y móvil (500 px) de la home, Pocitos, cargadores, zonas y un artículo.

No se crearon commits, despliegues ni automatizaciones.
