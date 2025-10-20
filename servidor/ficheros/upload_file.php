<?php
if (isset($_FILES['file'])) {
    $directorio = "uploads/";

    // Crear carpeta si no existe
    if (!file_exists($directorio)) {
        mkdir($directorio, 0777, true);
    }

    // Datos del archivo subido
    $nombreArchivo = basename($_FILES["file"]["name"]);
    $rutaDestino = $directorio . $nombreArchivo;
    $tipoArchivo = strtolower(pathinfo($rutaDestino, PATHINFO_EXTENSION));
    $tamañoArchivo = $_FILES["file"]["size"];
    $tipoMime = $_FILES["file"]["type"];
    $temporal = $_FILES["file"]["tmp_name"];

    // Tipos de imagen permitidos
    $tiposPermitidos = ["jpg", "jpeg", "png", "gif"];

    if (in_array($tipoArchivo, $tiposPermitidos)) {

        if (move_uploaded_file($temporal, $rutaDestino)) {
            echo "<h3>✅ Imagen subida correctamente</h3>";

            // Mostrar información del archivo
            echo "<ul style='font-family:Arial; line-height:1.6'>";
            echo "<li><strong>📁 Nombre:</strong> $nombreArchivo</li>";
            echo "<li><strong>📏 Tamaño:</strong> " . round($tamañoArchivo / 1024, 2) . " KB</li>";
            echo "<li><strong>🖼️ Tipo MIME:</strong> $tipoMime</li>";
            echo "<li><strong>📍 Guardada en:</strong> $rutaDestino</li>";
            echo "</ul>";

            // Mostrar imagen
            echo "<img src='$rutaDestino' alt='Imagen subida' style='max-width:300px; border:1px solid #ccc; padding:5px;'><br><br>";
            echo "<a href='index.php'>⬅ Volver</a>";
        } else {
            echo "<h3 style='color:red'>❌ Error al mover el archivo.</h3>";
        }

    } else {
        echo "<h3 style='color:red'>❌ Solo se permiten imágenes (JPG, JPEG, PNG, GIF).</h3>";
    }
} else {
    echo "<h3 style='color:red'>No se recibió ningún archivo.</h3>";
}
?>
