<?php
session_start();

if (!isset($_SESSION["submit"])) {
    header("Location: login.php");
}

require 'functions.php';

// Mengambil data guest_star dari tabel guest_stars
$query = "SELECT guest_star_id, name FROM guest_stars";
$result = mysqli_query($conn, $query);

// Membangun opsi pilihan (dropdown) berdasarkan data guest_star
$options = "";
while ($row = mysqli_fetch_assoc($result)) {
    $guest_star_id = $row['guest_star_id'];
    $name = $row['name'];
    $options .= "<option value='$guest_star_id'>$name</option>";
}

// Memproses form saat tombol submit ditekan
if (isset($_POST["submit"])) {
    $data = [
        "jenis" => $_POST["jenis"],
        "harga" => $_POST["harga"],
        "jumlah_tiket" => $_POST["jumlah_tiket"],
        "keterangan" => $_POST["keterangan"],
        "guest_star_id" => $_POST["guest_star_id"],
    ];

    tambahTiket($data);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product</title>
    <!-- MyCSS -->
    <link rel="stylesheet" href="../assets/css/tambahdata.css">
    <!-- Metro 4 -->
    <link rel="stylesheet" href="https://cdn.metroui.org.ua/v4.3.2/css/metro-all.min.css">
    <!-- Icon -->
    <link rel="icon" href="../assets/img/logo-color.png">
</head>

<body style="background:url(../assets/img/wp\ sec.png);">
    <section class="add-product">
        <div class="container">
            <div class="grid">
                <div class="btn-cancel">
                    <a href="admin.php" onclick="return confirm('Apakah anda yakin ingin kembali?')"><i class="fas fa-times"></i></a>
                </div>
                <div class="row">
                    <div class="cell-10 offset-1">
                        <div class="title">
                            <p>Form Add Product</p>
                        </div>
                        <form action="" method="post" enctype="multipart/form-data">
                            <div class="field">
                                <label for="jenis">Jenis</label>
                                <input type="text" data-role="input" name="jenis" id="jenis" required>
                            </div>
                            <div class="field">
                                <label for="harga">Price</label>
                                <input type="number" data-role="input" name="harga" id="harga" class="mb-1" data-prepend="<span>Rp</span>" title="" required>
                            </div>
                            <div class="field">
                                <label for="jumlah_tiket">Jumlah tiket</label>
                                <input type="number" data-role="input" name="jumlah_tiket" id="jumlah_tiket" class="mb-1" data-prepend="<span></span>" title="" required>
                            </div>
                            <div class="field">
                                <label for="keterangan">Keterangan</label>
                                <input type="text" data-role="input" name="keterangan" id="keterangan" required>
                            </div>
                         
                            <div class="field">
                                <label for="guest_star_id">Guest Star</label>
                                <select name="guest_star_id" id="guest_star_id" required>
                                    <option value="" disabled selected>Pilih Guest Star</option>
                                    <?php echo $options; ?>
                                </select>
                            </div>
                            <div class="field">
                                <!-- Form gambar -->
                                <label for="gambar">Picture</label>
                                <input type="file" name="gambar" class="gambar">
                            </div>
                            <button type="submit" name="submit" class="button primary outline w-100">Add Product</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- FontAwesome -->
    <script src="https://kit.fontawesome.com/6dd84d01cb.js" crossorigin="anonymous"></script>
    <!-- Metro - 4 -->
    <script src="https://cdn.metroui.org.ua/v4.3.2/js/metro.min.js"></script>
    <script src="../js/script.js"></script>

</body>

</html>
