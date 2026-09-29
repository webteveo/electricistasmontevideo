---
name: geo-article
description: Escribe artículos de blog para sitios de servicios locales y rank and rent de Uruguay y Argentina, optimizados para que los citen AI Overviews, AI Mode, ChatGPT, Perplexity y Gemini y para rankear en Google, con redacción que suena a alguien del oficio y sin tics de IA. Usar cuando se pida "escribí un artículo", "post para el blog de tal sitio", "artículo sobre tal keyword", "contenido GEO", o se pase una keyword y la ficha de un sitio.
---

# geo-article

Fábrica de artículos para los blogs de los sitios de Webteveo. Cada artículo sale de una keyword, la ficha del sitio y la experiencia real del profesional. Nunca de lo que "suena bien".

Referencias (leelas en el paso indicado, no antes):

- `references/geo.md`: estructura para ser citado por IAs.
- `references/estilo-humano.md`: tics prohibidos y cómo escribir como una persona.
- `references/plantillas.md`: 4 esqueletos según la intención.
- `references/voz-por-sitio.md`: cómo aplicar la voz de la ficha.
- `scripts/check_ai_tells.py`: linter. `scripts/frases_prohibidas.txt`: lista editable.
- `assets/ficha-ejemplo.yaml`: formato de la ficha de sitio.

Todas estas rutas son relativas a la carpeta de esta skill, no al directorio de trabajo. La skill funciona en cualquier lado: Claude Code en cualquier carpeta, claude.ai o la app de escritorio.

## Regla dura: no inventar

PROHIBIDO inventar precios, estadísticas, porcentajes, testimonios, reseñas, casos, citas, años de experiencia, cantidad de trabajos o nombres de clientes. Un dato sale de uno de tres lugares:

1. la ficha del sitio;
2. lo que el usuario responde en el paso 2;
3. una fuente externa real, enlazada en el texto.

Si no está en ninguno, va `[DATO FALTANTE: qué falta exactamente]` y se sigue escribiendo. Un borrador con huecos marcados vale; uno con datos inventados no.

## Paso 1. Input

Necesitás tres cosas:

- **keyword principal** (ej: "cuánto cuesta una mudanza en Montevideo");
- **sitio**: su ficha. Buscala en este orden: `sites/<sitio>.yaml` en el directorio de trabajo (si existe), un archivo adjunto, o una ficha pegada en el chat o en la memoria/proyecto. El formato está en `assets/ficha-ejemplo.yaml`;
- **intención**: precio, comparativa, problema-solución o FAQ local. Si no la dicen, deducila de la keyword con la tabla de `references/plantillas.md` y decí cuál elegiste.

Si no hay ficha, **pará**. Pedila y listá los campos mínimos: nombre, dominio, país, zona, servicios con URL, voz, autor. Ofrecé armarla con el usuario a partir de `assets/ficha-ejemplo.yaml` (y guardala como `sites/<sitio>.yaml` si hay un directorio de trabajo con carpeta `sites/`). No arranques sin ficha.

## Paso 2. Input de experiencia

Antes de escribir, revisá qué trae la ficha en `precios` y `experiencia` y pedí lo que falte para esta keyword:

- precios reales con fecha (y si incluyen IVA);
- un caso o anécdota concreta (barrio, qué pasó, cuánto llevó, qué complicó);
- errores comunes que ve el profesional;
- algo que solo sabe alguien del rubro.

Si el usuario ya lo dio o dice "seguí con lo que hay", seguí. Si no, hacé **como máximo 3 preguntas**, concretas y fáciles de contestar por WhatsApp:

> 1. ¿Cuánto cobraste la última mudanza de 2 dormitorios dentro de Montevideo, y cuántas horas llevó?
> 2. ¿Qué es lo que más alarga una mudanza en tu experiencia?
> 3. ¿Los precios que pasás incluyen IVA?

No preguntes cosas genéricas ("¿qué querés destacar?"). Lo que no se conteste, queda como `[DATO FALTANTE]`.

## Paso 3. Investigar

Con búsqueda web:

1. Buscá la keyword y 2-3 variantes en formato pregunta ("cuánto sale...", "precio de... por hora", "qué incluye...").
2. De los primeros resultados anotá: qué responden, con qué números, de qué fecha, y qué fuentes usan.
3. Si podés ver respuestas de IA (AI Overview, Perplexity), anotá qué citan y de dónde.
4. Juntá preguntas reales: "Otras preguntas de los usuarios", autocompletado, foros.
5. Detectá **el hueco**: lo que nadie responde bien, lo que está desactualizado, lo que está mal o lo que solo se puede decir con experiencia (ej: "todos dan precio por hora pero nadie dice cuántas horas lleva cada tamaño"). Ese hueco es el ángulo.

Datos externos solo con fuente real y enlace. Precios de la competencia no se publican como propios: sirven para ubicar el rango y para comparar con los del cliente en el brief.

## Paso 4. Brief

Guardalo como `<slug>.brief.md` junto al artículo (ver dónde en el paso 7) y mostralo resumido antes de escribir (sin esperar aprobación salvo que el usuario lo haya pedido):

- **Ángulo**: el hueco del paso 3 en una frase.
- **Plantilla** elegida.
- **H2**: preguntas reales que hace la gente (5-8), en el orden en que las haría.
- **Pasajes citables**: para cada H2, el dato que va a tener el párrafo de respuesta (o qué `[DATO FALTANTE]`).
- **Entidades**: nombre del negocio, ciudad, barrios, organismos (IM, UTE, OSE, BPS / ARCA, AySA, GCBA), normativas, marcas.
- **Fuentes externas** con URL.
- **Enlaces internos** tomados de `paginas` en la ficha.

## Paso 5. Borrador

Leé ahora `references/geo.md`, `references/estilo-humano.md`, `references/voz-por-sitio.md` y la plantilla elegida. Escribí aplicando:

- **H1** = la pregunta o la keyword, natural, sin dos puntos.
- Debajo del H1: "Última actualización: <mes año> · Por <autor>, <experiencia>".
- **Intro** de 2-4 frases que arranca por la respuesta o un dato. Nada de contexto general.
- **Cada H2 arranca con 40-60 palabras** que responden solas, con sujeto completo y un dato.
- Tablas para comparar opciones o precios, con fecha y aclaración de IVA.
- Voz de la ficha: tratamiento, persona, tono, vocabulario local, opiniones.
- Al menos una opinión clara del profesional y un detalle de oficio de la ficha.
- Nombre del negocio 2-3 veces, natural. Barrios reales.
- **Cierre**: un paso práctico (qué medir, qué mandar, qué preguntar) + contacto. Nunca un resumen.
- Largo: lo que la pregunta necesita. Sin relleno.

## Paso 6. Edición humana + linter

1. Hacé la "pasada de edición humana" de `references/estilo-humano.md` (sección 5): primer párrafo de cada sección tapando el resto, adjetivos, tríadas, largo de párrafos, una opinión, un detalle de oficio, último párrafo.
2. Revisá a mano lo que el linter no ve: mezcla de voseo y tuteo, datos sin fuente, afirmaciones que no están en la ficha.
3. Corré:

   ```bash
   python3 <carpeta de esta skill>/scripts/check_ai_tells.py <ruta del artículo>.md
   ```

4. Corregí **todas las alertas altas** y volvé a correr hasta que salga con código 0. Las medias revisalas una por una: corregí o dejá anotado por qué quedan. Las bajas son orientativas.
5. Las alertas `dato-faltante` son medias en borrador. Antes de publicar se corre con `--final` y pasan a altas.

No corrijas una alerta cambiando la palabra por un sinónimo: reescribí la frase.

## Paso 7. Salida

Archivo `<slug>.md` (slug en minúsculas, sin tildes, con guiones, basado en la keyword). Dónde:

- si el directorio de trabajo tiene carpeta `articulos/`: `articulos/<sitio>/<slug>.md`;
- si no (claude.ai, app, otra carpeta): en la carpeta de salida disponible, y entregá el archivo al usuario.

```markdown
---
title: "..."                 # ≤ 60 caracteres, sin dos puntos
description: "..."           # ≤ 155 caracteres, con el dato principal al inicio
slug: ...
fecha: AAAA-MM-DD            # publicación
actualizado: AAAA-MM-DD
autor: "Nombre, rol"
sitio: <id>
keyword: "..."
keywords_secundarias: [...]
intencion: precio | comparativa | problema | faq-local
enlaces_internos:
  - {anchor: "...", url: /...}   # de `paginas` en la ficha; 2-4, servicio + zona
jsonld: |
  <script type="application/ld+json">
  { "@context": "https://schema.org", "@type": "Article", ... }
  </script>
  <script type="application/ld+json">
  { "@context": "https://schema.org", "@type": "FAQPage", ... }   # solo si hay FAQ visible
  </script>
---

# H1

Última actualización: ... · Por ...

...cuerpo...

<!--
DATOS FALTANTES (completar antes de publicar)
- [ ] L23: precio monoambiente con fecha
- [ ] ...
NOTAS DEL LINTER
- media ritmo-uniforme: ...
-->
```

JSON-LD `Article`: `headline` (= title), `description`, `datePublished`, `dateModified`, `author` (`Person` con `name` y `url` del perfil si existe), `publisher` (`Organization` con `name` = nombre de la ficha y `url` = dominio), `mainEntityOfPage` (URL final), `inLanguage` (`es-UY` o `es-AR`). `FAQPage` solo con preguntas y respuestas que están visibles en el cuerpo, con el mismo texto. Si un campo depende de un dato faltante, poné `[DATO FALTANTE]` también ahí.

El bloque final `<!-- DATOS FALTANTES -->` es la lista para el usuario: cada hueco con su línea y qué dato se necesita. El linter ignora los comentarios HTML, así que no duplica alertas.

## Paso 8. Entrega

Respondé en pocas líneas:

- ruta del artículo y del brief;
- ángulo elegido;
- resultado del linter (altas: 0, medias: N y cuáles quedaron a propósito);
- lista de `[DATO FALTANTE]` para completar;
- fuentes externas usadas.

## Tests del linter

```bash
python3 -m pytest <carpeta de esta skill>/scripts -q
```

Si agregás una regla al linter, agregá un test que la dispare y uno que no.
