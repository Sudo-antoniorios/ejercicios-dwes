<?php
// calendario.php

$mes = isset($_GET['mes']) ? (int)$_GET['mes'] : date('n');
$anio = isset($_GET['anio']) ? (int)$_GET['anio'] : date('Y');

$primerDiaMes = mktime(0, 0, 0, $mes, 1, $anio);
$numeroDiasMes = date('t', $primerDiaMes);
$primerDiaSemana = date('N', $primerDiaMes); // 1 = Lunes, 7 = Domingo

$meses = array(
    1=>"Enero",2=>"Febrero",3=>"Marzo",4=>"Abril",5=>"Mayo",6=>"Junio",
    7=>"Julio",8=>"Agosto",9=>"Septiembre",10=>"Octubre",11=>"Noviembre",12=>"Diciembre"
);

// Festivos nacionales + Andalucía (ejemplos)
$festivos = array(
    $anio."-01-01", // Año Nuevo
    $anio."-01-06", // Reyes
    $anio."-02-28", // Día de Andalucía
    $anio."-03-28", // Jueves Santo 2025 (puede variar)
    $anio."-03-29", // Viernes Santo 2025
    $anio."-05-01", // Día del Trabajador
    $anio."-08-15", // Asunción
    $anio."-10-12", // Fiesta Nacional
    $anio."-11-01", // Todos los Santos
    $anio."-12-06", // Constitución
    $anio."-12-08", // Inmaculada
    $anio."-12-25"  // Navidad
);
?>
<html>
<head>
<meta charset="utf-8">
<title>Calendario</title>
<style>
body { font-family: Arial; text-align: center; background: #f3f3f3; }
table { border-collapse: collapse; margin: 20px auto; background: #fff; }
th, td { border: 1px solid #ccc; width: 80px; height: 70px; }
th { background: #f0f0f0; }
td a { text-decoration: none; color: #000; display: block; width: 100%; height: 100%; line-height: 70px; }
td a:hover { background: #d3eaff; }
.hoy { background: #c6f6c6; }       /* verde claro */
.festivo { background: #add8e6; }   /* azul claro */
.finSemana { background: #f9c6c6; } /* rojo/rosado claro */
.selector { margin: 20px; }
</style>
</head>
<body>

<h2>Calendario <?php echo $anio; ?></h2>

<form method="get" class="selector">
<select name="mes">
<?php
for ($i = 1; $i <= 12; $i++) {
    echo "<option value='".$i."'";
    if ($i == $mes) echo " selected";
    echo ">".$meses[$i]."</option>";
}
?>
</select>

<select name="anio">
<?php
$anioActual = date('Y');
for ($i = $anioActual - 5; $i <= $anioActual + 5; $i++) {
    echo "<option value='".$i."'";
    if ($i == $anio) echo " selected";
    echo ">".$i."</option>";
}
?>
</select>
<input type="submit" value="Ver">
</form>

<table>
<tr>
<th>Lun</th><th>Mar</th><th>Mié</th><th>Jue</th><th>Vie</th><th>Sáb</th><th>Dom</th>
</tr>
<?php
$diaSemana = 1;
$contadorCeldas = 0;
echo "<tr>";

// Celdas vacías antes del primer día del mes
for ($i = 1; $i < $primerDiaSemana; $i++) {
    echo "<td></td>";
    $diaSemana++;
    $contadorCeldas++;
}

// Días del mes
for ($dia = 1; $dia <= $numeroDiasMes; $dia++) {
    $fecha = $anio."-".str_pad($mes, 2, "0", STR_PAD_LEFT)."-".str_pad($dia, 2, "0", STR_PAD_LEFT);
    $diaNombre = date('N', mktime(0, 0, 0, $mes, $dia, $anio)); // 1=Lun ... 7=Dom

    $clase = "";

    // Día actual
    if ($fecha == date('Y-m-d')) {
        $clase .= "hoy";
    }

    // Festivo nacional o regional
    if (in_array($fecha, $festivos)) {
        $clase .= " festivo";
    } 
    // Fines de semana (solo si no es festivo)
    elseif ($diaNombre == 6 || $diaNombre == 7) { 
        $clase .= " finSemana";
    }

    echo "<td class='".$clase."'><a href='tareas.php?fecha=".$fecha."'>".$dia."</a></td>";
    $diaSemana++;
    $contadorCeldas++;

    // Saltar de fila cada 7 días
    if ($diaSemana > 7) {
        echo "</tr>";
        if ($dia < $numeroDiasMes) echo "<tr>";
        $diaSemana = 1;
    }
}

// Rellenar celdas vacías al final del mes
$resto = $contadorCeldas % 7;
if ($resto != 0) {
    for ($j = $resto; $j < 7; $j++) {
        echo "<td></td>";
    }
    echo "</tr>";
}
?>
</table>
</body>
</html>
