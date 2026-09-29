# Electricistas Montevideo — entrega para Hostinger (29/09/2026)

Dominio: https://electricistasmontevideo.com/ · Teléfono y WhatsApp: +598 97 406 456.
Detalle del trabajo y datos pendientes: `AUDITORIA-SEO.md` (no subir).

## Qué cambió

De 20 a 274 páginas indexables, todas con texto propio: 12 servicios, 72 zonas (67 nuevas + las 5 de antes con la misma URL), 6 páginas de región, 175 páginas servicio × barrio y `/como-funciona`. Nuevos `robots.txt` (bots de IA), `llms.txt` por región y sitemap con el grupo `sitemap-servicios-barrio.xml`.

## Paquete

`_entrega/electricistasmontevideo.zip` (2,3 MB, 189 archivos). Contiene: `index.php`, `.htaccess`, `robots.php`, `robots.txt`, `sitemap.php`, `trabajos.json`, `9c35310688d8eb199783d15b6bfbc748.txt`, `config/`, `src/`, `public/` y `content/`.

**No incluye y no hay que tocar en el servidor:** `data/` (ahí están los registros de `/metricas`), `_archivo_base/`, `scripts/`, archivos `.md`. No hay archivos para borrar: esta entrega solo agrega y reemplaza.

## Cómo subirlo en Hostinger

1. hPanel → **Archivos → Administrador de archivos** → `public_html`.
2. **Copia de seguridad antes**: seleccioná todo `public_html` → Comprimir → descargá el zip (o usá hPanel → Copias de seguridad).
3. Subí `electricistasmontevideo.zip` a `public_html` y usá **Extraer** en esa misma carpeta. Aceptá **reemplazar** los archivos existentes.
4. Borrá el zip subido de `public_html`.
5. hPanel → **Avanzado → Configuración de PHP**: versión **8.1 o superior** (el sitio necesita PHP 8).
6. Si el sitio usa caché de Hostinger (LiteSpeed Cache o CDN), **purgá la caché**.

### Subir por regiones (recomendado)

Para no publicar 254 páginas nuevas de golpe, antes de subir editá `src/datos/zonas.php`, línea `$publicar_regiones`, y dejá en `true` solo la primera región (por ejemplo `centro` y `costa`). Cada semana o dos, cambiá la siguiente a `true` y subí solo ese archivo. Las páginas de las regiones en `false` no se publican ni aparecen en el sitemap.

## Comprobar después de subir

1. https://electricistasmontevideo.com/ carga y el botón de WhatsApp abre el 097 406 456.
2. Abren bien: `/zonas`, `/zonas/prado`, `/tableros-electricos/prado`, `/zonas/costa-este`, `/como-funciona`, `/puesta-a-tierra-montevideo`.
3. Redirecciones 301: `/electricista-prado` → `/zonas/prado`; `/tableros-electricos-buceo` → `/tableros-electricos/buceo`.
4. `/sitemap.xml`, `/sitemap-servicios-barrio.xml`, `/robots.txt` y `/llms.txt` responden.
5. `/config/variables.php` y `/AGENTS.md` dan 403 (bloqueados).
6. `/metricas` sigue entrando con la misma contraseña.

## Después (en este orden)

1. **Search Console**: reenviar `sitemap.xml`; pedir indexación de la home, `/zonas`, las páginas de región publicadas y 3 o 4 barrios.
2. **Bing Webmaster Tools** (importar desde Search Console) y correr en local `php scripts/indexnow.php` para avisar las URLs nuevas.
3. Revisar indexación a los 7, 30 y 60 días (umbrales en `AUDITORIA-SEO.md`, sección 7).
