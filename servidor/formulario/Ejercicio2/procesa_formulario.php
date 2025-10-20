<?php
/**
 * @author German Cosano
 * 
 * Archivo para procesar un formulario
 * 
 * 
 */
//Incluir la libreria de funciones
include('lib/function.php');

//Comprobamos que se dan las condiciones para ejecutar el script, TODAS LAS CONDICIONES
if (!isset($_POST['enviar'])){
    header('Location: muestra_formulario.php');
    exit();
}

//Cargamos en variables los datos que llegan del fomulario


$nombre = clearData($_POST['nombre']);
$curso = clearData($_POST['curso']);
$email = clearData($_POST['email']);

//Validaciones

if (empty($name)){
    $message = "El nombre no puede estar vacio ";
    $error = true;
}

if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
    $message = "Formato de email incorrecto";
}

if($error)
    header("Location: muestra_formulario.php?error='.$message'");
else
    echo $nombre;
    echo '<br/>';
    echo $curso;
    echo '<br/>';

