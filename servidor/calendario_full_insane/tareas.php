<?php
// tareas.php - versión sin while

$fecha = isset($_GET['fecha']) ? $_GET['fecha'] : date('Y-m-d');

// Carpeta para guardar tareas
$directorio = "tareas";
if (!file_exists($directorio)) {
    mkdir($directorio, 0777);
}

$archivo = $directorio . "/tareas_" . $fecha . ".txt";

// Si se envió el formulario (hay $_POST)
if (isset($_POST['tarea'])) {
    $tarea = trim($_POST['tarea']);
    if ($tarea !== "") {
        file_put_contents($archivo, $tarea . "\n", FILE_APPEND);
    }
}

// Leer tareas guardadas sin while
$tareas = [];
if (file_exists($archivo)) {
    // file() lee todo el archivo en un array, una línea por elemento
    $tareas = file($archivo, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
}
?>
<html>
<head>
<meta charset="utf-8">
<title>Tareas del <?php echo $fecha; ?></title>
</head>
<body>
<h2>Tareas del día <?php echo $fecha; ?></h2>

<form method="post">
    <input type="text" name="tarea" placeholder="Escribe una tarea...">
    <input type="submit" value="Guardar">
</form>

<ul>
<?php if (count($tareas) > 0): ?>
    <?php foreach ($tareas as $t): ?>
        <li><?php echo htmlspecialchars($t); ?></li>
    <?php endforeach; ?>
<?php else: ?>
    <li>No hay tareas todavía.</li>
<?php endif; ?>
</ul>

<p><a href="calendario.php">Volver al calendario</a></p>
</body>
</html>
