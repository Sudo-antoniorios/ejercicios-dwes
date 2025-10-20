<?php

define("MIN", 0);
define("MAX", 100);
define("TAMAÑO", 10);

$array_pares = array();





while (count($array_pares) < TAMAÑO){
    $num = rand(MIN, MAX);
    if ($num % 2 == 0 && !in_array($num,$array_pares)){
        $array_pares[] = $num;
    } 
}


// $array_cuadrados = array_map(function);


print_r($array_pares)



?>