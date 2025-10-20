<?php
include("lib/function.php");

$usuario = "";
$password = "";
$procesa_formulario = false;
$msgSalida = "Credenciales mal";
$recordar_credenciales = false;

if (isset($_COOKIE["ckusuario"]))
    $usuario = $_COOKIE["ckusuario"];

if (isset($_COOKIE["ckpassword"]))
    $password = $_COOKIE["ckpassword"];

if (isset($_POST["enviar"])) {
    $procesa_formulario = true;
    $usuario = clearData($_POST["usuario"]);
    $password = clearData($_POST["password"]);

    if (isset($_POST["save"]))
        $recordar_credenciales = true;

    if (($usuario == "admin") && ($password == "admin")) {
        $msgSalida = "Credenciales ok";

        if ($recordar_credenciales) {
            setcookie("ckusuario", $usuario, time() + 3600);
            setcookie("ckpassword", $password, time() + 3600);
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario Cuqui</title>
</head>
<body>
    <?php
    if ($procesa_formulario)
        echo $msgSalida;
    ?>
    <form action="" method="post">
        Usuario:
        <input type="text" name="usuario" value="<?php echo htmlspecialchars($usuario); ?>"/><br>
        
        Password:
        <input type="text" name="password" value="<?php echo htmlspecialchars($password); ?>"/><br>

        Recordar credenciales
        <input type="checkbox" name="save" /><br>

        <input type="submit" name="enviar" value="Enviar"/>
    </form>
</body>
</html>
