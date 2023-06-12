<?php
session_start();

if (!isset($_SESSION["submit"])) {
    header("Location: login.php");
    exit;
}

if (isset($_SESSION['role']) && $_SESSION['role'] === 'admin') {
    // Izinkan akses ke halaman admin
} else {
    // Redirect atau tampilkan pesan kesalahan jika bukan admin
    echo "<script>
    alert('anda bukan admin!');
    window.location = '../index.php';
    </script>;";
    exit();
}

require 'functions.php';

// Cek apakah tombol cari ditekan
if (isset($_GET['cari'])) {
    $keyword = $_GET['keyword'];
    $merchandise = cariMerchandise($keyword);
} else {
    $merchandise = query("SELECT * FROM merchandise");
}

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Halaman Admin</title>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght@100" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>

<body>
    <?php include('../modular/navbarAdmin.php') ?>

    <section class="admin mobile" style="margin-top:30px !important">
        <div class="container py-2 mobile tom " style="padding-top: 60px !important; ">
            <div class="row justify-content-between">
                <div class="col-6 col-lg-2 px-4 py-5 ">
                    <div class="tambah py-2">
                        <a class="btn btn-outline-danger px-3" role="button" href="../php/tambahdata.php">Add Product</a>
                    </div>
                </div>
                <div class="col-6 col-lg-2  py-5 ">
                    <div class="cari">
                        <form action="" method="get">
                            <input type="text" name="keyword" class="keyword form-control" placeholder="Cari disini.." autofocus>
                            <button type="submit" name="cari" class="btn btn-secondary-outline tombol-cari"><span class="material-symbols-outlined">
search
</span></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table table-bordered admin-container">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Gambar</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Harga</th>
                        <th scope="col">Deskripsi</th>
                        <th scope="col">Stok</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($merchandise as $brg) : ?>
                        <tr>
                            <th scope="row"><?= $i ?></th>
                            <td><img src="../assets/img/<?= $brg["gambar"]; ?>" alt="foto" style="width: 150px;"></td>
                            <td><?= $brg["nama"]; ?></td>
                            <td><?= $brg["harga"]; ?></td>
                            <td><?= $brg["deskripsi"]; ?></td>
                            <td><?= $brg["stok"]; ?></td>
                            <td>
                                <a class="btn btn-warning text-light fw-bold" href="ubahmerchandise.php?id=<?= $brg["id"]; ?>">ubah</a> |
                                <a class="btn btn-danger text-light fw-bold" href="hapus.php?id=<?= $brg["id"]; ?>" onclick="return confirm('yakin?')">hapus</a>
                            </td>
                        </tr>
                        <?php
                        $i++;
                    endforeach ?>
                </tbody>
            </table>
        </div>
    </section>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
    $(document).ready(function () {
        const tombolCari = $(".tombol-cari");
        const keyword = $(".keyword");
        const container = $(".admin-container");

        tombolCari.hide();

        //livesearch admin
        keyword.keyup(function () {
            var keywords = keyword.val().split(" "); // Mengelompokkan kata kunci menjadi array
            $.ajax({
                url: "../ajax/ajax_cari.php",
                data: {
                    keywords: keywords, // Menggunakan array kata kunci
                },
                type: "get",
                success: function (response) {
                    container.html(response);
                },
            });
        });
    });
    </script>

    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

</body>

</html>
