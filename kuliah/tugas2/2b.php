<?php
echo "<table>";
for ($x = 1; $x <= 10; $x++) {
    echo "<tr>";
    for ($y = 1; $y <= $x; $y++) {
        echo "<td>" . $y . "</td>";
    }
    echo "</tr>";
}
echo "</table>";
