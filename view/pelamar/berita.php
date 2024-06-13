<?php
session_start();
if ($_SESSION['role'] !== 'pelamar') {
    $_SESSION['error'] = 'You must be logged in as "applicant" to access this page.';
    header('Location: /internsight/view/login.php');
    exit();
}
?>
<?php
include '../../controllers/berita.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Berita</title>
    <link rel="stylesheet" href="../assets/css/style.css"> 
</head>
<body>
    <h1>Berita</h1>
    <div class="berita-container">
        <?php
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
        ?>
                <div class='berita-item'>
                    <h2><?php echo $row["judul_berita"]; ?></h2>
                    <img src='../assets/images/<?php echo $row["gambar_berita"]; ?>' alt='<?php echo $row["judul_berita"]; ?>'>
                    <p><strong>Internship:</strong> <?php echo $row["nama_internship"]; ?></p>
                    <p><strong>Kategori:</strong> <?php echo $row["kategori"]; ?></p>
                    <p><strong>Nama Perusahaan:</strong> <?php echo $row["nama_perusahaan"]; ?></p>
                    <p><strong>Deskripsi:</strong> <?php echo $row["deskripsi_berita"]; ?></p>
                    <p><strong>Tanggal:</strong><?php echo $row["tanggal_awal"] . " hingga " . $row["tanggal_akhir"]; ?></p>
                </div>
        <?php
            }
        } else {
            echo "<p>Tidak ada berita tersedia.</p>";
        }
        ?>
    </div>
</body>
</html>
