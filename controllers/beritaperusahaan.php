<?php 
include '../../config/db.php'; // Pastikan file ini berisi koneksi $conn yang valid

$id_perusahaan = $_SESSION['id_perusahaan']; // Ambil id_perusahaan dari session

// Pastikan koneksi database valid
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Query untuk mengambil data berdasarkan id_perusahaan dengan JOIN
$query = $conn->prepare('
    SELECT berita.*, akun_perusahaan.nama_perusahaan 
    FROM berita 
    JOIN akun_perusahaan ON berita.id_perusahaan = akun_perusahaan.id_perusahaan 
    WHERE berita.id_perusahaan = ?
    ORDER BY berita.id_berita DESC' // Menambahkan ORDER BY dengan id_berita dalam urutan descending
);
$query->bind_param('i', $id_perusahaan);
$query->execute();
$result = $query->get_result();

if ($result === false) {
    die("Query failed: " . $conn->error);
}
?>
