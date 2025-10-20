<?php

/**
 * 
 * 
*/

$aPaises = array(
    array("id" => "es", "pais" => "España", "capital" => "Madrid"),
    array("id" => "fr", "pais" => "Francia", "capital" => "París"),
    array("id" => "it", "pais" => "Italia", "capital" => "Roma")

);

$nombrePaises = array_map(callback: function($pais): mixed{
    return $pais["pais"];   
}, array: $aPaises);

print_r(value: $nombrePaises)



?>