<?php

include '../koneksi.php';

session_start();

if($_SESSION['status'] != 'login'){

    session_unset();
    session_destroy();

    header("location:../");

}

$id_loket = $_SESSION['id_loket'];


$tampil = mysqli_query($koneksi, "SELECT * FROM loket WHERE id = '$id_loket'");
$data = mysqli_fetch_array($tampil);

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
            <span class="d-none d-md-block dropdown-toggle ps-2"><?= $_SESSION['nama_staff'] ?></span>
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6><?= $_SESSION['nama_staff'] ?></h6>
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
        <a class="nav-link collapsed" href="antrian.php">
          <i class="bi bi-person"></i>
          <span>Antrian</span>
        </a>
      </li><!-- End Profile Page Nav -->



    </ul>

  </aside><!-- End Sidebar-->

  <main id="main" class="main">

    <div class="pagetitle">
      <h1><?= $data['nama'] ?></h1>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">

            <!-- Recent Sales -->
            <div class="col-12">
              <div class="card recent-sales overflow-auto">
                <div class="card-body">
                <table class="table table-borderless datatable">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nomor Antrian</th>
                            <th scope="col">Status</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody id="antrianTableBody">
                        <!-- Data akan dimuat di sini -->
                    </tbody>
                </table>

                </div>

              </div>
            </div><!-- End Recent Sales -->

          </div>
        </div><!-- End Left side columns -->

        <!-- Right side columns -->
        <div class="col-lg-4">


        </div><!-- End Right side columns -->

      </div>
    </section>

    <div class="pagetitle">
      <h1>Dilayani</h1>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">

            <!-- Recent Sales -->
            <div class="col-12">
              <div class="card recent-sales overflow-auto">
                <div class="card-body">
                  <table class="table table-borderless datatable">
                    <thead>
                      <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nomor Antrian</th>
                        <th scope="col">Status</th>
                        <th scope="col">Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php
                        $no = 1;
                        $tampil = mysqli_query($koneksi, "SELECT 
                                                            a.nomor_antrian,
                                                            a.status,
                                                            l.nama as nama_loket
                                                        FROM 
                                                            antrian a
                                                        JOIN 
                                                        loket l ON a.loket_id = l.id       
                                                        WHERE 
                                                            a.status = 'aktif' 
                                                            AND a.loket_id = '$id_loket'
                                                        ORDER BY a.id ASC
                                                      ");
                        while($data = mysqli_fetch_array($tampil)):
                    ?>  
                      <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $data['nomor_antrian'] ?></td>
                        <td><?= $data['status'] ?></td>
                        <td>
                          <a href="proses_selesai.php?nomor_antrian=<?= $data['nomor_antrian'] ?>" onclick="return confirm('Apakah Anda Yakin Sudah Selesai?')" class="btn btn-success">Selesai</a>
                        </td>
                      </tr>
                      <?php
                        endwhile; 
                      ?>
                    </tbody>
                  </table>

                </div>

              </div>
            </div><!-- End Recent Sales -->

          </div>
        </div><!-- End Left side columns -->

        <!-- Right side columns -->
        <div class="col-lg-4">


        </div><!-- End Right side columns -->

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
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script>
function loadAntrian() {
    $.ajax({
        url: 'get_antrian.php',
        method: 'GET',
        dataType: 'json',
        success: function(response) {
            if (response.status === 'success') {
                const tableBody = $('#antrianTableBody');
                tableBody.empty(); // Kosongkan tabel

                let rows = '';
                let no = 1;

                response.data.forEach(item => {
                    rows += `
                        <tr>
                            <td>${no++}</td>
                            <td>${item.nomor_antrian}</td>
                            <td>${item.status}</td>
                            <td>
                                <a href="#" 
                                    onclick="return panggilDanRedirect(
                                        '${item.nomor_antrian}', 
                                        '${item.nama_loket}', 
                                        'proses_aktif.php?nomor_antrian=${item.nomor_antrian}'
                                    )" 
                                    class="btn btn-warning">Panggil</a>
                            </td>
                        </tr>
                    `;
                });

                tableBody.append(rows);
            } else {
                alert('Gagal memuat data antrian.');
            }
        },
        error: function() {
            alert('Terjadi kesalahan saat memuat data.');
        }
    });
}

// Panggil fungsi loadAntrian setiap 5 detik
setInterval(loadAntrian, 5000);

// Panggil pertama kali saat halaman dimuat
$(document).ready(function() {
    loadAntrian();
});
</script>


  <script>


// Fungsi untuk memanggil antrian
function panggilAntrian(nomorAntrian, namaLoket) {
    // Hentikan semua suara yang sedang berjalan
    window.speechSynthesis.cancel();

    const teksAntrian = `Nomor antrian ${nomorAntrian}, silahkan menuju ${namaLoket}`;
    console.log('Memanggil:', teksAntrian); // Debug log

    const speech = new SpeechSynthesisUtterance(teksAntrian);
    speech.lang = 'id-ID';
    speech.rate = 0.9;
    speech.volume = 1;
    speech.pitch = 1;

    speech.onerror = function(event) {
        console.error('Kesalahan speech:', event);
    };

    window.speechSynthesis.speak(speech);
    return speech;
}

// Fungsi untuk memanggil antrian dan redirect
function panggilDanRedirect(nomorAntrian, namaLoket, redirectUrl) {
    const speech = panggilAntrian(nomorAntrian, namaLoket);
    
    speech.onend = function() {
        setTimeout(() => {
            window.location.href = redirectUrl;
        }, 1000);
    };
    
    return false;
}
</script>

</body>

</html>