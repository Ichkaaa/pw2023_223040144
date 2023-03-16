<?php
// ARRAY ASSOSIATIVE
//Array yang index adalah string yang kita buat sendiri
$mahasiswa = [
[
    'nama' => 'Ichka',
    'binatang' => '🐱',
    'makanan' => ['🍿']
], 
[
    'nama' => 'Pebry',
    'binatang' => '🐉',
    'makanan' => <div ,=""></div>
], 
[
    'nama' => 'Chandra',
    'binatang' => '🦁',
    'makanan' => '🥨'
], 
[
    'nama' => 'Esa',
    'binatang' => '🐼',
    'makanan' => '🍖'
], 
[
    'nama' => 'Galuh',
    'binatang' => '🐬',
    'makanan' => '🥭'
 ]]
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>Daftar Mahasiswa</h2>
    <?php foreach($mahasiswa as $mhs){ ?>
        <ul>
            <li>Nama: <?= $mhs ['nama']; ?></li>
            <li>Makanan Favorit: <?= $mhs ['makanan']; ?></li>
            <li>Peliharaan: <?= $mhs ['binatang']; ?></li>
        </ul>
    <?php } ?>
    
    
</body>
</html>