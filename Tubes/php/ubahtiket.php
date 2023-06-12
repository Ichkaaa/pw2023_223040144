<?php
session_start();

if (!isset($_SESSION["submit"])) {
    header("Location: login.php");
    exit();
}

require 'functions.php';

$conn = mysqli_connect("localhost:3306", "root", "", "tubes");

$id = $_GET['id'];

$query = "SELECT * FROM tiket WHERE id = $id";
$result = mysqli_query($conn, $query);
$tiket = mysqli_fetch_assoc($result);

if (isset($_POST['ubah_tiket'])) {
    if ($_FILES['gambar']['error'] === 4) {
        $gambar = $tiket['gambar']; // Jika tidak ada gambar baru, gunakan gambar lama
    } else {
        $gambar = upload('gambar'); // Jika ada gambar baru, upload gambar baru
    }

    $jenis = isset($_POST["jenis"]) ? htmlspecialchars($_POST["jenis"]) : "";
    $harga = isset($_POST["harga"]) ? htmlspecialchars($_POST["harga"]) : "";
    $jumlah_tiket = isset($_POST["jumlah_tiket"]) ? htmlspecialchars($_POST["jumlah_tiket"]) : "";
    $guest_star_id = isset($_POST["guest_star_id"]) ? htmlspecialchars($_POST["guest_star_id"]) : "";

    $query = "UPDATE tiket SET jenis = '$jenis', harga = '$harga', jumlah_tiket = '$jumlah_tiket', guest_star_id = '$guest_star_id', gambar = '$gambar' WHERE id = $id";
    mysqli_query($conn, $query);

    if (mysqli_affected_rows($conn) > 0) {
        header("Location: admin.php");
        exit();
    } else {
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
    <title>Ubah Tiket</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
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
</head>

<body>
    <div class="container">
        <h1>Ubah Tiket</h1>

        <form method="POST" action="ubahtiket.php?id=<?php echo $id; ?>" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?php echo $tiket['id']; ?>">
            <div class="form-group">
                <label for="jenis">Jenis Tiket</label>
                <input type="text" class="form-control" id="jenis" name="jenis" value="<?php echo isset($tiket['jenis']) ? htmlspecialchars($tiket['jenis']) : ''; ?>">
            </div>
            <div class="form-group">
                <label for="harga">Harga Tiket</label>
                <input type="number" class="form-control" id="harga" name="harga" value="<?php echo isset($tiket['harga']) ? htmlspecialchars($tiket['harga']) : ''; ?>">
            </div>
            <div class="form-group">
                <label for="jumlah_tiket">Jumlah Stok Tiket</label>
                <input type="number" class="form-control" id="jumlah_tiket" name="jumlah_tiket" value="<?php echo isset($tiket['jumlah_tiket']) ? htmlspecialchars($tiket['jumlah_tiket']) : ''; ?>">
            </div>
            <div class="form-group">
                <label for="guest_star_id">ID Guest Star</label>
                <input type="number" class="form-control" id="guest_star_id" name="guest_star_id" value="<?php echo isset($tiket['guest_star_id']) ? htmlspecialchars($tiket['guest_star_id']) : ''; ?>">
            </div>
            <div class="form-group">
                <label for="gambar">Gambar Tiket</label>
                <input type="file" class="form-control-file" id="gambar" name="gambar" onchange="previewImage()">
            </div>
            <div class="form-group">
                <img src="../assets/img/<?php echo $tiket['gambar']; ?>" class="img-preview" width="200">
            </div>
            <button type="submit" class="btn btn-primary" name="ubah_tiket">Ubah Tiket</button>
        </form>
    </div>
</body>

</html>
