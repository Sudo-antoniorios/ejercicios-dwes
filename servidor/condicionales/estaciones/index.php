<?php
$mes = date("n");   // Mes actual (1-12)
$dia = date("j");   // Día del mes (1-31)

$foto = "fotos/invierno.jpg"; // Valor por defecto
$estacion = "Invierno";

// Primavera (21 marzo – 20 junio)
if (($mes == 3 && $dia >= 21) || ($mes > 3 && $mes < 6) || ($mes == 6 && $dia < 21)) {
    $foto = "fotos/primavera.jpg";
    $estacion = "Primavera";
}

// Verano (21 junio – 22 septiembre)
if (($mes == 6 && $dia >= 21) || ($mes > 6 && $mes < 9) || ($mes == 9 && $dia < 23)) {
    $foto = "fotos/verano.jpg";
    $estacion = "Verano";
}

// Otoño (23 septiembre – 20 diciembre)
if (($mes == 9 && $dia >= 23) || ($mes > 9 && $mes < 12) || ($mes == 12 && $dia < 21)) {
    $foto = "fotos/otoño.jpg";
    $estacion = "Otoño";
}

// Invierno (21 diciembre – 20 marzo)
if (($mes == 12 && $dia >= 21) || ($mes == 1) || ($mes == 2) || ($mes == 3 && $dia < 21)) {
    $foto = "fotos/invierno.jpg";
    $estacion = "Invierno";
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Estación del Año</title>
</head>
<body>
  <h1>Estamos en <?php echo $estacion; ?></h1>
  <img src="<?php echo $foto; ?>" alt="<?php echo $estacion; ?>" width="400">
</body>
</html>
