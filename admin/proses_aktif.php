<?php
require "../koneksi.php"; // Pastikan untuk menghubungkan ke database

if (isset($_GET['nomor_antrian'])) {
    $nomor_antrian = $_GET['nomor_antrian'];

    // Update status menjadi 'aktif'
    $update = mysqli_query($koneksi, "UPDATE antrian SET status = 'aktif' WHERE nomor_antrian = '$nomor_antrian'");

    if ($update) {
        echo "<script>
                alert('Status berhasil diubah menjadi aktif!');
                document.location='antrian-aktif.php'; // Ganti dengan halaman yang sesuai
              </script>";
    } else {
        echo "<script>
                alert('Gagal mengubah status!');
                document.location='antrian-aktif.php'; // Ganti dengan halaman yang sesuai
              </script>";
    }
} else {
    echo "<script>
            alert('Nomor antrian tidak ditemukan!');
            document.location='antrian-aktif.php'; // Ganti dengan halaman yang sesuai
          </script>";
}
?>
