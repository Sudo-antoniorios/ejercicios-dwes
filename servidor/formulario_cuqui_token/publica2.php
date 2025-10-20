<?php
include("lib/function.php");

session_start();
if (!isset($_SESSION["contador"])) {
    $_SESSION["contador"] = 0;
}

$contador_sesion = $_SESSION["contador"];


$contador_local = 0;

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
    <header>
        <h1>Autenticación Básica</h1>
    </header>
    <form action="" method="post">
        Usuario:
        <input type="text" name="usuario" value="<?php echo htmlspecialchars($usuario); ?>"/>
        
        Password:
        <input type="text" name="password" value="<?php echo htmlspecialchars($password); ?>"/>

        <input type="submit" name="enviar" value="Enviar"/>
    </form>
    <nav>
        <?php include("include/nav_view.php")?>
    </nav>

    <p>Hola Publica 2</p>
</body>
</html>