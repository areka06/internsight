<?php
session_start(); // Memulai sesi

// Cek apakah session 'id_perusahaan' sudah diset
if (!isset($_SESSION['id_perusahaan'])) {
    // Jika 'id_perusahaan' tidak ada dalam session, redirect ke halaman login
    header('Location: ../view/login.php');
    exit();
}

// Ambil nilai dari session
$idPerusahaan = $_SESSION['id_perusahaan'];
$namaPerusahaan = $_SESSION['nama_perusahaan'];

// Tampilkan atau gunakan nilai yang diambil
echo "ID Perusahaan: " . htmlspecialchars($idPerusahaan) . "<br>";
echo "Nama Perusahaan: " . htmlspecialchars($namaPerusahaan);
?>
