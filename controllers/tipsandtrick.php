<?php
include '../../config/db.php';

// Mengecek koneksi
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Query untuk mengambil data berita beserta nama perusahaan
$sql = "SELECT b.id_informasi, b.video, b.judul_informasi, b.deskripsi_informasi
        FROM informasi b";
$result = $conn->query($sql);

$conn->close();
?>
