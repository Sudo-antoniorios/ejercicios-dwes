<?php

/**
 * @author Antonio Ríos
 */

include("config/config.php");

$compañeros = array("Germán", "Antonio", "Ali", "Alfonso", "Ángel", "Adrián", "Miguel Ángel", "Roberto", "Fernando");
$numero = rand(MIN, MAX)

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Array con nombres de compañeros</title>
</head>
<body>
    <h1>Selección Alumnos<h1/>
    <br>
    <p><?php echo $compañeros[$numero] ?><p/>
    <a href="<?php echo $_SERVER["PHP_SELF"];?>">Recarga</a>
    
</body>
</html>