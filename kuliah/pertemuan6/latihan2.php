<?php
$mahasiswa = [
['Ichka', '🐱', '🍿'], 
['Pebry', '🐉', '🍔'], 
['Chandra', '🦁', '🥨'], 
['Esa', '🐼', '🍖'], 
['Galuh', '🐬', '🥭']]
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
            <li>Nama: <?= $mhs [0]; ?></li>
            <li>Makanan Favorit: <?= $mhs [1]; ?></li>
            <li>Peliharaan: <?= $mhs [2]; ?></li>
        </ul>
    <?php }?>
    
    
</body>
</html>