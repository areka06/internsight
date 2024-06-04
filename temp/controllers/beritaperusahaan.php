<?php
include '../../config/db.php';

// Mengecek koneksi
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Mulai atau lanjutkan sesi
session_start();

// Mengecek apakah ID perusahaan sudah disimpan dalam sesi
if(isset($_SESSION['id_perusahaan'])){
    // Mendapatkan ID perusahaan dari sesi
    $id_perusahaan = $_SESSION['id_perusahaan'];

    // Query untuk mengambil data berita berdasarkan ID perusahaan dari sesi
    $sql = "SELECT b.id_berita, b.judul_berita, b.gambar_berita, b.tanggal_awal, b.tanggal_akhir, b.nama_internship, b.deskripsi_berita, b.id_kategori, b.id_perusahaan, k.kategori, p.nama_perusahaan 
            FROM berita b 
            JOIN kategori k ON b.id_kategori = k.id_kategori
            JOIN akun_perusahaan p ON b.id_perusahaan = p.id_perusahaan
            WHERE b.id_perusahaan = $id_perusahaan"; // Menggunakan klausa WHERE untuk memfilter berdasarkan ID perusahaan
    $result = $conn->query($sql);

    // Cek apakah query berhasil dieksekusi
    if ($result->num_rows > 0) {
        // Output data dari setiap baris
        while($row = $result->fetch_assoc()) {
            // Lakukan sesuatu dengan data yang Anda dapatkan
            echo "ID Berita: " . $row["id_berita"]. " - Judul: " . $row["judul_berita"]. " - Perusahaan: " . $row["nama_perusahaan"]. "<br>";
        }
    } else {
        echo "Tidak ada berita untuk perusahaan ini.";
    }
} else {
    echo "ID perusahaan tidak tersedia dalam sesi.";
}

$conn->close();
?>
