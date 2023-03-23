<?php
$mahasiswa = [
    [
        "Nama" => "Galuh wikri ramadhan",
        "Nrp" => "223040147",
        "Email" => "Galuh.223040147@mail.unpas.ac.id",
        "Jurusan" => "Teknik Informatika"
       
    ],
    [
        "Nama" => "Ichka sabila",
        "Nrp" => "223040144",
        "Email" => "Ichka.223040144@mail.unpas.ac.id",
        "Jurusan" => "Teknik Informatika"
       
    ],
    [
        "Nama" => "Chandra Ardiansyah",
        "Nrp" => "223040160",
        "Email" => "chandra.223040160@mail.unpas.ac.id",
        "Jurusan" => "Teknik Informatika"
       
    ],
    [
        "Nama" => "Anisa Nursafitri",
        "Nrp" => "223040163",
        "Email" => "anisa.223040163@mail.unpas.ac.id",
        "Jurusan" => "Teknik Informatika"
       
    ],
    [
        "Nama" => "Pebry Andrian Jr.",
        "Nrp" => "223040149",
        "Email" =>"Pebry.223040149@mail.unpas.ac.id",
        "Jurusan" => "Teknik Informatika"

     ],
    [
        "Nama" => "Mustika weni",
        "Nrp" => "223040139",
        "Email" => "mustika.223040139@mail.unpas.ac.id",
        "Jurusan" => "Teknik Informatika"
       
    ],
    [
        "Nama" => "Yesi dedehidayanti",
        "Nrp" => "223040179",
        "Email" => "yesi.223040179@mail.unpas.ac.id",
        "Jurusan" => "Teknik Informatika"
           ],
    [
        "Nama" => "Syahbrina dinova",
        "Nrp" => "223040074",
        "Email" => "Syahbrina.223040074@mail.unpas.ac.id",
        "Jurusan" => "Teknik Informatika"
       
    ],
    [
        "Nama" => "Dena astia",
        "Nrp" => "223040116",
        "Email" => "Dena.223040116@mail.unpas.ac.id",
        "Jurusan" => "Teknik Informatika"
    ],
    [
        "Nama" => "Syerly aryanti",
        "Nrp" => "223040100",
        "Email" => "Syerly.223040100@mail.unpas.ac.id",
        "Jurusan" => "Teknik Informatika"
       
    ],
    [
        "Nama" => "Mahesa Radhiyanto",
        "Nrp" => "223040262",
        "Email" => "Mahesa.223040262@mail.unpas.ac.id",
        "Jurusan" => "Teknik Informatika"
       
    ]
 
]
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mahasiswa</title>
    <style>
        img {
            width: 100px;
            height: 100px;
        }
    </style>
</head>

<body>
    <h1>Daftar Mahasiswa</h1>
    <?php foreach ($mahasiswa as $mhs) : ?>
        <ul>
            
            <li>NAMA : <?= $mhs["Nama"]; ?></li>
            <li>NRP : <?= $mhs["Nrp"]; ?> </li>
            <li>EMAIL : <?= $mhs["Email"]; ?></li>
            <li>JURUSAN :<?= $mhs["Jurusan"]; ?> </li>
        </ul>
    <?php endforeach; ?>
</body>

</html>