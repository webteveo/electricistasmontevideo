# Topical map para un nicho de servicio local — método y ejemplo completo (cerrajería)

Etiquetas: [RANKING] · [CONVERSIÓN] · [TRÁMITE] · [GEO]. Base: framework de Koray Gübür traducido a sitios de 50–200 páginas; evidencia en `investigacion-2026.md` bloque C.

## 1. Por qué un mapa y no una lista de keywords

Google evalúa el sitio entero (siteFocusScore/siteRadius en el leak, "primary purpose or focus" en la guía oficial) y AI Mode descompone cada pregunta en ~10 sub-consultas (query fan-out). Un sitio que cubre todos los atributos de su entidad central con pocas páginas bien diferenciadas gana en ambos frentes. Koray (SEL, jul-2026) fusionó páginas servicio+zona innecesarias y ganó 232 queries nuevas: **cobertura de contextos, no de URLs**.

## 2. Método paso a paso (2–3 horas por nicho)

1. **Source Context** (una frase): "Empresa de [oficio] que vende [servicios] en [departamento/provincia] a [hogares/comercios], con [urgencias 24 hs / presupuesto por WhatsApp]." Todo lo que no ayude a vender eso queda afuera.
2. **Central Entity**: el oficio (cerrajería), no la marca. Atraviesa H1, URL, breadcrumbs, schema y anchors.
3. **Central Search Intent**: "contratar [oficio] hoy en mi zona". Cada página se evalúa contra eso.
4. **Atributos de la entidad (EAV)**: listar 12–20 atributos y darles **valor concreto** en el negocio (tipo de trabajo, objeto, marca, método, tiempo de llegada, precio, garantía, horario, forma de pago, matrícula, zona, urgencia). Fuente: proceso de vocabulario en `entidades-y-schema.md` §5 + operador.
5. **Query templates**: "[oficio] [zona]", "[subservicio] [zona]", "[oficio] 24 horas [ciudad]", "cuánto cuesta [subservicio]", "[problema] qué hacer", "[objeto] [marca] [acción]", "[subservicio] vs [alternativa]". Cubrir todas las variaciones de cada plantilla.
6. **Core section** (monetiza): home/servicio madre, troncales de subservicio, servicio × zona. **Outer section** (soporte): precios, problemas del cliente, comparativas, marcas, cómo elegir, normativa, "quién te atiende", hub de zonas. Proporción 70/30 a 80/20.
7. **Un macro-contexto por página**; los micro-contextos (H2) son sub-preguntas del mismo tema, en el orden del cliente: problema → servicio → zona/tiempo → precio → garantía → FAQ. Nunca arrancar por "quiénes somos".
8. **Contextual bridges**: cada enlace interno va dentro de una oración que comparte contexto con el destino, con anchor de entidad + atributo ("cambio de cerradura multipunto en Montevideo"). Soporte → core siempre; core → soporte solo 1–2 (no fugar al usuario en urgencia); zona ↔ zonas vecinas reales.
9. **Dimensionar**: servicio-genérico × zona para todas las zonas con demanda y datos (40–80); subservicio × zona solo para 2–3 subservicios top en 3–5 zonas top (15–25); subservicios sin zona (6–10); soporte (20–40); entidad (Sobre nosotros, Zonas, Precios). Total realista 100–160 páginas diferenciadas.
10. **KPI**: en GSC agrupar queries por plantilla y contar **queries nuevas por mes** (el KPI de Koray) además de posiciones; en GBP, "consultas usadas para encontrarte".

## 3. Ejemplo completo: cerrajería en Montevideo (EMD `cerrajero.uy`)

**Source Context**: "Cerrajero.uy: cerrajeros que hacen apertura, cambio e instalación de cerraduras en Montevideo y Canelones, urgencias 24 hs, presupuesto por WhatsApp antes de salir."
**Central Entity**: cerrajería. **Central Search Intent**: contratar un cerrajero ya, en mi zona.

**Atributos (EAV)** con valor: tipo de servicio (apertura / cambio / instalación / duplicado / automotriz / cajas fuertes / urgencia) · objeto (puerta, portón, reja, auto, candado, persiana, caja fuerte) · tipo de cerradura (embutir, cilindro europeo, multipunto, electrónica, cerrojo, tranca) · marca (Yale, Cisa, Mul-T-Lock, Prive, Kwikset, Papaiz) · método (apertura sin daño, ganzúa, bumping, taladro) · tiempo de llegada (20–45 min según zona) · precio (apertura desde $U 1.800; cambio desde $U 2.500 + cerradura; nocturno +30 %) · garantía (6 meses en instalación) · horario (24 hs) · pago (efectivo, transferencia, tarjeta) · zona (barrios de Montevideo, Ciudad de la Costa, Las Piedras) · registro (RUT, BPS; seguro).

| Nodo | Atributos que procesa | Tipo | Intención | URL |
|---|---|---|---|---|
| Cerrajería (central) | todos, resumen; Source Context | Core / home | comercial-local | `/` |
| Cerrajero en {zona} | zona, tiempo, subservicios disponibles, precio, reseñas de la zona | Core: servicio × zona | transaccional local | `/pocitos/`, `/carrasco/`, `/ciudad-de-la-costa/`, `/las-piedras/`… |
| Cerrajero en Canelones (madre) | localidades sin URL como secciones | Core hub | transaccional local | `/canelones/` |
| Apertura de puertas | método, tiempo, precio, urgencia, tipo de puerta | Core: subservicio | transaccional | `/apertura-de-puertas/` |
| Apertura de puertas en {zona top} | zona + anteriores | Core: subservicio × zona (solo 3–5 zonas) | transaccional local | `/apertura-de-puertas/centro/` |
| Cambio de cerradura | tipo, marca, precio, garantía, tiempo de trabajo | Core: subservicio | transaccional | `/cambio-de-cerradura/` |
| Cerraduras de seguridad / multipunto | grado, marcas, precio, instalación, comparación | Core con soporte comparativo | comercial-investigación | `/cerraduras-de-seguridad/` |
| Duplicado de llaves | tipo de llave (plana, de puntos, codificada, con chip), precio, tiempo | Core: subservicio | transaccional | `/duplicado-de-llaves/` |
| Cerrajería automotriz | marca de auto, llave con chip, apertura, precio | Core: subservicio | transaccional | `/cerrajeria-automotriz/` |
| Cajas fuertes | apertura, cambio de clave, instalación | Core: subservicio | transaccional | `/cajas-fuertes/` |
| Cerrajero 24 horas | horario, feriados, recargo, zonas, tiempo | Core: subservicio de alta demanda | transaccional urgente | `/cerrajero-24-horas/` |
| Precios de cerrajería en Montevideo | rangos por servicio, factores, recargos, fecha | Outer: precio | informativa-comercial | `/precios/` |
| ¿Cuánto cuesta abrir una puerta? | precio, factores, cuándo conviene cambiar la cerradura | Outer: pregunta | informativa | `/blog/cuanto-cuesta-abrir-una-puerta/` |
| Me quedé afuera de casa: qué hacer | pasos, a quién llamar, qué no hacer | Outer: problema | pre-transaccional | `/blog/me-quede-afuera-de-casa/` |
| Cerradura trabada / llave que no gira | causas, solución, cuándo llamar | Outer: problema | informativa | `/blog/cerradura-trabada/` |
| Perdí las llaves: ¿cambio de cerradura o de combinación? | riesgo, costo, opciones | Outer: decisión | informativa | `/blog/perdi-las-llaves/` |
| Cilindro europeo vs multipunto | seguridad, precio, instalación | Outer: comparación | comercial-investigación | `/blog/cilindro-europeo-vs-multipunto/` |
| Cerradura electrónica vs mecánica | precio, pilas, seguridad, marcas | Outer: comparación | comercial-investigación | `/blog/cerradura-electronica-vs-mecanica/` |
| Marcas de cerraduras en Uruguay | marca → modelos, dónde se consiguen, precio | Outer: atributo marca | informativa | `/blog/marcas-de-cerraduras/` |
| Cómo elegir un cerrajero confiable | RUT, presupuesto previo, garantía, señales de estafa | Outer: confianza | informativa | `/blog/como-elegir-cerrajero/` |
| Bumping y ganzúa: cómo protegerse | método, cerraduras antibumping | Outer: seguridad | informativa | `/blog/bumping/` |
| Quién te atiende (Entity Home) | nombre, RUT, matrícula, equipo, zonas, sameAs | Entidad | navegacional | `/quienes-somos/` |
| Zonas que cubrimos | índice de barrios y localidades con enlace | Hub HTML sitemap | navegacional | `/zonas/` |
| Preguntas frecuentes | mix de atributos | Outer/Core | informativa | `/preguntas-frecuentes/` |

**Qué va en cada tipo**
- Transaccional (servicio × zona): H1 servicio + zona + promesa; párrafo answer-first; subservicios con enlace a troncales; datos que solo un local sabe (calles, edificios, cerraduras frecuentes, tiempo desde la base); precio orientativo; reseñas de la zona; FAQ corta local; CTA. Sin teoría.
- Soporte: H2 en pregunta, respuesta extractiva de 40–70 palabras arriba y después desarrollo; entidades con valores (marcas, tipos, precios con fecha); termina con puente a la transaccional ("Si estás en Montevideo, ver precios y tiempos de cambio de cerradura en tu zona →").
- Puentes: soporte → core siempre; core → soporte 1–2; zona ↔ 3–5 vecinas reales; breadcrumbs Inicio › Servicio › Zona.

**Dimensionado del ejemplo**: home 1 + subservicios 7 + servicio × zona 45 (20 barrios de Montevideo + 15 localidades de Canelones + 10 de Maldonado si se atienden) + subservicio × zona 12 (apertura y cambio en 6 zonas top) + soporte 12 + entidad/hub 3 = **~80 páginas**. Cada una diferenciada. Las 60 localidades chicas restantes viven como secciones en `/canelones/` y `/maldonado/` hasta mostrar demanda.

## 4. Adaptar a otros nichos (plantilla rápida)

| Nicho | Entidad central | Subservicios core | Soporte que la IA cita |
|---|---|---|---|
| Mudanzas | mudanza / flete | departamentos, casas, oficinas, interdepartamental, guardamuebles, embalaje | precio por ambiente con fecha, checklist de mudanza, permisos de estacionamiento (CABA), qué no se puede transportar |
| Electricista | instalación eléctrica | urgencias, tableros, trámite UTE/edesur, instalaciones nuevas, iluminación, puesta a tierra | requisitos UTE / matrícula COPIME, cuánto cuesta un tablero, señales de riesgo |
| Aire acondicionado | climatización | instalación split, service/limpieza, carga de gas, reparación, cañería | precio de instalación con fecha, frigorías por m², cuándo conviene inverter |
| Impermeabilización | impermeabilización de techos | membrana, azoteas, tanques, paredes, humedad de cimientos | precio por m² con fecha, membrana vs pintura, garantía |
| Casas contenedores / modulares | vivienda modular | modelos por m², llave en mano, ampliaciones, oficinas | precio por m² UYU/ARS con fecha, permisos municipales, plazos, financiación |
| Auxilio mecánico | auxilio / grúa | remolque, batería, cubierta, combustible, apertura de auto | tarifa por km con fecha, qué hacer si el auto no arranca |
| Baños químicos | alquiler de baños químicos | eventos, obras, mantenimiento, discapacidad | precio por día/semana, cuántos por cantidad de personas, normativa |
| Steel framing / galpones | construcción en seco / tinglados | vivienda, ampliación, galpón, oficina | precio por m² con fecha, tiempos de obra, comparativa con tradicional |
