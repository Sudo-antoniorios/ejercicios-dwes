<?php
/**
 * Autenticación básica con cookies y sesión
 * Autor: Antonio Ríos Casado
 * Fecha: 07/10/2025
 */

session_start();
include("lib/function.php");

// Poner rol al usuario
if (isset($_SESSION["user"])) {
    $nombre = $_SESSION["user"];
} else {
    $nombre = "invitado";
}


$auth = $_SESSION["auth"];
$usuario = "";
$password = "";
$msgSalida = "";
$recordar_credenciales = false;

// --- LEE COOKIES SI EXISTEN ---
if (isset($_COOKIE["ckusuario"])) $usuario = $_COOKIE["ckusuario"];
if (isset($_COOKIE["ckpassword"])) $password = $_COOKIE["ckpassword"];

// --- BASE DE DATOS DE USUARIOS (EJEMPLO) ---
$usuarios = [
    ["nombre" => "María", "usuario" => "admin", "psw" => "admin"],
    ["nombre" => "Pepe",  "usuario" => "usuario", "psw" => "usuario"]
];

// --- PROCESA FORMULARIO ---
if (isset($_POST["enviar"])) {
    $usuario = clearData($_POST["usuario"]);
    $password = clearData($_POST["password"]);
    $recordar_credenciales = isset($_POST["save"]);

    // Busca el usuario en el array
    $indice = array_search($usuario, array_column($usuarios, "usuario"));

    if ($indice !== false && $usuarios[$indice]["psw"] === $password) {
        // Credenciales válidas
        $_SESSION["auth"] = true;
        $_SESSION["user"] = $usuario;
        $auth = true;
        $msgSalida = "Credenciales correctas ✅";

        // Guarda cookies si el usuario lo pidió
        if ($recordar_credenciales) {
            setcookie("ckusuario", $usuario, time() + 3600);
            setcookie("ckpassword", $password, time() + 3600);
        }
    } else {
        $msgSalida = "Credenciales incorrectas ❌";
    }
}

// --- VARIABLES PARA LA VISTA ---
if (isset($_SESSION["user"])) {
    $nombre = $_SESSION["user"];
} else {
    $nombre = "invitado";
}

if (isset($_SESSION["auth"])) {
    $auth = $_SESSION["auth"];
} else {
    $auth = false;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Formulario Cuqui</title>
</head>
<body>
    <h1>Autenticación Básica</h1>

    <p><?= $msgSalida ?></p>

    <?php 
    if (!$auth) {
        include("include/login_view.php");
    } else {
        include("include/user_view.php");
    }
    ?>

    <nav>
        <?php include("include/nav_view.php"); ?>
    </nav>

    <p>Hola Home</p>
</body>
</html>
