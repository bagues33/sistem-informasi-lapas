

<body class="sub_page">
  <div class="hero_area">
    <!-- header section strats -->
    <header class="header_section">
      <div class="container-fluid">
        <nav class="navbar navbar-expand-lg custom_nav-container">
          <a class="navbar-brand" href="<?= base_url(); ?>">
            <img src="<?= base_url('assets/img/lapas.jpg'); ?>" alt="" />
          </a>
          <div class="navbar-collapse" id="">
            <ul class="navbar-nav justify-content-between ">
              <div class="User_option">
                <li class="">
                  <a class="mr-4" href="<?= base_url('login'); ?>">
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
                <!-- <a href="<?= base_url('homepage/daftarsel') ?>">CONTACT US</a> -->
              </div>
            </div>
          </div>
        </nav>
      </div>
    </header>
    <!-- end header section -->
  </div>


  <!-- about section -->

  <section class="about_section layout_padding-bottom">
    <div class="square-box">
      <img src="images/square.png" alt="">
    </div>
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <div class="img-box">
            <img src="<?= base_url('assets/img/about-lapas.jpeg'); ?>" alt="">
          </div>
        </div>
        <div class="col-md-6">
          <div class="detail-box">
            <div class="heading_container">
              <h2>
                About Lapas Kelas IIB Bantul
              </h2>
            </div>
            <p>
              Rumah Tahanan Negara Bantul merupakan Unit Pelaksana Teknis Pemasyarakatan di Kantor Wilayah Daerah Istimewa Yogyakarta  berlokasi di Jalan Guwosari Pajangan Bantul. Kotak Pos 155, Telepon : 0274 – 6461011 (Faks), 0274 – 6461 012
            </p>
            <a href="<?php echo base_url("homepage/about"); ?>">
              Read More
            </a>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- end about section -->


  <!-- info section -->
  <section class="info_section ">
    <div class="container">
      <div class="row">
        <div class="col-md-3">
          <div class="info_contact">
            <h5>
              About 
            </h5>
            <div>
              <div class="img-box">
                <img src="images/location.png" width="18px" alt="">
              </div>
              <p>
                JL. Guwosari, Pajangan, 55751, Iroyudan, Guwosari, Kec. Bantul, Kabupaten Bantul, Daerah Istimewa Yogyakarta 55751
              </p>
            </div>
            <div>
              <div class="img-box">
                <img src="images/phone.png" width="12px" alt="">
              </div>
              <p>
                (0274) 6461011
              </p>
            </div>
            <div>
              <div class="img-box">
                <img src="images/mail.png" width="18px" alt="">
              </div>
              <p>
                rutanbantul@kemenkumham.go.id
              </p>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="info_info">
            <h5>
              Information
            </h5>
            <p>
              Rumah Tahanan Negara Bantul merupakan Unit Pelaksana Teknis Pemasyarakatan di Kantor Wilayah Daerah Istimewa Yogyakarta  berlokasi di Jalan Guwosari Pajangan Bantul. 
            </p>
          </div>
        </div>

        <div class="col-md-3">
          <div class="info_links">
            <h5>
              Useful Link
            </h5>
            <ul>
              <li>
                <a href="">
                  Home
                </a>
              </li>
              <li>
                <a href="">
                  About
                </a>
              </li>
              <li>
                <a href="">
                  Daftar Tahanan
                </a>
              </li>
            </ul>
          </div>
        </div>
        <div class="col-md-3">
          <div class="info_form ">
            <h5>
              Newsletter
            </h5>
            <form action="">
              <input type="email" placeholder="Enter your email">
              <button>
                Subscribe
              </button>
            </form>
            <div class="social_box">
              <a href="">
                <img src="images/fb.png" alt="">
              </a>
              <a href="">
                <img src="images/twitter.png" alt="">
              </a>
              <a href="">
                <img src="images/linkedin.png" alt="">
              </a>
              <a href="">
                <img src="images/youtube.png" alt="">
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- end info_section -->


  <!-- footer section -->
  <section class="container-fluid footer_section ">
    <div class="container">
      <p>
        &copy; <span id="displayYear"></span> All Rights Reserved By
        <a href="https://html.design/">Kelompok 1</a>
      </p>
    </div>
  </section>
  <!-- end  footer section -->


  <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
  <script type="text/javascript" src="js/bootstrap.js"></script>
  <script type="text/javascript" src="js/custom.js"></script>

</body>
</body>

</html>