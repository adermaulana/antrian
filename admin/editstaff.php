<?php

include '../koneksi.php';

session_start();

if($_SESSION['status'] != 'login'){

    session_unset();
    session_destroy();

    header("location:../");

}

if (isset($_GET['id'])) {
  $id = $_GET['id'];

  $query = mysqli_query($koneksi, "SELECT * FROM staff WHERE id = '$id'");
  $data = mysqli_fetch_assoc($query);

  // Jika data tidak ditemukan
  if (!$data) {
      echo "<script>
              alert('Data tidak ditemukan!');
              document.location='staff.php';
            </script>";
      exit;
  }
} else {
  echo "<script>
          alert('ID tidak ditemukan!');
          document.location='staff.php';
        </script>";
  exit;
}

// Proses simpan data hasil edit
if (isset($_POST['update'])) {
  $nama = $_POST['name'];
  $username = $_POST['username'];
  $password = !empty($_POST['password']) ? md5($_POST['password']) : $data['password']; // Jika password kosong, gunakan yang lama
  $id_loket = $_POST['id_loket'];

  $update = mysqli_query($koneksi, "
      UPDATE staff 
      SET nama = '$nama', username = '$username', password = '$password', id_loket = '$id_loket' 
      WHERE id = '$id'
  ");

  if ($update) {
      echo "<script>
              alert('Update data sukses!');
              document.location='staff.php';
            </script>";
  } else {
      echo "<script>
              alert('Update data gagal!');
              document.location='editstaff.php?id=$id';
            </script>";
  }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Dashboard - Admin</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="../assets/img/favicon.png" rel="icon">
  <link href="../assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="../assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="../assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="../assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="../assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="../assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: NiceAdmin - v2.5.0
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="index.html" class="logo d-flex align-items-center">
        <img src="assets/img/logo.png" alt="">
        <span class="d-none d-lg-block">Admin</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->


    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">


        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <img src="../assets/img/profile-img.jpg" alt="Profile" class="rounded-circle">
            <span class="d-none d-md-block dropdown-toggle ps-2"><?= $_SESSION['nama_admin'] ?></span>
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6><?= $_SESSION['nama_admin'] ?></h6>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>
            <li>
              <a class="dropdown-item d-flex align-items-center" href="keluar.php">
                <i class="bi bi-box-arrow-right"></i>
                <span>Sign Out</span>
              </a>
            </li>

          </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->

      </ul>
    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link " href="index.php">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <li class="nav-heading">Pages</li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="antrian-aktif.php">
          <i class="bi bi-person"></i>
          <span>Antrian Aktif</span>
        </a>
      </li><!-- End Profile Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="riwayat-antrian.php">
          <i class="bi bi-envelope"></i>
          <span>Riwayat Antrian</span>
        </a>
      </li><!-- End Contact Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="laporan-antrian.php">
          <i class="bi bi-card-list"></i>
          <span>Laporan Antrian</span>
        </a>
      </li><!-- End Register Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="loket.php">
          <i class="bi bi-layout-text-window-reverse"></i>
          <span>Loket</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="staff.php">
          <i class="bi bi-layout-text-window-reverse"></i>
          <span>Customer Service</span>
        </a>
      </li>


    </ul>

  </aside><!-- End Sidebar-->

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Loket</h1>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Tambah Loket</h5>
              <form method="post">
                  <div class="row mb-3">
                      <label for="name" class="col-sm-2 col-form-label">Nama</label>
                      <div class="col-sm-6">
                          <input type="text" class="form-control" id="name" name="name" value="<?= $data['nama'] ?>" required autofocus>
                      </div>
                  </div>
                  <div class="row mb-3">
                      <label for="username" class="col-sm-2 col-form-label">Username</label>
                      <div class="col-sm-6">
                          <input type="text" class="form-control" id="username" name="username" value="<?= $data['username'] ?>" required>
                      </div>
                  </div>
                  <div class="row mb-3">
                      <label for="password" class="col-sm-2 col-form-label">Password</label>
                      <div class="col-sm-6">
                          <input type="password" class="form-control" id="password" name="password" placeholder="Kosongkan jika tidak ingin mengubah">
                      </div>
                  </div>
                  <div class="row mb-3">
                      <label class="col-sm-2 col-form-label">Loket</label>
                      <div class="col-sm-6">
                          <select class="form-select" name="id_loket" required>
                              <option value="" disabled>Pilih Loket</option>
                              <?php
                                  $loketQuery = mysqli_query($koneksi, "SELECT * FROM loket");
                                  while ($loket = mysqli_fetch_assoc($loketQuery)) {
                                      $selected = $loket['id'] == $data['id_loket'] ? 'selected' : '';
                                      echo "<option value='{$loket['id']}' $selected>{$loket['nama']}</option>";
                                  }
                              ?>
                          </select>
                      </div>
                  </div>
                  <div class="col-sm-6 mt-3">
                      <button type="submit" name="update" class="btn btn-primary">Update</button>
                      <a href="staff.php" class="btn btn-secondary">Batal</a>
                  </div>
              </form>
            </div>
          </div>



        </div>

      </div>
    </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>NiceAdmin</span></strong>. All Rights Reserved
    </div>
    <div class="credits">
      <!-- All the links in the footer should remain intact. -->
      <!-- You can delete the links only if you purchased the pro version. -->
      <!-- Licensing information: https://bootstrapmade.com/license/ -->
      <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
      Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="../assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/vendor/chart.js/chart.umd.js"></script>
  <script src="../assets/vendor/echarts/echarts.min.js"></script>
  <script src="../assets/vendor/quill/quill.min.js"></script>
  <script src="../assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="../assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="../assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="../assets/js/main.js"></script>

</body>

</html>