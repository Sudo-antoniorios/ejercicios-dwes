<?php
echo "<table border='1'>";

// Fila de números del 1 al 10)
echo "<tr><th>x</th>";
for ($i = 1; $i <= 10; $i++) {
    echo "<th>$i</th>";
}
echo "</tr>";

// Filas con resultados
for ($i = 1; $i <= 10; $i++) {
    echo "<tr>";
    echo "<th>$i</th>"; // número de la izquierda
    for ($j = 1; $j <= 10; $j++) {
        echo "<td>" . ($i * $j) . "</td>";
    }
    echo "</tr>";
}

echo "</table>";
?>
