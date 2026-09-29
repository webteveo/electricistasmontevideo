# E-E-A-T para negocios de servicios — qué poner en el sitio para que Google te vea como experto

Etiquetas: [RANKING] · [CONVERSIÓN] · [TRÁMITE] · [GEO]. Evidencia: `investigacion-2026.md` bloque B.

## 1. Lo que Google mide de verdad

- E-E-A-T no es un score ni Google verifica credenciales (Sullivan). Lo que existe: calidad de sitio casi estática (Q*, siteAuthority), comportamiento (NavBoost, 13 meses de clics, "último clic largo" = el que terminó en llamada/WhatsApp), y modelos entrenados con raters que usan las QRG. Conclusión práctica: la página tiene que **parecer y ser** de un profesional real y **resolver rápido**.
- QRG: "Trust is the most important member". El rater busca **quién es responsable** (2.5.3), **reputación fuera del sitio** (3.3; para negocios chicos la falta de reputación no penaliza, la negativa sí), y castiga con Lowest **ocultar o fingir identidad** (4.5.1, 4.5.3) y con Low la "información exagerada o levemente engañosa sobre el sitio o el creador" (5.x, ene-2025).
- Cerrajería, electricidad y casas contenedores están en "may be YMYL" (seguridad, dinero, historial de estafas del rubro): se exige más Trust (identidad, contacto, reseñas), no títulos académicos. "Everyday expertise" vale: quien hace el trabajo todos los días es experto.
- Leak: `contentEffort` (esfuerzo estimado por LLM), `OriginalContentScore` (pesa más en páginas cortas), `LocalWWWInfo/brickAndMortarStrength` (Google busca entidad local real). Fotos propias, tablas y datos locales son "esfuerzo detectable".

## 2. Bloques obligatorios en el sitio

| Bloque | Dónde | Contenido | Etiqueta |
|---|---|---|---|
| **Quién te atiende** | home, troncales, Sobre nosotros | Nombre real del técnico/equipo, foto real, años, matrícula/registro (UTE para instaladores en UY; COPIME/APSE en CABA; gasista matriculado para AA; registro de transportistas para mudanzas), zona base, fecha de actualización | [RANKING][CONVERSIÓN] |
| **Cómo trabajamos (How)** | troncales y zonas | 3–4 pasos reales, qué incluye el presupuesto, herramientas, tiempos, fotos del proceso | [CONVERSIÓN][GEO] |
| **Trabajos realizados** | zonas y troncales | Tabla o tarjetas: fecha, tipo, barrio/calle aprox., tiempo, foto real | [RANKING][CONVERSIÓN] |
| **Reseñas reales** | zonas, home | 2–3 por página con nombre, fecha, barrio; enlace a la ficha; conteo visible. Sin `aggregateRating` propio | [CONVERSIÓN][GEO] |
| **Precios, garantía, condiciones** | troncales, zonas, `/precios/` | "Desde $" realista con fecha; garantía escrita; qué pasa si algo sale mal; medios de pago | [CONVERSIÓN][GEO] |
| **Datos de contacto y responsable** | header, footer, Sobre nosotros, schema | Nombre legal o de fantasía + RUT/CUIT si aplica, teléfono, WhatsApp, email, dirección o zona base, horario real | [RANKING][TRÁMITE] |
| **Consistencia externa** | GBP, directorios, redes | NAP idéntico; reseñas en GBP y Facebook; menciones en proveedores y medios locales | [RANKING][GEO] |
| **Información original** | cada página | ≥ 5 datos que el top 10 no tiene: tiempos por zona, precios con fecha, marcas frecuentes en la ciudad, requisitos UTE/IMM/ARCA, errores típicos que ve el técnico, cómo evitar estafas del rubro | [RANKING][GEO] |

Preguntas de Google para autoevaluar (Who / How / Why): ¿es evidente quién hizo el trabajo y escribió? ¿se ve cómo se trabaja (fotos, pasos)? ¿la página serviría igual si el cliente llegara por WhatsApp sin pasar por Google?

## 3. Reglas duras

1. **Nunca** autor o técnico inventado, foto stock o IA como "nuestro equipo", "20 años" que no existen, reseñas fabricadas o incentivadas. Lowest por engaño + publicidad engañosa (Ley 17.250 UY, Ley 24.240 AR) + política de Maps.
2. **Promesas que se cumplen**: "llegamos en 5 minutos a cualquier punto de Montevideo" es "información exagerada" (Low) y genera badClicks.
3. **Fotos reales** para hero, equipo, trabajos, vehículo, local. Pedir 10–15 fotos de celular por mes al operador; valen más que cualquier render.
4. **Imágenes IA** solo como ilustración (iconos, diagramas "cómo funciona un split", fondos), con alt honesto ("Ilustración de…") y metadato IPTC `DigitalSourceType=trainedAlgorithmicMedia`. Nunca "trabajo realizado en Carrasco" con imagen sintética. Google no penaliza la herramienta; penaliza el engaño.
5. **Lenguaje honesto sobre presencia**: "atendemos Pocitos desde nuestra base en Cordón" / nunca "nuestro local en Pocitos" si no existe.
6. **Fecha de última actualización real** en precios y "quién te atiende".
7. **Sitio de nicho de un solo servicio**: mantenerlo. Está alineado con "primary purpose or focus" y con siteFocusScore. No meter mudanzas en el dominio de cerrajería.

## 4. Rank and rent: E-E-A-T transferible cuando cambia el operador

| Práctica | Viabilidad | Motivo |
|---|---|---|
| Marca propia del sitio que dice claro que conecta con un profesional asociado, con el **operador actual nombrado** (nombre, foto, matrícula, zona) | Viable | "Quién es responsable" honesto; propósito claro |
| Página "Cómo verificamos a los profesionales" (criterios reales: matrícula, antigüedad, seguro, reseñas) | Viable | E-E-A-T de la plataforma, no cambia con el operador |
| Contrato con el operador: fotos mensuales, 3 casos por mes, permiso de nombre y foto, reseñas a **su** GBP, aviso de baja para actualizar la web ese día | Viable, clave | Evidencia de Experience sostenida |
| El sitio como web oficial de la ficha del operador (o cesión de uso de marca para que el operador rotule y facture con ese nombre) | Viable | Coherencia mundo real ↔ ficha; pasa el video |
| GBP a nombre del rentista, dirección ficticia u oficina virtual, teléfono rotando | Prohibido | Lead-gen no elegible; suspensión; crackdown 2025 (10.000 fichas eliminadas, categorías cerrajería/grúas) |
| Varias fichas por zona para un mismo operador | Prohibido | Una ficha por base física con personal |
| Clonar el sitio en 10 dominios/ciudades con texto spineado | Riesgoso | Doorway multi-dominio + scaled content; anchorMismatch/babyPanda demotions |
| Cambiar de operador sin actualizar Sobre nosotros, fotos y matrícula | Riesgo medio | Información engañosa sobre el sitio; reseñas externas dejan de coincidir |
| Texto redactado con IA a partir de datos del operador | Viable | Google acepta IA con insumo real y útil |

Protocolo: la marca es del sitio, la experiencia es del operador; separarlo en la página ("Cerrajero.uy conecta con cerrajeros verificados en Montevideo. Hoy atiende: Martín P., RUT …, base en Cordón."). Nunca GBP falsos: si se quiere pack, la ficha es del operador y enlaza al sitio.

## 5. Auditoría E-E-A-T de una página (tabla de salida)

| Hallazgo | Tipo | Impacto | Esfuerzo | Acción |
|---|---|---|---|---|
| No se sabe quién atiende (sin nombre, sin foto real) | RANKING/CONVERSIÓN | alto | bajo | Bloque "Quién te atiende" con datos del operador actual |
| Fotos stock/IA como equipo o trabajos | CONVERSIÓN | alto | bajo | Reemplazar por 10 fotos reales; IA solo ilustrativa con alt honesto |
| Sin precios ni garantía | CONVERSIÓN/GEO | medio | bajo | Tabla "desde" con fecha + garantía escrita |
| Reseñas sin nombre/fecha/barrio o con estrellas marcadas | RANKING (riesgo) | medio | bajo | Quitar `aggregateRating`; 2–3 reseñas reales con enlace a la ficha |
| Promesas imposibles | RANKING | medio | bajo | Reescribir con tiempos reales por zona |
| NAP distinto entre web, GBP y directorios | RANKING | alto | medio | Unificar nombre, teléfono y dirección |
| Cero datos que el top 10 no tenga | RANKING/GEO | alto | medio | Agregar ≥ 5 datos del operador (tiempos, precios, marcas, requisitos, errores típicos) |
| Sin fecha de actualización | GEO | bajo | bajo | Fecha visible + `dateModified` |
