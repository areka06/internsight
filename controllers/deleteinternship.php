    <?php
    include '../config/db.php';

    // Mengecek koneksi
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Mendapatkan id_berita dari URL
    $id_berita = isset($_GET['id']) ? intval($_GET['id']) : 0;

    if ($id_berita > 0) {
        // Query untuk menghapus data berita berdasarkan id_berita
        $sql = "DELETE FROM berita WHERE id_berita = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $id_berita);

        if ($stmt->execute()) {
            echo "<script>alert('Data berhasil dihapus.'); window.location.href='/internsight/view/perusahaan/internship.php';</script>";
        } else {
            echo "<script>alert('Error: " . $stmt->error . "'); window.location.href='/internsight/view/perusahaan/internship.php';</script>";
        }

        $stmt->close();
    } else {
        echo "<script>alert('ID berita tidak valid.'); window.location.href='/internsight/view/perusahaan/internship.php';</script>";
    }

    $conn->close();
    ?>
