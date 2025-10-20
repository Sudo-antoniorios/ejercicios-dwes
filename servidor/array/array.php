<?php 
/**
 * 
 */

$numeros = array(1, 2, 3, 4, 5, 6, 7, 8, 9, 10);

for ($i = 0; $i < count($numeros); $i++) {
    echo $numeros[$i] . "<br/>";
}

foreach ($numeros as $clave => $valor) {
    echo "Clave: " . $clave . " - Valor: " . $valor . "<br/>";
}

foreach ($numeros as $valor) {
    echo "Valor: " . $valor . "<br/>";
}

$alumnos = array("nombre" => "Juan", "edad" => 25, "curso" => "2DAW");

var_dump($alumnos);

foreach ($alumnos as $clave => $valor) {
    echo $clave . ": " . $valor . "<br/>";
}

$alumnos = array(
    array("nombre" => "Juan", "edad" => 25, "curso" => "2DAW"),
    array("nombre" => "Ana", "edad" => 22, "curso" => "1DAW"),
    array("nombre" => "Luis", "edad" => 23, "curso" => "2DAW")
);

foreach ($alumnos as $alumno) {
    foreach ($alumno as $clave => $valor) {
        echo $clave . ": " . $valor . "<br/>";
    }
    echo "<br/>";
}
?>