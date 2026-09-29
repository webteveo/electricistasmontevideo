# Location pages 2026 — escala, bloques locales, anti-doorway, jerarquía

Etiquetas: **[RANKING]** mueve posiciones · **[CONVERSIÓN]** mueve leads · **[TRÁMITE]** hacer una vez · **[GEO]** visibilidad en IA. Evidencia detallada en `investigacion-2026.md` (bloques A y D).

## 1. La línea entre página de zona legítima y doorway

No hay umbral numérico oficial (ni % de similitud ni cantidad de páginas). La política define dos cosas: doorway = página **intermedia** que no resuelve ("funnel users to one page"); scaled content = **sin valor propio a escala**, "no matter how it's created". Toronto 2026 lo resumió como "commodity content": lo que cualquiera puede replicar.

| Señal | Legítima | Doorway / scaled |
|---|---|---|
| Destino | La página resuelve ahí: WhatsApp, cobertura real, tiempos, precios de esa zona | Deriva a una central o formulario genérico |
| Diferencia entre páginas | Cambian **datos verificables**: barrios cubiertos, tiempo de llegada, tarifa, reseñas de la zona, trabajos hechos ahí, referencias | Cambia el topónimo y sinónimos |
| Realidad | El negocio atiende la zona (GBP con área, reseñas que la nombran, fotos) | 200 localidades donde nunca se hizo un trabajo |
| Arquitectura | Hub navegable servicio → departamento → zona, enlazada desde el cuerpo | Cientos de URLs solo en footer o sitemap |
| Dominios | Un dominio-marca por negocio real | Varios EMDs del mismo operador que terminan en el mismo WhatsApp |
| Volumen | Proporcional a demanda y operación | Cobertura exhaustiva "por si acaso" |

**Test del nombre** [RANKING]: borrá el nombre de la zona de la página. Si no podés saber de qué zona es, no se publica.

**Riesgo concreto**: acción manual "Doorways" o "Thin content" (Sterling Sky documentó una en un sitio con >3.000 location pages con texto distinto en cada una), demote algorítmico en spam updates (ago-2026 pegó a contenido programático), y desde abr-2026 un competidor puede denunciar y Google puede aplicar acción manual a partir del reporte.

## 2. Cuántas páginas: reglas de escala

1. **Zona con URL propia solo si cumple dos condiciones** [RANKING]: (a) demanda propia: la localidad/barrio aparece en autocompletar, GSC o Ads con búsquedas "servicio + zona" (Pocitos, Carrasco, Ciudad de la Costa, Las Piedras, Punta del Este, Piriápolis, Palermo, Belgrano sí; Villa Dolores, Jacinto Vera, Coghlan casi nunca); (b) datos reales: la fila de la tabla de zona (sección 3) está completa.
2. **Zona sin URL propia = sección con ancla dentro de la página madre** (`/cerrajero/montevideo/#jacinto-vera` o dentro del barrio mayor vecino). Se promueve a URL cuando aparece demanda en GSC.
3. **Tope operativo**: hasta **30–50 páginas de zona por servicio y por sitio** en la primera fase. Pasar de 100 solo si la tasa de indexación de las existentes es > 85 % y ≥ 60 % de ellas tiene impresiones en GSC a 90 días. Nunca 500–2.000 páginas de zona en un dominio de un solo negocio: para cubrir cientos de localidades se usan páginas madre por departamento/tramo con secciones.
4. **Matriz servicio × zona completa solo para el servicio principal del dominio**. Servicios secundarios: página troncal + páginas de zona únicamente en las 5–10 zonas con demanda comprobada. (Ejemplo: `/apertura-de-puertas/pocitos/` solo si "apertura de puertas Pocitos" existe como búsqueda; si no, la apertura vive como H2 dentro de `/cerrajero/pocitos/`.)
5. **Publicar en tandas de 5–10 páginas** y esperar indexación antes de la siguiente. Si a los 60 días > 30 % de la tanda está en "Crawled/Discovered – currently not indexed", frenar: mejorar o fusionar antes de seguir. Motivo: Illyes dice que muchas no indexadas son señal de calidad del sitio entero.
6. **Auditoría trimestral**: zona sin impresiones en 6 meses → fusionar en la madre con 301; "Google chose different canonical" → diferenciar con datos o fusionar.
7. **Nunca reescribir/sinonimizar para "hacer único"**. IA solo para redactar el 80 % estructural a partir de los datos; el 20 % local son **datos**, no prosa.
8. **Entre dominios**: los 12+ sitios no comparten plantilla de texto ni bloques de zona; cada dominio tiene operador, NAP y base de datos de zonas propios. Mismo WhatsApp en varios EMDs con contenido clonado = ejemplo literal de doorway abuse.

Cómo convive esto con "una exagerada cantidad de páginas": lo que mueve la aguja no es la cantidad, es cubrir **cada localidad con demanda real**. Maldonado tiene 15 localidades con SERP propia; Canelones 25; Montevideo tiene ~20 barrios buscados por nombre; CABA ~40. Eso ya son 100 páginas legítimas por servicio principal si se documentan de verdad.

## 3. Tabla de datos por zona (condición para crear la URL)

Una fila por zona en un CSV/JSON que alimenta la plantilla PHP. Campos y mínimo obligatorio:

| Campo | Obligatorio | Ejemplo (cerrajero, Pocitos) | Fuente |
|---|---|---|---|
| `zona`, `slug`, `zona_madre`, `vecinos[3-4]` | sí | Pocitos / pocitos / montevideo / punta-carretas, buceo, parque-batlle, cordon | `zonas-rioplatenses.md` |
| `tiempo_llegada` (min, franja) | sí | 15–25 min desde la base en Cordón; 30 de noche | operador |
| `referencias[2-4]` calles, avenidas, puntos | sí | Rambla, Av. Brasil, 26 de Marzo, Plaza Gomensoro | operador + índice de zonas |
| `tipo_vivienda` y qué implica | sí | Torres frente a la rambla: portería, cerraduras de embutir en puertas de acceso, cilindros europeos | operador |
| `problema_tipico[1-2]` | sí | Llaves adentro al salir a la rambla; cerraduras de edificios con muchos años de uso | operador (WhatsApp, CRM) |
| `trabajos[2+]` fecha, tipo, calle aprox., tiempo | sí | Apertura puerta blindada, Benito Blanco, mar-2026, 25 min | operador |
| `reseña[1+]` o `foto[1+]` real de la zona | sí (al menos una) | "Vino en 20 minutos a Pocitos…" (Google, nombre, fecha) | GBP / celular del operador |
| `precio_desde` y recargos | sí | Apertura desde $U 1.800; nocturno +30 % | operador, con fecha |
| `faq[1-3]` locales | sí | ¿Llegan a Pocitos Nuevo y Villa Biarritz? ¿Hay estacionamiento para el móvil? | PAA + operador |
| `subzonas[]` cubiertas desde esta página | no | Pocitos Nuevo, Villa Biarritz | índice |
| `mapa` (pin o radio) | no | lat/lng del centro del barrio | — |
| `clima_geografia` | solo si cambia el servicio | Salinidad en Punta Ballena traba cilindros | operador |

Regla: si faltan dos campos obligatorios, la zona **no** tiene URL todavía. Pedir los datos al operador con `assets/brief-zona.md`.

## 4. Bloques de contenido local (orden dentro de la página)

Los marcados (★) tienen respaldo de test (Sterling Sky: subieron tráfico y ranking al agregarlos).

1. **Hero** [CONVERSIÓN]: H1 con servicio + zona + promesa; subtítulo con tiempo de llegada; botón WhatsApp + llamar; línea de prueba (★ 4,8 · N reseñas · matriculado).
2. **Primer párrafo answer-first** (40–70 palabras) [RANKING][GEO]: qué, dónde, en cuánto tiempo, desde dónde, precio desde, CTA. Es el snippet de reserva y el pasaje que cita la IA. Debe contener algo que solo aplique a esa zona.
3. **Barra de confianza** [CONVERSIÓN]: años, trabajos, garantía, matrícula, "sin cargo por visita".
4. **Servicios en esta zona** (H2 + 3–6 H3 con anchor a la troncal) [RANKING]: solo los que se dan ahí, con precio "desde".
5. ★ **Trabajos recientes en {zona}** (tabla: fecha · trabajo · calle/referencia · tiempo) [RANKING][CONVERSIÓN].
6. ★ **Reseñas de clientes de {zona}** (2–3 con nombre, fecha, barrio en el texto, enlace a la ficha) [CONVERSIÓN][GEO].
7. ★ **Cómo llegamos / tiempo de llegada** (desde la base, por qué avenidas, franjas) + ★ **foto real** de la zona o del trabajo [RANKING].
8. **Zona y cobertura**: subzonas, referencias, tipo de vivienda y problemas típicos [RANKING]. Nunca lista de 40 barrios.
9. **Precios orientativos en {zona}** (tabla con fecha de vigencia) [GEO][CONVERSIÓN].
10. **Proceso** en 3–4 pasos [CONVERSIÓN].
11. **FAQ local** (3–5 H3 en forma de pregunta, respuestas de 2–4 líneas) [RANKING][GEO].
12. **CTA final + WhatsApp sticky en móvil** [CONVERSIÓN].
13. **Zonas cercanas** (3–5 anchors a vecinos reales) + enlace a la madre y a la troncal [RANKING].

Proporción: hasta ~80 % de estructura y texto base compartido; el 20 % local debe ser datos verificables (bloques 2, 5, 6, 7, 8, 9, 11). Si el 20 % es prosa sobre la historia del barrio, es relleno que delata plantilla.

## 5. Jerarquía de zonas, URLs y enlazado

**Tres niveles, no más** [RANKING]:
- Nivel 1 — servicio madre: la home en EMD mono-servicio (`cerrajero.uy/`) o `/cerrajero/` en multi-servicio. Apunta a la búsqueda implícita ("cerrajero") y a "cerrajero Montevideo". Enlaza a todos los departamentos y a las zonas principales.
- Nivel 2 — departamento/ciudad grande: `/montevideo/`, `/canelones/`, `/maldonado/`, `/caba/`. Agrupa; contiene secciones con ancla para localidades sin URL; enlaza a las que sí la tienen.
- Nivel 3 — barrio/localidad: `/pocitos/`, `/punta-ballena/`. Solo con datos. Enlaza a madre, departamento y 3–5 vecinos reales.

En un EMD mono-servicio los tres niveles pueden convivir en la raíz (`/montevideo/`, `/pocitos/`): la jerarquía la dan los breadcrumbs, los enlaces y el sitemap segmentado, no la cantidad de barras en la URL (Google mide profundidad de clics, no de carpetas). En un sitio multi-servicio se anida: `/cerrajero/montevideo/pocitos/` o `/cerrajero/pocitos/` con breadcrumb Inicio › Cerrajero › Montevideo › Pocitos.

**Anti-canibalización**: title/H1 de nivel 3 siempre con zona (+ subzonas); nunca compiten por "cerrajero" a secas ni por "cerrajero Montevideo": eso es de la madre. Si GSC muestra dos URLs alternando para la misma query, fusionar.

**URLs**:

| Estructura | Cuándo | Contras |
|---|---|---|
| `/zona/` en raíz | EMD mono-servicio (lo tuyo: `cerrajeromaldonado.com/punta-ballena/`) | No escala si después agregás otro servicio |
| `/servicio/zona/` | Sitio multi-servicio o marca (`webteveo` clientes) | `/cerrajero/` redundante si el dominio ya lo dice |
| `/servicio-zona/` plano | Evitar a escala | Sin jerarquía; 500 slugs en raíz; GSC sin carpetas |
| `/zona/servicio/` | No para negocios de servicios | Invierte la jerarquía; canibaliza la implícita |

Google (Mueller) dice que la keyword en URL es señal mínima: no reestructurar URLs que ya rankean.

**Enlazado interno** [RANKING]:
- Cada zona enlazada desde ≥ 3 páginas: madre, departamento, una vecina. Cero huérfanas (generar los enlaces el mismo día que se publica).
- Vecinos por geografía real (tabla `vecinos` de `zonas-rioplatenses.md`), 3–5 por página, anchors variados: "cerrajero en Buceo", "urgencias en Punta Carretas", "también llegamos a Parque Batlle".
- Enlaces en el cuerpo, no solo en menú/footer (reasonable surfer). Header ≤ 10 enlaces. **Sin mega-footer de barrios**: eso es "blocks of text that list cities" (keyword stuffing oficial). Índice completo en una página `/zonas/` (HTML sitemap) enlazada desde el footer.
- Servicio ↔ servicio solo cuando tiene sentido para el mismo cliente (cerrajería ↔ electricista de urgencia sí; cerrajería ↔ baños químicos no).
- Breadcrumb visible + `BreadcrumbList` idéntico.
- 10–20 enlaces internos en el cuerpo por página de zona; objetivo 10–40 entrantes para las importantes (Zyppy).
- Profundidad ≤ 3 clics desde la home. Auditoría mensual: profundidad, entrantes ≥ 3, huérfanas, ≥ 3 variantes de anchor por destino.

## 6. Indexación

- Sitemaps segmentados por tipo (`sitemap-servicios.xml`, `sitemap-zonas-montevideo.xml`, `sitemap-zonas-canelones.xml`…) + `sitemap-index.xml` [TRÁMITE]. `lastmod` real por página (fecha guardada al editar, nunca `date('c')` en cada request); `priority`/`changefreq` se ignoran.
- Enlazado interno + sitemap es el mecanismo. "Solicitar indexación" en GSC solo para 5–10 URLs clave al lanzar.
- **No usar la Indexing API** para páginas de servicio: la doc (jul-2026) la limita a JobPosting/BroadcastEvent; Mueller (may-2025) avisó que persiguen el abuso; acceso revocable. Envolver LocalBusiness en un JobPosting falso viola además la política de datos estructurados.
- IndexNow (20 líneas de PHP) para Bing/Copilot/ChatGPT [TRÁMITE][GEO].
- Diagnóstico: "Discovered – not indexed" = pocos enlaces / prioridad baja; "Crawled – not indexed" = calidad/duplicación. Crawl budget no aplica a < 10k URLs.

## 7. Service area business sin local en la zona

- Orgánico: sí rankean las páginas de localidades con SERP propia (SEL 2024, Whitespark, tu caso de Maldonado).
- Local pack: manda la proximidad al pin de la ficha; las páginas de zona no meten la ficha en el pack de un barrio a 20 km. Ocultar la dirección correlaciona negativamente (Sterling Sky 2025); el área declarada no es señal.
- Lenguaje honesto: "atendemos Pocitos desde nuestra base en Cordón en 15–25 minutos"; nunca "nuestra cerrajería en Pocitos" si no existe. Sin direcciones inventadas ni oficinas virtuales (suspensión + no pasa el video).
- Rank and rent: el pack se juega con la ficha del operador real; el orgánico con las páginas de zona. Son dos activos distintos (ver `eeat-servicios.md`).
