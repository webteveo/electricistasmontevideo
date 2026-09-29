#!/usr/bin/env python3
"""Linter de tics de texto generado por IA para artículos en Markdown (español).

Uso:
    python3 check_ai_tells.py articulo.md [--final] [--json] [--frases archivo.txt]

Ignora el frontmatter (salvo para revisar title y description) y los bloques de
código, comentarios HTML y <script>. Reporta alertas con línea, severidad y
sugerencia. Sale con código 1 si hay alguna alerta de severidad alta.

--final  convierte los [DATO FALTANTE] pendientes en alertas altas (usalo antes
         de publicar; en borrador son medias).

Solo usa la biblioteca estándar.
"""
from __future__ import annotations

import argparse
import json
import re
import statistics
import sys
from dataclasses import asdict, dataclass, field
from pathlib import Path

SEVERIDADES = ("alta", "media", "baja")
ORDEN = {s: i for i, s in enumerate(SEVERIDADES)}
RUTA_FRASES = Path(__file__).with_name("frases_prohibidas.txt")

# Umbrales. Ajustalos acá si ves demasiados falsos positivos.
MIN_FRASES_RITMO = 8          # frases mínimas para medir burstiness
CV_FRASES_ALTA = 0.30         # coef. de variación del largo de frases
CV_FRASES_MEDIA = 0.42
DESVIO_FRASES_ALTA = 4.0      # desvío estándar en palabras
MIN_PARRAFOS_UNIFORMIDAD = 5
CV_PARRAFOS_ALTA = 0.15
CV_PARRAFOS_MEDIA = 0.25
GUIONES_POR_MIL_ALTA = 6.0
GUIONES_POR_MIL_MEDIA = 3.0
TRIADAS_MEDIA = 3
TRIADAS_ALTA = 5
TRIADAS_POR_MIL_ALTA = 3.0
NEGRITAS_ALTA = 0.5
NEGRITAS_MEDIA = 0.3
MIN_UNIDADES_NEGRITA = 4
EXCLAMACIONES_MEDIA = 3
TITLE_MAX = 60
DESCRIPTION_MAX = 155
RESPUESTA_MIN, RESPUESTA_MAX = 40, 60          # ideal del pasaje citable
RESPUESTA_MIN_DURO, RESPUESTA_MAX_DURO = 25, 90


@dataclass
class Alerta:
    linea: int
    severidad: str
    regla: str
    mensaje: str
    sugerencia: str


@dataclass
class Bloque:
    tipo: str            # titulo | parrafo | lista | tabla | cita
    linea: int           # número de línea (1-based) de la primera línea
    lineas: list[str] = field(default_factory=list)
    nivel: int = 0       # nivel de título (1-6)

    @property
    def texto(self) -> str:
        return " ".join(l.strip() for l in self.lineas)


# --------------------------------------------------------------------------
# Preprocesado
# --------------------------------------------------------------------------

RE_TITULO = re.compile(r"^(#{1,6})\s+(.*)$")
RE_ITEM_LISTA = re.compile(r"^\s*(?:[-*+]|\d+[.)])\s+")
RE_ENLACE = re.compile(r"!?\[([^\]]*)\]\([^)]*\)")
RE_CODIGO_INLINE = re.compile(r"`[^`]*`")
RE_COMENTARIO_INLINE = re.compile(r"<!--.*?-->")
RE_ETIQUETA_HTML = re.compile(r"</?[a-zA-Z][^>]*>")
RE_ENFASIS = re.compile(r"(\*\*|__|\*|_)")
RE_PALABRA = re.compile(r"[^\W_]+(?:[-'][^\W_]+)*")
RE_DATO_FALTANTE = re.compile(r"\[DATO FALTANTE[^\]]*\]", re.I)
RE_NEGRITA = re.compile(r"\*\*[^*\n]+\*\*|__[^_\n]+__")
RE_EMOJI = re.compile(
    "["
    "\U0001F000-\U0001FAFF"   # pictogramas, emoticones, transporte, símbolos
    "☀-➿"           # símbolos varios y dingbats (☀ ✅ ✔ ❌ ...)
    "⭐⭕⬆⬇⬅➡"
    "️"
    "]"
)
RE_TRIADA = re.compile(
    r"\b([^\W\d_][\w-]*(?:\s+[^\W\d_][\w-]*){0,2}),\s+"
    r"([^\W\d_][\w-]*(?:\s+[^\W\d_][\w-]*){0,2})\s+(?:y|e)\s+"
    r"([^\W\d_][\w-]*(?:\s+[^\W\d_][\w-]*){0,2})",
    re.I,
)
RE_NO_SOLO = re.compile(r"\bno s[oó]lo\b[^.!?]{0,160}?\bsino\b", re.I)
RE_FIN_FRASE = re.compile(r"(?<=[.!?…])\s+(?=[¿¡\"“(\w])")

APERTURAS_GENERICAS = re.compile(
    r"^\s*(en este art[ií]culo|en esta gu[ií]a|en este post|si (est[aá]s|estas) "
    r"(pensando|buscando|por)|¿alguna vez|cuando se trata de|hoy vamos a|"
    r"bienvenid[oa]s?|imagin[aáe]\b|en el mundo|hoy en d[ií]a|en la actualidad|"
    r"es (una )?(pregunta|duda) (muy )?(com[uú]n|frecuente|habitual)|"
    r"muchas personas se preguntan|seguramente te (preguntaste|has preguntado))",
    re.I,
)
CIERRES_GENERICOS = re.compile(
    r"^\s*(en resumen|en conclusi[oó]n|en definitiva|para concluir|para finalizar|"
    r"para terminar|como (hemos visto|vimos|pudiste ver)|esperamos que|"
    r"(y )?record[aá] que|recuerda que|no dudes en|al final del d[ií]a|"
    r"en fin|con esta (gu[ií]a|informaci[oó]n)|ahora que (ya )?(sab[eé]s|conoc[eé]s))",
    re.I,
)
TITULOS_CIERRE = re.compile(
    r"^(conclusi[oó]n(es)?|resumen|en resumen|reflexi[oó]n(es)? finale?s?|"
    r"palabras finales|para terminar|conclusi[oó]n final)\b",
    re.I,
)
SECCIONES_ANEXAS = re.compile(r"^(fuentes|referencias|bibliograf[ií]a|notas)\b", re.I)
INICIO_DEPENDIENTE_ALTA = re.compile(
    r"^\s*(esto|eso|lo anterior|como (dijimos|mencionamos|vimos|comentamos|se dijo)|"
    r"adem[aá]s|por otro lado|asimismo|por eso|en ese caso|dicho esto)\b",
    re.I,
)
INICIO_DEPENDIENTE_MEDIA = re.compile(
    r"^\s*(este|esta|estos|estas|tambi[eé]n|sin embargo|igualmente)\b", re.I
)


def separar_frontmatter(lineas: list[str]) -> tuple[list[tuple[int, str]], int]:
    """Devuelve las líneas del frontmatter (con su número) y dónde termina."""
    if not lineas or lineas[0].strip() != "---":
        return [], 0
    for i in range(1, len(lineas)):
        if lineas[i].strip() in ("---", "..."):
            return [(n + 1, lineas[n]) for n in range(1, i)], i + 1
    return [], 0  # frontmatter sin cerrar: se analiza todo


def limpiar_lineas(texto: str) -> tuple[list[str], list[tuple[int, str]]]:
    """Devuelve las líneas del cuerpo (vacías donde se ignora) y el frontmatter.

    Mantiene la cantidad de líneas para que los números de línea coincidan
    con el archivo original.
    """
    lineas = texto.splitlines()
    frontmatter, fin_fm = separar_frontmatter(lineas)
    salida = [""] * len(lineas)
    en_codigo = False
    marca_codigo = ""
    en_comentario = False
    en_script = False
    for i in range(fin_fm, len(lineas)):
        linea = lineas[i]
        suelta = linea.strip()
        if en_codigo:
            if suelta.startswith(marca_codigo):
                en_codigo = False
            continue
        if suelta.startswith("```") or suelta.startswith("~~~"):
            en_codigo, marca_codigo = True, suelta[:3]
            continue
        if en_script:
            if "</script>" in suelta.lower():
                en_script = False
            continue
        if suelta.lower().startswith("<script"):
            en_script = "</script>" not in suelta.lower()
            continue
        if en_comentario:
            if "-->" in linea:
                en_comentario = False
                linea = linea.split("-->", 1)[1]
            else:
                continue
        linea = RE_COMENTARIO_INLINE.sub("", linea)
        if "<!--" in linea:
            linea = linea.split("<!--", 1)[0]
            en_comentario = True
        linea = RE_CODIGO_INLINE.sub("", linea)
        linea = RE_ENLACE.sub(r"\1", linea)
        linea = RE_ETIQUETA_HTML.sub("", linea)
        salida[i] = linea
    return salida, frontmatter


def armar_bloques(lineas: list[str]) -> list[Bloque]:
    bloques: list[Bloque] = []
    actual: Bloque | None = None

    def cerrar():
        nonlocal actual
        if actual is not None:
            bloques.append(actual)
        actual = None

    for i, linea in enumerate(lineas):
        if not linea.strip():
            cerrar()
            continue
        m = RE_TITULO.match(linea.strip())
        if m:
            cerrar()
            bloques.append(Bloque("titulo", i + 1, [m.group(2)], len(m.group(1))))
            continue
        suelta = linea.strip()
        if suelta.startswith("|"):
            tipo = "tabla"
        elif RE_ITEM_LISTA.match(linea):
            tipo = "lista"
        elif suelta.startswith(">"):
            tipo = "cita"
        else:
            tipo = None  # continuación o párrafo
        if actual is None:
            actual = Bloque(tipo or "parrafo", i + 1)
        elif tipo and tipo != actual.tipo:
            cerrar()
            actual = Bloque(tipo, i + 1)
        actual.lineas.append(suelta.lstrip("> ") if tipo == "cita" else linea)
    cerrar()
    return bloques


def texto_plano(s: str) -> str:
    return RE_ENFASIS.sub("", s)


def palabras(s: str) -> list[str]:
    return RE_PALABRA.findall(texto_plano(s))


def frases(s: str) -> list[str]:
    return [f for f in RE_FIN_FRASE.split(texto_plano(s).strip()) if palabras(f)]


def items_de_lista(b: Bloque) -> list[str]:
    items: list[str] = []
    for l in b.lineas:
        if RE_ITEM_LISTA.match(l) or not items:
            items.append(RE_ITEM_LISTA.sub("", l, count=1))
        else:
            items[-1] += " " + l.strip()
    return items


def cv(valores: list[float]) -> tuple[float, float]:
    media = statistics.mean(valores)
    desvio = statistics.pstdev(valores)
    return (desvio / media if media else 0.0), desvio


# --------------------------------------------------------------------------
# Reglas
# --------------------------------------------------------------------------

def cargar_frases(ruta: Path = RUTA_FRASES) -> list[tuple[str, re.Pattern, str]]:
    reglas = []
    for n, cruda in enumerate(ruta.read_text(encoding="utf-8").splitlines(), 1):
        cruda = cruda.strip()
        if not cruda or cruda.startswith("#"):
            continue
        try:
            sev, resto = cruda.split("|", 1)
            patron, sugerencia = resto.rsplit("|", 1)
            sev = sev.strip().lower()
            if sev not in SEVERIDADES:
                raise ValueError(f"severidad desconocida: {sev}")
            reglas.append((sev, re.compile(patron.strip(), re.I), sugerencia.strip()))
        except (ValueError, re.error) as e:
            raise SystemExit(f"{ruta}:{n}: línea inválida ({e})")
    return reglas


def regla_frases(lineas, reglas) -> list[Alerta]:
    alertas = []
    for i, linea in enumerate(lineas):
        if not linea.strip():
            continue
        plana = texto_plano(linea)
        for sev, patron, sugerencia in reglas:
            for m in patron.finditer(plana):
                alertas.append(Alerta(i + 1, sev, "frase-prohibida",
                                      f'"{m.group(0)}"', sugerencia))
    return alertas


def regla_guiones(lineas, total_palabras) -> list[Alerta]:
    con_guion = []
    cantidad = 0
    for i, linea in enumerate(lineas):
        if linea.strip().startswith("|"):
            continue
        n = linea.count("—") + len(re.findall(r"\s–\s", linea))
        if n:
            cantidad += n
            con_guion.append(i + 1)
    if not cantidad or not total_palabras:
        return []
    por_mil = cantidad / total_palabras * 1000
    sev = None
    if cantidad >= 3 and por_mil >= GUIONES_POR_MIL_ALTA:
        sev = "alta"
    elif cantidad >= 2 and por_mil >= GUIONES_POR_MIL_MEDIA:
        sev = "media"
    if not sev:
        return []
    return [Alerta(con_guion[0], sev, "guiones-largos",
                   f"{cantidad} guiones largos ({por_mil:.1f} cada 1000 palabras) "
                   f"en líneas {', '.join(map(str, con_guion[:10]))}",
                   "Cambialos por punto, coma, dos puntos o paréntesis. "
                   "Dejá uno como mucho cada 500 palabras.")]


def buscar_triadas(bloques) -> list[tuple[int, str]]:
    hallazgos = []
    for b in bloques:
        if b.tipo not in ("parrafo", "lista", "cita"):
            continue
        texto = texto_plano(b.texto)
        for m in RE_TRIADA.finditer(texto):
            previo = texto[: m.start()].rstrip()
            if previo.endswith(","):
                continue  # enumeración de 4 o más, no es tríada
            hallazgos.append((b.linea, m.group(0)))
    return hallazgos


def regla_triadas(bloques, total_palabras) -> list[Alerta]:
    hallazgos = buscar_triadas(bloques)
    n = len(hallazgos)
    if n < TRIADAS_MEDIA:
        return []
    por_mil = n / max(total_palabras, 1) * 1000
    sev = "alta" if n >= TRIADAS_ALTA and por_mil >= TRIADAS_POR_MIL_ALTA else "media"
    ejemplos = "; ".join(f'L{l}: "{t}"' for l, t in hallazgos[:4])
    return [Alerta(hallazgos[0][0], sev, "triadas",
                   f"{n} enumeraciones de tres ({por_mil:.1f} cada 1000 palabras). {ejemplos}",
                   "Variá: a veces dos ejemplos, a veces uno bien concreto, a veces cuatro.")]


def regla_no_solo(bloques) -> list[Alerta]:
    alertas = []
    for b in bloques:
        if b.tipo == "tabla":
            continue
        for m in RE_NO_SOLO.finditer(texto_plano(b.texto)):
            alertas.append(Alerta(b.linea, "alta", "no-solo-sino",
                                  f'"{m.group(0)[:80]}"',
                                  "Decí las dos cosas por separado o quedate con la importante."))
    return alertas


def regla_ritmo(bloques) -> tuple[list[Alerta], dict]:
    lista_frases = []
    for b in bloques:
        if b.tipo in ("parrafo", "cita"):
            lista_frases.extend(frases(b.texto))
    largos = [len(palabras(f)) for f in lista_frases]
    if len(largos) < MIN_FRASES_RITMO:
        return [], {"frases": len(largos)}
    coef, desvio = cv(largos)
    metricas = {"frases": len(largos), "cv_frases": round(coef, 2),
                "desvio_frases": round(desvio, 1), "media_frases": round(statistics.mean(largos), 1)}
    sev = None
    if coef < CV_FRASES_ALTA or desvio < DESVIO_FRASES_ALTA:
        sev = "alta"
    elif coef < CV_FRASES_MEDIA:
        sev = "media"
    if not sev:
        return [], metricas
    primera = next(b.linea for b in bloques if b.tipo in ("parrafo", "cita"))
    return [Alerta(primera, sev, "ritmo-uniforme",
                   f"Frases de largo parecido: desvío {desvio:.1f} palabras, "
                   f"variación {coef:.2f} (media {metricas['media_frases']}).",
                   "Mezclá frases de 4-6 palabras con otras de 25-35. "
                   "Cortá una larga en dos o uní dos cortas.")], metricas


def regla_parrafos(bloques) -> list[Alerta]:
    parrafos = [b for b in bloques if b.tipo == "parrafo"]
    if len(parrafos) < MIN_PARRAFOS_UNIFORMIDAD:
        return []
    largos = [len(palabras(b.texto)) for b in parrafos]
    coef, _ = cv(largos)
    if coef >= CV_PARRAFOS_MEDIA:
        return []
    sev = "alta" if coef < CV_PARRAFOS_ALTA else "media"
    return [Alerta(parrafos[0].linea, sev, "parrafos-uniformes",
                   f"{len(parrafos)} párrafos de largo casi igual "
                   f"(entre {min(largos)} y {max(largos)} palabras, variación {coef:.2f}).",
                   "Poné algún párrafo de una o dos líneas y dejá otro más largo donde haga falta.")]


def regla_negritas(bloques) -> list[Alerta]:
    unidades: list[tuple[int, str]] = []
    for b in bloques:
        if b.tipo == "parrafo":
            unidades.append((b.linea, b.texto))
        elif b.tipo == "lista":
            unidades.extend((b.linea, it) for it in items_de_lista(b))
    if len(unidades) < MIN_UNIDADES_NEGRITA:
        return []
    con = [l for l, t in unidades if RE_NEGRITA.search(t)]
    prop = len(con) / len(unidades)
    sev = "alta" if prop > NEGRITAS_ALTA else "media" if prop > NEGRITAS_MEDIA else None
    if not sev:
        return []
    return [Alerta(con[0], sev, "exceso-negritas",
                   f"{len(con)} de {len(unidades)} párrafos o ítems tienen negrita ({prop:.0%}).",
                   "Dejá negrita solo en el dato que alguien escanea (un precio, un plazo).")]


def regla_emojis(lineas) -> list[Alerta]:
    alertas = []
    for i, linea in enumerate(lineas):
        encontrados = RE_EMOJI.findall(linea)
        if encontrados:
            alertas.append(Alerta(i + 1, "alta", "emoji",
                                  f"Emoji en el texto: {''.join(encontrados)}",
                                  "Sacalo. Un artículo de oficio no lleva emojis."))
    return alertas


def regla_titulos(bloques) -> list[Alerta]:
    return [Alerta(b.linea, "media", "titulo-dos-puntos",
                   f'Título con dos puntos: "{b.texto}"',
                   'Evitá "X: la guía definitiva". Usá la pregunta que hace la gente.')
            for b in bloques if b.tipo == "titulo" and ":" in b.texto]


def regla_exclamaciones(lineas) -> list[Alerta]:
    con = [(i + 1, l.count("!")) for i, l in enumerate(lineas) if "!" in l]
    total = sum(n for _, n in con)
    if total < EXCLAMACIONES_MEDIA:
        return []
    return [Alerta(con[0][0], "media", "tono-folleto",
                   f"{total} signos de exclamación.",
                   "Sacalos. El entusiasmo se nota en los datos, no en los signos.")]


def regla_apertura(bloques) -> list[Alerta]:
    for b in bloques:
        if b.tipo == "titulo" and b.nivel >= 2:
            return []  # no hay intro antes del primer H2
        if b.tipo == "parrafo":
            primera = (frases(b.texto) or [""])[0]
            if APERTURAS_GENERICAS.search(texto_plano(b.texto)):
                return [Alerta(b.linea, "alta", "apertura-generica",
                               f'Apertura genérica: "{primera[:80]}"',
                               "Arrancá por la respuesta o por un dato concreto.")]
            if primera.rstrip().endswith("?"):
                return [Alerta(b.linea, "media", "apertura-generica",
                               f'La intro arranca con una pregunta: "{primera[:80]}"',
                               "No repitas la pregunta del título; respondela.")]
            return []
    return []


def regla_cierre(bloques) -> list[Alerta]:
    alertas = []
    # Se descarta la cola de secciones anexas (Fuentes, Referencias).
    cuerpo = list(bloques)
    for idx in range(len(cuerpo) - 1, -1, -1):
        b = cuerpo[idx]
        if b.tipo == "titulo" and SECCIONES_ANEXAS.match(b.texto):
            cuerpo = cuerpo[:idx]
    titulos = [b for b in cuerpo if b.tipo == "titulo" and b.nivel >= 2]
    if titulos and TITULOS_CIERRE.match(titulos[-1].texto.strip()):
        alertas.append(Alerta(titulos[-1].linea, "media", "cierre-generico",
                              f'Sección final "{titulos[-1].texto}".',
                              "Cambiala por un paso práctico: qué hacer mañana."))
    parrafos = [b for b in cuerpo if b.tipo == "parrafo"]
    if parrafos and CIERRES_GENERICOS.search(texto_plano(parrafos[-1].texto)):
        alertas.append(Alerta(parrafos[-1].linea, "alta", "cierre-generico",
                              f'Cierre genérico: "{frases(parrafos[-1].texto)[0][:80]}"',
                              "Cerrá con un paso práctico, no con un resumen ni una moraleja."))
    return alertas


def regla_secciones(bloques) -> list[Alerta]:
    """Pasaje citable al inicio de cada H2 y arranques autocontenidos."""
    alertas = []
    for idx, b in enumerate(bloques):
        if b.tipo != "titulo" or b.nivel < 2:
            continue
        siguiente = bloques[idx + 1] if idx + 1 < len(bloques) else None
        if siguiente is None or siguiente.tipo == "titulo":
            continue
        if siguiente.tipo == "parrafo":
            texto = texto_plano(siguiente.texto)
            if INICIO_DEPENDIENTE_ALTA.match(texto):
                alertas.append(Alerta(siguiente.linea, "alta", "seccion-dependiente",
                                      f'La sección arranca dependiendo de lo anterior: "{texto[:60]}"',
                                      "Nombrá el sujeto completo. Cada sección se tiene que entender sola."))
            elif INICIO_DEPENDIENTE_MEDIA.match(texto):
                alertas.append(Alerta(siguiente.linea, "media", "seccion-dependiente",
                                      f'Arranque que puede depender del contexto: "{texto[:60]}"',
                                      "Verificá que se entienda sin leer lo anterior."))
        if b.nivel != 2 or SECCIONES_ANEXAS.match(b.texto):
            continue
        if siguiente.tipo != "parrafo":
            alertas.append(Alerta(b.linea, "media", "respuesta-directa",
                                  f'"{b.texto}" no arranca con un párrafo de respuesta.',
                                  "Poné 40-60 palabras que respondan antes de la tabla o la lista."))
            continue
        n = len(palabras(siguiente.texto))
        if n < RESPUESTA_MIN_DURO or n > RESPUESTA_MAX_DURO:
            sev = "media"
        elif n < RESPUESTA_MIN or n > RESPUESTA_MAX:
            sev = "baja"
        else:
            continue
        alertas.append(Alerta(siguiente.linea, sev, "respuesta-directa",
                              f'La respuesta de "{b.texto}" tiene {n} palabras.',
                              "Apuntá a 40-60 palabras que se entiendan solas."))
    return alertas


def regla_datos_faltantes(lineas, final: bool) -> list[Alerta]:
    sev = "alta" if final else "media"
    alertas = []
    for i, linea in enumerate(lineas):
        for m in RE_DATO_FALTANTE.finditer(linea):
            alertas.append(Alerta(i + 1, sev, "dato-faltante", m.group(0),
                                  "Completalo con un dato real o sacá la frase."))
    return alertas


def regla_frontmatter(frontmatter) -> list[Alerta]:
    if not frontmatter:
        return []
    campos = {}
    for n, linea in frontmatter:
        m = re.match(r"^(title|description|meta_description)\s*:\s*(.*)$", linea)
        if m:
            valor = m.group(2).strip().strip("\"'")
            campos[m.group(1)] = (n, valor)
    alertas = []
    if "title" not in campos:
        alertas.append(Alerta(frontmatter[0][0], "media", "frontmatter",
                              "Falta title en el frontmatter.", "Agregá title (≤60 caracteres)."))
    else:
        n, valor = campos["title"]
        if len(valor) > TITLE_MAX:
            alertas.append(Alerta(n, "alta", "frontmatter",
                                  f"title tiene {len(valor)} caracteres (máx {TITLE_MAX}).",
                                  "Acortalo; Google lo corta y la IA lo reescribe."))
        if ":" in valor:
            alertas.append(Alerta(n, "media", "titulo-dos-puntos",
                                  f'title con dos puntos: "{valor}"',
                                  "Usá la pregunta real en vez de 'X: subtítulo'."))
    desc = campos.get("description") or campos.get("meta_description")
    if desc and len(desc[1]) > DESCRIPTION_MAX:
        alertas.append(Alerta(desc[0], "alta", "frontmatter",
                              f"description tiene {len(desc[1])} caracteres (máx {DESCRIPTION_MAX}).",
                              "Acortala y dejá el dato principal al principio."))
    return alertas


# --------------------------------------------------------------------------
# API
# --------------------------------------------------------------------------

def analizar(texto: str, final: bool = False, reglas_frases=None) -> tuple[list[Alerta], dict]:
    """Analiza un texto Markdown. Devuelve (alertas, métricas)."""
    if reglas_frases is None:
        reglas_frases = cargar_frases()
    lineas, frontmatter = limpiar_lineas(texto)
    bloques = armar_bloques(lineas)
    total_palabras = sum(len(palabras(b.texto)) for b in bloques if b.tipo != "tabla")

    alertas: list[Alerta] = []
    alertas += regla_frases(lineas, reglas_frases)
    alertas += regla_guiones(lineas, total_palabras)
    alertas += regla_triadas(bloques, total_palabras)
    alertas += regla_no_solo(bloques)
    ritmo, metricas = regla_ritmo(bloques)
    alertas += ritmo
    alertas += regla_parrafos(bloques)
    alertas += regla_negritas(bloques)
    alertas += regla_emojis(lineas)
    alertas += regla_titulos(bloques)
    alertas += regla_exclamaciones(lineas)
    alertas += regla_apertura(bloques)
    alertas += regla_cierre(bloques)
    alertas += regla_secciones(bloques)
    alertas += regla_datos_faltantes(lineas, final)
    alertas += regla_frontmatter(frontmatter)

    alertas.sort(key=lambda a: (a.linea, ORDEN[a.severidad]))
    metricas["palabras"] = total_palabras
    return alertas, metricas


def main(argv: list[str] | None = None) -> int:
    p = argparse.ArgumentParser(description="Detecta tics de texto generado por IA en un .md")
    p.add_argument("archivo", type=Path)
    p.add_argument("--final", action="store_true",
                   help="los [DATO FALTANTE] cuentan como alerta alta")
    p.add_argument("--json", action="store_true", help="salida en JSON")
    p.add_argument("--frases", type=Path, default=RUTA_FRASES,
                   help="archivo de frases prohibidas")
    args = p.parse_args(argv)

    texto = args.archivo.read_text(encoding="utf-8")
    alertas, metricas = analizar(texto, args.final, cargar_frases(args.frases))
    conteo = {s: sum(a.severidad == s for a in alertas) for s in SEVERIDADES}

    if args.json:
        print(json.dumps({"archivo": str(args.archivo), "metricas": metricas,
                          "conteo": conteo, "alertas": [asdict(a) for a in alertas]},
                         ensure_ascii=False, indent=2))
    else:
        for a in alertas:
            print(f"L{a.linea:<4} [{a.severidad.upper():5}] {a.regla}: {a.mensaje}\n"
                  f"       → {a.sugerencia}")
        print(f"\n{args.archivo}: {conteo['alta']} altas, {conteo['media']} medias, "
              f"{conteo['baja']} bajas | métricas: {metricas}")
    return 1 if conteo["alta"] else 0


if __name__ == "__main__":
    sys.exit(main())
