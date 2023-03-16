<?php
// ARRAY
// Membuat array
$hari = array('Senin', 'Selasa', 'Rabu');
$bulan = ['Januari', 'Februari', 'Maret'];
$myArray = ['Sandhika', 39, false];
$binatang = ['🐱', '🦁', '🐼', '🐬', '🐣'];

// Mencetak array
echo $hari[1];
echo "<br>" ;
echo $binatang[3];
echo "<hr>";

// mencetak seluruh isi array
// var_dump, print_r
var_dump($hari);
echo "<br>";
print_r($bulan);
echo "<br>";
var_dump($myArray);
echo "<br>";
print_r($binatang);
echo "<hr>";

// Manipulasi Array
// menggunakan index
$hari[3] = 'Kamis';
print_r($hari);
echo "<hr>";

// menambahkan elemen di akhir dengan mengosongkan indexnya
$hari[] = "Jum'at";
$hari[] = 'Sabtu';
print_r($hari);
echo "<hr>";

// menambahkan elemen di akhir menggunakan array_push
array_push($bulan, 'April', 'Mei', 'Juni');
print_r($bulan)
