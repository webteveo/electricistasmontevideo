# Investigación SEO + GEO 2026 — hallazgos con fuente y fecha

Fecha de corte: 24 de septiembre de 2026. Versión condensada para la skill; el informe completo por bloques A–H está en `informe/` del repo (`INFORME-INVESTIGACION-2026.md` + `bloques/`).

**Cómo leer las etiquetas**
- `[OFICIAL]` Google (Search Central, QRG, Sullivan/Mueller/Illyes), OpenAI, Anthropic, Perplexity, schema.org.
- `[FILTRACIÓN/PATENTE]` leak Content Warehouse (may-2024), juicio DOJ, patentes. Son atributos que Google guarda, no pesos confirmados.
- `[TEST]` estudio o experimento con datos. `[OPINIÓN]` consenso sin datos. `[posiblemente desactualizado]` solo respaldo pre-2025.
- **Limitación de método**: el entorno de investigación bloqueó la apertura directa de casi todos los dominios (solo GitHub y pocos más), así que las citas literales de docs de Google salen de espejos textuales (scrape jun-2026) y de resúmenes de búsqueda. Antes de citar texto entre comillas a un cliente, abrir la URL original.

---

## A. Estado de Google Search 2025–2026

| Update | Fechas | Qué se sabe | Fuente |
|---|---|---|---|
| Core mar-2025 | 13–27 mar | Regular; Google avisó que "no todos los sitios se van a recuperar" | `[OFICIAL vía SEL]` searchengineland.com/google-not-all-sites-will-fully-recover-…-453507 |
| Core jun-2025 | 30 jun – 17 jul | Primeras recuperaciones visibles de sitios golpeados por HCU (parciales, ~1/3 del tráfico) | `[TEST]` gsqi.com/marketing-blog/june-2025-google-core-update/ ; seroundtable.com/google-june-2025-core-update-recoveries-39735.html |
| Spam ago-2025 | 26 ago – 22 sep | Amplio; Sterling Sky documentó un negocio local golpeado a nivel de patrón de páginas, pack intacto | `[TEST]` sterlingsky.ca/august-2025-spam-algorithm-update/ |
| Core dic-2025 | 11–29 dic | El más disruptivo de 2025; ganan especialistas, pierden generalistas | `[TEST]` sistrix.com, amsive.com (dic-2025) |
| Discover core feb-2026 | 5–27 feb | Solo Discover; premia contenido local del país y original | `[OFICIAL]` developers.google.com/search/blog/2026/02/discover-core-update |
| Spam mar-2026 | 24 mar (19 h) | El más corto de la historia | `[OFICIAL]` status.search.google.com |
| Core mar-2026 | 27 mar – 8 abr | El más volátil registrado; ganan fuentes de primera mano, pierden agregadores/directorios (Yelp −33 Sistrix) | `[TEST]` seranking.com, sistrix.com (abr-2026) |
| Core may-2026 | 21 may – 2 jun | "Disintermediation update": marcas directas suben, intermediarios bajan; **baja volatilidad en local services** | `[TEST]` seoclarity, digitalapplied (may-2026) |
| Spam jun-2026 | 24–26 jun | Global; sin objetivos declarados | `[OFICIAL]` status.search.google.com |
| Spam ago-2026 | 18–21 ago | Inusualmente duro (+82 % de caídas top-10 → >100); casos de Gabe: scaled content IA y **contenido programático** | `[TEST]` searchengineland.com/…-485980 ; gsqi.com/marketing-blog/august-2026-google-spam-update-case-studies/ |

Otros hitos:
- **21 abr 2026, Search Central Live Toronto** `[OFICIAL]`: "commodity content" (lo que cualquiera puede replicar) vs contenido único/específico/auténtico; "volume ≠ visibility"; "Crawled – currently not indexed casi nunca es técnico: es señal de calidad". seroundtable.com/google-commodity-content-41200.html ; jcchouinard.com/google-search-central-live-toronto-slides-april-2026/
- **15 may 2026** `[OFICIAL]`: las spam policies pasan a decir explícitamente que aplican a "manipular respuestas de IA generativa en Google Search"; se publica la guía "AI optimization" (act. 10 jul 2026): no hace falta llms.txt, chunking, ni sobreinvertir en schema; "optimizar para IA sigue siendo SEO". developers.google.com/search/docs/fundamentals/ai-optimization-guide
- **Abr 2026** `[OFICIAL vía terceros]`: los reportes de spam pueden derivar en acción manual (antes solo alimentaban algoritmos). Un competidor puede denunciar una red de dominios.
- **7 may 2026** `[OFICIAL]`: FAQ rich results dejan de mostrarse para todos; informe y Rich Results Test los quitan en junio; API en agosto. searchengineland.com/google-to-no-longer-support-faq-rich-results-476957
- **3 jun → 31 ago 2026** `[OFICIAL]`: Search Console "Generative AI performance": impresiones en AI Overviews/AI Mode por URL, país y dispositivo; sin clics ni consultas; datos desde 18 may 2026. developers.google.com/search/blog/2026/06/gen-ai-performance-reports
- **HCU**: integrado al core desde mar-2024; no vuelve como sistema aparte; las recuperaciones llegan con cores posteriores y son parciales. `[OFICIAL + TEST]`

**Políticas de spam (texto vigente, verificar literal en developers.google.com/search/docs/essentials/spam-policies)** `[OFICIAL]`
- *Doorway abuse*: "sites or pages created to rank for specific, similar search queries. They lead users to intermediate pages that aren't as useful as the final destination." Ejemplos: "multiple websites with slight variations to the URL and home page"; "**multiple domain names or pages targeted at specific regions or cities that funnel users to one page**"; "substantially similar pages that are closer to search results than a clearly defined, browseable hierarchy".
- *Scaled content abuse*: "many pages generated for the primary purpose of manipulating search rankings and not helping users … unoriginal content that provides little to no value, **no matter how it's created**". Ejemplos: IA sin valor; scraping con sinonimización/traducción; "**creating multiple sites with the intent of hiding the scaled nature of the content**".
- *Keyword stuffing*: incluye literalmente "**blocks of text that list cities and regions** that a web page is trying to rank for".
- *Expired domain abuse*: comprar un dominio vencido para alojar contenido de poco valor. Usar un dominio vencido para un sitio nuevo y útil está permitido.
- *Site reputation abuse*: no aplica a Benja salvo que aloje páginas de terceros; 28 ago 2026 Google exceptuó al EEE (UY/AR reciben enforcement completo).

**Contenido IA** `[OFICIAL]`: guía "Using generative AI content" (developers.google.com/search/docs/fundamentals/using-gen-ai-content): la calidad manda, no el origen; usar IA para generar muchas páginas sin valor viola scaled content abuse. **QRG 23 ene 2025**: define IA generativa; Lowest si "all or almost all of the MC is copied, paraphrased … auto-generated, or AI-generated with little to no effort, little to no originality, and little to no added value"; sección 4.6.5 scaled content abuse; "the use of Generative AI tools alone does not determine" la calificación. **QRG 11 sep 2025** (182 págs.): cambios menores (YMYL cívica, ejemplos de AIO). No hay QRG 2026 verificada; los posts sobre una "QRG junio 2026" parecen inventados.

**Declaraciones de Googlers sobre páginas por ciudad** `[OFICIAL] [posiblemente desactualizado]`: Mueller 2017–2019: "you can't swap out the city name or a few pictures and call it good"; 1.300 páginas ciudad+servicio "sounds like doorway pages". No hay declaración nueva 2025–2026; la doctrina vigente es esa + política escrita + Toronto 2026.

**Casos** `[TEST]`: Sterling Sky, 35 service area pages con 84 % de contenido compartido que rankean y venden (sterlingsky.ca/service-area-pages-duplicate-content/); Sterling Sky, sitio con **>3.000 location pages recibió acción manual por thin content aunque cada página tenía redacción distinta** (sterlingsky.ca/thin-content-manual-penalty/); Sterling Sky, 200 páginas IA → crawled-not-indexed, ROI nulo (sterlingsky.ca/danger-of-ai-generated-service-area-pages/). Casos anónimos de agencias: HVAC −63 % tras cientos de páginas por suburbio; plomería 5.000 páginas → acción manual doorway `[OPINIÓN]`. Servpro/Roto-Rooter escalan miles de páginas templadas porque cada una es una franquicia real con GBP, dirección y reseñas propias `[OPINIÓN con datos]`.

---

## B. E-E-A-T, QRG, patente de Information Gain, leak y DOJ

- `[OFICIAL]` QRG 3.4: "Trust is the most important member of the E-E-A-T family"; 2.5.3 el rater busca quién es responsable del sitio (About/contacto); 3.3 reputación externa (para negocios chicos la falta de reputación no penaliza, la negativa sí); 4.5.1 Lowest por información inadecuada sobre el responsable; 4.5.3 Lowest por engaño sobre el sitio; 5.x Low por "información exagerada o levemente engañosa sobre el sitio o el creador" (agregado ene-2025). Cerrajería, electricidad y casas contenedores caen en "may be YMYL" (seguridad/dinero) `[OPINIÓN sobre base OFICIAL]`.
- `[OFICIAL]` "Creating helpful, reliable, people-first content": preguntas Who / How / Why; "Does your site have a primary purpose or focus?" (el sitio mono-servicio está alineado); "Is the content mass-produced … or spread across a large network of sites?" (la red de EMDs, no). developers.google.com/search/docs/fundamentals/creating-helpful-content
- `[OFICIAL]` Sullivan (2024, vigente): Google no verifica bylines ni credenciales; E-E-A-T no es un score; se usan proxies.
- `[FILTRACIÓN/PATENTE]` Patente "Contextual estimation of link information gain" US 11,354,342 B2 (7 jun 2022; continuaciones 2023/2024): mide información nueva respecto de documentos **que el usuario ya vio**, con ML. La lectura "respecto del top 10" es extrapolación de la industria; sirve como heurística editorial (≥5 datos que el top 10 no tiene). patents.google.com/patent/US11354342B2
- `[FILTRACIÓN/PATENTE]` Leak may-2024 (atributos, no pesos): `siteAuthority`; `siteFocusScore`/`siteRadius` (foco temático del sitio: favorece dominios de un solo servicio); NavBoost `goodClicks/badClicks/lastLongestClicks` con ventana de 13 meses; `chard/tofu/keto` y `contentEffort` (predictores de calidad por contenido); `hostAge` (sandbox para "fresh spam"); `titlematchScore` a nivel sitio; `OriginalContentScore` (pesa más en páginas cortas); `exactMatchDomainDemotion` (EMD de baja calidad se demota); `LocalWWWInfo/brickAndMortarStrength/localityScore` (Google busca entidad local real). ipullrank.com/google-algo-leak ; sparktoro.com (27 may 2024); hobo-web.co.uk
- `[OFICIAL – testimonio]` DOJ: Nayak confirmó NavBoost (13 meses de clics, "one of the important signals"); tres pilares Body / Anchors / User interactions; Q* calidad de sitio casi estática; RankEmbedBERT entrenado con logs + raters; Glue/Instant Glue para features (local pack). searchengineland.com/how-google-search-ranking-works-pandu-nayak-435395 ; searchengineland.com/google-abc-ranking-signals-455360

---

## C. SEO semántico y entidades

- `[OPINIÓN, Koray Gübür]` TA = Cobertura temática × Datos históricos ÷ Costo de recuperación; Source Context, Central Entity, Central Search Intent, Core/Outer section, macro/micro contexto, contextual vector/hierarchy/coverage, contextual bridges, EAV. **SEL jul-2026** (searchengineland.com/how-semantics-and-topical-authority-improve-local-seo-482980): "procesar todos los atributos de la entidad" y "todas las variaciones de la plantilla de query"; **fusionar páginas servicio+zona innecesarias → +232 queries nuevas y +60 mejoras**; "menos páginas, más útiles". Query templates: searchengineland.com/query-templates-topical-authority-484676
- `[OFICIAL]` Query fan-out en AI Mode (I/O may-2025): descompone la pregunta en sub-consultas simultáneas. blog.google/products-and-platforms/products/search/google-search-ai-mode-update/ · `[TEST]` promedio ~10,7 sub-queries por prompt (Seer 2026); Semrush: cubrir sub-queries pasó de 2 a 5 citas (test chico).
- `[TEST]` Citas de AIO vs top 10: Ahrefs 2026 38 % (era 76 % en jul-2025); Semrush 20–26 %; BrightEdge 54 %. **Menciones de marca en la web = predictor #1 de cita (r = 0,664); longitud r = 0,04**; 53 % de citas en páginas < 1.000 palabras. ahrefs.com/blog/ai-seo-statistics ; arXiv 2605.14021: AIO se activa en 64,7 % de queries-pregunta vs 9,5 %.
- `[OFICIAL]` LocalBusiness: requeridas `name` + `address`; recomendadas `geo`, `openingHoursSpecification`, `priceRange`, `telephone`, `url`; `sameAs` documentado en Organization para desambiguar. `Service`, `areaServed`, `knowsAbout`, `hasOfferCatalog`, `@id`: **no documentados para rich results** (solo semántica; Mueller: "ni beneficio ni daño"). developers.google.com/search/docs/appearance/structured-data/local-business
- `[OFICIAL]` Google Cloud NLP API v2 (2023) eliminó `salience`; v1 sigue. No construir procesos sobre salience. TextRazor gratis 500 req/día; spaCy `es_core_news_md`.
- `[OFICIAL]` Wikidata: notabilidad exige referencias serias; ítems de pymes sin prensa se borran en días. **No crear ítem** salvo ≥2 notas en medios con control editorial.

---

## D. Location pages 2026

- `[TEST]` SEL may-2024: para "abogado + ciudad" la SERP orgánica pasó de páginas genéricas a casi solo service area pages → Google prefiere resultados localizados. searchengineland.com/localized-serps-traffic-leads-service-area-pages-440129
- `[TEST]` Sterling Sky: bloques que subieron tráfico y ranking al agregarlos: **tabla de trabajos recientes en la zona, indicaciones/tiempo de llegada desde la base, fotos de la zona, reseñas de clientes de esa zona**. sterlingsky.ca/how-to-create-unique-and-helpful-service-area-pages-for-local-businesses/
- `[TEST]` Sterling Sky: 80 % boilerplate / 20 % local real funciona a escala de ~35 páginas en mercados no muy competitivos; "el riesgo es thin, no duplicado"; sinónimos y reescritura **no** cuentan como único (>3.000 páginas con texto distinto → manual).
- `[OPINIÓN]` Rangos recomendados: Whitespark 10–15 ciudades; Bipper 15–30 en tandas de 5–10/semana; Local Search Forum "sin límite, solo cuando hay algo que decir"; nadie avala 500–2.000 en un sitio de un negocio.
- `[OFICIAL – Illyes 2023–2025]` "Google no indexa, ni nunca indexó, todo lo publicado"; muchas "crawled – not indexed" insinúan problema de calidad del sitio; crawl budget no aplica a sitios < 10k URLs. searchenginejournal.com/indexing-and-crawl-budget/462742/
- `[OFICIAL]` Dedup: Google agrupa páginas con cuerpo central casi igual (tras quitar boilerplate) y elige una canónica ("Google chose different canonical than user"). El boilerplate compartido no molesta; el cuerpo idéntico con la ciudad cambiada sí.
- `[OFICIAL – Mueller]` Keywords en URL: "factor muy pequeño"; la profundidad que importa es la de clics, no la de barras. `[posiblemente desactualizado, nunca desmentido]`
- `[OPINIÓN de referente]` Sterling Sky: página por cada servicio **distinto**; fusionar **variantes** del mismo servicio; las páginas ciudad-servicio canibalizan la búsqueda implícita ("cerrajero" sin zona), que suele ser la de mayor intención.
- `[TEST]` Sterling Sky 2025 (8.186 negocios, 200 ciudades): el pack lo manda la proximidad al pin de la ficha; ocultar la dirección correlaciona negativamente; el área de servicio declarada no mueve ranking; **las páginas de zona no meten la ficha en el pack de un barrio lejano**, rankean en orgánico y sobre todo cuando la localidad tiene SERP propia.

---

## E. On-page

- `[OFICIAL]` Mueller: H1 múltiples "as many as you want"; pero la doc de title links pide un "main title" distintivo en el "first visible `<h1>`", y el blog 2021 dice que titles "half-empty" se completan con el H1 → **un H1 alineado con el title**. developers.google.com/search/docs/appearance/title-link
- `[TEST]` Reescritura de titles: Zyppy 61,6 % (81k títulos; 51–60 caracteres = menor tasa; pipe se reescribe más que guion; H1=title reduce reescritura); McAlpin/SEL Q1-2025 **76 %**, marca eliminada en 63 % de las reescrituras. Descriptions reescritas 63–71 % (Portent; Seer abr-2025). zyppy.com/seo/google-title-rewrite-study/ ; searchengineland.com/…-454847
- `[OFICIAL]` Title-link doc: evitar keyword stuffing y "boilerplate titles" ("long text that varies by only a single piece of information") → alerta directa para titles servicio+zona en serie.
- `[OFICIAL]` Illyes 2020 y Mueller abr-2025: no hay penalización por sobre-optimizar anchors internos; "no se preocupen". Lo prohibido es el bloque/lista de ciudades.
- `[TEST]` Conversión: NN/g 57 % de la atención above the fold (2018); Chartbeat 29 % no scrollea; teléfono visible +54 % leads (KoMarketing 2024, secundario); Unbounce 2024: lectura simple 11,1 % vs 5,3 %; Trustpilot: mostrar conteo de reseñas +28–33 %; quitar testimonios −35 % (caso viejo). **No existe estudio publicado "WhatsApp vs formulario" en servicios locales**: dato a generar con `click_wsp`.
- `[OFICIAL]` Review snippet: "If the entity that's being reviewed controls the reviews about itself, their pages that use LocalBusiness … are ineligible for star review feature" (doc act. 10 dic 2025). Sin estrellas propias.
- `[TEST]` SearchPilot: emoji en title → Google reescribió y borró emoji + keyword. Sin emojis en title.

---

## F. GEO / búsqueda con IA

- `[PAPER]` Aggarwal et al. (KDD 2024): citar fuentes, citas textuales y estadísticas suben visibilidad "hasta 40 %"; keyword stuffing baja ~10 %; tono autoritativo sin efecto. Los prompts del repo admiten citas/estadísticas inventadas. github.com/GEO-Optim/GEO
- `[PAPER]` C-SEO Bench (NeurIPS D&B 2025, arXiv 2506.11097): "most current C-SEO methods are largely ineffective"; rankear dentro del contexto del LLM es mucho más efectivo. → Técnicas GEO solo con datos reales, como capa sobre rankear.
- `[TEST]` Overlap de citas con top 10 Google: AIO ~38 %; Perplexity ~28,6 %; ChatGPT 6–8 % (28,3 % de las páginas más citadas por ChatGPT sin visibilidad orgánica). AIO y AI Mode citan la misma URL solo 13,7 % (Peec, mar-2026).
- `[TEST]` CTR con AIO: Pew jul-2025 8 % vs 15 %; Ahrefs dic-2025 −58 % en posición 1; Seer sep-2025 −61 % orgánico pero **+35 % si estás citado**.
- `[TEST]` Whitespark 2026 (540 consultas, 3 ciudades, 6 verticales): AIO en 68 % de consultas locales en promedio vs pack 39 %; **transaccionales simples: AIO 15 %, pack > 90 %; informacionales: AIO 92 %; híbridas 97 %**. AI Mode no muestra el pack clásico; toma tarjetas de GBP/Maps, reseñas y web; nombra 1–3 negocios ("32 % de negocios únicos vs pack"). whitespark.ca/blog/case-study-the-prevalence-of-ai-overviews-in-local-search/ ; searchenginejournal.com/…/580757/
- `[OFICIAL]` AIO en 200+ países y 40+ idiomas (may-2025). AI Mode en español desde 7 oct 2025 (Argentina nombrada; Uruguay dentro de "200+ territorios": **verificar la pestaña "Modo IA" desde UY**). blog.google/products-and-platforms/products/search/ai-mode-expands-languages-locations/
- `[OFICIAL]` Crawlers: Googlebot alimenta AIO/AI Mode (Google-Extended **no** afecta Search ni AIO); OAI-SearchBot = citas en ChatGPT search (bloquearlo = no aparecer); ChatGPT-User y Perplexity-User pueden ignorar robots.txt; Claude-SearchBot/Claude-User; Bingbot = Copilot y (probablemente) ChatGPT. `[TEST]` Vercel/MERJ: ningún crawler de IA ejecuta JS salvo Gemini vía Googlebot → precio, WhatsApp, zonas, FAQ en el HTML inicial.
- `[OFICIAL]` llms.txt: Mueller jun-2025 "ninguno de los servicios de IA dijo que lo use"; Illyes jul-2025 Google no lo soporta; `[TEST]` Ahrefs: 97 % de 137k archivos sin una sola petición. Prioridad cero.
- `[OFICIAL]` GA4 canal nativo "AI Assistant" desde 13 may 2026 (sin Perplexity) → mantener canal personalizado con regex (ver `geo-ia.md`). Clics desde AIO/AI Mode llegan como google/organic.
- `[TEST]` Reddit traducido automáticamente = 52–73 % de las citas de Reddit en AIO en mercados no ingleses (mar–jun 2026): hay poco contenido local en español "citable". Oportunidad para contenido rioplatense con precios en UYU/ARS y fecha.

---

## G. Local SEO 2026

- `[TEST-encuesta]` Whitespark LSRF 2026 (nov-2025, 47 expertos, 187 factores): **local pack = GBP 32 %, reseñas 20 %, on-page 19 %, enlaces 15 %, comportamiento 8 %, citaciones 7 %, personalización 3 %**; suben reseñas y comportamiento; categoría primaria = factor #1; "abierto al momento de buscar" top 5; nueva sección de visibilidad en IA (reseñas, ficha completa, contenido claro, menciones de terceros). En orgánico local on-page + enlaces siguen siendo la mayoría del peso. whitespark.ca/local-search-ranking-factors/
- `[TEST-encuesta]` BrightLocal LCRS 2026 (1.002 consumidores EE. UU.): 98 % lee reseñas; 41 % siempre; **68 % exige 4+** (era 55 %); 31 % exige 4,5+; Google baja 83 → 71 %; uso de IA para elegir negocios locales 6 → 45 % (pregunta redefinida). brightlocal.com/research/local-consumer-review-survey/
- `[OFICIAL]` GBP: chat y call history eliminados 31 jul 2024; verificación por video es el método por defecto (SAB: vehículo rotulado, herramientas, documentos RUT/BPS o AFIP-ARCA); SAB debe ocultar dirección, área ≤ ~2 h de viaje, hasta 20 zonas, una ficha por base física con personal; **lead-gen no elegible**; keyword stuffing en el nombre = suspensión. support.google.com/business/answer/3038177 ; …/14271705
- `[OFICIAL]` Google demandó (mar-2025) a una red que vendía fichas falsas (10.000+ eliminadas; cerrajeros y grúas); 240 M de reseñas eliminadas en 2024. Categorías "duress" (cerrajería, auxilio) tienen más verificación y suspensiones.
- `[TEST]` Sterling Sky: el área de servicio no es señal; el radio lo fija la dirección (oculta) verificada; servicios cargados no mueven el pack pero alimentan justificaciones y a la IA.
- Directorios UY/AR: ver tabla en el informe completo (`informe/bloques/G-local-2026.md`, secciones 6–7). En UY alcanza con ~8–10 citaciones (GBP, FB, IG, Apple, Bing, Cybo, Yelu, Cylex, Infoisinfo, Páginas Amarillas si vigente); en AR sumar Habitissimo, Páginas Amarillas AR y cámara sectorial. Verificar vigencia antes de cargar.

---

## H. Técnico y schema

- `[OFICIAL]` CWV: LCP ≤ 2,5 s, INP ≤ 200 ms, CLS ≤ 0,1 (CrUX p75 móvil). "No single signal"; Google "always seeks to show the most relevant content, even if the page experience is sub-par". Mobile-first cerrado desde 5 jul 2024.
- `[OFICIAL]` Sitemaps: 50.000 URLs / 50 MB; `lastmod` solo si es "consistently and verifiably accurate"; `priority`/`changefreq` ignorados. Indexing API: "can only be used … JobPosting or BroadcastEvent" (doc act. 16 jul 2026); Mueller 23 may 2025: "spammers misuse the Indexing API … stick to documented use-cases". IndexNow: Bing, Yandex, Naver, Seznam, Amazon; Google no.
- `[OFICIAL]` schema.org 30.1 (16 sep 2026): subtipos válidos `Locksmith`, `MovingCompany`, `Electrician`, `HVACBusiness`, `RoofingContractor`, `GeneralContractor`, `Plumber`, `HousePainter`, `AutoRepair`; **no existen** `TowingService`, `CleaningService`, `ContactAction`; `ProfessionalService` deprecado. `[TEST]` Ahrefs may-2026 (1.885 páginas): agregar JSON-LD no subió citas en IA (AIO −4,6 %). `[OFICIAL]` "There's also no special schema.org structured data that you need to add" para AIO/AI Mode.
- `[OFICIAL]` Imágenes IA: sin política de spam específica; Illyes: "doesn't impact the SEO. Not direct"; Google lee IPTC `DigitalSourceType=trainedAlgorithmicMedia` y C2PA ("About this image"). El riesgo es engaño (QRG) y duplicación.
- `[OFICIAL]` Enlaces: "Every page you care about should have a link from at least one other page"; sin número máximo ("if you think it's too much, then it probably is"). `[TEST]` Zyppy (23 M enlaces): 40–44 entrantes ≈ 4× clics; rendimiento decreciente > 50; variedad de anchors es el correlato más fuerte. `[FILTRACIÓN/PATENTE]` Reasonable surfer: los enlaces de footer valen menos.
- `[OFICIAL]` Cloudflare (defaults 15 sep 2026): bloquea bots "Training"/"Agent" por defecto en páginas con anuncios y antepone un robots.txt gestionado con `Disallow: /` para GPTBot, ClaudeBot, CCBot, Google-Extended… → revisar `curl https://dominio/robots.txt`.
- `[OFICIAL]` ccTLD (.uy, .com.ar) = "strong signal"; IP del servidor "not a definitive signal"; International Targeting de GSC retirada (2022); hreflang solo con versiones por país (`es-UY`/`es-AR`; `es-419` inválido).

---

## Qué cambió de 2024 a 2026 y obliga a hacer algo distinto

1. **Enforcement de scaled content y doorway se volvió frecuente y duro** (spam updates cada 2–3 meses, ago-2026 con casos de contenido programático) y **los reportes de spam pueden causar acción manual** (abr-2026). La red de EMDs por ciudad con el mismo WhatsApp es el patrón más expuesto.
2. **Google formalizó "commodity content"** (Toronto abr-2026) y sube la barrera de indexación: publicar más páginas iguales empeora; "crawled – not indexed" es veredicto de calidad.
3. **Los cores 2026 premian fuentes de primera mano** y castigan intermediarios. Un rank and rent que no es la marca visible del operador se parece a un intermediario.
4. **Las spam policies aplican a respuestas de IA** (may-2026) y Google publicó su guía de optimización para IA: no hay trucos, es SEO.
5. **FAQ rich results desaparecieron** (may-2026); HowTo antes. Quedan Breadcrumb, LocalBusiness, site name.
6. **AI Overviews y AI Mode en español** están activos en AR (y casi seguro UY); muerden en informacionales/híbridas (92–97 %) pero no en transaccionales simples (15 %). Search Console ya mide impresiones en IA por URL.
7. **Reseñas y comportamiento pesan más** (Whitespark 2026: reseñas 20 %); 68 % de los consumidores exige 4+.
8. **GBP endureció** verificación por video y persigue fichas de lead-gen; los rank and rent con ficha propia son inviables; la ficha es del operador.
9. **Menciones de marca** predicen citas en IA más que backlinks o longitud.

## Diagnóstico del método actual

**Confirmado**
- Una URL por intención, un servicio por página, keyword en URL/title/H1, referencias locales reales, "todo relativo al top 5", naturalidad, MVP primero. Todo sigue vigente y respaldado.
- Páginas por localidad **con SERP propia** (Punta Ballena, Balneario Solís, Las Piedras, Pando) rankean sin local físico: SEL 2024, Whitespark, y tu propio dato de cerrajeromaldonado.com.
- Sitio de nicho de un solo servicio: alineado con "primary purpose or focus" y con siteFocusScore/siteRadius.
- WhatsApp como CTA arriba y sticky: coherente con todos los datos de atención y contacto visible.
- URL `dominio/zona` en EMD mono-servicio: correcta; no reestructurar lo que rankea.

**En riesgo**
- **La escala**: "una exagerada cantidad de páginas" funciona hasta que el 20 % local se vuelve 0 %. El único caso documentado de miles de páginas terminó en acción manual aunque el texto fuera distinto. Regla nueva: URL de zona solo con datos reales y demanda; el resto vive como sección de la página madre.
- **Red de 12+ EMDs**: si comparten plantilla de texto, bloques de zona o teléfono, calzan con dos ejemplos literales de la política (doorway multi-dominio; multiple sites para ocultar escala). Cada dominio necesita operador, NAP y contenido propios.
- **Titles boilerplate** en serie y footers/listas de barrios: nombrados literalmente en la doc de title links y en keyword stuffing.
- **Imágenes IA** presentadas como trabajos hechos o equipo: E-E-A-T roto; usar solo como ilustración.
- **Fichas GBP para rank and rent**: solo del operador real, verificadas por video.

**Faltaba**
- Bloque de **datos por zona** (trabajos, reseñas, tiempo de llegada, precio, referencias, FAQ) como condición para crear la URL.
- **Topical map** con core/outer y páginas de soporte (precios, problemas, comparativas) para autoridad temática y para ser citado por IA.
- **Entidad**: página "Quién te atiende / Sobre nosotros" real, NAP idéntico, schema con `@id` y `sameAs`, menciones en terceros.
- **GEO**: pasajes answer-first con datos y fecha; Bing Webmaster + IndexNow; canal GA4 de asistentes; informe de IA en GSC; protocolo mensual de prompts.
- **Control de indexación por tandas** con sitemaps segmentados y umbral de "crawled – not indexed".
