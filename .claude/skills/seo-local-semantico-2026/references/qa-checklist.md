# QA de publicación — checklist por página

Marcar todo antes de publicar. Etiquetas: [RANKING] · [CONVERSIÓN] · [TRÁMITE] · [GEO]. Bloqueantes marcados con ⛔.

## A. Existencia de la página (solo servicio × zona)
- [ ] ⛔ La zona tiene demanda propia (autocompletar/GSC/Ads) **o** es localidad con SERP propia. Si no, va como sección en la madre.
- [ ] ⛔ Fila de datos completa: tiempo de llegada, 2 referencias, tipo de vivienda, 1 problema típico, 2 trabajos, 1 reseña o foto real, precio desde, 1 FAQ local.
- [ ] ⛔ Test del nombre: borrando el topónimo, la página sigue identificable como de esa zona.
- [ ] No existe otra URL apuntando a la misma intención (troncal, madre, subservicio × zona). Si GSC muestra dos URLs alternando, fusionar.
- [ ] La tanda actual es de ≤ 10 páginas y la anterior tiene > 70 % indexada.

## B. Head y encabezados [RANKING]
- [ ] ⛔ Title 45–58 caracteres, keyword + zona en los primeros 30, gancho propio (no boilerplate), marca al final o sin marca, sin pipe, sin emoji, sin teléfono.
- [ ] ⛔ Un solo H1, ≤ 70 caracteres, misma keyword + zona que el title + promesa.
- [ ] Meta description 120–150, propuesta concreta en los primeros 120, "por WhatsApp", precio "desde" si es real, sin teléfono.
- [ ] URL corta, sin stopwords, ≤ 3 niveles, coherente con la estructura del sitio; canonical autorreferente absoluto.
- [ ] H2 en orden del cliente (servicios → prueba → llegada → precios → cobertura → FAQ → cercanas); H3 solo 1–2 con zona; sin saltos H2 → H4.
- [ ] Title y hero prometen lo mismo.

## C. Contenido [RANKING][GEO]
- [ ] ⛔ Primer párrafo 40–70 palabras: qué, dónde, tiempo, desde dónde, precio desde, CTA, marca nombrada, un dato solo de esa zona.
- [ ] ⛔ Bloques locales presentes: trabajos recientes (tabla), reseña(s) de la zona, cómo llegamos/tiempo, referencias y tipo de vivienda, precios con fecha, FAQ local (3–5).
- [ ] Servicio + zona aparece 3–5 veces natural (o la media del top 5), sin lista de barrios ni párrafos "cerrajero en X, cerrajero en Y".
- [ ] Vocabulario del oficio: ≥ 5 entidades del corpus (marcas, tipos, métodos, normas) con valores concretos.
- [ ] Jerga rioplatense en cuerpo/FAQ (24 hs, urgente, a domicilio, "me quedé afuera", fletes, durlock, tinglado según país).
- [ ] Lectura simple: frases cortas, párrafos de 2–4 oraciones, tablas para precios.
- [ ] Nada que un negocio real no diría; sin promesas imposibles; lenguaje honesto sobre presencia ("desde nuestra base en…").
- [ ] Sin texto reciclado de otra zona con el topónimo cambiado; sin sinónimos como método de unicidad.
- [ ] Fecha de actualización visible.

## D. E-E-A-T [RANKING][CONVERSIÓN]
- [ ] Bloque "Quién te atiende" o enlace a Sobre nosotros con operador real.
- [ ] ⛔ Fotos reales donde se afirma trabajo/equipo/vehículo; imágenes IA solo ilustrativas con alt honesto e IPTC.
- [ ] Reseñas con nombre, fecha, barrio y enlace a la ficha; conteo visible; **sin** `aggregateRating`/`review` propio.
- [ ] Matrícula/registro y garantía visibles cuando existen.

## E. Conversión [CONVERSIÓN]
- [ ] ⛔ Botón WhatsApp en el hero (texto prellenado con servicio y zona) + botón llamar; sticky en móvil.
- [ ] Línea de prueba en el hero (★, N reseñas, matriculado / años).
- [ ] Barra de confianza bajo el hero; CTA final.
- [ ] Número de WhatsApp como texto en el HTML (no solo en JS).
- [ ] Evento `click_wsp` con `servicio` y `zona` como parámetros; key event en GA4.

## F. Enlazado y schema [RANKING][TRÁMITE]
- [ ] ⛔ Enlaces salientes en el cuerpo: 1 troncal, 1 madre/departamento, 3–5 vecinos reales, 1–2 soporte; anchors variados.
- [ ] ⛔ Enlaces entrantes desde ≥ 3 páginas (madre, departamento, vecina) publicados el mismo día; página incluida en `/zonas/` y en el sitemap segmentado con `lastmod` real.
- [ ] Breadcrumb visible = `BreadcrumbList`.
- [ ] JSON-LD `Service` con `provider @id`, `areaServed` City, `dateModified`; validado (sin errores en Rich Results Test / validator.schema.org); todo lo marcado es visible.
- [ ] Sin mega-footer de barrios; header ≤ 10 enlaces.

## G. Técnico [TRÁMITE]
- [ ] Hero `<img>` sin lazy, `fetchpriority="high"`, dimensiones; resto `loading="lazy"`; WebP/AVIF con fallback; alt 8–15 palabras descriptivo.
- [ ] Un solo script de analítica; mapa por clic; sin JS de terceros pesado (INP ≤ 200 ms, LCP ≤ 2,5 s, CLS ≤ 0,1 en CrUX).
- [ ] Móvil primero: contenido íntegro en móvil (indexación es smartphone).
- [ ] robots.txt permite Googlebot, Bingbot y bots de búsqueda de IA; Cloudflare no antepone bloqueos.
- [ ] IndexNow disparado al publicar; "Solicitar indexación" solo para páginas clave.

## H. Post-publicación (calendario)
- [ ] Día 1: URL Inspection de 2–3 páginas de la tanda; IndexNow.
- [ ] Día 30: estado de indexación de la tanda en GSC (por sitemap segmentado). > 30 % no indexadas → frenar y mejorar.
- [ ] Día 60–90: impresiones y queries por página; CTR; `click_wsp` por página; GSC "Generative AI performance".
- [ ] Trimestral: fusionar zonas sin impresiones (301 a la madre); actualizar precios y fecha; pedir fotos y casos nuevos al operador.
