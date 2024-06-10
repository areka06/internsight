<?php
include '../../config/db.php';

// Mengecek koneksi
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Query untuk mengambil data berita beserta nama perusahaan
$sql = "SELECT b.id_perusahaan, b.nama_perusahaan, b.username
        FROM akun_perusahaan b";
$result = $conn->query($sql);

$conn->close();
?>
