

<body>
  <div class="hero_area">
    <!-- header section strats -->
    <header class="header_section">
      <div class="container-fluid">
        <nav class="navbar navbar-expand-lg custom_nav-container">
          <a class="navbar-brand" href="<?= base_url('homepage'); ?>">
            <img class="img-fluid" src="<?= base_url('assets/img/lapas.jpg'); ?>" alt="" />
          </a>
          <div class="navbar-collapse" id="">
            <ul class="navbar-nav justify-content-between ">
              <div class="User_option">
                <li class="">
                  <a class="mr-4" href="<?= base_url('login') ?>">
                    Login
                  </a>
                 <!--  <a class="" href="">
                    Sign up
                  </a> -->
                </li>
              </div>
            </ul>

            <div class="custom_menu-btn">
              <button onclick="openNav()">
                <span class="s-1">

                </span>
                <span class="s-2">

                </span>
                <span class="s-3">

                </span>
              </button>
            </div>
            <div id="myNav" class="overlay">
              <div class="overlay-content">
                <a href="<?= base_url('homepage') ?>">HOME</a>
                <a href="<?= base_url('homepage/about') ?>">ABOUT</a>
                <a href="<?= base_url('homepage/daftartahanan') ?>">DAFTAR TAHANAN</a>
                <!-- <a href="<?= base_url('homepage/daftarsel') ?>">DAFTAR SEL</a> -->
              </div>
            </div>
          </div>
        </nav>
      </div>
    </header>
    <!-- end header section -->