

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
                  <a class="" href="">
                    Sign up
                  </a>
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
  </div>

  <!-- sale section -->

  <section class="sale_section layout_padding">
    <div class="container-fluid">
      <div class="heading_container">
        <h2>
          Detail Tahanan
        </h2>
      </div>
      <div class="container">
        <div class="row">
          <div class="col-md-3">
              <img class="img-fluid" src="<?= base_url('assets/img/prisoner.png'); ?>" alt="">
          </div>
            <div class="col-md-9">
              <h3><?= $datatahanan['nama_tahanan']; ?></h3>
              <ul class="list-group list-group-flush">
                  <li class="list-group-item">Jenis kelamin: <?php echo $datatahanan['jenis_kelamin']; ?></li>
                  <li class="list-group-item">Tempat lahir: <?php echo $datatahanan['tempat_lahir']; ?></li>
                  <li class="list-group-item">Tanggal lahir: <?php echo $datatahanan['tgl_lahir']; ?></li>
                  <li class="list-group-item">Agama:  <?php echo $datatahanan['agama']; ?></li>
                  <li class="list-group-item">Nama Penanggungjawab: <?php echo $datatahanan['nama_png']; ?></li>
                  <li class="list-group-item">Telp Penanggungjawab: <?php echo $datatahanan['telp_png']; ?></li>
              </ul>
          </div>
        </div>
        <div class="row mt-4">
          <div class="col-md-6">
              <h5>Tanggal Masuk</h5>
              <p><?php echo $datatahanan['tgl_masuk']; ?></p>
              <h5>Kasus</h5>
              <p><?php echo $datatahanan['kasus']; ?></p>
          </div>
          <div class="col-md-6">
              <h5>Kejadian</h5>
              <p><?php echo $datatahanan['kejadian']; ?></p>
              <h5>Catatan</h5>
              <p><?php echo $datatahanan['catatan']; ?></p>
          </div>
        </div>
      </div>
      <!-- <div class="btn-box">
        <a href="">
          Find More
        </a>
      </div> -->
    </div>
  </section>

  <!-- end sale section -->



  <!-- info section -->
  <section class="info_section ">
    <div class="container">
      <div class="row">
        <div class="col-md-3">
          <div class="info_contact">
            <h5>
              About Apartment
            </h5>
            <div>
              <div class="img-box">
                <img src="images/location.png" width="18px" alt="">
              </div>
              <p>
                Address
              </p>
            </div>
            <div>
              <div class="img-box">
                <img src="images/phone.png" width="12px" alt="">
              </div>
              <p>
                +01 1234567890
              </p>
            </div>
            <div>
              <div class="img-box">
                <img src="images/mail.png" width="18px" alt="">
              </div>
              <p>
                demo@gmail.com
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
              ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
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
                  There are many
                </a>
              </li>
              <li>
                <a href="">
                  variations of
                </a>
              </li>
              <li>
                <a href="">
                  passages of
                </a>
              </li>
              <li>
                <a href="">
                  Lorem Ipsum
                </a>
              </li>
              <li>
                <a href="">
                  available, but
                </a>
              </li>
              <li>
                <a href="">
                  the i
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