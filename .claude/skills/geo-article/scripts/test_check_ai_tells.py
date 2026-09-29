"""Tests del linter de tics IA. Correr con: pytest .claude/skills/geo-article/scripts"""
import json
import sys
from pathlib import Path

import pytest

sys.path.insert(0, str(Path(__file__).parent))
import check_ai_tells as lint  # noqa: E402


def alertas(texto, regla=None, final=False):
    resultado, _ = lint.analizar(texto, final=final)
    if regla:
        resultado = [a for a in resultado if a.regla == regla]
    return resultado


def severidades(texto, regla, final=False):
    return {a.severidad for a in alertas(texto, regla, final)}


# Texto con ritmo humano: frases de largo muy distinto, párrafos desparejos.
TEXTO_HUMANO = """\
# Cuánto sale cambiar un calefón en Montevideo

Cambiar un calefón de 60 litros en Montevideo cuesta entre $U 9.000 y $U 14.000 con la mano de obra incluida, a setiembre de 2026. La diferencia la hace casi siempre el estado de la conexión de agua.

Depende.

Si la llave de paso está trancada, hay que cortar el agua de todo el edificio, y eso en un edificio viejo de Pocitos puede llevar una tarde entera coordinando con el portero y con los vecinos del piso de arriba.

## Qué calefón conviene para dos personas

Para dos personas alcanza con 40 litros si se bañan a horarios distintos, y con 60 si se bañan uno atrás del otro. Yo no pondría uno de 30: se queda corto en invierno y termina saliendo más caro en UTE porque está prendido todo el día.

Lo ideal es medir el nicho antes de comprar.

Muchos llegan con el calefón ya comprado y no entra en el hueco del baño, que en los apartamentos de los años sesenta es angosto.
"""


# ---------------------------------------------------------------- preprocesado

def test_ignora_frontmatter_y_codigo():
    texto = """---
title: "Hoy en día todo cambia"
---

```
hoy en día en el mundo actual
```

<!-- hoy en día -->

Texto limpio sobre calefones.
"""
    assert alertas(texto, "frase-prohibida") == []


def test_numero_de_linea_respeta_el_archivo_original():
    texto = "---\ntitle: x\n---\n\nPrimera línea.\n\nHoy en día pasa esto.\n"
    [a] = alertas(texto, "frase-prohibida")
    assert a.linea == 7


def test_texto_humano_no_tiene_alertas_altas():
    assert [a for a in alertas(TEXTO_HUMANO) if a.severidad == "alta"] == []


# ---------------------------------------------------------------- frases

def test_frase_prohibida_dispara():
    [a] = alertas("Hoy en día las mudanzas son caras.", "frase-prohibida")
    assert a.severidad == "alta"


@pytest.mark.parametrize("frase", [
    "Cabe destacar que el camión es grande.",
    "Es fundamental revisar el techo.",
    "Ofrecemos una amplia gama de servicios.",
    "No se trata de precio, se trata de confianza.",
    "¿Alguna vez te preguntaste por qué gotea?",
    "Adentrémonos en el tema.",
    "Esto va a llevar tu negocio al siguiente nivel.",
    "Planificar es la clave del éxito.",
])
def test_frases_altas(frase):
    assert "alta" in severidades(frase, "frase-prohibida")


def test_brindar_en_futuro_dispara():
    assert alertas("Te brindará un buen servicio.", "frase-prohibida")


def test_frase_prohibida_no_dispara_en_texto_normal():
    assert alertas("El camión llega a las ocho a la casa de Malvín.", "frase-prohibida") == []


def test_descubri_pasado_no_dispara_pero_imperativo_si():
    assert alertas("Ese día descubrí que la cañería era de plomo.", "frase-prohibida") == []
    assert alertas("Descubrí cómo ahorrar en tu mudanza.", "frase-prohibida")


def test_frases_configurables(tmp_path):
    archivo = tmp_path / "frases.txt"
    archivo.write_text("alta | \\bbarbaridad\\b | Sacalo.\n", encoding="utf-8")
    reglas = lint.cargar_frases(archivo)
    resultado, _ = lint.analizar("Sale una barbaridad.", reglas_frases=reglas)
    assert [a.regla for a in resultado] == ["frase-prohibida"]


# ---------------------------------------------------------------- guiones

def test_guiones_largos_disparan():
    texto = ("El camión —que es grande— entra justo. La escalera —angosta— complica. "
             "El ascensor —chico— no sirve.")
    assert "alta" in severidades(texto, "guiones-largos")


def test_un_guion_suelto_no_dispara():
    texto = " ".join(["Una frase normal sobre mudanzas en Montevideo."] * 30) + " Un dato — aislado."
    assert alertas(texto, "guiones-largos") == []


# ---------------------------------------------------------------- tríadas

def test_triadas_repetidas_disparan():
    texto = ("Es rápido, seguro y barato. Llevamos camas, mesas y sillas. "
             "Trabajamos en Pocitos, Buceo y Carrasco. Somos serios, puntuales y prolijos. "
             "Usamos mantas, film y cajas.")
    assert "alta" in severidades(texto, "triadas")


def test_enumeracion_de_cuatro_y_pares_no_disparan():
    texto = ("Llevamos camas, mesas, sillas y cajas. Trabajamos en Pocitos y Buceo. "
             "El flete sale caro, pero vale. Vamos a Malvín, Punta Gorda, Carrasco y Shangrilá.")
    assert alertas(texto, "triadas") == []


# ---------------------------------------------------------------- no solo... sino

def test_no_solo_sino_dispara():
    assert "alta" in severidades(
        "No solo movemos muebles, sino que también los armamos.", "no-solo-sino")


def test_sin_no_solo_no_dispara():
    assert alertas("Movemos los muebles y además los armamos.", "no-solo-sino") == []


# ---------------------------------------------------------------- ritmo

def test_frases_de_largo_uniforme_disparan():
    frase = "El camión llega temprano a la casa del cliente en Pocitos."
    texto = " ".join([frase] * 10)
    assert "alta" in severidades(texto, "ritmo-uniforme")


def test_ritmo_variado_no_dispara():
    assert alertas(TEXTO_HUMANO, "ritmo-uniforme") == []


# ---------------------------------------------------------------- párrafos

def test_parrafos_uniformes_disparan():
    parrafo = "Este es un párrafo que tiene exactamente la misma cantidad de palabras que todos los demás."
    texto = "\n\n".join([parrafo] * 6)
    assert "alta" in severidades(texto, "parrafos-uniformes")


def test_parrafos_variados_no_disparan():
    assert alertas(TEXTO_HUMANO, "parrafos-uniformes") == []


# ---------------------------------------------------------------- negritas

def test_exceso_de_negritas_dispara():
    texto = "\n\n".join(f"Párrafo {i} con **algo resaltado** en el medio." for i in range(5))
    assert "alta" in severidades(texto, "exceso-negritas")


def test_negrita_ocasional_no_dispara():
    texto = "\n\n".join(["Uno con **$U 9.000** resaltado."] + [f"Párrafo {i} normal." for i in range(5)])
    assert alertas(texto, "exceso-negritas") == []


# ---------------------------------------------------------------- emojis

def test_emoji_dispara():
    [a] = alertas("Mudanzas rápidas 🚚 en Montevideo.", "emoji")
    assert a.severidad == "alta"
    assert alertas("Hacemos ✅ todo.", "emoji")


def test_sin_emoji_no_dispara():
    assert alertas("Mudanzas en Montevideo, 25 °C y $U 1.500 → sin problema.", "emoji") == []


# ---------------------------------------------------------------- títulos

def test_titulo_con_dos_puntos_dispara():
    assert "media" in severidades("## Mudanzas: la guía definitiva\n\nTexto.", "titulo-dos-puntos")


def test_titulo_sin_dos_puntos_no_dispara():
    assert alertas("## Cuánto sale una mudanza\n\nTexto.", "titulo-dos-puntos") == []


def test_title_del_frontmatter_largo_y_con_dos_puntos():
    texto = ('---\ntitle: "Mudanzas en Montevideo: todo lo que tenés que saber antes de contratar"\n'
             'description: "' + "x" * 160 + '"\n---\n\nTexto.\n')
    resultado = alertas(texto)
    reglas = {(a.regla, a.severidad) for a in resultado}
    assert ("frontmatter", "alta") in reglas
    assert ("titulo-dos-puntos", "media") in reglas


def test_frontmatter_correcto_no_dispara():
    texto = '---\ntitle: "Cuánto cuesta una mudanza en Montevideo"\ndescription: "Precios."\n---\n\nTexto.\n'
    assert alertas(texto, "frontmatter") == []


# ---------------------------------------------------------------- tono folleto

def test_exclamaciones_disparan():
    assert alertas("¡Llamanos! ¡Somos los mejores! ¡No te vas a arrepentir!", "tono-folleto")


def test_una_exclamacion_no_dispara():
    assert alertas("Ojo con el ascensor. ¡Medilo antes!", "tono-folleto") == []


# ---------------------------------------------------------------- apertura y cierre

def test_apertura_generica_dispara():
    texto = "# Mudanzas\n\nEn este artículo te vamos a contar todo sobre mudanzas.\n\n## Precio\n\nTexto."
    assert "alta" in severidades(texto, "apertura-generica")


def test_apertura_con_pregunta_dispara_media():
    texto = "# Cuánto cuesta\n\n¿Cuánto cuesta una mudanza? Depende.\n\n## Precio\n\nTexto."
    assert severidades(texto, "apertura-generica") == {"media"}


def test_apertura_con_respuesta_no_dispara():
    assert alertas(TEXTO_HUMANO, "apertura-generica") == []


def test_cierre_generico_dispara():
    texto = "## Precio\n\nTexto.\n\n## Conclusión\n\nEn resumen, una mudanza requiere planificación."
    sev = severidades(texto, "cierre-generico")
    assert sev == {"alta", "media"}


def test_cierre_practico_no_dispara():
    texto = ("## Precio\n\nTexto.\n\n## Qué hacer esta semana\n\n"
             "Medí la puerta del ascensor y mandanos la foto por WhatsApp.\n\n"
             "## Fuentes\n\nEn resumen, INE.")
    assert alertas(texto, "cierre-generico") == []


# ---------------------------------------------------------------- secciones GEO

def test_seccion_que_depende_de_lo_anterior_dispara():
    texto = "## Cuánto tarda\n\nComo dijimos antes, depende del volumen."
    assert "alta" in severidades(texto, "seccion-dependiente")


def test_seccion_autocontenida_no_dispara():
    texto = "## Cuánto tarda\n\nUna mudanza de dos dormitorios tarda entre 3 y 5 horas."
    assert alertas(texto, "seccion-dependiente") == []


def test_respuesta_directa_fuera_de_rango():
    corta = "## Cuánto tarda\n\nDepende."
    assert severidades(corta, "respuesta-directa") == {"media"}
    sin_parrafo = "## Precios\n\n| A | B |\n|---|---|\n| 1 | 2 |"
    assert severidades(sin_parrafo, "respuesta-directa") == {"media"}


def test_respuesta_directa_en_rango_no_dispara():
    respuesta = " ".join(["palabra"] * 50)
    assert alertas(f"## Cuánto tarda\n\n{respuesta}.", "respuesta-directa") == []


# ---------------------------------------------------------------- dato faltante

def test_dato_faltante_es_media_en_borrador_y_alta_en_final():
    texto = "Cuesta [DATO FALTANTE: precio 2 dormitorios] en total."
    assert severidades(texto, "dato-faltante") == {"media"}
    assert severidades(texto, "dato-faltante", final=True) == {"alta"}


def test_sin_dato_faltante_no_dispara():
    assert alertas("Cuesta $U 12.000 en total.", "dato-faltante") == []


# ---------------------------------------------------------------- CLI

def test_cli_exit_code_y_json(tmp_path, capsys):
    malo = tmp_path / "malo.md"
    malo.write_text("Hoy en día todo es distinto.\n", encoding="utf-8")
    assert lint.main([str(malo), "--json"]) == 1
    salida = json.loads(capsys.readouterr().out)
    assert salida["conteo"]["alta"] >= 1

    bueno = tmp_path / "bueno.md"
    bueno.write_text(TEXTO_HUMANO, encoding="utf-8")
    assert lint.main([str(bueno)]) == 0
