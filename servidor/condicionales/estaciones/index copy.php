<?php

$hoy = date("d-m")

// Primavera (21 marzo – 20 junio)
if ($hoy >= "21-3" && $hoy <= "20-6")
  echo "Es primavera"
  echo  <img src="fotos/primavera.jpg">

// Verano (21 junio – 22 septiembre)
if ($hoy >= "21-6" && $hoy <= "22-9")
  echo "Es verano"
  echo  <img src="fotos/verano.jpg">

// Otoño (23 septiembre – 20 diciembre)
if ($hoy >= "23-9" && $hoy <= "20-12")
  echo "Es otoño"
  echo  <img src="fotos/otoño.jpg">

// Invierno (21 diciembre – 20 marzo)
if ($hoy >= "21-12" && $hoy <= "20-3")
  echo "Es primavera"
  echo  <img src="fotos/primavera.jpg">
