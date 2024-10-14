<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Portfolio Details - Vesperr Bootstrap Template</title>
  <meta name="description" content="">
  <meta name="keywords" content="">

  <!-- Favicons -->
  <link href="assets/home/img/favicon.png" rel="icon">
  <link href="assets/home/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/home/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/home/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/home/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/home/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/home/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="assets/home/css/main.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Vesperr
  * Template URL: https://bootstrapmade.com/vesperr-free-bootstrap-template/
  * Updated: Aug 07 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body class="portfolio-details-page">

  <header id="header" class="header d-flex align-items-center sticky-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center">

      <a href="index.php" class="logo d-flex align-items-center me-auto">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <!-- <img src="assets/img/logo.png" alt=""> -->
        <h1 class="sitename">Vesperr</h1>
      </a>

      <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="index.php" class="active">Home<br></a></li>
          <li><a href="index.php?#layanan">Layanan</a></li>
          <li><a href="index.php?#faq">Faq</a></li>
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>

      <a class="btn-getstarted" href="login.php">Login</a>

    </div>
  </header>

  <main class="main">

  <section id="portfolio-details" class="portfolio-details section">
  <div class="container" data-aos="fade-up" data-aos-delay="100">
    <div class="row gy-4">

      <!-- Bagian Kiri: Menampilkan Nomor Antrian -->
      <div class="col-lg-6">
        <div class="portfolio-details-slider swiper init-swiper">
          <div class="align-items-center">
            <div class="swiper-slide">
              <h3>Nomor Antrian Anda</h3>

              <div class="nomor-antrian-display" style="font-size: 48px; font-weight: bold;">
                <span id="nomorAntrian">A001</span>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Bagian Kanan: Tombol untuk Ambil Nomor Antrian -->
      <div class="col-lg-6">
        <div class="portfolio-info" data-aos="fade-up" data-aos-delay="200">
          <button class="btn btn-primary" id="ambilNomorAntrian" onclick="ambilNomor()">Ambil Nomor</button>
        </div>
      </div>

    </div>
  </div>
</section>

  </main>

  <footer id="footer" class="footer">

    <div class="container">
      <div class="copyright text-center ">
        <p>© <span>Copyright</span> <strong class="px-1 sitename">Vesperr</strong> <span>All Rights Reserved</span></p>
      </div>
      <div class="social-links d-flex justify-content-center">
        <a href=""><i class="bi bi-twitter-x"></i></a>
        <a href=""><i class="bi bi-facebook"></i></a>
        <a href=""><i class="bi bi-instagram"></i></a>
        <a href=""><i class="bi bi-linkedin"></i></a>
      </div>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you've purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: [buy-url] -->
        Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
      </div>
    </div>

  </footer>

  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Preloader -->
  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="assets/home/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/home/vendor/php-email-form/validate.js"></script>
  <script src="assets/home/vendor/aos/aos.js"></script>
  <script src="assets/home/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/home/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/home/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/home/vendor/imagesloaded/imagesloaded.pkgd.min.js"></script>
  <script src="assets/home/vendor/isotope-layout/isotope.pkgd.min.js"></script>

  <!-- Main JS File -->
  <script src="assets/home/js/main.js"></script>

</body>

</html>