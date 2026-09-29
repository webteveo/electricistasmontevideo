---
name: seo-local-semantico-2026
description: "Manual de arquitectura semántica, producción de contenido y GEO (citas en AI Overviews, AI Mode, ChatGPT, Perplexity, Gemini, Copilot) para sitios de servicios locales en Uruguay y Argentina, con evidencia 2025–2026 etiquetada. Usar SIEMPRE que el usuario hable de crear o mejorar un sitio de servicios locales o rank and rent, páginas por zona/barrio/localidad/ciudad (location pages), contenido de páginas de servicio, title/H1/meta/URL, topical map, autoridad temática, SEO semántico, entidades y schema JSON-LD, E-E-A-T, doorway pages o contenido escalado, indexación de muchas páginas, GEO o aparecer en respuestas de IA, o pida redactar o auditar una página de servicio + ciudad, aunque no diga 'SEO'. Complementa a cheloseo (priorización, GBP, enlaces, rank and rent); cheloseo decide qué hacer primero; esta dice cómo estructurar, escribir y escalar cada página sin caer en spam."
---

# SEO local semántico 2026 — arquitectura, contenido y GEO para servicios locales

Manual de trabajo para sitios de oficios y servicios (cerrajería, mudanzas, electricistas, yeso, aire acondicionado, impermeabilización, pérgolas, casas modulares, auxilio mecánico, limpieza, baños químicos, steel framing, galpones) en Montevideo, Canelones, Maldonado y CABA. Stack del usuario: plantilla PHP + CSS + JS propia, un sitio nuevo se clona de uno que funciona, WhatsApp como CTA medido con `click_wsp` en GA4, schema LocalBusiness, ficha de Google Business Profile cuando corresponde.

**División de trabajo con `cheloseo`**: cheloseo prioriza (qué mueve la aguja, fase del proyecto, ficha GBP, citaciones, enlaces, evaluación de nichos, rank and rent). Esta skill produce: entidad central, topical map, arquitectura de URLs, brief y redacción de páginas, fórmulas de title/H1/meta, schema, escala segura de páginas por zona, E-E-A-T y GEO. Si el usuario pregunta "qué hago primero", usar cheloseo; si pide "armá / escribí / auditá esta página o este sitio", usar esta.

**Etiquetas obligatorias** en cada recomendación: **[RANKING]** mueve posiciones · **[CONVERSIÓN]** mueve leads · **[TRÁMITE]** se hace una vez · **[GEO]** visibilidad en respuestas de IA. Cuando una práctica es riesgosa, decir el riesgo concreto (acción manual, desindexación, suspensión de ficha, pérdida de confianza).

## Principios (parten del método CheloSEO y lo actualizan a 2026)

1. **SEO = contenido + enlaces (~80 %)**. Schema, velocidad, alt, llms.txt son periféricos. No dejar que lo periférico tape lo central.
2. **Una URL por intención, un servicio por página**. Confirmado. Matiz 2026: las *variantes* de un mismo servicio se fusionan; la matriz completa servicio × zona solo para el servicio principal del dominio.
3. **Keyword en URL, title y H1**, un solo H1 alineado con el title, y el primer párrafo como snippet de reserva (Google reescribe 61–76 % de titles y 63–71 % de descriptions).
4. **Cobertura de contextos, no de URLs**. Google (Toronto abr-2026) llama "commodity content" a lo que cualquiera puede replicar; "volumen ≠ visibilidad". Una zona tiene URL propia solo con demanda real y datos reales; si no, es una sección de la página madre.
5. **El 20 % local son datos, no prosa**: trabajos hechos ahí, reseñas de la zona, tiempo de llegada desde la base, precios con fecha, calles y tipo de vivienda, FAQ local. Hasta 80 % de estructura compartida funciona (Sterling Sky, 35 páginas al 84 %); miles de páginas con texto distinto pero sin datos terminaron en acción manual.
6. **Todo relativo al top 5 de la SERP** y a la operación real: no prometer tiempos, zonas ni servicios que el operador no cumple (NavBoost mide el clic largo; el rater mide "información exagerada").
7. **Naturalidad y honestidad**: nada que un negocio real no haría. Sin autores inventados, fotos IA como equipo, reseñas fabricadas, direcciones ficticias, listas de barrios en el footer ni redes de dominios clonados.
8. **Entidad clara**: un nombre, un teléfono, una base, un `@id`, la misma lista de servicios en web y ficha, menciones en terceros. Las menciones de marca predicen citas en IA más que los backlinks.
9. **GEO es una capa sobre rankear**, no un reemplazo. En transaccionales simples manda el pack + orgánico (AIO 15 %); en informacionales e híbridas la IA responde (92–97 %) y cita pasajes answer-first con datos y fecha.
10. **Producto mínimo viable y medición propia**: tandas de 5–10 páginas, indexación antes de la siguiente tanda, `click_wsp` por página, informe de IA en Search Console. Distinguir siempre ranking / conversión / trámite / GEO.

## Reglas duras

**Escala y anti-doorway** (detalle en `references/location-pages.md`)
- [RANKING] URL de zona solo si (a) hay demanda propia (autocompletar, GSC, Ads) o es localidad con SERP propia y (b) la fila de datos está completa (`assets/brief-zona.md`). Si no, sección con ancla en la madre.
- [RANKING] Test del nombre: si al borrar el topónimo no se sabe de qué zona es, no se publica.
- [RANKING] Tope: 30–50 páginas de zona por servicio y sitio en fase 1; > 100 solo con indexación > 85 % y ≥ 60 % con impresiones a 90 días. Nunca 500–2.000 en un dominio de un negocio. **Riesgo**: acción manual por doorway/thin, demote en spam updates (ago-2026 pegó a contenido programático), y desde abr-2026 los reportes de spam de competidores pueden generar acción manual.
- [RANKING] Tandas de 5–10 páginas; > 30 % en "Crawled/Discovered – not indexed" a 60 días = frenar, mejorar o fusionar. Sinónimos, reescritura o IA sin datos no hacen único.
- [RANKING] Jerarquía de 3 niveles (servicio madre → departamento/ciudad → barrio/localidad); title/H1 de barrio siempre con zona; la búsqueda implícita ("cerrajero") es de la madre.
- [RANKING] Entre dominios: cada EMD con operador, NAP, base de datos de zonas y textos propios. Varios EMDs por ciudad al mismo WhatsApp con contenido clonado = ejemplo literal de doorway abuse en la política.
- [TRÁMITE] URL: `/zona/` en EMD mono-servicio; `/servicio/zona/` en multi-servicio; nunca `/zona/servicio/` ni slugs planos a escala; no tocar URLs que rankean.

**On-page** (detalle en `references/on-page-formulas.md`)
- [RANKING] Title 45–58 caracteres, keyword + zona en los primeros 30, gancho propio (no boilerplate), marca al final o sin marca, guion como separador, sin emoji, sin teléfono. H1 único ≤ 70 caracteres, mismo servicio + zona + promesa. Description 120–150 caracteres; la propuesta concreta y "por WhatsApp" dentro de los primeros 120; precio "desde" si es real; sin teléfono. "24 hs" en title/H1/description solo si el operador confirma que atiende de madrugada (un recargo nocturno no implica 24 hs).
- [RANKING][GEO] Primer párrafo 40–70 palabras: qué, dónde, tiempo desde la base, precio desde, CTA, marca nombrada, un dato exclusivo de la zona.
- [RANKING] Servicio + zona 3–5 veces en el texto visible del cuerpo (title, meta, alt y JSON-LD no cuentan); variantes y jerga en H2/H3/FAQ/cuerpo; "cerca de mí" y gentilicios no van en title/H1. Sin bloques o listas de barrios (keyword stuffing oficial).
- [CONVERSIÓN] Orden: hero (H1 + WhatsApp + llamar + prueba + foto real) → barra de confianza → servicios → trabajos y reseñas de la zona → cómo llegamos/proceso → precios con fecha → cobertura → FAQ → CTA final + WhatsApp sticky → zonas cercanas. Lectura simple.

**Entidad, schema y E-E-A-T** (`references/entidades-y-schema.md`, `references/eeat-servicios.md`)
- [TRÁMITE] Schema mínimo, correcto y visible: LocalBusiness con subtipo exacto (`Locksmith`, `MovingCompany`, `Electrician`, `HVACBusiness`, `RoofingContractor`, `GeneralContractor`, `AutoRepair`; no existen TowingService ni CleaningService; `ProfessionalService` está deprecado) + `@id` + `sameAs` en home; `Service` + `provider @id` + `areaServed` City + `BreadcrumbList` por zona. Nunca `aggregateRating`/`review` propio (inelegible + riesgo de acción manual). FAQPage opcional: sin rich result desde 7 may 2026.
- [RANKING][CONVERSIÓN] Bloque "Quién te atiende" con operador real (nombre, foto, matrícula, base, fecha); trabajos con foto real; reseñas con nombre, fecha y barrio; precios y garantía. En rank and rent: marca del sitio + operador actual nombrado; ficha GBP solo del operador real.
- [CONVERSIÓN] Imágenes IA solo como ilustración con alt honesto e IPTC `trainedAlgorithmicMedia`; nunca como trabajo hecho, equipo o local.
- [RANKING] Sitio de nicho de un solo servicio: mantenerlo (foco temático); no mezclar oficios en un dominio.

**Enlazado e indexación** (`references/location-pages.md` §5–6)
- [RANKING] Cada zona enlazada desde ≥ 3 páginas (madre, departamento, vecina) el mismo día; 3–5 vecinos geográficos reales (`references/zonas-rioplatenses.md`) con anchors variados; enlaces en el cuerpo; header ≤ 10; sin mega-footer; página `/zonas/` como índice; ≤ 3 clics desde la home; cero huérfanas.
- [TRÁMITE] Sitemaps segmentados con `lastmod` real; IndexNow para Bing; **no** usar la Indexing API para páginas de servicio (solo JobPosting/BroadcastEvent; Mueller 2025 avisó que persiguen el abuso).

**GEO** (`references/geo-ia.md`)
- [GEO] Pasajes autocontenidos de 100–300 palabras, H2/H3 en pregunta, tablas de precios en UYU/ARS con fecha, datos con fuente, entidad nombrada, fecha de actualización visible.
- [GEO] Todo lo importante en el HTML inicial (los crawlers de IA no ejecutan JS). robots.txt permite Googlebot, Bingbot, OAI-SearchBot, ChatGPT-User, PerplexityBot, Claude-SearchBot; revisar que Cloudflare no anteponga bloqueos.
- [TRÁMITE] Bing Webmaster Tools + IndexNow + Bing Places + Apple Business Connect. Canal GA4 "AI Assistants" cruzado con `click_wsp`; informe "Generative AI performance" en GSC.
- [GEO] Humo: llms.txt, "AI schema", estadísticas o citas inventadas, "top 10" con competidores falsos. Las spam policies aplican a respuestas de IA desde may-2026.

## Flujos de trabajo

### Flujo 1 — Nuevo nicho o sitio
Entrada: nicho, ciudad/departamentos, operador (real o a definir), dominio. Salida: documento de arquitectura.
1. **Análisis de SERP** [RANKING]: 8–12 queries de plantilla ("[oficio] [ciudad]", "[oficio] 24 horas", "[subservicio] [barrio top]", "cuánto cuesta [subservicio]") con `gl=uy`/`gl=ar`. Anotar del top 5: tipo de sitio (EMD, marca, directorio), si tienen páginas por zona, patrón de title/H1, longitud, bloques locales, ¿AIO?, ¿pack?, PAA. Si cheloseo ya evaluó el nicho, no repetir.
2. **Entidad central** (`references/topical-map.md` §2): Source Context en una frase, Central Entity (el oficio), Central Search Intent ("contratar X hoy en mi zona"), 12–20 atributos EAV con valores del operador, vocabulario del oficio (proceso gratis en `references/entidades-y-schema.md` §5).
3. **Topical map**: tabla nodo / atributos / tipo (core, outer, entidad, hub) / intención / URL. Dimensionar: servicio × zona para zonas con demanda y datos (40–80), subservicio × zona solo top (15–25), subservicios (6–10), soporte (20–40), entidad y hub (3). Total realista 100–160.
4. **Lista servicios × zonas**: desde `references/zonas-rioplatenses.md` + autocompletar + GSC/Ads del operador; marcar cada zona como URL (madre / barrio) o sección. Zonas madre por departamento con secciones para localidades sin demanda propia.
5. **Arquitectura de URLs**: elegir `/zona/` (EMD mono-servicio) o `/servicio/zona/` (multi). Jerarquía de 3 niveles. Breadcrumbs.
6. **Plan de enlazado**: hub → departamento → barrio; tabla de vecinos por zona; servicio ↔ servicio solo afín; `/zonas/`; sitemaps segmentados; tandas de publicación con fechas y umbral de indexación.
7. Entregar: arquitectura en tabla, mapa temático, plan de tandas, lista de datos a pedir al operador (`assets/brief-zona.md`), riesgos etiquetados.

### Flujo 2 — Brief y redacción de una página servicio + zona
Entrada: servicio, zona, fila de datos de la zona (si falta, pedirla con `assets/brief-zona.md` y no inventar). Salida: **HTML listo para pegar en la plantilla PHP** + head + JSON-LD.
1. Verificar existencia (`references/qa-checklist.md` §A): demanda, datos, sin canibalización.
2. Brief: macro-contexto, ≥ 5 entidades del oficio, 3–6 H2 en el orden del cliente, FAQ desde PAA/WhatsApp, vecinos a enlazar, gancho del title.
3. Redactar con `references/on-page-formulas.md` §3c y la estructura de `assets/plantilla-servicio-zona.html`: title, description, H1, primer párrafo answer-first, bloques locales obligatorios (`references/location-pages.md` §4), FAQ, CTA con `wa.me` prellenado, zonas cercanas, fecha de actualización.
4. Head: `<title>`, meta description, canonical, JSON-LD B (y C opcional) de `references/entidades-y-schema.md` con las variables resueltas.
5. Pasar `references/qa-checklist.md` completo. Entregar en este orden: (1) resumen en 5 líneas con etiquetas, (2) bloque `<head>` completo (title, description, canonical, JSON-LD), (3) bloque HTML de `<main>`, (4) enlaces entrantes a agregar en madre/departamento/vecinas, (5) datos que faltan y supuestos a confirmar.
Reglas de redacción: español rioplatense (vos), frases cortas, sin relleno, sin "líder", sin "cerca de mí" en títulos, sin listas de barrios. Qué dato puede usarse sin confirmar: del índice de zonas solo `slug`, `zona_madre`, `vecinos` y el tipo de vivienda genérico; referencias, rutas, tiempos, precios, trabajos y reseñas salen únicamente del brief del operador, y si faltan quedan como `{variable}`. Las cifras, direcciones y nombres de los ejemplos de las references son ilustrativos y nunca pasan al HTML. Si el operador da precios sin fecha, fecharlos con el mes actual y marcarlo como supuesto. Bloques de prueba (rating, reseñas, matrícula, garantía) son opcionales: si no hay dato, se elimina el `<li>` o la línea, no se inventa.

### Flujo 3 — Escalar a cientos de páginas sin contenido escalado
Entrada: sitio con madre + primeras zonas; lista de zonas candidatas. Salida: plan de escala y esquema de datos.
1. Auditar lo existente: tasa de indexación por sitemap, impresiones por zona (90 días), "Google chose different canonical", canibalización. Fusionar antes de agregar.
2. Definir la base de datos de zonas (campos de `references/location-pages.md` §3) y el generador PHP que la lee: solo las filas completas producen URL; las incompletas producen secciones en la madre.
3. Qué pedir al operador por zona y cómo variarlo: trabajos reales (fecha, tipo, calle), reseñas con barrio, tiempo y ruta desde la base, precio y recargos, referencias y tipo de vivienda, problema típico, FAQ real, fotos de celular. Variación legítima = datos distintos; variación ilegítima = sinónimos, párrafos reordenados, IA sin insumo.
4. Plantilla 80/20: estructura y texto base compartidos (hasta 80 %), 20 % de datos por zona en primer párrafo, tabla de trabajos, reseñas, llegada, precios, cobertura y FAQ. Titles con gancho propio por zona.
5. Publicar en tandas de 5–10; IndexNow; enlazado el mismo día; revisar a 30 y 60 días; superar 100 solo con los umbrales de la regla dura.
6. Localidades chicas (balnearios, pueblos): agrupar por tramo o departamento ("Cerrajero en la Costa de Oro: Atlántida, Parque del Plata, La Floresta") hasta que una muestre demanda en GSC; entonces promoverla a URL.
7. Auditoría trimestral: fusionar con 301 lo que no tiene impresiones en 6 meses; actualizar precios y fechas; pedir fotos y casos nuevos.

### Flujo 4 — Auditoría semántica y E-E-A-T de una página existente
Entrada: URL (y si es posible su HTML, GSC de 90 días, top 5 de su query). Salida: tabla de hallazgos y top 3 de acciones.
1. Intención y canibalización: ¿qué query debería captar? ¿otra URL del sitio compite?
2. Head y encabezados: title, description, H1, jerarquía, boilerplate, promesa vs hero.
3. Semántica: entidades del oficio presentes vs top 5; atributos con valor; cobertura de sub-preguntas (fan-out); pasajes answer-first; densidad natural; listas de barrios.
4. Contenido local: test del nombre; bloques locales presentes/ausentes; datos verificables vs prosa.
5. E-E-A-T (`references/eeat-servicios.md` §5): quién atiende, fotos reales vs stock/IA, reseñas y su marcado, precios/garantía, promesas, NAP externo, información original (≥ 5 datos que el top no tiene), fecha.
6. Conversión: WhatsApp en hero y sticky, prueba social, proceso, lectura simple, `click_wsp`.
7. Enlazado y schema: entrantes, salientes, vecinos, breadcrumb, JSON-LD válido y visible, sin estrellas propias.
8. GEO: HTML inicial, tablas con fecha, entidad nombrada, robots/Cloudflare.
Salida obligatoria: tabla `Hallazgo | Tipo (RANKING/CONVERSIÓN/TRÁMITE/GEO) | Impacto | Esfuerzo | Acción` ordenada por impacto, y "3 cosas para esta semana". Cortar en el cuello de botella: no pulir schema si falla el contenido local.

### Flujo 5 — Checklist GEO para una página o un sitio
Entrada: URL o dominio. Salida: checklist marcada con lo que falta, etiquetada.
1. Sitio: correr `references/geo-ia.md` §2 (indexación, Bing/IndexNow, robots y Cloudflare, HTML inicial, schema mínimo, Sobre nosotros, GBP espejo, listados que la IA cita, página de precios, GA4 + GSC).
2. Página: correr `references/geo-ia.md` §3 (answer-first, H2 en pregunta, tablas con fecha, citas reales, entidad nombrada, FAQ, sin humo).
3. Medición: regex GA4 de `references/geo-ia.md` §4; informe de IA en GSC; protocolo mensual de 10 prompts × 3 motores × 3 corridas.
4. Priorizar por intención: en nichos de urgencia (cerrajería, auxilio, electricista) primero pack + orgánico; en decisión larga (contenedores, steel framing, pérgolas, galpones) las guías informacionales con precios por m² y fecha son el activo GEO.

## Qué leer y cuándo

| Necesidad | Archivo |
|---|---|
| Hallazgos con fuente, fecha y etiqueta; qué cambió 2024→2026; diagnóstico del método | `references/investigacion-2026.md` |
| Escala, bloques locales, anti-doorway, jerarquía, URLs, enlazado, indexación | `references/location-pages.md` |
| Fórmulas de title/meta/H1/H2/H3/URL/alt/párrafo/anchors con ejemplos, orden de secciones | `references/on-page-formulas.md` |
| Entidad, tabla nicho → @type, JSON-LD para PHP, proceso de vocabulario | `references/entidades-y-schema.md` |
| Método de topical map y ejemplo completo de cerrajería; plantilla para otros nichos | `references/topical-map.md` |
| Checklist GEO, crawlers, regex GA4, protocolo de medición | `references/geo-ia.md` |
| Bloques E-E-A-T, reglas duras, rank and rent, tabla de auditoría | `references/eeat-servicios.md` |
| Checklist de publicación por página | `references/qa-checklist.md` |
| Barrios y localidades con vecinos y referencias (MVD, Canelones, Maldonado, CABA) | `references/zonas-rioplatenses.md` |
| Plantilla HTML de página zona; brief de datos por zona; robots.txt | `assets/` |

## Formato de respuesta

- Empezar por la acción o el veredicto, no por teoría. Etiquetar cada recomendación. Nombrar el riesgo concreto cuando lo hay.
- Usar ejemplos rioplatenses reales (Pocitos, Carrasco, Ciudad de la Costa, Las Piedras, Punta Ballena, Piriápolis, Palermo, Caballito, Villa Urquiza) y vocabulario local (24 hs, urgente, a domicilio, fletes, durlock, tinglado).
- Cuando falten datos del operador, listarlos y no inventarlos; el HTML se entrega con `{variables}` marcadas para lo que falta.
- Si el usuario pide "más páginas" sin datos, decirlo claro: la regla es cobertura de contextos con datos reales, y el riesgo es doorway/scaled content con las consecuencias descritas.
- No prometer ranking por schema, "SEO de entidades" o GEO; son capas sobre contenido + enlaces.
