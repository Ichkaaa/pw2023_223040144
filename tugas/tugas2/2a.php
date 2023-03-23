<?php

$namaDepan = 'Ichka';
$namaBelakang = 'Sabila';

for ($x = 1; $x < 100; $x++) {
    if ($x % 3 == 0 && $x % 5 == 0) {
        echo $namaDepan . " " . $namaBelakang;
    } else if ($x % 3 == 0) {
        echo $namaDepan;
    } elseif ($x % 5 == 0) {
        echo $namaBelakang;
    } else {
        echo $x;
    };
    echo "<br>";
}