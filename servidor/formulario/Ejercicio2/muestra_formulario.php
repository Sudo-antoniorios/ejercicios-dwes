<?php
$procesaFormulario = false;
$message = "";
//Declaramos mensajes de error

$nameError = $emailError = $groupError = "";
//Declaramos valores iniciales de las variables
$name = "";
$email = "";
$group = "";
$intereses = array();

//Determinamos si se pulso "SUBMIT" en el formulario
if (isset($_POST["send"])) {
    $procesaFormulario = true;
    $name = $_POST["name"];
    $email = $_POST["email"];
    $group = $_POST["group"];

    //Validación
    if (empty($name)) {
        $procesaFormulario = false;
        $nameError = "Nombre requerido";
    } 

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $procesaFormulario = false;
        $emailError = "Formato de email inválido";
    }

    if (empty($group)) {
        $procesaFormulario = false;
        $groupError = "";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        if (!$procesaFormulario) {
    ?>
    <form action="procesa_form.php" method="post">
        Nombre:<br>
        <input type="text" name="name" value="<?php echo $name .'<span class = "'.$nameError.'"></span>'?>"><br><br>

        Email:<br>
        <input type="text" name="email" value="<?php echo $email .'<span class = "'.$emailError.'"></span>'?>"><br><br>

        Selecciona el curso:<br>
        <?php
            include('config\config.php');
            foreach ($aData as $key => $value) {
                echo '<input type="radio" name="degrees" value="'.$key.'">'.$value.'<br>';
            }
        ?>

        <button type="submit" name="send">Enviar</button>
    </form>
    <?php 
        }
        else{

        }
    ?>
    <?php echo $message ?>
</body>
</html>