<?php
session_start();
require 'php/functions.php';

// Memeriksa apakah ada data yang dikirim melalui formulir
if (isset($_POST['submit'])) {
    // Mendapatkan nilai email dari formulir
    $email = $_POST['email'];

    // Memanggil fungsi untuk menyimpan data pelanggan
    saveCustomerData($email);
}

if (isset($_GET['cari'])) {
    $keyword = $_GET['keyword'];
    $merchandise = cariMerchandise($keyword);
} else {
    $merchandise = query("SELECT * FROM merchandise");
}
?>

<!-- Rest of the HTML code -->

<!-- Rest of the HTML code -->

 
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Adidas</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="main.css" />
    <!-- script font awesome kit-->
    <script
      src="https://kit.fontawesome.com/e18581a144.js"
      crossorigin="anonymous"
    ></script>
  </head>

  <body>
    <!-- header hero -->
    <section id="headhero1">
      <div class="container headhero">
        <div class="row">
          <div class="col-12">
            <div class="header-text">
              <h1>Check-out</h1>
              <button type="button" class="btn btn-dark mx-4">
                HERE <i class="fa-solid fa-arrow-right"></i>
              </button>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- header hero -->
    <nav
      class="navbar navbar-expand-lg fixed-top navbar-light black"
      data-bs-theme="light"
      style="background-color: #7661a800"
    >
      <div class="container-fluid">
        <a class="navbar-brand" href="#"
          ><img
            src="https://anifest.org/wp-content/uploads/2022/11/logo-no-year-white-neko.png"
            alt=""
            class="w-75"
        /></a>
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navbarColor01"
          aria-controls="navbarColor01"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarColor01">
          <ul class="navbar-nav ms-auto me-auto mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="index.php"
                >Home</a
              >
            </li>

            <li class="nav-item">
              <a class="nav-link" href="#inikatalog">Pricing</a>
            </li>
            <li class="nav-item">
            <?php
          if (isset($_SESSION['submit'])) {
            echo '<li class="nav-item"><a class="nav-link" href="./php/logout.php">Logout</a></li>';
          } else {
            echo '<li class="nav-item"><a class="nav-link" href="./php/login.php">Login</a></li>';
          }
        ?>
            </li>
          </ul>
          <form action="<?php echo $_SERVER['PHP_SELF']; ?>#inikatalog" method="get" class="d-flex" role="search">
            <input
              class="form-control me-2 keyword"
              type="search"
              aria-label="Search"
              name="keyword" 
              placeholder="Cari disini.." data-role="input" autofocus
            />
            <button type="submit" id="submitsearch" name="cari" class="btn btn-dark tombol1 tombol-cari"><i class="fas fa-search"></i></button>
          </form>
        </div>
      </div>
    </nav>
   
    <!-- navbar-end -->

       <!-- schedules start -->
    <section
    class="pt-3"
      style="
        background: url(data:image/svg+xml;base64,PHN2ZyAgZmlsbD0icmdiYSgxNDcsMzcsNTQsMC4xMSkiIGhlaWdodD0iOTZweCIgd2lkdGg9Ijk2cHgiIHZpZXdCb3g9IjAgMCA5NiA5NiIgcHJlc2VydmVBc3BlY3RSYXRpbz0ibm9uZSIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj48cGF0aCBkPSJNNDgsMEE0OCw0OCwwLDAsMSw5Niw0OCw0OCw0OCwwLDAsMSw0OCwwWm0wLDBBNDgsNDgsMCwwLDAsMCw0OCw0OCw0OCwwLDAsMCw0OCwwWk05Niw0OEE0OCw0OCwwLDAsMCw0OCw5Niw0OCw0OCwwLDAsMCw5Niw0OFpNMCw0OEE0OCw0OCwwLDAsMCw0OCw5Niw0OCw0OCwwLDAsMCwwLDQ4WiIvPjwvc3ZnPg==);
      "
    >
      <div
        style="background-color: rgba(255, 255, 255, 0.829)"
        class="container p-3"
      >
        <div class="row">
          <h4 class="text-center">ANIFEST EVENT STAGE SCHEDULE</h4>
          <p class="text-center text-danger-emphasis">
            Please note: Schedule times and guests may change without notice!
          </p>
          <div class="table-responsive" style="padding: 50px">
            <table class="table table-bordered">
              <thead>
                <tr class="table-primary">
                  <th
                    style="
                      empty-cells: hide;
                      border: none;
                      background-color: rgba(255, 255, 255, 0.473);
                    "
                  ></th>
                  <th>Grand Theater</th>
                  <th>Maid Cafe Stage</th>
                  <th>Torino Outdoor Stage</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <th style="background-color: rgb(212, 42, 42); color: white">
                    10:00 AM
                  </th>
                  <th></th>
                  <th></th>
                  <th>4</th>
                </tr>
                <tr>
                  <th style="background-color: rgb(212, 42, 42); color: white">
                    11:00 AM
                  </th>
                  <th>3</th>
                  <th>4</th>
                  <th>4</th>
                </tr>
                <tr>
                  <th style="background-color: rgb(212, 42, 42); color: white">
                    12:00 AM
                  </th>
                  <th>3</th>
                  <th>4</th>
                  <th>4</th>
                </tr>
                <tr>
                  <th style="background-color: rgb(212, 42, 42); color: white">
                    01:00 AM
                  </th>
                  <th>3</th>
                  <th>4</th>
                  <th>4</th>
                </tr>
                <tr>
                  <th style="background-color: rgb(212, 42, 42); color: white">
                    02:00 AM
                  </th>
                  <th>3</th>
                  <th>4</th>
                  <th>4</th>
                </tr>
                <tr>
                  <th style="background-color: rgb(212, 42, 42); color: white">
                    03:00 AM
                  </th>
                  <th>3</th>
                  <th>4</th>
                  <th>4</th>
                </tr>
                <tr>
                  <th style="background-color: rgb(212, 42, 42); color: white">
                    04:00 AM
                  </th>
                  <th>3</th>
                  <th>4</th>
                  <th>4</th>
                </tr>
                <tr>
                  <th style="background-color: rgb(212, 42, 42); color: white">
                    05:00 AM
                  </th>
                  <th>3</th>
                  <th>4</th>
                  <th>4</th>
                </tr>
                <tr>
                  <th style="background-color: rgb(212, 42, 42); color: white">
                    06:00 AM
                  </th>
                  <th>3</th>
                  <th>4</th>
                  <th>4</th>
                </tr>
                <tr>
                  <th style="background-color: rgb(212, 42, 42); color: white">
                    07:00 AM
                  </th>
                  <th>3</th>
                  <th>4</th>
                  <th>4</th>
                </tr>
                <tr>
                  <th style="background-color: rgb(212, 42, 42); color: white">
                    08:00 AM
                  </th>
                  <th>3</th>
                  <th>4</th>
                  <th>4</th>
                </tr>
              </tbody>
            </table>
          </div>
          <h4 class="text-center text-uppercase fst-italic">
            grand theater lobby
          </h4>
          <p class="text-center text-danger-emphasis">
            Meet & Greet your favorite stage performers, our sponsors, and
            cosplay guests!
          </p>
          <div class="table-responsive overflow-x-scroll">
            <table class="table table-bordered">
              <thead>
                <tr class="table-primary">
                  <th
                    style="
                      empty-cells: hide;
                      border: none;
                      background-color: rgb(255, 255, 255);
                    "
                  ></th>
                  <th>Booth P01</th>
                  <th>Booth P02</th>
                  <th>Booth P03</th>
                  <th>Booth P04</th>
                  <th>Booth P05</th>
                  <th>Booth P06</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <th style="background-color: rgb(212, 42, 42); color: white">
                    10:00 AM
                  </th>
                  <th class="text-black-50">RESERVED</th>
                  <th>Lola Zieta</th>
                  <th>Clarissa Punipun</th>
                  <th>Larrisa</th>
                  <th>Aliga</th>
                  <th>Cosplayer Newbie</th>
                </tr>
                <tr>
                  <th style="background-color: rgb(212, 42, 42); color: white">
                    11:00 AM
                  </th>
                  <th class="text-black-50">RESERVED</th>
                  <th>Lola Zieta</th>
                  <th>Clarissa Punipun</th>
                  <th>Larrisa</th>
                  <th>Aliga</th>
                  <th>Cosplayer Newbie</th>
                </tr>
                <tr>
                  <th style="background-color: rgb(212, 42, 42); color: white">
                    12:00 AM
                  </th>
                  <th class="text-black-50">RESERVED</th>
                  <th>Lola Zieta</th>
                  <th>Clarissa Punipun</th>
                  <th>Larrisa</th>
                  <th>Aliga</th>
                  <th>Cosplayer Newbie</th>
                </tr>
                <tr>
                  <th style="background-color: rgb(212, 42, 42); color: white">
                    01:00 AM
                  </th>
                  <th class="text-black-50">RESERVED</th>
                  <th>Lola Zieta</th>
                  <th>Clarissa Punipun</th>
                  <th>Larrisa</th>
                  <th>Aliga</th>
                  <th>Cosplayer Newbie</th>
                </tr>
                <tr>
                  <th style="background-color: rgb(212, 42, 42); color: white">
                    02:00 AM
                  </th>
                  <th class="text-black-50">RESERVED</th>
                  <th>Lola Zieta</th>
                  <th>Clarissa Punipun</th>
                  <th>Larrisa</th>
                  <th>Aliga</th>
                  <th>Cosplayer Newbie</th>
                </tr>
                <tr>
                  <th style="background-color: rgb(212, 42, 42); color: white">
                    03:00 AM
                  </th>
                  <th class="text-black-50">RESERVED</th>
                  <th>Lola Zieta</th>
                  <th>Clarissa Punipun</th>
                  <th>Larrisa</th>
                  <th>Aliga</th>
                  <th>Cosplayer Newbie</th>
                </tr>
                <tr>
                  <th style="background-color: rgb(212, 42, 42); color: white">
                    04:00 AM
                  </th>
                  <th class="text-black-50">RESERVED</th>
                  <th>Lola Zieta</th>
                  <th>Clarissa Punipun</th>
                  <th>Larrisa</th>
                  <th>Aliga</th>
                  <th>Cosplayer Newbie</th>
                </tr>
                <tr>
                  <th style="background-color: rgb(212, 42, 42); color: white">
                    05:00 AM
                  </th>
                  <th class="text-black-50">RESERVED</th>
                  <th>Lola Zieta</th>
                  <th>Clarissa Punipun</th>
                  <th>Larrisa</th>
                  <th>Aliga</th>
                  <th>Cosplayer Newbie</th>
                </tr>
                <tr>
                  <th style="background-color: rgb(212, 42, 42); color: white">
                    06:00 AM
                  </th>
                  <th class="text-black-50">RESERVED</th>
                  <th>Lola Zieta</th>
                  <th>Clarissa Punipun</th>
                  <th>Larrisa</th>
                  <th>Aliga</th>
                  <th>Cosplayer Newbie</th>
                </tr>
                <tr>
                  <th style="background-color: rgb(212, 42, 42); color: white">
                    07:00 AM
                  </th>
                  <th class="text-black-50">RESERVED</th>
                  <th>Lola Zieta</th>
                  <th>Clarissa Punipun</th>
                  <th>Larrisa</th>
                  <th>Aliga</th>
                  <th>Cosplayer Newbie</th>
                </tr>
                <tr>
                  <th style="background-color: rgb(212, 42, 42); color: white">
                    08:00 AM
                  </th>
                  <th class="text-black-50">RESERVED</th>
                  <th>Lola Zieta</th>
                  <th>Clarissa Punipun</th>
                  <th>Larrisa</th>
                  <th>Aliga</th>
                  <th>Cosplayer Newbie</th>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </section>

    
    <!-- schedules end -->
    <section>
      <div class="container-fluid">
        <div class="custom-shape-divider-top-1683153963">
          <svg
            data-name="Layer 1"
            xmlns="http://www.w3.org/2000/svg"
            viewBox="0 0 1200 120"
            preserveAspectRatio="none"
          >
            <path
              d="M0,0V46.29c47.79,22.2,103.59,32.17,158,28,70.36-5.37,136.33-33.31,206.8-37.5C438.64,32.43,512.34,53.67,583,72.05c69.27,18,138.3,24.88,209.4,13.08,36.15-6,69.85-17.84,104.45-29.34C989.49,25,1113-14.29,1200,52.47V0Z"
              opacity=".25"
              class="shape-fill"
            ></path>
            <path
              d="M0,0V15.81C13,36.92,27.64,56.86,47.69,72.05,99.41,111.27,165,111,224.58,91.58c31.15-10.15,60.09-26.07,89.67-39.8,40.92-19,84.73-46,130.83-49.67,36.26-2.85,70.9,9.42,98.6,31.56,31.77,25.39,62.32,62,103.63,73,40.44,10.79,81.35-6.69,119.13-24.28s75.16-39,116.92-43.05c59.73-5.85,113.28,22.88,168.9,38.84,30.2,8.66,59,6.17,87.09-7.5,22.43-10.89,48-26.93,60.65-49.24V0Z"
              opacity=".5"
              class="shape-fill"
            ></path>
            <path
              d="M0,0V5.63C149.93,59,314.09,71.32,475.83,42.57c43-7.64,84.23-20.12,127.61-26.46,59-8.63,112.48,12.24,165.56,35.4C827.93,77.22,886,95.24,951.2,90c86.53-7,172.46-45.71,248.8-84.81V0Z"
              class="shape-fill"
            ></path>
          </svg>
        </div>
        <div
          style="
            background: rgb(243, 137, 183);
            background: radial-gradient(
              circle,
              rgba(243, 137, 183, 1) 0%,
              rgba(107, 178, 215, 1) 100%
            );
          "
          class="container p-5"
        >
          <div class="row">
            <div class="col-lg-6 col-sm-12">
              <img
                style="border-radius: 20px !important; border: 3px solid black"
                src="https://anifest.org/wp-content/uploads/2022/10/ani-chan-subscribe-section-lowres.png?v=1667267448"
                alt=""
                class="w-75"
              />
            </div>
            <div
              style="background-color: rgba(0, 0, 0, 0.324) !important"
              class="col-lg-6 col-sm-12 text-bg-dark"
            >
            <h2 class="text-center pt-4">BE THE FIRST TO GET ANIFEST DEALS!</h2>
<p class="text-center">Want to stay tuned with our adventures? Follow us on Instagram or even better, sign up on our newsletter! We host prizes, giveaways, cosplay showcases, and partner up with great organizations that host fun events… and you’ll be the first to be invited!</p>
<form style="width: 400px; max-width: 500px" method="POST">
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Email address</label>
        <input type="email" class="form-control" id="exampleInputEmail1" name="email" aria-describedby="emailHelp" required>
        <div id="emailHelp" class="form-text text-light">
            We'll never share your email with anyone else.
        </div>
    </div>
    <div class="mb-3 form-check">
        <input type="checkbox" class="form-check-input" id="exampleCheck1">
        <label class="form-check-label" for="exampleCheck1">Check me out</label>
    </div>
    <button type="submit" class="btn btn-primary" name="submit">Submit</button>
</form>

              <p></p>
            </div>
          </div>
        </div>
        <div class="custom-shape-divider-bottom-1683153825">
          <svg
            data-name="Layer 1"
            xmlns="http://www.w3.org/2000/svg"
            viewBox="0 0 1200 120"
            preserveAspectRatio="none"
          >
            <path
              d="M0,0V6c0,21.6,291,111.46,741,110.26,445.39,3.6,459-88.3,459-110.26V0Z"
              class="shape-fill"
            ></path>
          </svg>
        </div>
      </div>
    </section>
    <section id="inikatalog">
      <div class="container">
        <div class="row">
          <div class="col-12 my-2 py-3 d-flex align-item-center tittlecatalog">
            <h2 class="text-uppercase">Get your badge to anifest</h2>
          </div>
        </div>
        <div class="row">
          <?php foreach ($merchandise as $star) : ?>
          <div class="col-lg-4 col-md-6 col-sm-12 mb-4 gambarnaek">
            <div class="card p-1" style="width: 20rem">
            <img src="assets/img/<?= $star['gambar']; ?>" alt="" class="w-100" />
              <div class="card-body">
              <h4><?= $star['nama']; ?></h4>
              <br>
              <br>
              <h4> <?= $star['deskripsi']; ?></h4>
              
                <p>3/03/2023</p>
                <div class="card-fasilitas">
                  <h4>RP.<?= $star['harga']; ?></h4>

                  <p>
                    <a href="php/detail2.php?id=<?= $star['id']; ?>" type="button" class="btn btn-dark jajan">
                      Buy Here
                    </a>
                  </p>
                </div>
              </div>
            </div>
          </div>
          <?php endforeach; ?>
        </div>
      </div>
    </section>


    <!-- section about2 end -->
    <!-- end Footer1 -->
    <section class="bg-dark text-light pt-3">
      <div class="container">
        <div class="row">
          <div class="col-12 col-lg-12 col-md-6 d-flex">
            <p>
              <img
                src="https://anifest.org/wp-content/uploads/2022/11/logo-no-year-white-neko.png"
                alt=""
                class="w-75"
              />
            </p>
            <p class="privasykanan" style="max-width: 350px">
              © Copyright 2022 AniFest Anime Festival. All images are used with
              permission. All Rights Reserved. Website developed by AniFest.
              Powered by Amazon Web Services.
            </p>
          </div>
        </div>
      </div>
    </section>
    <!-- end footer1 end -->
  </body>
  <script src="./css/js/function.js"></script>
 
  <script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
    crossorigin="anonymous"
  ></script>
  <script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
  <script src="./css/js/function.js"></script>
</html>
