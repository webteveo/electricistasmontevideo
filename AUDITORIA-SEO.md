# Auditoría SEO, SEO local y GEO — electricistasmontevideo.com

Fecha: 29/09/2026. Base: código del repo (rama `claude/beautiful-planck-vfq5dz`, igual al zip de `public_html` del 29/09), sitio levantado localmente y `scripts/qa-seo.py` corrido sobre las 20 URLs del sitemap. Los datos de Search Console y SERP son los de `plan_seo_semantico_local.md` (25/09/2026): no tengo acceso a GSC desde acá.
Etiquetas: **[RANKING]** mueve posiciones · **[CONVERSIÓN]** mueve leads · **[TRÁMITE]** se hace una vez · **[GEO]** visibilidad en respuestas de IA.
Este archivo es interno (el `.htaccess` bloquea `.md`).

---

## 1. Veredicto

1. **La base técnica está sana**: HTML armado en el servidor, un H1 por página, canonical correcta, JSON-LD válido con `Electrician` + `@id`, sin `aggregateRating` ni reseñas inventadas, un solo teléfono, footer sin lista de barrios, 301 de la matriz vieja funcionando. No hay errores PHP.
2. **El problema principal es de cobertura**: el sitio tiene 20 URLs indexables y solo **5 zonas con página**. Los otros ~120 barrios y localidades son un nombre en una lista de `/zonas` (sin texto propio) y las URLs viejas `/electricista-{barrio}` redirigen a un ancla. Para "electricista en {barrio}" el sitio no compite en casi ningún barrio de Montevideo.
3. **La plantilla repite mucho texto**: entre el 27 % y el 69 % del texto de cada página se repite en otra (grilla de servicios, "cómo trabajamos", "quiénes somos", "cómo coordinar la visita"). Las 5 zonas se parecen entre sí un 49–52 %, y la home y `/zonas` un 64–69 %. Así, cualquier página nueva que se sume con esta plantilla nace duplicada.
4. **Faltan servicios que la gente busca con nombre propio**: puesta a tierra, recableado de casas viejas, tomacorrientes, aumento de potencia en UTE y urgencias eléctricas hoy son párrafos dentro de otras páginas, sin URL.
5. **La entidad sigue incompleta** (esto no lo puedo arreglar yo): no hay persona responsable visible, horario real, ficha de Google Business Profile ni `sameAs`. En un nicho de urgencia, sin ficha no hay pack de mapas.

## 2. Hallazgos ordenados por impacto

Cada hallazgo lo verifiqué en el código o en el HTML local antes de escribirlo (columna "Verificado").

| # | Hallazgo | Tipo | Impacto | Verificado | Acción |
|---|---|---|---|---|---|
| 1 | Solo 5 zonas con URL (`/electricista-pocitos`, `-carrasco`, `-centro`, `-ciudad-de-la-costa`, `-costa-de-oro`). Los 62 barrios oficiales restantes y las localidades de Canelones no tienen página: `/electricista-prado` → 301 a `/zonas#prado`; `/zonas/pocitos` → 404 | RANKING | Crítico | `curl` a las 3 rutas; `$zonas_activas` en `src/datos/barrios.php` | Página propia por barrio con texto propio (`/zonas/{barrio}`), sin tocar las 5 URLs actuales |
| 2 | Similitud por plantilla: 16 de 20 URLs superan el límite (zonas 49–52 % entre sí; home ↔ `/zonas` 64–69 %; madres de servicio 27–44 %). Unas 400 palabras se repiten igual en cada página: 7 textos de la grilla de servicios, los 3 pasos, "quiénes somos", el párrafo de zonas y la barra de enlaces | RANKING | Crítico (para escalar) | `scripts/qa-seo.py` + comparación de bloques entre `/tableros-electricos-montevideo` y `/mantenimiento-electrico-montevideo` | Versiones cortas de los bloques de plantilla en las páginas internas (mismo diseño) y más texto propio |
| 3 | No hay páginas servicio × barrio. La matriz vieja se podó el 25/09 (tenía 84 % de texto compartido) y hoy `/tableros-electricos-buceo` redirige a la madre | RANKING | Alto | `curl -I` → 301 a `/tableros-electricos-montevideo` | Volver a abrir servicio × barrio solo donde haya texto propio (`/{servicio}/{barrio}`), y redirigir las URLs viejas a la nueva cuando exista |
| 4 | Servicios sin URL: puesta a tierra, recableado, tomacorrientes, aumento de potencia / trámites UTE, urgencias. Hoy son menciones dentro de tableros, instalaciones y reparaciones | RANKING / GEO | Alto | `$servicios_landing` tiene 7 claves | 5 páginas pilar nuevas (a confirmar por el operador, §6) |
| 5 | Las zonas no enlazan a vecinas con página (no existen) y cada madre enlaza solo a las mismas 5 zonas. El enlazado es una estrella: todo sale de la home | RANKING | Alto | `relacionados.php` y `pagina.php` (bloque `#zonas`) | Enlaces a 3–5 barrios vecinos reales y a los servicios del barrio en cada página |
| 6 | Las 5 zonas no tienen datos que solo tenga este negocio (tiempo de llegada, trabajos hechos ahí, reseñas, precios). No pasan del todo el "test del nombre" | RANKING / CONVERSIÓN | Alto | `barrios.php` | Contenido local eléctrico real (tipo de edificación, época, costa, reglamento de edificios) + pedir los datos del brief (§5) |
| 7 | Hubs sin texto propio ni keyword en el H1: `/servicios` ("Servicios eléctricos para tu día a día."), `/nosotros` ("Hablemos de lo que necesitás resolver.") y `/zonas` (solo listas). Home, servicios, nosotros, contacto y zonas no muestran fecha de actualización | RANKING / GEO | Medio | HTML local | Texto propio por hub, H1 con entidad, fecha visible |
| 8 | Titles y descriptions fuera de rango: `/articulos` title 73 y description 159; `/nosotros` title 40; descriptions de los 2 artículos 152 y 153 | RANKING | Medio | `qa-seo.py` | Ajustar a 45–58 / 120–150 |
| 9 | `robots.txt` solo tiene `User-agent: *`: no nombra a los bots de búsqueda de IA ni bloquea `/data/` ni `/metricas` | GEO / TRÁMITE | Medio | `robots.php` | Reglas explícitas para Googlebot, Bingbot, OAI-SearchBot, ChatGPT-User, PerplexityBot y Claude-SearchBot, y bloqueo de `/data/` y `/metricas` |
| 10 | `llms.txt` lista 5 zonas y ningún servicio × zona; no está agrupado por región | GEO | Bajo | `src/controlador/articulos.php` | `llms.txt` dinámico por región con todas las zonas y servicios publicados |
| 11 | El sitemap usa el `filemtime` del archivo de datos como `lastmod` de las madres de servicio; con zonas nuevas pasaría lo mismo (tocar un archivo marca todo como modificado) | RANKING | Bajo | `sitemap.php` | `lastmod` por página ('mod' de cada archivo de contenido) |
| 12 | Schema: `Service` en madres y zonas, `BreadcrumbList` en internas y `WebPage` con `dateModified`. En las zonas, `areaServed` es `Place` sin `containedInPlace` de ciudad | RANKING | Bajo | JSON-LD de `/electricista-pocitos` | `areaServed` con `Place` + `containedInPlace` City/AdministrativeArea |
| 13 | El formulario de `/contacto` no manda correo: arma un mensaje de WhatsApp. No es un error, pero no hay un segundo canal si el cliente no usa WhatsApp | CONVERSIÓN | Bajo | `pagina.php`, `sitio.js` | Decidir si se agrega correo (dato faltante) |
| 14 | Seguridad y datos: la contraseña de `/metricas` está como hash bcrypt (no en texto plano). Los logs de visitas (`data/metricas/*.log`) están en `.gitignore` y no se subieron al repo | TRÁMITE | OK | `config/variables.php:47`, `git check-ignore` | Ninguna. Cambiar la contraseña si alguien más la conoce |
| 15 | GA4 (`G-NV555GZNKJ`), Clarity y eventos de clic en WhatsApp y teléfono ya funcionan | — | OK | `head.php`, `sitio.js` | Ninguna |

## 3. Tabla página por página (sitemap del 29/09/2026)

"Palabras" = texto de contenido del `<main>` en bloques de 8 palabras o más, incluida la plantilla. "Sim." = porcentaje de frases de 5 palabras compartidas con la página más parecida.

| URL | Keyword objetivo | Palabras | Sim. (con) | Problemas | Prioridad |
|---|---|---|---|---|---|
| `/` | electricista(s) en Montevideo | 758 | 64 % (`/zonas`) | Casi igual a `/zonas`; sin fecha visible; canibaliza con `/electricista-centro` según GSC | Alta |
| `/servicios` | servicios de electricista Montevideo | 366 | 40 % (cargadores) | H1 sin keyword; texto propio corto | Media |
| `/nosotros` | electricistas montevideo quiénes somos | 379 | 4 % | Title de 40 caracteres; sin persona real (dato faltante) | Media |
| `/contacto` | contacto electricista Montevideo | 277 | 12 % | Sin horario real (dato faltante) | Baja |
| `/zonas` | electricista por barrio Montevideo / Canelones | 700 | 69 % (`/`) | Listas sin texto; casi igual a la home; no enlaza barrios porque no tienen página | Alta |
| `/reparaciones-electricas-montevideo` | reparaciones eléctricas Montevideo | 1.283 | 33 % (tableros) | Plantilla repetida | Media |
| `/instalaciones-electricas-montevideo` | instalación eléctrica Montevideo | 1.254 | 33 % (comercios) | Plantilla repetida | Media |
| `/tableros-electricos-montevideo` | tablero eléctrico / cambio de tablero Montevideo | 1.218 | 35 % (mantenimiento) | Plantilla repetida + mismas fuentes RBT que mantenimiento | Media |
| `/iluminacion-montevideo` | instalación de iluminación LED Montevideo | 1.057 | 38 % (instalaciones) | Plantilla repetida | Media |
| `/mantenimiento-electrico-montevideo` | revisión eléctrica Montevideo | 962 | 44 % (tableros) | La más parecida a otra madre | Alta |
| `/electricista-comercios-montevideo` | electricista para comercios Montevideo | 1.004 | 41 % (instalaciones) | Plantilla repetida | Media |
| `/cargador-vehiculo-electrico-montevideo` | cargador auto eléctrico Montevideo | 1.432 | 27 % (iluminación) | La mejor de las madres; es donde hubo los únicos clics | Baja |
| `/electricista-pocitos` | electricista Pocitos | 888 | 50 % (Carrasco) | Plantilla repetida; sin vecinos con página | Alta |
| `/electricista-carrasco` | electricista Carrasco | 839 | 52 % (Pocitos) | Ídem | Alta |
| `/electricista-centro` | electricista Centro Montevideo | 841 | 51 % (Pocitos) | Ídem + canibalización con la home | Alta |
| `/electricista-ciudad-de-la-costa` | electricista Ciudad de la Costa | 915 | 49 % (Costa de Oro) | Ídem | Alta |
| `/electricista-costa-de-oro` | electricista Costa de Oro / La Floresta | 914 | 49 % (Ciudad de la Costa) | Ídem. En GSC había demanda para "electricista la floresta" | Alta |
| `/articulos` | guías de electricidad | 82 | 45 % (artículo) | Title 73, description 159; casi sin texto propio | Media |
| `/articulos/cuanto-cuesta-cargar-auto-electrico-en-casa-uruguay` | cuánto cuesta cargar auto eléctrico en casa | 1.689 | 8 % | Description 152 | Baja |
| `/articulos/por-que-salta-el-disyuntor-diferencial` | por qué salta el disyuntor diferencial | 1.341 | 4 % | Description 153 | Baja |

`/trabajos` está en `noindex` (no hay trabajos publicados) y no está en el sitemap: correcto.

## 4. Plan de tandas

URLs: `/zonas/{barrio}` para cada barrio o localidad y `/{servicio}/{barrio}` para servicio × barrio (por ejemplo, `/tableros-electricos/prado`). Las 5 zonas actuales **conservan su URL** `/electricista-{zona}` (no se cambian ni se redirigen), y el sitio las usa como página de zona de ese lugar: `/zonas/pocitos` no se crea para no duplicar a `/electricista-pocitos`. Una página se publica solo si su archivo de contenido existe (`content/zonas/{barrio}.php`).

| Tanda | Qué | Páginas nuevas (aprox.) |
|---|---|---|
| 0 | Esta auditoría y `scripts/qa-seo.py` | 0 |
| 1 | Plantilla con bloques cortos en las internas (mismo diseño), modelo de datos de zonas, rutas `/zonas/{barrio}` y `/{servicio}/{barrio}`, sitemap con `lastmod` por página, 5 servicios pilar nuevos | 5 |
| 2 | Centro y alrededores (Ciudad Vieja, Barrio Sur, Cordón, Palermo, Parque Rodó, Aguada, Tres Cruces, etc.) | zona + reparaciones + tableros (+ recableado donde la edificación es antigua) |
| 3 | Costa este (Punta Carretas a Carrasco Norte) | ídem (+ cargadores donde hay casas con garaje) |
| 4 | Este y noreste (La Blanqueada a Punta de Rieles) | ídem |
| 5 | Norte y oeste (Prado, Reducto, Cerro, Colón, etc.) | ídem |
| 6 | Canelones (Las Piedras, La Paz, Pando, Barros Blancos, Progreso y alrededores) + servicio × zona de las 5 zonas actuales | ídem |
| 7 | Hubs: home, `/servicios`, `/zonas` y páginas de región, `/como-funciona`, `/contacto`, `/articulos` | 6–7 |
| 8 | GEO: `robots.txt`, `llms.txt` por región, QA final | 0 |

Servicios con página por barrio: **reparaciones eléctricas** y **tableros eléctricos** en todos los barrios; **recableado** solo en barrios con edificación antigua; **cargadores** solo donde hay casas con garaje o cocheras. Los otros servicios quedan en su página pilar: a nivel barrio no cambian lo suficiente para tener texto propio.

**Recomendación de publicación** [RANKING]: aunque el trabajo quede todo hecho en el repo, conviene **subir por tandas de región**, pedir indexación de la página de región y de 3 o 4 barrios, y esperar a ver la indexación antes de subir la siguiente. El sitio podó 1.036 URLs hace menos de una semana: publicar 300 de golpe es la señal que Google asocia a contenido escalado. El interruptor para eso es `$publicar_regiones` en `src/datos/zonas.php`.

## 5. Datos que solo podés dar vos

Sin estos datos, esos bloques no se publican (no se inventan):

1. Nombre de la persona que atiende, foto real y, si existe, categoría de técnico instalador de UTE o firma instaladora.
2. Base de salida (barrio) y tiempo real de llegada a cada región.
3. Horario real de atención y si atiende urgencias de noche o fines de semana.
4. Costo de la visita o diagnóstico y precios "desde" de 3 a 5 trabajos típicos, con fecha.
5. Garantía del trabajo (si la hay) y medios de pago.
6. Trabajos hechos por barrio (mes, tipo de trabajo, calle aproximada) y fotos de celular.
7. Reseñas reales (con nombre, fecha y barrio) una vez que exista la ficha de Google.
8. Enlaces reales de Google Business Profile, Instagram y Facebook (van en `config/variables.php` → `sameAs`).
9. Correo para el formulario de contacto, si querés un canal además de WhatsApp.
10. Si cubrís Maldonado (hoy el sitio dice Montevideo y Canelones; no agrego Maldonado sin confirmación).
11. Confirmación de los servicios nuevos: puesta a tierra, recableado, tomacorrientes, trámites de aumento de potencia en UTE y urgencias.

## 6. Acciones fuera del sitio (solo las podés hacer vos)

| Acción | Tipo | Por qué |
|---|---|---|
| Crear y verificar la ficha de **Google Business Profile** (categoría "Electricista", área de servicio sin dirección pública, mismos servicios que la web, horario real, fotos reales) | RANKING / TRÁMITE | Es lo que más mueve en búsquedas de urgencia: sin ficha no aparecés en el mapa |
| Pedir reseñas que mencionen servicio y barrio ("me cambiaron el tablero en el Prado") | RANKING / GEO | Las IA extraen frases de las reseñas |
| **Search Console**: reenviar `sitemap.xml` después de cada tanda y pedir indexación de la página de región y de 3–4 barrios | TRÁMITE | Acelera el primer rastreo |
| **Bing Webmaster Tools** (importar desde GSC) y correr `scripts/indexnow.php` después de subir | TRÁMITE / GEO | Bing alimenta a ChatGPT y a Copilot |
| Bing Places y Apple Business Connect | TRÁMITE | Mapas de Bing y de Apple |
| Citaciones con el mismo nombre y teléfono: Páginas Amarillas UY, Cylex, Infobel, Mercado Libre Servicios, Facebook, Instagram, arreglatodo.uy | RANKING | Consistencia de NAP y menciones de marca |
| Revisar que Cloudflare (si está delante del dominio) no bloquee a los bots de IA | GEO | Desde el 15/09/2026 los bloquea por defecto |

---

## 7. Estado al cierre (29/09/2026)

| Tipo de página | Antes | Ahora | Qué cambió |
|---|---|---|---|
| Generales (home, servicios, nosotros, contacto, cómo funciona) | 4 | 5 | Texto propio con H2 en pregunta, fecha visible, FAQ propia; `/como-funciona` nueva; H1 de `/servicios` con keyword; title de `/nosotros` corregido |
| Servicios pilar | 7 | 12 | + urgencias, puesta a tierra, recableado, tomacorrientes, aumento de potencia UTE (a confirmar) |
| Zonas (`/zonas`, regiones y barrios) | 6 | 79 | 67 barrios/localidades nuevos con texto propio, 6 páginas de región, `/zonas` reescrita; las 5 históricas sin cambio de URL |
| Servicio × barrio | 0 | 175 | 72 reparaciones + 72 tableros + 24 recableado + 7 cargadores |
| Artículos | 3 | 3 | Title/description del índice y de los 2 artículos dentro de rango |
| **Total sitemap** | **20** | **274** | |

QA (`scripts/qa-seo.py`): 274 URLs, 0 errores, 0 titles o descriptions repetidos, 0 alertas; similitud máxima 18 %, mediana 6 %. `scripts/verificar_sitio.php`: 1123 comprobaciones OK. `scripts/verificar_articulos.php`: 91 OK. `php -l` sin errores.

### Datos faltantes (no están en el texto visible)
Operador (nombre, foto, categoría de técnico instalador o firma instaladora UTE) · base de salida y tiempos de llegada · horario real y si atiende urgencias de noche o fines de semana · costo de la visita y precios "desde" con fecha · garantía y medios de pago · trabajos reales por barrio con fotos · reseñas reales · enlaces de GBP, Instagram y Facebook (`sameAs`) · correo para el formulario · cobertura en Maldonado · confirmación de los 5 servicios nuevos.

### Vigilancia de indexación
- A los 7 días de subir cada región: GSC → Páginas, filtrar por el sitemap `sitemap-zonas.xml` y `sitemap-servicios-barrio.xml`.
- A los 30 días: ≥ 50 % de las páginas de la región indexadas. Si no, no subir la siguiente región y reforzar enlaces desde la home y las madres.
- A los 60 días: si más del 30 % sigue en "Descubierta/Rastreada: actualmente sin indexar", despublicar primero los servicio × barrio de esa región (sacar el bloque `servicios` o poner la región en `false`) y dejar solo las zonas.
