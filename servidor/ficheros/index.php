<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Subida de archivos</h1>
    <form action="upload_file.php" method="post" enctype="multipart/form-data">
        <label for="file">Filename:</label>
        <input type="file" name="file" id="file"><br>
        <input type="submit" name="submit" value="Submit">
    </form>
</body>
</html>

<?php
$directorio = "uploads/";

if (is_dir($directorio)) {
    $archivos = scandir($directorio);
    foreach ($archivos as $archivo) {
        if ($archivo != '.' && $archivo != '..') {
            echo "<img src='$directorio$archivo' style='width:150px; margin:10px; border:1px solid #ccc;'>";
        }
    }
}
?>
