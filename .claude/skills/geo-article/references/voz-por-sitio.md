# Voz por sitio

Cada sitio tiene su ficha en `sites/<sitio>.yaml`, con un bloque `voz`. La skill lo lee antes de escribir y lo respeta en todo el artículo. Si la ficha no define la voz, se usa el valor por defecto según el país (abajo) y se avisa en el resumen final.

## 1. Campos del bloque `voz`

```yaml
voz:
  tratamiento: voseo          # voseo | tuteo | usted | neutro
  persona: nosotros           # nosotros (empresa) | yo (profesional solo)
  tono: directo               # directo | cercano | técnico
  registro: informal-cuidado  # informal-cuidado | formal
  vocabulario_local:          # palabras que SÍ se usan en el rubro y la zona
    - flete
    - peón
  evitar:                     # palabras que el dueño no quiere ver
    - "económico"             # (ej: prefiere "barato" o dar el número)
  opiniones:                  # posiciones del profesional para usar en el texto
    - "No recomendamos embalar vajilla en cajas de supermercado."
  muletillas_propias: []      # expresiones reales del dueño (opcional)
```

## 2. Tratamiento

| Tratamiento | Cuándo | Ejemplo |
|---|---|---|
| **voseo** | Default para sitios de UY y AR. Es como habla el cliente | "Si tenés ascensor, avisá al portero." |
| **tuteo** | Casi nunca en el Río de la Plata; suena a traducción o a España | "Si tienes ascensor, avisa al portero." |
| **usted** | Rubros formales o clientes mayores (escribanías, geriátricos, algunos servicios fúnebres) | "Si tiene ascensor, avise al portero." |
| **neutro** | Sitios que apuntan a varios países o a empresas | "Con ascensor, hay que avisar al portero." (impersonal, sin segunda persona) |

Reglas del voseo que la IA suele romper:

- Imperativo: "medí", "fijate", "avisá", "pedí", "mandá" (no "mide", "fíjate").
- Presente: "tenés", "podés", "querés", "sabés" (no "tienes").
- Subjuntivo: en Uruguay y Argentina se usa la forma tuteante en casi todo registro escrito: "cuando tengas", "si querés que te pasemos" (no "cuando tengás", que suena forzado).
- No mezclar: ni un "tú" ni un "tienes" en un texto con voseo. El linter no lo detecta; revisalo a mano.

## 3. Persona

- **nosotros**: empresa con equipo. "Hacemos mudanzas desde 2015."
- **yo**: profesional independiente. Tiene más fuerza para E-E-A-T porque la experiencia es de una persona con nombre: "En 12 años instalando calefones vi pocas cosas tan comunes como..."

La persona debe coincidir con `autor` en la ficha. Si el autor es una persona y el negocio es "nosotros", las anécdotas van en primera persona citada: "Juan, que maneja el camión desde 2016, dice que..."

## 4. Tono

- **directo**: frases cortas, opinión clara, sin adornos. Default para oficios.
- **cercano**: algo más de conversación, algún chiste suave. Para servicios a familias (mudanzas, limpieza, jardinería).
- **técnico**: más precisión, normativa, medidas. Para electricistas, sanitarios, impermeabilización, cuando el lector es otro profesional o un administrador de edificio.

Ninguno de los tres es entusiasta. El entusiasmo de folleto está prohibido en todos (ver estilo-humano.md).

## 5. Vocabulario local

La IA tiende a un español neutro de manual. El vocabulario local es lo que hace que el texto suene del lugar y que las IAs asocien el negocio con la zona.

**Uruguay**

- Organismos y servicios: UTE (luz), OSE (agua), Antel, BPS, DGI, la IM o la Intendencia (Montevideo), Intendencia de Canelones, BHU, MVOT.
- Construcción y hogar: barraca (no "corralón"), portland, bloque, membrana, calefón, garrafa, tanque de agua, azotea, gotera, humedad, pretil, planchada, portero (del edificio), gastos comunes.
- Mudanzas y fletes: flete, fletero, peón, camión cerrado, zorra, mudanza al interior.
- Barrios de Montevideo: Pocitos, Punta Carretas, Cordón, Centro, Ciudad Vieja, Parque Rodó, Buceo, Malvín, Carrasco, Prado, La Blanqueada, Tres Cruces, Unión, Cerro, Sayago, Colón. Costa de Oro y Ciudad de la Costa en Canelones.
- Moneda: $U o "pesos". Muchos rubros cotizan en USD (alquileres, obras grandes): aclararlo.
- Fechas: "setiembre" (se usa sin p en Uruguay).

**Argentina (AMBA)**

- Organismos: ARCA (ex AFIP), AySA, Edesur, Edenor, Metrogas, GCBA, ABL, municipios del conurbano por nombre.
- Construcción: corralón, encargado (del edificio), expensas, termotanque, calefón, tanque, membrana, losa.
- Mudanzas: flete, changarín, mudanza, baulera.
- Moneda: "$" o "pesos"; con inflación alta, dar fecha exacta y considerar "en USD" como referencia.
- Fechas: "septiembre".

## 6. Cómo definir la voz de un sitio nuevo

1. Leé las reseñas de Google del negocio (o de la competencia si es rank and rent) y anotá cómo hablan los clientes: palabras, quejas, elogios.
2. Si hay dueño real, pedile tres audios de WhatsApp contestando preguntas típicas. Transcribilos: ahí están las muletillas propias y las opiniones.
3. Completá `tratamiento` según el país y el público.
4. Completá `opiniones` con al menos tres posiciones del profesional ("no instalamos X", "siempre recomendamos Y"). Sin opiniones, el artículo sale tibio.
5. Si es rank and rent sin dueño todavía, usá `persona: nosotros`, `tono: directo` y dejá `autor` como `[DATO FALTANTE]` hasta que haya inquilino. No inventes un autor.

## 7. Ejemplo: el mismo párrafo en tres voces

Los datos son ilustrativos; sirven para ver el cambio de voz, no para citarlos.

**voseo + nosotros + cercano (mudanzas, Montevideo)**
> Si vivís en un edificio con ascensor chico, avisanos cuando pidas el presupuesto. En Pocitos hay muchos de los años sesenta donde la heladera no entra parada y hay que bajarla por la escalera: eso suma media hora y un peón más.

**usted + yo + técnico (electricista matriculado)**
> Si su edificio tiene más de 40 años, es probable que el tablero no tenga disyuntor diferencial. Antes de agregar un aire acondicionado, le recomiendo revisarlo: sin diferencial, UTE no aprueba la ampliación de potencia.

**neutro + nosotros + directo (sitio para administradores en UY y AR)**
> En edificios de más de 40 años, el tablero general suele no tener disyuntor diferencial. Conviene revisarlo antes de cualquier ampliación de potencia, porque la compañía eléctrica la rechaza sin ese dispositivo.
