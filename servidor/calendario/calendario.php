<?php

$mes = 9;
$año = 2025;

echo "L M X J V S D <br/>";

for ($i = 1; $i <=30; $i++){

    echo $i;

    if ($i % 7 == 0){
        echo "<br/>";
    }
}



?>