<?php
include("lib/function.php");

// Declaración de variables
$cantidad = 0;
$mostrarSuma = false;
$resultado = 0;
$mostrarResultado = false;

// Recuperación de datos
if(isset($_POST["enviar"])){
    $cantidad = clearData($_POST["cantidad"]);
    $mostrarSuma = true;
}

if (isset($_POST["sumar"]) && isset($_POST["n"])) {
    $cantidad = clearData($_POST["cantidad"]);
    $resultado = 0;
    foreach ($_POST["n"] as $num) {
        $resultado += $num;
    }
    $mostrarResultado = true;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Sumar números</title>
</head>
<body>

<form action="" method="post">
    Cantidad de números a sumar: 
    <input type="text" name="cantidad" value="<?php echo $cantidad; ?>"/>
    <button type="submit" name="enviar">Enviar</button>
</form>

<?php if($mostrarSuma): ?>
    <form action="" method="post">
        <?php for ($i = 0; $i < $cantidad; $i++): ?>
            Número <?php echo $i + 1; ?>: <input type="text" name="n[]"/><br/>
        <?php endfor; ?>
        <input type="hidden" name="cantidad" value="<?php echo $cantidad?>"/>
        <button type="submit" name="sumar">Sumar</button>
    </form>
<?php endif; ?>

<?php if($mostrarResultado): ?>
    <p>Resultado: <?php echo $resultado; ?></p>
<?php endif; ?>

</body>
</html>
