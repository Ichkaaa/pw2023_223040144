<?php
$mahasiswa = ['Ichka', 'Lisa', 'Ela', 'Rinjani', 'Teuing'];
$binatang = ['🐱', '🦁', '🐼', '🐬', '🐣'];
$makanan = ['🥨', '🍿', '🍖', '🥭']
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Latihan 1</title>
</head>
<body>

<h2>Daftar Mahasiswa</h2>

<?php foreach($mahasiswa as $key => $mhs) { ?>
    <?= $key; ?>
<ul>
    <li>Nama : <?= $mhs; ?></li>
    <li>Makanan favorit : 🍿</li>
    <li>Peliharaan : 🐱</li>
</ul>
<?php } ?>
<hr>
<?php foreach($mahasiswa as $i => $mhs){ ?>
    <ul>
    <li>Nama : <?= $mhs;[$i]; ?></li>
    <li>Makanan favorit : <?= $makanan;[i]; ?></li>
    <li>Peliharaan : <?= $binatang ;[i];?> </li>
    </ul>
    <?php } ?>

    
</body>
</html>


