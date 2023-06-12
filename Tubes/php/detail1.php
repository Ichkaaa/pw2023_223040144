<?php 
require ('functions.php');
$id = $_GET["id"];
$guestStars = query("SELECT * FROM  guest_stars WHERE guest_star_id  = $id")[0];
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Guest Star</title>
    <link rel="stylesheet" href="main.css" />
    <!-- script font awesome kit-->
    <script
      src="https://kit.fontawesome.com/e18581a144.js"
      crossorigin="anonymous"
    ></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  </head>
<body>
<!-- navbar -->
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
<!-- navbar-end -->

 <section id="GuestStar" class="p-3" 
 >
    <div class="container-fluid mt-5">
        <div class="row">
            <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
                <div class="card p-1" style="width: 20rem">
                            <img src="../assets/img/<?= $guestStars['gambar']; ?>" alt="" class="w-100" />
                    <div class="card-body">
                        <h4><?= $guestStars['name']; ?></h4>
                        <p>Guest Star</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
               <p><?= $guestStars["description"]; ?></p>
            </div>
            
        
        </div>
    </div>
  </section>
  <?php include('../modular/footer.php') ?>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>

  