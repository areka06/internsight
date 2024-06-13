<?php
// Include file database.php
include '../config/db.php';

// Start session
session_start();

// Check if the request method is POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Ambil nilai dari formulir
    $judul_berita = $_POST['judul_berita'];
    $nama_internship = $_POST['nama_internship'];
    $deskripsi_berita = $_POST['deskripsi_berita'];
    $tanggal_awal = $_POST['tanggal_awal'];
    $tanggal_akhir = $_POST['tanggal_akhir'];
    $id_kategori = $_POST['id_kategori'];
    $id_perusahaan = $_POST['id_perusahaan']; // Ambil id perusahaan dari input hidden

    // Handle file upload
    $target_dir = "../assets/storage/";
    $target_file = $target_dir . basename($_FILES["gambar_berita"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Check if image file is a actual image or fake image
    if (isset($_POST["submit"])) {
        $check = getimagesize($_FILES["gambar_berita"]["tmp_name"]);
        if ($check !== false) {
            $uploadOk = 1;
        } else {
            $_SESSION['error_message'] = "File is not an image.";
            header("Location: ../view/perusahaan/internship.php"); // Redirect kembali ke halaman sebelumnya
            exit; // Hentikan eksekusi skrip
        }
    }

    // Check if file already exists
    if (file_exists($target_file)) {
        $_SESSION['error_message'] = "Sorry, file already exists.";
        header("Location: ../view/perusahaan/internship.php"); // Redirect kembali ke halaman sebelumnya
        exit; // Hentikan eksekusi skrip
    }

    // Check file size
    if ($_FILES["gambar_berita"]["size"] > 50000000) {
        $_SESSION['error_message'] = "Sorry, your file is too large.";
        header("Location: ../view/perusahaan/internship.php"); // Redirect kembali ke halaman sebelumnya
        exit; // Hentikan eksekusi skrip
    }

    // Allow certain file formats
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
        $_SESSION['error_message'] = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        header("Location: ../view/perusahaan/internship.php"); // Redirect kembali ke halaman sebelumnya
        exit; // Hentikan eksekusi skrip
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        $_SESSION['error_message'] = "Sorry, your file was not uploaded.";
        header("Location: ../view/perusahaan/internship.php"); // Redirect kembali ke halaman sebelumnya
        exit; // Hentikan eksekusi skrip
    // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["gambar_berita"]["tmp_name"], $target_file)) {
            // Simpan data ke database
            $sql = "INSERT INTO berita (judul_berita, nama_internship, deskripsi_berita, tanggal_awal, tanggal_akhir, id_kategori, gambar_berita, id_perusahaan) 
                    VALUES ('$judul_berita','$nama_internship', '$deskripsi_berita', '$tanggal_awal', '$tanggal_akhir', '$id_kategori', '".basename($_FILES["gambar_berita"]["name"])."', '$id_perusahaan')";
            if ($conn->query($sql) === TRUE) {
                echo "New record created successfully";
                header("Location: ../view/perusahaan/internship.php"); // Redirect ke halaman sukses
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
}
?>
