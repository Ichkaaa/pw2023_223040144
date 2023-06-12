<?php
require('functions.php');
$id = $_GET["id"];
$tiket = query("SELECT tiket.*, guest_stars.name AS nama_guest_star FROM tiket JOIN guest_stars ON tiket.guest_star_id = guest_stars.guest_star_id WHERE id = $id")[0];
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65"
          crossorigin="anonymous">
</head>
<body>
<nav class="navbar navbar-expand-lg fixed-top" data-bs-theme="light" style="background-color: rgb(222 151 255) !important">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">
      <img src="https://anifest.org/wp-content/uploads/2022/11/logo-no-year-white-neko.png" alt="" class="w-75">
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarColor01">
      <ul class="navbar-nav ms-auto me-auto mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="../index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../Schedule.php">SCHEDULE</a>
        </li>
        <?php
          if (isset($_SESSION['submit'])) {
            echo '<li class="nav-item"><a class="nav-link" href="./php/logout.php">Logout</a></li>';
          } else {
            echo '<li class="nav-item"><a class="nav-link" href="./php/login.php">Login</a></li>';
          }
        ?>
      </ul>

    </div>
  </div>
</nav>
<section style="margin-top: 70px;" id="inikatalog">
    <div class="container">
        <div class="row">
            <div class="col-12 my-2 py-3 d-flex align-item-center tittlecatalog">
                <h2 class="text-uppercase">TIKET</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 col-md-6 col-sm-12 ">
                <div class="card p-1" style="width: 20rem">
                    <img src="../assets/img/<?= $tiket['gambar']; ?>" alt="" class="w-100"/>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 ">
                <div class="card-body">
                    <h4><?= $tiket['jenis']; ?></h4>
                    <h4><?= $tiket['keterangan']; ?></h4>
                    <p>3/03/2023</p>
                    <h3>Bonus : Bertemu <br>
                <span><?= $tiket["nama_guest_star"]; ?></span></h3>
                    <div class="card-fasilitas">
                        <h4>RP.<?= $tiket['harga']; ?></h4>
                        <p>
                            Jika ingin membeli, hubungi nomor ini:
                            <span><a href="https://wa.me/628987654321">082232339083</a></span>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<div style="margin-top: 200px;">
<?php include('../modular/footer.php') ?>

</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
        crossorigin="anonymous"></script>
</body>
</html>
