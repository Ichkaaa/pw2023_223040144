<?php
$PcHardware = ["Motherboard", "Processor", "Hard Disk", "Pc Cooler", "VGA Card", "SSD"];
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
    <h4>Macam-macam perangkat keras komputer</h4>
    <ol>
        <?php for ($i = 0; $i < count($PcHardware); $i++) { ?>
            <li><?= $PcHardware[$i]; ?></li>
        <?php } ?>
    </ol>

    <?php
    array_unshift($PcHardware, "Card Reader", "Modem");
    sort($PcHardware) ?>
    <h4>Macam-macam perangkat keras komputer baru</h4>
    <ol>
        <?php for ($i = 0; $i < count($PcHardware); $i++) { ?>
            <li><?= $PcHardware[$i]; ?></li>
        <?php } ?>
    </ol>

</body>

</html>