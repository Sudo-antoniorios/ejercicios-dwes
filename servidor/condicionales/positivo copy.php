<?php

/**
 * Ejercicio que comprueba si un número es positivo o negativo y lo muestra en color
 * 
 * @author Antonio Ríos Casado
 * 
 */

# Declaración de variables
$numero = -3;
$mensaje = "";

# Comprobamos si es 0
if ($numero == 0) {
    $mensaje = "El número es 0";
}

# Comprobamos si es psitivo
if ($numero > 0) {
    $mensaje = "El número es positivo";
}

# Cmomprobamos si es ngativo
if ($numero < 0) {
    $mensaje = "El número es negativo";
}

?>

<!--Vista-->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .mensaje {color: #68d828ff;}
    </style>
</head>

<body>
    <h1>Numero positvo/negativo/0</h1>
    <p class = "mensaje">
    <?php

    echo $mensaje;
    ?>
    </p>
</body>
</html>