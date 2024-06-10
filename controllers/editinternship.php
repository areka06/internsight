<?php
include '../../config/db.php';

// Mengecek koneksi
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Mendapatkan id_berita dari URL
$id_berita = isset($_GET['id']) ? intval($_GET['id']) : 0;

// Query untuk mengambil data berita berdasarkan id_berita
$sql = "SELECT b.id_berita, b.judul_berita, b.gambar_berita, b.tanggal_awal, b.tanggal_akhir, b.nama_internship, b.deskripsi_berita, b.id_kategori, b.id_perusahaan, k.kategori, p.nama_perusahaan 
        FROM berita b 
        JOIN kategori k ON b.id_kategori = k.id_kategori
        JOIN akun_perusahaan p ON b.id_perusahaan = p.id_perusahaan
        WHERE b.id_berita = ?";

$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id_berita);
$stmt->execute();
$result = $stmt->get_result();
?>