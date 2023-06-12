<!-- navbar -->
<nav class="navbar navbar-expand-lg fixed-top navbar-light black" data-bs-theme="light" style="background-color: #7661a800">
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
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li>
        <div class="dropdown">
          <a class="btn dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
            Guest Star
          </a>
          <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
            <li>
              <a class="dropdown-item" href="#sec1">ABOUT ANIFEST ANIME FESTIVAL!</a>
            </li>
            <li><a class="dropdown-item" href="#sec2">Why We Here</a></li>
          </ul>
        </div>
        <li class="nav-item">
          <a class="nav-link" href="Schedule.php">SCHEDULE</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#GuestStar">GuestStar</a>
        </li>
        <?php
          if (isset($_SESSION['submit'])) {
            echo '<li class="nav-item"><a class="nav-link" href="./php/logout.php">Logout</a></li>';
          } else {
            echo '<li class="nav-item"><a class="nav-link" href="./php/login.php">Login</a></li>';
          }
        ?>
      </ul>
      <form action="<?php echo $_SERVER['PHP_SELF']; ?>#GuestStar" method="get" class="d-flex" role="search">
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
