<?php
session_start();
require 'php/functions.php';
$guestStars = query("SELECT * FROM guest_stars");
$tiket = query("SELECT * FROM tiket");

if (isset($_GET['cari'])) {
  $keyword = $_GET['keyword'];
  $guestStars = cariGuestStars($keyword);
} else {
  $guestStars = query("SELECT * FROM guest_stars");
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Anifest</title>
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
   <?php include ('modular/navbar.php') ?>

    <!-- section event -->
    <section id="sec1" class="switchV1">
      <div class="container py-5">
        <div class="row">
          <div class="col-lg-6 align-self-center text-justify">
            <h2>ABOUT ANIFEST ANIME FESTIVAL!</h2>
            <p>
              AniFest is an annual Anime Festival held in Torrance, CA during
              the spring time. The event hosts over a hundred vendors, and has
              two stages for a variety of traditional and modern performances.
              Come and explore everything Japanese culture and Anime during this
              one-day festival of family fun!
            </p>
          </div>
          <div class="col-lg-6">
            <div class="px-4 py-5 align-self-center">
              <img
                src="https://anifest.org/wp-content/uploads/2023/03/anifest--anichan-point-sm-wm.png"
                alt=""
                class="py-3 w-100"
                style="border-radius: 30px 30px 30px 0px"
              />
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- section event end -->
    <!-- s e -->
    <section id="sec2" class="switchV2">
      <div class="container py-5">
        <div class="row">
          <div class="col-lg-6">
            <div class="px-4 py-5 align-self-center">
              <img
                src="https://anifest.org/wp-content/uploads/2023/03/anifest--anichan-point-sm-wm.png"
                alt=""
                style="border-radius: 30px 30px 30px 0px"
                class="py-3 w-100"
              />
            </div>
          </div>
          <div class="col-lg-6 align-self-center text-justify">
            <h2>Lorem</h2>
            <p>
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Error
              dolorem dolore veniam autem ut doloremque quia exercitationem
              recusandae dolorum tempora commodi culpa odio asperiores qui id,
              laborum vel numquam quis.
            </p>
          </div>
        </div>
      </div>
    </section>
    <!-- s e -->
    <!-- s -->

    <!-- s -->
    <!-- section whats's hot -->

    
<section id="GuestStar" class="p-3" style="background-color: #524747 !important">
<div class="container-fluid">
      <div class="row">
      <?php foreach ($guestStars as $star) : ?>
          <div class="col-lg-4 col-md-6 col-sm-12 mb-4 ">
              <div class="card p-1" style="width: 20rem">
              <img src="assets/img/<?= $star['gambar']; ?>" alt="" class="w-100" />
          <div class="card-body">
                <div class="card-body">
                 
                  <a href="php/detail1.php?id=<?= $star['guest_star_id']; ?>"><h4><?= $star['name']; ?></h4></a>


            <p>Guest Star</p>
                  </div>
                </div>
              </div>
            </a>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
</section>



    <!-- section whats's hot end-->
    <!-- fitur pilihan -->
    <section class="p-3 pb-4" style="background-color: #8b8686">
      <div class="container">
        <div class="row">
          <h2 class="text-center">TIKET</h2>
          <!-- <div class="col-lg-4 position-relative">
            <h4 class="text-center pt-1">VVIP</h4>
            <p class="text-center fs-3 fw-bold">RP.300.000</p>
            <img src="assets/img/vvip.png" alt="" class="w-100" />
            <div class="tombol">
            <button class="btn btn-dark tombol1" type="submit">
            <a href="php/detail3.php?id=<?= $tiket['id'];?>">BUY NOW</a>
              </button>
            </div>
          </div>
          <div class="col-lg-4 position-relative">
            <h4 class="text-center pt-1">VIP</h4>
            <p class="text-center fs-3 fw-bold">RP.200.000</p>
            <img src="assets/img/vip.png" alt="" class="w-100" />

            <div class="tombol">
            <button class="btn btn-dark tombol1" type="submit">
                <a href="php/detail3.php?id=<?= $tiket['id'];?>">BUY NOW</a>
              </button>
            </div>
          </div> -->
          <?php foreach ($tiket as $item): ?>
  <div class="col-lg-4 position-relative">
    <h4 class="text-center pt-1"><?= $item['jenis']; ?></h4>
    <p class="text-center fs-3 fw-bold">RP.<?= $item['harga']; ?></p>
    <img src="assets/img/<?= $item['gambar']; ?>" alt="" class="w-100" />
    <div class="tombol">
      <button class="btn btn-dark tombol1" type="submit">
        <a href="php/detail3.php?id=<?= $item['id']; ?>">BUY NOW</a>
      </button>
    </div>
  </div>
<?php endforeach; ?>

        </div>
      </div>
    </section>
    <!-- fitur pilihan end -->
    <!-- fitur terbaik adidas -->
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
              <h2 class="text-center pt-4">
                BE THE FIRST TO GET ANIFEST DEALS!
              </h2>
              <p class="text-center">
                Want to stay tuned with our adventures? Follow us on Instagram
                or even better, sign up on our newsletter! We host prizes,
                giveaways, cosplay showcases, and partner up with great
                organizations that host fun events… and you’ll be the first to
                be invited!
              </p>
              <p></p>
              <form style="width: 400px; max-width: 500px">
                <div class="mb-3">
                  <label for="exampleInputEmail1" class="form-label"
                    >Email address</label
                  >
                  <input
                    type="email"
                    class="form-control"
                    id="exampleInputEmail1"
                    aria-describedby="emailHelp"
                  />
                  <div id="emailHelp" class="form-text text-light">
                    We'll never share your email with anyone else.
                  </div>
                </div>

                <div class="mb-3 form-check">
                  <input
                    type="checkbox"
                    class="form-check-input"
                    id="exampleCheck1"
                  />
                  <label class="form-check-label" for="exampleCheck1"
                    >Check me out</label
                  >
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
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
    <!-- fitur terbaik adidas -->

   <?php include('modular/footer.php') ?>
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
