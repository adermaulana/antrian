<?php
include '../koneksi.php';
session_start();


$id_loket = $_SESSION['id_loket'];

// Query data antrian
$query = "
    SELECT 
        a.nomor_antrian,
        a.status,
        l.nama as nama_loket
    FROM 
        antrian a
    JOIN 
    loket l ON a.loket_id = l.id       
    WHERE 
        a.status = 'menunggu' 
        AND a.loket_id = '$id_loket'
    ORDER BY a.id ASC
";

$result = mysqli_query($koneksi, $query);
$data = [];

while ($row = mysqli_fetch_assoc($result)) {
    $data[] = $row;
}

echo json_encode(['status' => 'success', 'data' => $data]);
?>
