# Plan SEO semántico local + GEO — electricistasmontevideo.com

Fecha del diagnóstico: 25/09/2026. Fuentes: Search Console (propiedad `sc-domain:electricistasmontevideo.com`), HTML del sitio publicado, código local y SERP de "electricista Montevideo".
Etiquetas: **[RANKING]** mueve posiciones · **[CONVERSIÓN]** mueve leads · **[TRÁMITE]** se hace una vez · **[GEO]** visibilidad en respuestas de IA.
Este archivo es interno (el .htaccess bloquea `.md`). No subirlo.

---

## Estado de ejecución (25/09/2026)

Teléfono confirmado por el usuario: **+598 97 406 456** (único en todo el sitio).

| Fase | Estado | Detalle |
|---|---|---|
| 0.1 Teléfono único | ✅ Hecho | Variable `$empresa_whatsapp_visible`; se eliminaron los textos fijos con el 094 |
| 0.2 Testimonios y cifras sin verificar | ✅ Hecho | Se borraron `testimonios.php`, el logo de Google, las estrellas, "500+ clientes", "5+ años" y la garantía. Los reemplaza una barra de confianza con datos reales |
| 0.3 Poda de la matriz | ✅ Hecho | De 1.036 a 17 páginas en el sitemap (20 con el índice de artículos y los 2 artículos). `zona_redireccion()` redirige con 301: servicio × zona → madre del servicio; barrio de un grupo → página del grupo; resto → `/zonas#barrio` |
| 0.4 Schema y footer | ✅ Hecho | `areaServed` limpio, `description`, `knowsAbout` y `sameAs` automático; footer con servicios en lugar de barrios |
| 1 Entidad | ⚠️ Parcial | Nosotros sin afirmaciones no verificadas. **Falta:** persona responsable, foto real, GBP y redes (completar `config/variables.php`) |
| 2 Home + 7 madres | ✅ Hecho | Titles nuevos, home con respuesta directa, 3–4 H2 en forma de pregunta por servicio, tablas, normativa UTE/URSEA citada y fecha visible |
| 3 Zonas | ✅ Tanda 0 | Pocitos, Carrasco, Centro, Ciudad de la Costa y Costa de Oro con texto propio. **Falta:** brief real de cada una (tiempos, trabajos, reseñas) |
| 4 GEO / artículos | ✅ 2 de 12 | Cargar auto eléctrico en casa y por qué salta el diferencial. Pendientes en `plan_articulos.md` |
| 4 IndexNow | ✅ Listo | Clave `9c35310688d8eb199783d15b6bfbc748.txt` en la raíz y `scripts/indexnow.php` (correr a mano después de subir) |
| 5 Imágenes | ⚠️ Parcial | Se quitó la foto de stock presentada como "equipo" y la reemplaza una foto de tablero (Pexels 257736). **Falta:** fotos reales (§7.1) |
| Verificación | ✅ | `verificar_sitio.php` OK (332 comprobaciones), `verificar_articulos.php` OK (91), capturas en desktop y móvil |

Después de subir: reenviar `sitemap.xml` en GSC, pedir la indexación de la home y las 7 madres, correr `scripts/indexnow.php` y revisar a los 7 días (umbrales en §9).

## 0. Veredicto en 5 líneas

1. El sitio **no rankea porque Google no lo está indexando**: 1.036 URLs enviadas, la home y unas pocas páginas indexadas, y la landing madre `/reparaciones-electricas-montevideo` sigue en "Descubierta: actualmente sin indexar".
2. La causa principal es la **matriz 128 zonas × 7 servicios = 896 páginas + 128 hubs**, con un 84 % de texto compartido y sin datos locales reales. Es el patrón de doorway o contenido escalado. Además del riesgo de una acción manual, gasta todo el presupuesto de rastreo de un dominio de dos semanas.
3. Hay **dos teléfonos** en el sitio (094 633 956 y 097 406 456). El texto del WhatsApp muestra un número y el enlace abre el otro. Rompe el NAP y la conversión.
4. Hay **20 testimonios sin verificar** que se muestran con el logo de Google, estrellas y "hace 6 días". Eso infringe tanto la regla del proyecto como las políticas de Google.
5. El plan: **podar a unas 20 URLs fuertes**, consolidar la entidad (un teléfono, la persona real que atiende, GBP), profundizar las 7 páginas madre, sumar contenido informacional con fuentes (UTE/URSEA) para GEO y recién después volver a abrir zonas en tandas de 5 a 10, siempre con datos reales.

---

## 1. Diagnóstico con datos

### 1.1 Search Console (09/09 → 22/09/2026)

| Métrica | Valor |
|---|---|
| Primer día con datos | 09/09/2026 (dominio o propiedad nueva) |
| Clics totales | 3 (2 en `/cargador-vehiculo-electrico-san-jacinto`, 1 en `/cargador-vehiculo-electrico-migues`) |
| Impresiones diarias | 2 → 34 (sube, pero sobre páginas de relleno) |
| Sitemap | 1.036 enviadas, "0 indexadas" según el informe de sitemaps |
| Home | Indexada, último rastreo 11/09, posición media 55 |
| `/reparaciones-electricas-montevideo` (madre) | **Descubierta, sin indexar** |
| `/tableros-electricos-buceo` | Descubierta, sin indexar |
| `/electricista-pocitos` | Indexada |

Consultas con señal real de demanda:

| Consulta | Impr. | Pos. | Página que recibe la impresión | Lectura |
|---|---|---|---|---|
| electricista la floresta | 33 | 12,9 | `/mantenimiento-electrico-la-floresta` | Hay demanda en la Costa de Oro, pero la capta la página equivocada |
| electricista (a secas) | 16 | 42 | varias | Búsqueda implícita: le corresponde a la home |
| electricista montevideo / en montevideo / elctricista montevideo | 15 | 12–84 | home y `/electricista-centro` | Canibalización entre home, `/electricista-centro` y `/zonas` |
| electricista pocitos | 1 | 11 | `/electricista-pocitos` | Candidata a zona fuerte |
| cargador vehículo eléctrico + localidad | ~70 impr. repartidas | 4–12 | `/cargador-vehiculo-electrico-*` | Nicho con poca competencia: es donde llegan los únicos clics |

**Conclusión**: Google prueba páginas de relleno en posiciones de 8 a 13 para localidades sin competencia y deja las páginas que importan (home y madres) sin indexar o en la posición 55.

### 1.2 Proyecto (código y HTML publicado)

| # | Hallazgo | Tipo | Impacto | Dónde |
|---|---|---|---|---|
| 1 | 896 páginas barrio × servicio más 128 hubs generadas por bucle, con 84 % de texto compartido entre `/tableros-electricos-buceo` y `/tableros-electricos-la-teja`. La variación sale de 5 textos por "tipo" de barrio | RANKING | Crítico | `src/datos/sitio.php` (bucle), `src/datos/barrios.php` (`$zona_textos`) |
| 2 | Dos teléfonos: `config/variables.php` = 097 406 456 (tel:, wa.me, schema) y texto fijo = 094 633 956 (footer, contacto, FAQ, titles, llms.txt). El texto del WhatsApp muestra un número y el enlace abre el otro | CONVERSIÓN / RANKING (NAP) | Crítico | `config/variables.php`, `src/datos/sitio.php:7-8,23`, `src/vista/partials/footer.php:5`, `src/vista/pagina.php:147`, `src/controlador/articulos.php:7` |
| 3 | El 094 633 956 aparece también como teléfono en el schema de mudanzasmontevideo.com. Varios EMDs de oficios distintos con el mismo número es una señal de red (la política de doorway lo menciona) | RANKING | Alto | Decidir qué número es de este negocio |
| 4 | 20 testimonios sin fuente, con logo de Google, estrellas y fechas relativas ("hace 6 días") | RANKING / CONVERSIÓN | Crítico (acción manual por reseñas falsas + pérdida de confianza) | `src/datos/sitio.php` `$testimonios`, bloque `.testimonial` |
| 5 | `areaServed` con 128 `Place` en el LocalBusiness de todas las páginas | RANKING | Medio (stuffing en el schema) | head / partial de schema |
| 6 | Footer con 12 enlaces "Electricista en X" en todas las páginas | RANKING | Medio | `footer.php:4` |
| 7 | La foto `nosotros/equipo.webp` es de stock y se presenta como el equipo; el hero parece generado. No hay ninguna foto de trabajo real | CONVERSIÓN / E-E-A-T | Alto | `public/images/` |
| 8 | Home con title en singular y H1 en plural, sin primer párrafo que responda la búsqueda, 102 enlaces y FAQPage (sin rich result desde mayo de 2026) | RANKING / GEO | Medio | `src/datos/sitio.php:3`, `pagina.php` |
| 9 | Ninguna página de zona tiene datos locales (tiempo desde la base, trabajos, reseñas del barrio, precios): no pasan el test del nombre | RANKING | Crítico | `barrio.php` |
| 10 | Sin `sameAs`, sin GBP y sin persona responsable visible (quién atiende, matrícula o categoría UTE) | RANKING / GEO | Alto | `config/variables.php` (vacíos) |
| 11 | Eventos GA4 `click_whatsapp` y `click_telefono` ya implementados | — | OK | `public/js/sitio.js:76-77` |
| 12 | robots.txt permite todo y el HTML se arma en el servidor (PHP): los crawlers de IA ven el contenido | GEO | OK | — |

### 1.3 SERP "electricista Montevideo" (septiembre 2026)

Competidores del top: electricistaenmontevideo24horas.com.uy, electricistas.uy, electricista.uy, electricistaautorizadoporute.com.uy, proobra.com.uy, arreglatodo.uy, un Google Sites ("electricistamontevideo24horas"), Mercado Libre y un perfil de Instagram. Patrones:

- **"24 horas" y "autorizado por UTE"** son los ganchos dominantes. Nosotros **no podemos usarlos** hasta que el operador lo confirme (regla del proyecto). El diferencial tiene que ser otro: explicaciones claras, fotos reales, precios fechados y cargadores para autos eléctricos.
- Varios tienen el teléfono en el title. Nosotros no, porque Google suele reescribirlo y no aporta.
- La SERP es débil (Google Sites, directorios, Instagram): **se puede ganar con una entidad clara y 20 páginas buenas**, no hacen falta 1.000.

---

## 2. Fase 0 — Bloqueantes (esta semana, todo en local)

> Hasta cerrar esta fase, no conviene escribir contenido nuevo: Google no va a indexarlo.

### 2.1 [CONVERSIÓN][RANKING] Un solo teléfono
- **Decisión del usuario**: ¿cuál es el número de este negocio, 094 633 956 (el que figura en AGENTS.md y en la entrega) o 097 406 456 (el de config)?
- Dejarlo **solo** en `config/variables.php` y reemplazar los 6 textos fijos por `$empresa_telefono_sep` o una variable nueva `$empresa_whatsapp_visible`.
- Si el 094 633 956 también es el número de mudanzasmontevideo.com, este sitio necesita un número propio. Si no, conviene al menos no marcar el mismo teléfono en el schema de los dos dominios.
- Verificar con `grep -rn "094\|097\|598" src config public/js`.

### 2.2 [RANKING][CONVERSIÓN] Testimonios
- Quitar el bloque de 20 testimonios hoy mismo, junto con el logo de Google y las estrellas.
- Reemplazarlo por: (a) reseñas reales copiadas del GBP con nombre, fecha exacta y barrio, y un enlace a la ficha, o (b) si todavía no hay, un bloque "Pedile referencias al técnico" o "Trabajos recientes" con fotos reales.
- Nunca `aggregateRating` ni `review` propios en el schema.

### 2.3 [RANKING] Poda de la matriz (la acción que más mueve)
URLs que quedan **indexables** (fase 1, 20 en total como máximo):

| Tipo | URLs |
|---|---|
| Home | `/` (objetivo: "electricista(s) en Montevideo") |
| Madres de servicio (7) | `/reparaciones-electricas-montevideo`, `/instalaciones-electricas-montevideo`, `/tableros-electricos-montevideo`, `/iluminacion-montevideo`, `/mantenimiento-electrico-montevideo`, `/electricista-comercios-montevideo`, `/cargador-vehiculo-electrico-montevideo` |
| Generales | `/servicios`, `/nosotros`, `/contacto`, `/zonas` |
| Zonas con señal (máx. 6, solo si el operador trabaja ahí y da los datos del brief §5) | `/electricista-pocitos`, `/electricista-carrasco`, `/electricista-centro` (o fusionarla con la home), `/electricista-ciudad-de-la-costa`, una página "Costa de Oro" (La Floresta, Atlántida, Parque del Plata) **solo si la cubre de verdad**, y `/cargador-vehiculo-electrico-canelones` |

El resto:
- **896 barrio × servicio → 301 a la madre del servicio** (por ejemplo, `/tableros-electricos-buceo` → `/tableros-electricos-montevideo`). Tienen dos semanas y casi sin impresiones, así que el 301 es barato y concentra señales.
- **Hubs `/electricista-{barrio}` no elegidos → 301 a `/zonas#{barrio}`**. `/zonas` pasa a listar barrios como secciones cortas con ancla, sin enlace a URLs propias.
- Implementación local: en `src/datos/sitio.php`, generar páginas solo para `$zonas_activas = [...]`, agregar un mapa de redirecciones en `App.php` (lookup en `$barrios_perfil` → `header('Location', 301)`) y sacar esas URLs del sitemap automáticamente.
- Reenviar el sitemap en GSC y pedir la indexación manual de las 7 madres y la home.
- **Riesgo si no se hace**: el dominio queda marcado como de baja calidad en todo el sitio (el helpful content es sitewide) y las madres no se indexan nunca.

### 2.4 [RANKING] Limpieza técnica menor
- `areaServed` en la home: `City` Montevideo + `AdministrativeArea` Canelones. Sacar los 128 `Place`.
- Footer: reemplazar los 12 enlaces de barrio por "Zonas de atención" y los 7 servicios.
- FAQPage: se puede dejar, pero sin esperar rich result. Priorizar que el FAQ sea visible.
- Correr `C:/xampp/php/php.exe scripts/verificar_sitio.php` (con Apache levantado) y ajustar el script para que acepte los 301 nuevos.

---

## 3. Fase 1 — Entidad (semanas 1–2)

### 3.1 Entidad central (Source Context)

| Elemento | Definición |
|---|---|
| Source Context | Electricistas Montevideo: servicio de electricista a domicilio para hogares y comercios de Montevideo y la Costa de Canelones, con coordinación por WhatsApp |
| Central Entity | Electricista (oficio) → `Electrician` |
| Central Search Intent | "contratar un electricista hoy en mi barrio y saber cuánto sale" |
| Diferencial verificable (a confirmar) | cargadores para autos eléctricos (SAVE), explicación por escrito del diagnóstico, fotos del antes y después |

Atributos EAV que tiene que completar el operador (**no inventar**; donde falten, quedan como `{variable}`):

| Atributo | Valor |
|---|---|
| Persona responsable (nombre, foto real) | {operador} |
| Categoría de técnico instalador UTE (A/B/C) y firma instaladora | {solo si existe} |
| Base de salida (barrio) | {base} |
| Zonas que cubre de verdad | {lista} |
| Horario real y si atiende de noche o fines de semana | {horario} |
| Tiempo típico de llegada en Montevideo | {min} |
| Costo de la visita o diagnóstico | {UYU, fecha} |
| Precio desde para 3 trabajos típicos (cambio de térmica, tablero, punto nuevo, cargador) | {UYU, fecha} |
| Garantía del trabajo | {solo si existe} |
| Medios de pago | {…} |
| Años en el oficio | {solo si es verificable} |
| Marcas con las que trabaja (tableros, cargadores) | {…} |

### 3.2 [RANKING][GEO] Página "Nosotros" → "Quién te atiende"
- Nombre real, foto real, base, zonas y fecha de actualización. Categoría UTE solo si existe, con enlace al registro público de técnicos de UTE si figura.
- Qué hacemos y qué **no** hacemos (por ejemplo: "no hacemos trámites de UTE sin firma instaladora"). La honestidad también cuenta como señal de E-E-A-T.
- Enlaces `sameAs`: GBP, Instagram y Facebook reales. Completar en `config/variables.php`.

### 3.3 [TRÁMITE] Presencia fuera del sitio (no es local, pero sin esto la home no pasa del top 10)
- **Google Business Profile** con la categoría "Electricista", área de servicio sin dirección pública, los mismos 7 servicios con los mismos nombres de las madres, horario real y fotos reales. Una publicación por mes.
- Pedir reseñas que mencionen **servicio y barrio** ("me cambiaron el tablero en Pocitos"). La IA extrae frases de las reseñas.
- Bing Places (importar desde GBP), Apple Business Connect, Bing Webmaster Tools (importar desde GSC).
- Citas NAP idénticas: Páginas Amarillas UY, Cylex UY, Infobel, Mercado Libre Servicios, Facebook, Instagram y los directorios que aparecen en la SERP (arreglatodo.uy, homesolution.net/uy).

---

## 4. Fase 2 — Home y 7 madres (semanas 2–4)

### 4.1 Home
- **Title** (≤ 58): `Electricista en Montevideo a domicilio – Presupuesto por WhatsApp`. Si queda largo: `Electricista en Montevideo – Reparaciones, tableros y más` (57).
- **H1**: `Electricistas en Montevideo` (se mantiene; coherente con la marca y la búsqueda del plural).
- **Description** (120–150): `Electricista a domicilio en Montevideo: llaves que saltan, tableros, instalaciones y cargadores. Mandá una foto por WhatsApp y te pasamos el presupuesto.`
- **Primer párrafo answer-first** (40–70 palabras, con la marca nombrada): "En Electricistas Montevideo resolvemos fallas eléctricas, cambiamos tableros y hacemos instalaciones en casas y comercios de Montevideo y la Costa de Canelones. Salimos desde {base}, llegamos a {zonas} en {tiempo} y la visita cuesta {precio/“se confirma por WhatsApp”}. Mandanos una foto del problema por WhatsApp y te respondemos con el paso siguiente."
- Orden: hero (H1 + WhatsApp + llamar + foto real) → barra de confianza (solo datos reales) → 7 servicios → trabajos recientes → cómo trabajamos → precios orientativos con fecha → zonas (texto, no lista de 128) → FAQ → CTA.
- Resolver la canibalización con `/electricista-centro`: el Centro se fusiona con la home o su página cambia de ángulo (edificios antiguos, oficinas, techos altos) con datos reales.

### 4.2 Madres de servicio: estructura común (1.200–1.800 palabras, cada una distinta)
1. H1 = servicio + Montevideo + primer párrafo answer-first.
2. "Qué resolvemos" (la lista actual está bien).
3. **H2 en forma de pregunta** sacadas de PAA y WhatsApp (ver 4.3), cada una con un pasaje autocontenido de 100–300 palabras.
4. **Tabla de precios orientativos con fecha** (en cuanto el operador los pase) y qué incluye y qué no.
5. Trabajos reales en Montevideo: foto, barrio, mes y qué se hizo.
6. Normativa, citada y enlazada: Reglamento de Baja Tensión de UTE, Norma de Instalaciones de Enlace BT (versión vigente desde el 13/08/2026), productos certificados URSEA.
7. FAQ visible de 4 a 6 preguntas, zonas donde trabajamos (texto con 3–5 enlaces a zonas activas) y servicios afines.
8. "Actualizado: {fecha}" visible + `dateModified`.

### 4.3 Vocabulario y entidades por madre (cobertura semántica)

| Madre | Entidades o términos a cubrir | H2 en pregunta sugeridos |
|---|---|---|
| Reparaciones | térmica, disyuntor diferencial, cortocircuito, sobrecarga, fuga a tierra, empalme, aislación, tomacorriente, portero eléctrico, bomba de agua | ¿Por qué salta la térmica? ¿Por qué salta el disyuntor aunque no haya nada enchufado? ¿Qué hago si hay olor a quemado? |
| Instalaciones | circuito, sección de cable (mm²), caño corrugado, caja de embutir, bocas, circuito dedicado, aire acondicionado, termotanque, cocina eléctrica, monofásica/trifásica | ¿Cuántos circuitos necesita un apartamento? ¿Cuándo hay que renovar una instalación vieja? ¿Qué pide UTE para una obra nueva? |
| Tableros | tablero, térmicas, diferencial 30 mA, puesta a tierra, jabalina, fusibles, barra, identificación de circuitos, potencia contratada | ¿Cuándo conviene cambiar el tablero? ¿Mi casa tiene puesta a tierra? ¿Qué diferencia hay entre la térmica y el disyuntor? |
| Iluminación | LED, spots, tiras LED, dimmer, sensor de movimiento, iluminación exterior, IP65, temperatura de color, luminaria | ¿Cuánto se ahorra al pasar a LED? ¿Qué luz conviene en cocina y baño? |
| Mantenimiento | revisión, medición de aislación, termografía (si la tiene), informe, edificio, gastos comunes, puesta a tierra | ¿Cada cuánto conviene revisar la instalación? ¿Qué revisar antes de comprar o alquilar? |
| Comercios | local, oficina, habilitación (bomberos o IM, si aplica), trifásica, iluminación comercial, cartelería, horario fuera de apertura | ¿Pueden trabajar fuera del horario del local? ¿Qué necesita un local para habilitarse? |
| Cargadores | SAVE, wallbox, Schuko, 7,4 kW, circuito dedicado, tarifa doble o triple horario, beneficio de movilidad eléctrica de UTE, cochera o edificio, gastos comunes | ¿Puedo cargar el auto en un enchufe común? ¿Cuánto cuesta cargar en casa con la tarifa triple horario? ¿Qué pide el edificio para instalar un cargador? |

### 4.4 Subservicios candidatos (solo si el operador los hace; cada uno tendría URL propia más adelante)
- Puesta a tierra / jabalina.
- Aumento de potencia o cambio a trifásica en UTE (con firma instaladora).
- Circuito para aire acondicionado (enlazar con instalaciondeaire.uy solo si es el mismo operador; si no, no enlazar).
- Instalación de cargador en edificios (propiedad horizontal).
- Revisión eléctrica antes de comprar o alquilar.

---

## 5. Fase 3 — Zonas en tandas (desde la semana 4, con datos)

Reglas (de la skill):
- URL de zona solo si **(a)** hay demanda (GSC o autocompletar) **y (b)** el operador completó el brief. Si no, es una sección de `/zonas`.
- **Test del nombre**: si al borrar "Pocitos" no se sabe de qué barrio es la página, no se publica.
- Tandas de 5 a 10, con enlaces desde la madre, `/zonas` y 1–2 vecinas el mismo día. Si a los 60 días más del 30 % queda "no indexada", se frena.
- Jerarquía: `/electricista-{zona}` para el servicio principal. Las combinaciones servicio × zona solo en casos puntuales con demanda comprobada (por ejemplo, `/cargador-vehiculo-electrico-carrasco` si aparece en GSC).
- Title de zona: `Electricista en Pocitos – {gancho real: torres, portería, llegada en X min}`, sin "cerca de mí" y sin teléfono.

Brief por zona (pedir al operador; **sin los ⛔ no hay URL**):

| # | Dato |
|---|---|
| ⛔1 | Tiempo real de llegada desde la base y por qué calles |
| ⛔2 | 2 o más referencias reales (calles, plazas, edificios) |
| ⛔3 | Tipo de vivienda y qué cambia en el trabajo (torres con portería, casas antiguas con tablero de fusibles, casas de veraneo cerradas) |
| ⛔4 | Problema típico de la zona con un ejemplo |
| ⛔5 | 2 o más trabajos hechos ahí (mes, tipo, calle aproximada) con foto |
| ⛔6 | 1 reseña real de la zona |
| ⛔7 | Precio desde y recargos, con fecha |
| ⛔8 | Una pregunta frecuente de clientes de la zona |

Orden sugerido de tandas (según las señales de GSC; confirmar la cobertura con el operador):
1. **Tanda 1**: Pocitos, Carrasco, Ciudad de la Costa (Solymar/Lagomar), Malvín, Cordón.
2. **Tanda 2**: Punta Carretas, Prado, Parque Batlle o Buceo, Costa de Oro (La Floresta, Atlántida, Parque del Plata en una sola página), Las Piedras o La Paz.
3. **Cargadores**: `/cargador-vehiculo-electrico-canelones` y, si aparece demanda, Carrasco o Ciudad de la Costa (casas con cochera, que es donde ya hay impresiones).

---

## 6. Fase 4 — Contenido informacional y GEO (en paralelo desde la semana 3)

Seguir el flujo de `plan_articulos.md` (un array PHP por artículo en `content/articulos/`). Un artículo por semana. Cada uno con respuesta directa, H2 en forma de pregunta, tabla con fecha, 2–4 fuentes oficiales y enlaces a la madre correspondiente.

| # | Tema (intención) | Madre que alimenta | Fuentes |
|---|---|---|---|
| 1 | ¿Por qué salta el disyuntor diferencial? Causas y qué hacer (sin manipular) | Reparaciones | RBT UTE |
| 2 | ¿Cuánto cuesta cargar un auto eléctrico en casa en Uruguay? Tarifa doble y triple horario 2026 | Cargadores | UTE Movilidad Eléctrica, tarifas UTE |
| 3 | Cargador en casa: Schuko o SAVE/wallbox, y cómo acceder al beneficio de UTE | Cargadores | UTE clientes movilidad eléctrica |
| 4 | Puesta a tierra: cómo saber si tu casa la tiene y por qué el diferencial la necesita | Tableros | RBT UTE |
| 5 | Cambio de tablero con fusibles: señales de que tu instalación quedó vieja | Tableros | RBT UTE |
| 6 | Qué es un técnico instalador habilitado por UTE y cuándo lo necesitás | Instalaciones | UTE Técnicos y firmas instaladoras |
| 7 | Nueva Norma de Instalaciones de Enlace BT (vigente desde el 13/08/2026): qué cambia para una obra | Instalaciones | UTE normativa |
| 8 | Aumento de potencia en UTE: cuándo hace falta y qué trámite es | Instalaciones / Comercios | UTE |
| 9 | Productos eléctricos certificados: cómo reconocer uno aprobado por URSEA | Reparaciones / Iluminación | URSEA |
| 10 | Revisión eléctrica antes de alquilar o comprar un apartamento en Montevideo | Mantenimiento | RBT UTE |
| 11 | Iluminación LED: cuánto baja la factura (cálculo con la tarifa vigente de UTE) | Iluminación | Tarifas UTE |
| 12 | Precios orientativos de trabajos eléctricos en Montevideo {mes año}, **solo con precios reales del operador** | Todas | Operador |

Checklist GEO de sitio:
- [x] [GEO] HTML renderizado en el servidor; robots.txt permite todo.
- [ ] [GEO] Revisar si hay Cloudflare: desde el 15/09/2026 bloquea bots de IA por defecto. Verificar con `curl https://electricistasmontevideo.com/robots.txt` que no antepone reglas.
- [ ] [TRÁMITE] **IndexNow** (local): archivo con la clave en la raíz + un ping en `scripts/` al publicar. Cubre Bing y Copilot, y probablemente ChatGPT.
- [ ] [GEO] Fecha "Actualizado" visible en las madres y en las zonas.
- [ ] [GEO] Marca nombrada en los pasajes clave ("En Electricistas Montevideo…").
- [ ] [GEO] Página de precios orientativos con fecha de vigencia, cuando haya datos.
- [ ] [GEO] GA4: canal personalizado "AI Assistants" (`chatgpt|perplexity|gemini|copilot|claude`) cruzado con `click_whatsapp`.
- [ ] [GEO] Protocolo mensual: 10 prompts ("mejor electricista en Montevideo", "electricista para cargador de auto eléctrico en Carrasco"…) × ChatGPT, Perplexity y Gemini × 3 corridas. Anotar qué dominios citan y gestionar presencia en esas fuentes.
- [ ] llms.txt: ya existe. Prioridad cero, pero hay que **corregir el teléfono** (hoy mezcla los dos números).

Aclaración: en un nicho de urgencia como electricista, primero importan el pack de mapas y el orgánico. El GEO rinde en las consultas informacionales (tabla de arriba) y en "cargador auto eléctrico", donde el usuario investiga antes de contratar.

---

## 7. Fase 5 — Imágenes

Estado actual: el hero y las tarjetas de servicio parecen generados o de stock, y `equipo.webp` es de stock pero se presenta como el equipo. **Regla**: nada de stock ni IA presentado como trabajo propio, equipo o local.

### 7.1 Lo que más mueve: fotos reales del operador [CONVERSIÓN][RANKING]
Pedir entre 20 y 30 fotos de celular (horizontal, con buena luz, sin caras de clientes ni direcciones visibles):
- Retrato del técnico con ropa de trabajo (para Nosotros y el hero).
- Antes y después de 3 tableros (fusibles → térmicas + diferencial).
- Wallbox instalado en una cochera (para la página de cargadores).
- Instalación embutida en una obra (caños y cajas antes de revocar).
- Iluminación terminada: spots, tiras LED, exterior.
- Camioneta o herramientas (multímetro, pinza amperométrica).
- Un trabajo por zona activa, para el ⛔5 del brief.

Procesado local: WebP a 1600 y 800 px, calidad 78, nombre descriptivo (`cambio-tablero-termicas-pocitos.webp`), alt que describa lo que se ve (sin stuffing), `width`/`height` y `loading="lazy"` salvo el hero. Borrar el EXIF de GPS.

### 7.2 Mientras tanto: stock con licencia libre, solo como ilustración
Pexels (licencia libre, sin atribución obligatoria). Candidatas:
- [Electrician Fixing an Opened Switchboard](https://www.pexels.com/photo/electrician-fixing-an-opened-switchboard-257736/): tablero con térmicas, para Tableros.
- [Electrician by Fuse Box](https://www.pexels.com/photo/electrician-by-fuse-box-17842832/): para Reparaciones.
- [A man is working on an electrical panel](https://www.pexels.com/photo/a-man-is-working-on-an-electrical-panel-27928760/).
- Búsquedas útiles: [electrical panel](https://www.pexels.com/search/electrical%20panel/), [circuit breakers](https://www.pexels.com/search/circuit%20breakers/), "ev charger garage", "led spotlights ceiling".

Condiciones: alt honesto ("Tablero eléctrico con llaves térmicas", no "nuestro técnico en Pocitos"). En `nosotros` no usar stock de personas: mejor sin foto que con un "equipo" falso. Si queda alguna imagen generada por IA, marcarla con IPTC `trainedAlgorithmicMedia` y usarla solo como ilustración.
Revisar la licencia de cada foto al descargarla y guardar en `public/images/` el enlace de origen como comentario en `servicios.php`.

---

## 8. Fase 6 — Enlazado e indexación

- Home → 7 madres (en el cuerpo, con anchors variados) → zonas activas.
- Cada madre → 3–5 zonas activas + 2 servicios afines + 1–2 artículos.
- Cada zona → madre, `/zonas` y 3 vecinas geográficas reales (cuando existan).
- Cada artículo → 1 madre principal + 2 relacionadas.
- Header ≤ 7 ítems (ya cumple). Footer sin lista de barrios.
- Sitemaps segmentados con un `lastmod` real por URL (hoy usan el `filemtime` del archivo de datos: si se toca `barrios.php`, todas las zonas se marcan como modificadas. Conviene una fecha por página).
- **No** usar la Indexing API para páginas de servicio.

---

## 9. Medición y umbrales

| Momento | Qué mirar | Umbral para avanzar |
|---|---|---|
| +7 días de la poda | GSC → Páginas: las 7 madres indexadas | 7/7 indexadas; si no, pedir la indexación de nuevo y revisar el contenido |
| +30 días | Impresiones de la home para "electricista montevideo" | Posición < 30 |
| +30 días | Clics a WhatsApp por página (GA4 `click_whatsapp` + panel `/metricas`) | ≥ 1 lead por semana desde orgánico |
| +60 días | Tanda 1 de zonas | ≥ 70 % indexadas y ≥ 60 % con impresiones → abrir la tanda 2 |
| Mensual | Protocolo de 10 prompts de IA + informe de IA en GSC | Primera cita del dominio o de la marca |
| Trimestral | Páginas sin impresiones en 6 meses | Fusionar con 301 |

---

## 10. Datos que necesito del usuario u operador (sin esto, esos bloques quedan con `{variable}`)

1. **Cuál es el teléfono** de este negocio y si se comparte con otro dominio.
2. Nombre de la persona que atiende, foto real y categoría de técnico o firma instaladora UTE (si existe).
3. Base de salida, zonas reales (¿llega a La Floresta o Atlántida?), horario real y si atiende urgencias de noche.
4. Costo de la visita y precio desde para 3–5 trabajos, con fecha.
5. Garantía (si existe) y medios de pago.
6. GBP: ¿existe? ¿a nombre de quién? Enlaces de Instagram y Facebook reales.
7. 20–30 fotos reales (lista en §7.1).
8. Reseñas reales para migrar a la web.
9. ¿Hay Cloudflare delante del dominio?

---

## 11. Orden de ejecución resumido

| Semana | Tarea | Tipo | Local |
|---|---|---|---|
| 1 | Unificar el teléfono, quitar los testimonios, podar a unas 20 URLs con 301, limpiar el schema y el footer, reenviar el sitemap | RANKING / CONVERSIÓN | Sí (y después subir el paquete) |
| 1–2 | Nosotros real, `sameAs`, GBP, Bing, Apple, IndexNow | TRÁMITE / GEO | Parcial |
| 2–4 | Reescribir la home y las 7 madres (answer-first, H2 en pregunta, vocabulario, tablas con fecha, normativa citada) | RANKING / GEO | Sí |
| 3+ | 1 artículo por semana (tabla §6) | GEO / RANKING | Sí |
| 4+ | Tanda 1 de zonas con brief completo | RANKING | Sí |
| Continuo | Fotos reales, reseñas con barrio, citas NAP | CONVERSIÓN / RANKING | No |

Fuentes consultadas: [UTE – Reglamento de Baja Tensión](https://www.ute.com.uy/clientes/tramites-y-servicios/tecnicos-y-firmas-instaladoras/reglamento-de-baja-tension) · [UTE – Normativa BT](https://portal.ute.com.uy/firmas-y-tecnicos-instaladores/normativa) · [UTE – Movilidad eléctrica, clientes](https://www.ute.com.uy/clientes/movilidad-electrica/beneficios/clientes-movilidad-electrica) · [UTE – Carga de vehículos](https://portal.ute.com.uy/movilidad-sostenible-carga) · [URSEA – RBT autoconsumo](https://www.gub.uy/unidad-reguladora-servicios-energia-agua/sites/unidad-reguladora-servicios-energia-agua/files/documentos/noticias/Instalaciones%20para%20autoconsumo%20-Reglamento%20de%20Baja%20Tensi%C3%B3n.pdf) · SERP: [electricistaenmontevideo24horas.com.uy](https://www.electricistaenmontevideo24horas.com.uy/), [electricistas.uy](https://electricistas.uy/), [electricistaautorizadoporute.com.uy](https://www.electricistaautorizadoporute.com.uy/), [proobra.com.uy](https://proobra.com.uy/electricista-montevideo/), [arreglatodo.uy](https://www.arreglatodo.uy/servicios-de-mantenimiento-en-montevideo/electricista-a-domicilio).
