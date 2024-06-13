<?php
include '../../config/db.php';

// Mengecek koneksi
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Query untuk mengambil data berita beserta nama perusahaan
$sql = "SELECT b.id_berita, b.judul_berita, b.gambar_berita, b.tanggal_awal, b.tanggal_akhir, b.nama_internship, b.deskripsi_berita, b.id_kategori, b.id_perusahaan, k.kategori, p.nama_perusahaan 
        FROM berita b 
        JOIN kategori k ON b.id_kategori = k.id_kategori
        JOIN akun_perusahaan p ON b.id_perusahaan = p.id_perusahaan
        ORDER BY b.id_berita DESC"; // Menggunakan ORDER BY dengan DESC
$result = $conn->query($sql);

$conn->close();
?>
