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
    alert('Anda bukan admin!');
    window.location = '../index.php';
    </script>;";
    exit();
}

require 'functions.php';

$keyword = isset($_GET['keyword']) ? $_GET['keyword'] : '';
$tiket = query("SELECT tiket.*, guest_stars.name AS nama_guest_star FROM tiket JOIN guest_stars ON tiket.guest_star_id = guest_stars.guest_star_id WHERE tiket.jenis LIKE '%$keyword%' OR tiket.harga LIKE '%$keyword%' OR tiket.jumlah_tiket LIKE '%$keyword%' OR tiket.keterangan LIKE '%$keyword%' OR guest_stars.name LIKE '%$keyword%'");

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
                        <a class="btn btn-outline-danger px-3" role="button" href="../php/tambahdata2.php">Add Product</a>
                    </div>
                </div>
                <div class="col-6 col-lg-2  py-5 ">
                    <div class="cari">
                        <form action="" method="get">
                            <input type="text" name="keyword" class="keyword" placeholder="Cari disini.." data-role="input" autofocus>
                            <button type="submit" class="button secondary outline tombol-cari"><i class="fas fa-search"></i></button>
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
                        <th scope="col">Jenis</th>
                        <th scope="col">Harga</th>
                        <th scope="col">Jumlah tiket</th>
                        <th scope="col">Keuntungan</th>
                        <th scope="col">Nama Guest Star</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($tiket as $brg) : ?>
                        <tr>
                            <th scope="row"><?= $i ?></th>
                            <td><img src="../assets/img/<?= $brg["gambar"]; ?>" alt="foto" style="width: 150px;"></td>
                            <td><?= $brg["jenis"]; ?></td>
                            <td><?= $brg["harga"]; ?></td>
                            <td><?= $brg["jumlah_tiket"]; ?></td>
                            <td><?= $brg["keterangan"]; ?></td>
                            <td><?= $brg["nama_guest_star"]; ?></td>
                            <td>
                                <a class="btn btn-warning text-light fw-bold" href="ubahtiket.php?id=<?= $brg["id"]; ?>">ubah</a> |
                                <a class="btn btn-danger text-light fw-bold" href="hapus.php?id=<?= $brg["id"]; ?>" onclick="return confirm('yakin?')">hapus</a>
                            </td>
                        </tr>
                        <?php $i++; ?>
                    <?php endforeach; ?>

                    <!-- Tampilkan pesan jika tidak ada hasil pencarian -->
                    <?php if (empty($tiket)) : ?>
                        <tr>
                            <td colspan="8">Tidak ada data tiket yang cocok dengan kata kunci pencarian.</td>
                        </tr>
                    <?php endif; ?>

                </tbody>
            </table>
        </div>
    </section>
</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

</html>
