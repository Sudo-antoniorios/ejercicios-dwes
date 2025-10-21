<?php
/**
 * 
 * 
 */

require_once '..\app\Models\perro.php';
require_once '..\app\Models\persona.php';

use app\Models\perro;
use app\Models\persona;

$perro = new Perro("tobi", "blanco");
echo "Dame la pata";
$perro->darPata();
$perro->entrenar();
$perro->entrenar();
$perro->entrenar();
$perro->entrenar();
$perro->entrenar();
$perro->entrenar();
$perro->darPata();

?>
