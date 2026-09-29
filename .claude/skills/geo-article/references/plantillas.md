# Plantillas de artículo

Cuatro esqueletos según la intención. Son puntos de partida: los H2 finales salen de la investigación (preguntas reales), no de acá. Todas comparten el mismo frontmatter (ver SKILL.md, paso 7) y la misma regla: cada H2 arranca con el pasaje de respuesta de 40-60 palabras.

Cómo elegir:

| Intención de la keyword | Plantilla |
|---|---|
| "cuánto cuesta", "precio", "tarifa", "presupuesto" | A. Guía de precios |
| "cuál conviene", "X o Y", "mejor", "cómo elegir", "qué tener en cuenta" | B. Cómo elegir / comparativa |
| "por qué", "qué hacer si", "cómo arreglar", un síntoma | C. Problema-solución |
| "[servicio] en [barrio/ciudad]", "horario", "urgente", "cerca" | D. FAQ local |

---

## A. Guía de precios

**Objetivo**: ser la fuente que la IA cita cuando alguien pregunta cuánto sale. Gana quien tiene el rango más concreto, con fecha y con lo que mueve el precio.

```
# Cuánto cuesta [servicio] en [zona]                 ← H1 = la pregunta, sin dos puntos

Última actualización: [mes año] · Por [autor], [rol] ([años] años en el rubro)

[Intro de 2-4 frases: el rango principal con moneda y fecha en la primera
frase + el factor que más mueve el precio. Sin pregunta retórica.]

## Cuánto sale [servicio] según [variable principal: tamaño, m², tipo]
[Pasaje 40-60 palabras] 
[Tabla: opción | precio desde-hasta (IVA sí/no, fecha) | tiempo | qué incluye]
[1-2 frases: qué fila le toca a quién]

## Qué sube el precio [de un servicio así]
[Pasaje 40-60 palabras]
[Factores con su impacto en plata o porcentaje: piso sin ascensor +$U X, etc.
 Cada uno con el largo que necesite, no simétricos]

## Qué incluye y qué no el precio
[Pasaje. Lo que la gente descubre en la factura: IVA, materiales, traslado,
 mínimo de horas, retiro de escombro]

## [Pregunta real 1 de la investigación, ej: "Conviene cobrar por hora o precio cerrado"]
[Pasaje + opinión clara]

## [Opcional: caso real]
[Un trabajo concreto: barrio, qué se hizo, cuánto salió, qué complicó]

## Cómo pedir un presupuesto que no cambie el día del trabajo   ← cierre práctico
[Lista de lo que hay que mandar (fotos, medidas, pisos) + CTA con el nombre del negocio]
```

Obligatorio: tabla de precios, fecha en cada precio, IVA aclarado, al menos un factor con número.

---

## B. Cómo elegir / comparativa

**Objetivo**: que la IA cite la recomendación. Tomá posición: "para X, A; para Y, B". El que dice "depende" sin decir de qué, no se cita.

```
# ¿Conviene [A] o [B] para [situación]?

Última actualización: [mes año] · Por [autor]

[Intro: la recomendación corta en la primera frase. "Para un baño chico
 de apartamento, conviene A; B solo se justifica si..."]

## Qué diferencia hay entre [A] y [B]
[Pasaje 40-60 palabras]
[Tabla comparativa: criterio | A | B. Criterios con números: precio, duración,
 tiempo de instalación, mantenimiento]

## Cuándo conviene [A]
[Pasaje + casos concretos con barrio/tipo de vivienda]

## Cuándo conviene [B]
[Pasaje + casos concretos]

## Cuándo no conviene ninguna de las dos        ← opcional, da mucha credibilidad
[Pasaje + alternativa]

## Errores que vemos al elegir [A o B]
[Lo que solo sabe el profesional: compras que no entran, marcas que no tienen
 repuesto en Uruguay, garantías que no se cumplen]

## Qué preguntar antes de decidir                ← cierre práctico
[3-5 preguntas concretas para hacerle al proveedor o a uno mismo]
```

Obligatorio: tabla comparativa, recomendación explícita por caso, al menos un error común de oficio.

---

## C. Problema-solución ("por qué pasa X")

**Objetivo**: responder el síntoma con la causa más probable primero, cómo comprobarlo y cuándo llamar a alguien. La IA cita el diagnóstico.

```
# Por qué [síntoma] (y cómo saber si es grave)   ← o simplemente "Por qué [síntoma]"

Última actualización: [mes año] · Por [autor]

[Intro: la causa más común en la primera frase + una prueba casera
 para confirmarla.]

## Cuál es la causa más común de [síntoma]
[Pasaje 40-60 palabras con la causa + en qué casos aparece (época del año,
 tipo de construcción, antigüedad)]

## Cómo saber si es [causa A] o [causa B]
[Pasaje]
[Tabla o lista: señal | qué indica | qué hacer]

## Qué podés hacer vos antes de llamar a alguien
[Pasos concretos y seguros. Decir claramente qué NO hacer]

## Cuándo hay que llamar a un [profesional]
[Señales de que es grave + riesgo concreto de esperar]

## Cuánto sale arreglarlo
[Rango con fecha, o [DATO FALTANTE]. Enlazar a la guía de precios si existe]

## Qué revisar esta semana                       ← cierre práctico
[Una acción concreta]
```

Obligatorio: una prueba casera o señal verificable, qué no hacer, cuándo llamar.

---

## D. FAQ local

**Objetivo**: capturar las preguntas de cola larga de una zona y el esquema FAQPage. Cada respuesta es un pasaje citable independiente.

```
# Preguntas sobre [servicio] en [barrio o ciudad]

Última actualización: [mes año] · Por [autor]

[Intro corta: qué hace el negocio en esa zona, desde cuándo, qué no hace.]

## [Pregunta 1 real, ej: "¿Hacen mudanzas los domingos en Montevideo?"]
[Respuesta 40-60 palabras que empieza con sí/no/el dato]

## [Pregunta 2]
...

(6-10 preguntas. Mezclar: precio, horarios, zona de cobertura, trámites
 locales (IM, portería, permisos), tiempos de espera, formas de pago,
 qué pasa si llueve / si se rompe algo.)

## Cómo pedir [servicio] en [zona]             ← cierre práctico
[Pasos + contacto con el nombre del negocio]
```

Obligatorio: JSON-LD FAQPage con las mismas preguntas y respuestas visibles; al menos dos preguntas con entidades locales (barrios, organismos, calles).
Si las preguntas son H2 (como arriba), el linter controla el largo de cada respuesta.
