<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Antrian BRI</title>
    <meta name="description" content="">
    <meta name="keywords" content="">

    <!-- Favicons -->
    <link href="https://upload.wikimedia.org/wikipedia/commons/2/2e/BRI_2020.svg" rel="icon">
    <link href="https://upload.wikimedia.org/wikipedia/commons/2/2e/BRI_2020.svg" rel="apple-touch-icon">

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

    <style>
        .btn-center {
            display: block;
            margin: 10px auto;
            padding: 15px 30px;
            font-size: 18px;
        }

        .nomor-antrian {
            margin-top: 20px;
            font-size: 48px;
            font-weight: bold;
            text-align: center;
        }

        .text-center {
            text-align: center;
        }

        .portfolio-details-slider {
            padding: 20px;
            background-color: #f8f9fa;
            border-radius: 10px;
        }

        .swiper-slide {
            padding: 20px;
            text-align: center;
        }

        .swiper-slide img {
            width: 150px;
        }
    </style>
</head>

<body class="portfolio-details-page">

    <header id="header" class="header d-flex align-items-center sticky-top">
        <div class="container-fluid container-xl position-relative d-flex align-items-center">

            <a href="index.php" class="logo d-flex align-items-center me-auto">
                <img src="https://upload.wikimedia.org/wikipedia/commons/2/2e/BRI_2020.svg">
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
                        <div class="portfolio-details-slider swiper init-swiper" id="antrianCard">
                            <div class="align-items-center">
                                <div class="swiper-slide">
                                    <img src="assets/img/bri.png">
                                    <h3 class="text-center">Nomor Antrian Anda</h3>
                                    <div class="nomor-antrian-display text-center" style="font-size: 48px; font-weight: bold;">
                                        <span id="nomorAntrian"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Bagian Kanan: Tombol untuk Ambil Nomor Antrian -->
                    <div class="col-lg-6 d-flex flex-column align-items-center">
                        <button class="btn btn-primary btn-center" id="ambilNomorAntrian" onclick="ambilNomor()">Ambil Nomor Antrian</button>
                        <button class="btn btn-secondary btn-center" id="cetakNomorAntrian" onclick="cetakNomor()" disabled>Cetak & Download PDF</button>
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
                Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
            </div>
        </div>
    </footer>

    <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <div id="preloader"></div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>

    <script src="assets/home/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/home/vendor/php-email-form/validate.js"></script>
    <script src="assets/home/vendor/aos/aos.js"></script>
    <script src="assets/home/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="assets/home/vendor/purecounter/purecounter_vanilla.js"></script>
    <script src="assets/home/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="assets/home/vendor/imagesloaded/imagesloaded.pkgd.min.js"></script>
    <script src="assets/home/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="assets/home/js/main.js"></script>

    <script>
        window.onload = function () {
            resetNomorAntrian();
        }

        function resetNomorAntrian() {
            localStorage.removeItem('nomorAntrianTerakhir');
            document.getElementById("nomorAntrian").textContent = "BRI000"; // Nomor default
        }

        let nomorAntrian = null;

        function getLastNomorAntrian() {
            return localStorage.getItem('nomorAntrianTerakhir') || 'BRI000'; // Mulai dari BRI000 jika belum ada data
        }

        function setLastNomorAntrian(nomor) {
            localStorage.setItem('nomorAntrianTerakhir', nomor);
        }

        function ambilNomor() {
            let lastNomor = getLastNomorAntrian();
            let angka = parseInt(lastNomor.replace('BRI', ''), 10) + 1;
            nomorAntrian = 'BRI' + angka.toString().padStart(3, '0');

            document.getElementById("nomorAntrian").textContent = nomorAntrian;
            setLastNomorAntrian(nomorAntrian);
            document.getElementById("cetakNomorAntrian").disabled = false;

            // Kirim nomor antrian ke server
            fetch('save_antrian.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: 'nomor_antrian=' + encodeURIComponent(nomorAntrian)
            })
            .then(response => response.text())
            .then(data => {
                console.log(data); // Tampilkan respon dari server
            })
            .catch((error) => {
                console.error('Error:', error);
            });
        }

        function setLastNomorAntrian(nomor) {
            localStorage.setItem('nomorAntrianTerakhir', nomor);
        }

        function cetakNomor() {
            const { jsPDF } = window.jspdf;

            html2canvas(document.querySelector("#antrianCard")).then(canvas => {
                const imgData = canvas.toDataURL("image/png");
                const pdf = new jsPDF();
                pdf.addImage(imgData, 'PNG', 0, 0);
                pdf.save("nomor_antrian.pdf");
            });
        }
    </script>
</body>

</html>
