<?php

include 'koneksi.php';

// Check connection
if ($koneksi->connect_error) {
    die("Connection failed: " . $koneksi->connect_error);
}

// Get queue number from the request
$nomorAntrian = $_POST['nomor_antrian'];

// Get the total number of lokets
$result = $koneksi->query("SELECT id FROM loket");
$loketIds = $result->fetch_all(MYSQLI_ASSOC);

// Check if there are any lokets available
if (empty($loketIds)) {
    die("No lokets available.");
}

// Get the total number of lokets
$totalLokets = count($loketIds);

// Fetch the last loket_id used in the antrian
$result = $koneksi->query("SELECT loket_id FROM antrian ORDER BY id DESC LIMIT 1");
$lastQueue = $result->fetch_assoc();

// Determine the next loket_id in a round-robin manner
if ($lastQueue) {
    $lastLoketId = $lastQueue['loket_id'];
    // Find the index of the last loket_id
    $lastLoketIndex = array_search($lastLoketId, array_column($loketIds, 'id'));
    // Increment the index for round-robin assignment
    $loketIndex = ($lastLoketIndex + 1) % $totalLokets; // Wrap around if it exceeds the array length
} else {
    // If there is no last entry, start from the first loket
    $loketIndex = 0;
}

// Get the selected loket_id
$loketId = $loketIds[$loketIndex]['id'];

// Prepare and bind
$stmt = $koneksi->prepare("INSERT INTO antrian (nomor_antrian, loket_id, status) VALUES (?, ?, 'menunggu')");
$stmt->bind_param("si", $nomorAntrian, $loketId);

// Execute the statement
if ($stmt->execute()) {
    echo "Nomor antrian berhasil disimpan dengan loket ID: " . $loketId . " dan status: waiting";
} else {
    echo "Error: " . $stmt->error;
}

// Close the statement and connection
$stmt->close();
$koneksi->close();
?>
