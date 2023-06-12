<?php
session_start();

if (!isset($_SESSION["submit"])) {
    header("Location: login.php");
    exit();
}

$conn = mysqli_connect("localhost:3306", "root", "", "tubes");
require 'functions.php';

$guest_star_id = $_GET['guest_star_id'];

$query = "SELECT * FROM guest_stars WHERE guest_star_id = $guest_star_id";
$result = mysqli_query($conn, $query);
$guest_stars = mysqli_fetch_assoc($result);

if (isset($_POST['ubah_guest_star'])) {
    if (ubahGuestStar($_POST)) {
        header("Location: admin3.php");
        exit();
    } else {
        echo "<script>
                alert('Data gagal diubah!');
                window.location.href = 'admin3.php';
              </script>";
    }
}
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Ubah Guest Star</title>
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
        <h1>Ubah Guest Star</h1>

        <form method="POST" action="ubahgueststar.php?guest_star_id=<?php echo $guest_star_id; ?>" enctype="multipart/form-data">
            <input type="hidden" name="guest_star_id" value="<?php echo $guest_stars['guest_star_id']; ?>">
            <div class="form-group">
                <label for="name">Nama Guest Star</label>
                <input type="text" class="form-control" id="name" name="name" value="<?php echo $guest_stars['name']; ?>">
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control" id="description" name="description"><?php echo $guest_stars['description']; ?></textarea>
            </div>
            <div class="form-group">
                <label for="gambar">Picture:</label> <br>
                <input type="file" name="gambar" id="gambar" onchange="previewImage()">
                <img src="../assets/img/<?= $guest_stars['gambar']; ?>" class="img-preview w-50">
            </div>
            <button type="submit" class="btn btn-primary" name="ubah_guest_star">Ubah Guest Star</button>
        </form>
    </div>
</body>

</html>
