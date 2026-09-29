# Fórmulas on-page — title, meta, H1/H2/H3, URL, alt, primer párrafo, anchors

Etiquetas: [RANKING] · [CONVERSIÓN] · [TRÁMITE] · [GEO]. Evidencia: `investigacion-2026.md` bloque E.

## 1. Reglas de base

- **Un solo `<h1>`**, el texto más grande, primero en el DOM visible, semánticamente igual al title (misma keyword + zona; el H1 puede sumar la promesa). Google acepta varios H1, pero la doc de title links pide un "main title" en el primer h1 visible y Zyppy mostró que H1 = title reduce reescrituras. [RANKING]
- **Asumir reescritura**: 61–76 % de titles y 63–71 % de descriptions se reescriben. Lo que importa va en los **primeros 30 caracteres del title** y los **primeros 120 de la description**. Marca al final o sin marca (Google la quita en 63 % de las reescrituras). [RANKING]
- **Largos**: title 45–58 caracteres (≤ 580 px desktop, ~496 px móvil); description 120–150 con la propuesta concreta y "por WhatsApp" dentro de los primeros 120; H1 ≤ 70; URL ≤ 3 niveles sin stopwords; alt 8–15 palabras. [TRÁMITE]
- **"24 hs" solo si es verdad**: un recargo nocturno no significa atención 24 horas. Si el operador no confirma madrugada, el gancho es tiempo de llegada o precio ("Cerrajero en Pocitos – Llegamos en 15-25 min desde Cordón"). Prometer 24 hs y no cumplir = badClicks + reseñas negativas. [RANKING][CONVERSIÓN]
- **Sin boilerplate titles**: la doc de Google lo nombra ("long text that varies by only a single piece of information"). Cada title de zona lleva un gancho propio (tiempo de llegada, subzonas, precio) además del topónimo. [RANKING]
- **Sin listas de ciudades** en title, cuerpo o footer (keyword stuffing oficial). Sin emojis en title (SearchPilot: Google borró emoji y keyword). Sin teléfono en description (mata el clic y la medición de `click_wsp`). Precio "desde" sí. CTA "por WhatsApp" sí, dentro de los primeros 120 caracteres. [CONVERSIÓN]
- **Title y hero prometen lo mismo** (NavBoost: goodClicks vs badClicks). "Llegamos en 20 min" en el title exige un hero que lo repita y un negocio que lo cumpla. [RANKING]
- **Separador**: guion (–) o dos puntos; el pipe se reescribe más. [TRÁMITE]
- **"Cerca de mí"** nunca en title/H1 (Google lo resuelve por ubicación); a lo sumo una frase natural en el cuerpo. Gentilicios (montevideano, porteño) no se buscan; barrio + ciudad sí. [RANKING]
- **Anchors internos**: descriptivos y variados; exact match ocasional sin miedo (Illyes 2020, Mueller 2025); prohibido el bloque de 40 anchors "cerrajero + barrio". [RANKING]

## 2. Dónde va cada cosa

| Elemento | Va | No va |
|---|---|---|
| `<title>` | Keyword + zona al inicio; 1 gancho; marca corta al final o nada | Sinónimos en lista; keyword repetida; 3 barrios |
| `<h1>` | Misma keyword + zona en frase natural + promesa | H1 distinto al title |
| URL | `/pocitos/` o `/cerrajero/pocitos/` | `/servicios/cerrajeria-urgente-24-horas-pocitos-montevideo/` |
| Primer párrafo (≤ 70 palabras) | Servicio + zona + tiempo + desde dónde + precio desde + CTA; un dato que solo aplique a esa zona | "Somos una empresa líder…" |
| H2 | Variantes de intención y bloques locales: "Apertura de puertas en Pocitos", "Trabajos recientes en Pocitos", "Precios en Pocitos" | Repetir el H1 con otra preposición |
| H3 / FAQ | Long tail y jerga: "¿Cuánto cobra un cerrajero en Pocitos de noche?", "¿Llegan a Villa Biarritz?" | Preguntas sin respuesta real |
| Alt | Qué se ve + contexto: "Cerrajero abriendo puerta blindada en edificio de Pocitos" | "cerrajero pocitos cerrajería pocitos 24hs" |
| Anchors | 1 a la troncal, 1 a la madre, 3–5 a vecinos, 1–2 a soporte | Footer con barrios |
| Jerga local ("me quedé afuera", "llave adentro", "de madrugada", "24 hs", "a domicilio", "urgente") | H2/H3, cuerpo, FAQ, testimonios | Title |

## 3. Fórmulas por tipo de página

### (a) Home (marca + servicio + ciudad)

| Elemento | Fórmula | Ejemplo cerrajería Montevideo | Ejemplo mudanzas CABA |
|---|---|---|---|
| Title | `[Servicio] en [Ciudad] 24 hs – [Gancho] – [Marca]` | `Cerrajero en Montevideo 24 hs – Llegamos en 30 min – Llave Ya` | `Mudanzas en CABA – Presupuesto cerrado por WhatsApp – MudaFácil` |
| Description | `[Servicio] [mod.] en [Ciudad]: [2–3 zonas]. [Beneficio]. [Prueba]. Escribinos por WhatsApp.` | `Cerrajero 24 hs en Montevideo: Pocitos, Centro, Carrasco. Apertura sin romper la puerta, llegamos en 30 min. +500 aperturas. Escribinos por WhatsApp.` | `Mudanzas en CABA y GBA con embalaje incluido. Presupuesto cerrado en 10 min por WhatsApp, sin sorpresas. Camión propio y personal asegurado.` |
| H1 | `[Servicio] en [Ciudad] 24 hs: [promesa]` | `Cerrajero en Montevideo 24 hs: llegamos en 30 minutos` | `Mudanzas en CABA con presupuesto cerrado por WhatsApp` |
| H2 (orden) | Servicios · Zonas · Cómo trabajamos · Precios · Opiniones · FAQ · Contacto | | |
| H3 | Un H3 por troncal con anchor | `Apertura de puertas` → `/apertura-de-puertas/` | `Mudanzas de departamentos` |
| Primer párrafo | Qué + dónde + cuándo + tiempo + CTA (≤ 50 palabras) | `Somos cerrajeros en Montevideo con atención las 24 horas. Abrimos puertas sin romper la cerradura, cambiamos cerraduras y hacemos copias a domicilio. Llegamos en 30 minutos a Pocitos, Centro y Carrasco. Escribinos por WhatsApp y te pasamos el precio antes de salir.` | |
| Alt hero | `[Profesional] de [Marca] [acción] en [Ciudad]` | `Cerrajero de Llave Ya abriendo una puerta en Montevideo` | |

### (b) Troncal de servicio (servicio + ciudad)

| Elemento | Fórmula | Electricista Ciudad de la Costa | Yeso Caballito (CABA) |
|---|---|---|---|
| Title | `[Servicio específico] en [Ciudad] – [Gancho] – [Marca]` | `Electricista en Ciudad de la Costa 24 hs – Urgencias y UTE – Volt` | `Yesero en Caballito – Cielorrasos y molduras – Yeso Total` |
| Description | `[Servicio] en [Ciudad] para [2–3 problemas]. [Credencial]. [Tiempo]. Pedí precio por WhatsApp.` | `Electricista matriculado en Ciudad de la Costa: cortes de luz, tableros, trámites UTE. Urgencias 24 hs, llegamos en 40 min. Pedí presupuesto por WhatsApp.` | `Yesería en Caballito: cielorrasos, molduras, reparación de humedad. Presupuesto sin cargo en 24 hs, trabajos con garantía. Escribinos por WhatsApp.` |
| H1 | `[Servicio] en [Ciudad]: [promesa]` | `Electricista en Ciudad de la Costa: urgencias 24 hs y trámites UTE` | `Yesero en Caballito: cielorrasos, molduras y arreglos con garantía` |
| H2 | Qué hacemos · Cuándo llamarnos (síntomas) · Precios · Zonas · Proceso · Opiniones · FAQ | `Trabajos eléctricos que hacemos` / `Señales de que necesitás un electricista` / `Precios de electricista en Ciudad de la Costa` / `Barrios donde llegamos` | |
| H3 | Subservicios (futuras páginas) + una H3 por zona con anchor | `Cambio de tablero` / `Electricista en Solymar` → `/electricista/solymar/` | `Cielorraso de yeso` / `Yesero en Caballito Norte` |
| URL | `/[servicio]/` o `/[servicio]-[ciudad]/` si la ciudad no está en el dominio | `/electricista-ciudad-de-la-costa/` | `/yeso-caballito/` |
| Primer párrafo | Servicio + ciudad + 3 problemas + credencial + tiempo + CTA | `Si te quedaste sin luz o saltó la térmica en Ciudad de la Costa, somos electricistas matriculados con atención las 24 horas. Reparamos tableros, hacemos instalaciones nuevas y gestionamos trámites con UTE. Llegamos en 40 minutos a Solymar, Lagomar y El Pinar. Escribinos por WhatsApp.` | |

### (c) Servicio + zona (barrio / localidad)

| Elemento | Fórmula | Cerrajero Pocitos | Mudanzas Palermo (CABA) |
|---|---|---|---|
| Title (sin marca si no entra) | `[Servicio] en [Zona] 24 hs – [Gancho local]` | `Cerrajero en Pocitos 24 hs – Llegamos en 20 min` (47) | `Mudanzas en Palermo – Presupuesto por WhatsApp hoy` (49) |
| Description | `[Servicio] en [Zona], [Ciudad]. [Beneficio]. [Referencia local]. Escribinos por WhatsApp.` | `Cerrajero 24 hs en Pocitos, Montevideo. Apertura sin daños, cambio de cerraduras y llaves. A 20 min de la rambla y Bulevar España. Escribinos por WhatsApp.` | `Mudanzas en Palermo, CABA: Soho, Hollywood y Chico. Embalaje, flete y armado. Conocemos las restricciones de estacionamiento del barrio. Pedí precio por WhatsApp.` |
| H1 | `[Servicio] en [Zona]: [promesa local]` | `Cerrajero en Pocitos: llegamos en 20 minutos, las 24 horas` | `Mudanzas en Palermo con presupuesto cerrado por WhatsApp` |
| H2 (orden) | Servicios en la zona · Trabajos recientes en [Zona] · Opiniones de vecinos · Cómo llegamos · Precios en [Zona] · Cobertura y referencias · FAQ de [Zona] · Zonas cercanas | | |
| H3 | Subservicio + zona solo en 1–2 H3; resto sin zona | `Apertura de puertas en Pocitos` / `Cambio de cerraduras` / `Cerrajero de noche` | `Mudanzas de monoambientes` / `Mudanzas de oficinas en Palermo` |
| URL | `/pocitos/` (EMD) o `/cerrajero/pocitos/` | | `/mudanzas/palermo/` |
| Alt | Prueba local visible | `Cerrajero abriendo la puerta de un apartamento en Pocitos, Montevideo` | `Camión de mudanzas estacionado en Palermo Soho` |
| Primer párrafo | Algo que solo aplique a esa zona + tiempo desde la base + CTA | `Si te quedaste afuera en Pocitos, llegamos en 20 minutos: salimos desde Bulevar España y 26 de Marzo. Trabajamos con las cerraduras de embutir de los edificios de la rambla y con puertas blindadas. Abrimos sin romper y te pasamos el precio por WhatsApp antes de salir.` | `Hacemos mudanzas en Palermo todos los días. Conocemos los horarios de carga y descarga de Soho y Hollywood, los edificios sin ascensor de Palermo Viejo y los pasillos angostos de los PH. Presupuesto cerrado por WhatsApp en 10 minutos.` |
| Anchors | 1 troncal, 1 madre, 3–5 vecinos | `cerrajero en Punta Carretas`, `urgencias en Buceo`, `cerrajería en Montevideo` | `mudanzas en Villa Crespo`, `mudanzas en Belgrano` |

Más ejemplos de ganchos por nicho: aire acondicionado "instalación en el día", impermeabilización "garantía escrita 5 años", pérgolas "presupuesto con render en 48 hs", casas contenedores "entrega en 60 días, precio por m² con fecha", auxilio mecánico "grúa en 30 min", baños químicos "entrega y retiro incluidos", steel framing "obra seca sin escombros".

## 4. Orden de secciones (servicio + zona y troncal) con justificación

| # | Sección | Por qué ahí |
|---|---|---|
| 1 | Hero: H1, subtítulo con tiempo/precio desde, botón WhatsApp grande + llamar, línea de prueba, foto real | 57 % de la atención está en el primer viewport (NN/g); 29 % no scrollea (Chartbeat); contacto visible +54 % leads |
| 2 | Barra de confianza (años, trabajos, garantía, matrícula, sin cargo por visita) | Trust junto al CTA (Baymard) |
| 3 | Servicios en esta zona (H2 + H3 con anchor y precio desde) | Cubre intención comercial; alimenta enlazado |
| 4 | Prueba social local: trabajos recientes + reseñas con barrio + fotos | Quitar testimonios −35 %; conteo de reseñas +28–33 % |
| 5 | Cómo llegamos / proceso en 3–4 pasos | Fija expectativas → goodClicks; menos abandono |
| 6 | Precios orientativos (tabla, fecha) | "Cuánto cobra…" es la query informacional-comercial; tabla = citable |
| 7 | Zona y cobertura (subzonas, referencias, tipo de vivienda, problemas típicos, mapa) | Anti-boilerplate |
| 8 | FAQ local (H3 preguntas, 2–4 líneas) | Long tail; pasajes para AIO/AI Mode; sin rich result desde may-2026 |
| 9 | CTA final + WhatsApp sticky en móvil | Segundo CTA para el 71 % que scrollea |
| 10 | Zonas cercanas + troncal + madre | Enlazado sin footer-spam |

Nivel de lectura simple (frases cortas, sin jerga técnica): Unbounce 2024, 11,1 % vs 5,3 % de conversión. En la home, (3) son las troncales y (7) la lista de zonas con ≤ 10–15 anchors visibles y enlace a `/zonas/`.

## 5. Meta description: qué sube CTR

- Propuesta de valor concreta en los primeros 120 caracteres: "Presupuesto en 10 min por WhatsApp", "Llegamos en 20 min a Pocitos", "Desde $U 1.800".
- Precio "desde" solo si es real y estable (sube CTR cualificado, baja badClicks).
- Sin teléfono. Sin "¡Contactanos!" genérico. Símbolos (✓, ★ 4,8) solo en description y medidos 4 semanas en GSC; si Google los borra, sacarlos.

## 6. Rich results que quedan en 2026

Breadcrumb (desktop), LocalBusiness/Service (knowledge panel, coherencia NAP), site name, sitelinks orgánicos. FAQ y HowTo no rinden nada visual; estrellas propias inelegibles. La FAQ vale como contenido visible, no como schema.
