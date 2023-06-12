<?php
// Koneksi ke database
session_start();

if (!isset($_SESSION["submit"])) {
    header("Location: login.php");
    exit();
}

// Koneksi ke dbms
$conn = mysqli_connect("localhost:3306", "root", "", "tubes");
require 'functions.php';

// Ambil ID merchandise yang akan diubah
$id = $_GET['id'];

// Query untuk mengambil data merchandise berdasarkan ID
$query = "SELECT * FROM merchandise WHERE id = $id";
$result = mysqli_query($conn, $query);
$merchandise = mysqli_fetch_assoc($result);

// Proses form ubah merchandise
if (isset($_POST['ubah_merchandise'])) {
    // Panggil fungsi ubahMerchandise
    if (ubahMerchandise($_POST)) {
        // Jika berhasil diubah, tampilkan pesan data berhasil dirubah dan redirect kembali ke halaman admin.php
        echo "
        <script> 
         alert('data berhasil diubah!');
         document.location.href = 'admin.php';
        </script>
     ";
        exit();
    } else {
        // Jika gagal, tampilkan pesan error
        echo "<script>
                alert('Data gagal diubah!');
                window.location.href = 'admin.php';
              </script>";
    }
}
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Ubah Merchandise</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <h1>Ubah Merchandise</h1>

        <form method="POST" action="ubahmerchandise.php?id=<?php echo $id; ?>" enctype="multipart/form-data">

            <input type="hidden" name="id" value="<?php echo $merchandise['id']; ?>">
            <div class="form-group">
                <label for="nama">Nama Merchandise</label>
                <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $merchandise['nama']; ?>">
            </div>
            <div class="form-group">
                <label for="harga">Harga</label>
                <input type="text" class="form-control" id="harga" name="harga" value="<?php echo $merchandise['harga']; ?>">
            </div>
            <div class="form-group">
                <label for="deskripsi">Deskripsi</label>
                <textarea class="form-control" id="deskripsi" name="deskripsi"><?php echo $merchandise['deskripsi']; ?></textarea>
            </div>
            <div class="form-group">
                <label for="stok">Stok</label>
                <input type="number" class="form-control" id="stok" name="stok" value="<?php echo $merchandise['stok']; ?>">
            </div>
            <div class="form-group">
                <label for="gambar">Picture:</label> <br>
                <input type="file" name="gambar" id="gambar" onchange="previewImage()">

                <img src="../assets/img/<?= $merchandise['gambar']; ?>" class="img-preview w-50">
            </div>
            <button type="submit" class="btn btn-primary" name="ubah_merchandise">Ubah Merchandise</button>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        function previewImage() {
            const gambar = document.querySelector('#gambar');
            const imgPreview = document.querySelector('.img-preview');

            const fileGambar = new FileReader();
            fileGambar.readAsDataURL(gambar.files[0]);

            fileGambar.onload = function(e) {
                imgPreview.src = e.target.result;
            }
        }
    </script>
</body>

</html>
