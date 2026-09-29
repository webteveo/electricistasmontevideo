# GEO: estructura para que las IAs citen el artículo

Los motores de respuesta (AI Overviews, AI Mode, ChatGPT, Perplexity, Gemini) no citan artículos enteros: citan pasajes. Recuperan un trozo de 40 a 150 palabras que responde una pregunta concreta y lo usan como fuente. El trabajo es que cada sección tenga un trozo así, que se entienda solo y que tenga un dato que valga la pena citar.

Las mismas reglas ayudan a rankear en Google: responden la intención rápido, cubren las preguntas relacionadas y muestran experiencia (E-E-A-T).

## 1. Pasaje citable al inicio de cada H2

Cada H2 arranca con un párrafo de **40 a 60 palabras** que:

- responde la pregunta del H2 sin necesitar nada de lo anterior;
- nombra el sujeto completo ("una mudanza de dos dormitorios en Montevideo", no "esto");
- tiene al menos un dato concreto (precio, tiempo, medida, cantidad);
- no arranca con conectores que dependen del contexto: "Esto", "Lo anterior", "Como dijimos", "Además", "Por otro lado", "Por eso".

Después del pasaje, el desarrollo: matices, tabla, caso, advertencias.

> Mal: "Esto depende de varios factores que veremos a continuación."
>
> Bien: "Una mudanza de un apartamento de dos dormitorios dentro de Montevideo lleva entre 3 y 5 horas con un camión de 5 metros y dos peones. Lo que más la alarga es un edificio sin ascensor o un ascensor chico donde los muebles grandes no entran parados."

El linter mide el largo de este párrafo (alerta baja fuera de 40-60, media fuera de 25-90) y marca los arranques dependientes.

## 2. H2 como preguntas reales

Los H2 salen de lo que la gente pregunta, no de un índice de manual. Fuentes: "Otras preguntas de los usuarios" de Google, autocompletado, las preguntas que le hacen al profesional por WhatsApp, foros y grupos de Facebook del barrio. Redactalas como las escribiría alguien: "¿Cuánto se le deja de propina a los peones?" antes que "Consideraciones sobre propinas".

No todos los H2 tienen que ser pregunta. Una tabla de precios puede ir bajo "Precios por tamaño de mudanza", pero igual arranca con el pasaje de respuesta.

## 3. Datos concretos con fecha

Una IA cita números, no generalidades. Cada artículo tiene que tener:

- **Precios en moneda local** ($U, $ argentinos, USD cuando el rubro cotiza en dólares) como rango y con fecha: "entre $U 8.000 y $U 12.000, a setiembre de 2026".
- **Tiempos**: horas de trabajo, días de espera, vida útil.
- **Medidas y cantidades**: metros, litros, kilos, cantidad de peones, cantidad de cajas.
- **Condiciones**: IVA incluido o no, mínimo de horas, recargo por piso.

Si el dato viene del profesional (ficha del sitio o lo que dio en la entrevista), va sin fuente externa: es experiencia propia. Si viene de afuera (INE, BCU, IM, INDEC, un organismo), va con enlace a la fuente real. Si no está, `[DATO FALTANTE: ...]`. Nunca inventar.

## 4. Pasajes autocontenidos

Cada párrafo que pueda ser citado debe poder leerse fuera del artículo. Reglas prácticas:

- Repetí el sustantivo en vez del pronombre al inicio de sección o de párrafo clave.
- No uses "como dijimos antes", "lo anterior", "en la sección de arriba".
- Si una tabla necesita contexto, ponelo en la frase previa, no dos secciones atrás.

## 5. Tablas para comparar

Si hay dos o más opciones con atributos comparables (precios por tamaño, materiales, tipos de servicio), va en tabla. Las IAs extraen tablas bien y Google las usa en fragmentos destacados.

- Encabezados claros con unidad: "Precio (con IVA, set. 2026)".
- Máximo 5-6 columnas. Si hay más, partí en dos tablas.
- Antes de la tabla, el pasaje de respuesta. Después, una o dos frases sobre qué fila le conviene a quién.

## 6. Entidades explícitas y consistentes

Las IAs asocian marca con tema cuando la misma combinación aparece varias veces y de la misma forma.

- **Nombre del negocio** tal cual está en la ficha (y en Google Business Profile). Siempre igual.
- **Zona**: ciudad + barrios reales. "Montevideo" y barrios concretos (Pocitos, Cordón, Malvín), no "la capital".
- **Servicio** con el mismo nombre que la página de servicio del sitio.
- **Entidades locales** cuando aportan: organismos (IM, UTE, OSE, BPS, DGI en UY; AFIP/ARCA, AySA, Edesur, GCBA en AR), normativas, marcas de materiales, tipos de edificio.

Mencioná el negocio dos o tres veces en el cuerpo con naturalidad (en un caso, en el paso práctico final), no en cada párrafo.

## 7. Autor y actualización visibles

- Autor con nombre, rol y años en el rubro (de la ficha). Una línea al principio o al final: "Escrito por Juan Pérez, 12 años haciendo mudanzas en Montevideo."
- "Última actualización: <mes año>" visible arriba, además del frontmatter.
- JSON-LD `Article` con `author` (Person), `datePublished`, `dateModified`, `publisher`. `FAQPage` solo si hay una sección de preguntas frecuentes con pregunta y respuesta visibles en la página.

## 8. Largo según la pregunta

No hay un largo objetivo. Una pregunta de precio bien respondida puede tener 900 palabras; una comparativa de materiales, 2000. Cortar todo lo que:

- repite algo ya dicho;
- es cierto para cualquier ciudad y cualquier empresa;
- explica lo obvio ("una mudanza consiste en trasladar pertenencias").

Si la sección no tiene un dato ni una opinión, no tiene que existir.

## 9. Checklist GEO antes de entregar

- [ ] Cada H2 arranca con 40-60 palabras que responden solas.
- [ ] Hay al menos un número con fecha por H2 (o `[DATO FALTANTE]`).
- [ ] Hay una tabla si se comparan opciones o precios.
- [ ] Negocio, zona y servicio aparecen con el mismo nombre de la ficha.
- [ ] Autor y "última actualización" visibles.
- [ ] Datos externos con enlace a la fuente real.
- [ ] JSON-LD Article (y FAQPage si corresponde) en el frontmatter.
- [ ] Enlaces internos sugeridos a servicio y zona.
