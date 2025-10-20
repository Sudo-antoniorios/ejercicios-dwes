<?php
/**
 * Programa que muestra un calendario con festivos y fines de semana en rojo
 * 
 * @author Antonio Ríos
 */

$mes = 12; 
$anio = 2025;

// número de días del mes
$numero_dias_mes = cal_days_in_month(CAL_GREGORIAN, $mes, $anio);

// día de la semana en que empieza el mes (1 = lunes, 7 = domingo)
$primer_dia = date("N", mktime(0, 0, 0, $mes, 1, $anio));

/**
 * Lista de festivos en España y Andalucía 2025 
 * Formato: "m-d"
 */
$festivos = [
    "1-1",   // Año Nuevo
    "1-6",   // Reyes
    "2-28",  // Día de Andalucía
    "3-19",  // San José
    "4-17",  // Jueves Santo
    "4-18",  // Viernes Santo
    "5-1",   // Día del Trabajador
    "8-15",  // Asunción
    "10-12", // Fiesta Nacional de España
    "11-1",  // Todos los Santos
    "12-6",  // Día de la Constitución
    "12-8",  // Inmaculada
    "12-25"  // Navidad
];
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>Calendario</title>
  <style>
    table { border-collapse: collapse; text-align: center; }
    th, td { width: 40px; height: 40px; }
    th { background-color: #ddd; }
    .finde { background-color: #ec1b1bff; }   /* rojo suave */
    .festivo { background-color: #a32828ff; color: white; font-weight: bold; } /* rojo fuerte */
  </style>
</head>
<body>
  <h1>Calendario</h1>
  <h2>Mes: <?php echo $mes; ?></h2>
  <h2>Año: <?php echo $anio; ?></h2>

  <table border="1">
    <tr>
      <th>L</th><th>M</th><th>X</th><th>J</th><th>V</th><th>S</th><th>D</th>
    </tr>
    <tr>
    <?php
    // huecos vacíos antes del día 1
    for ($i = 1; $i < $primer_dia; $i++) {
        echo "<td></td>";
    }

    // imprimir los días del mes
    $dia_semana = $primer_dia;
    for ($dia = 1; $dia <= $numero_dias_mes; $dia++) {
        $clase = "";

        // comprobar si es festivo
        if (in_array("$mes-$dia", $festivos)) {
            $clase = "festivo";
        }
        // comprobar si es sábado (6) o domingo (7)
        elseif ($dia_semana == 6 || $dia_semana == 7) {
            $clase = "finde";
        }

        echo "<td class='$clase'>$dia</td>";

        // si hemos llegado al domingo, cerramos la fila y si no es el último día abrimos otra
        if ($dia_semana == 7) {
            echo "</tr>";
            if ($dia != $numero_dias_mes) echo "<tr>";
            $dia_semana = 1;
        } else {
            $dia_semana++;
        }
    }

    // rellenar huecos vacíos al final de la última fila (si hace falta)
    if ($dia_semana != 1) {
        for ($i = $dia_semana; $i <= 7; $i++) {
            echo "<td></td>";
        }
        echo "</tr>";
    }
    ?>
  </table>
</body>
</html>
