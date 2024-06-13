<?php
session_start();

include '../config/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_berita = $_POST['id_berita'];
    $judul_berita = $_POST['judul_berita'];
    $nama_internship = $_POST['nama_internship'];
    $deskripsi_berita = $_POST['deskripsi_berita'];
    $tanggal_awal = $_POST['tanggal_awal'];
    $tanggal_akhir = $_POST['tanggal_akhir'];
    $id_kategori = $_POST['id_kategori'];
    $id_perusahaan = $_POST['id_perusahaan']; 

    $uploadOk = 1;
    $gambar_berita = $_FILES["gambar_berita"]["name"];

    if (!empty($gambar_berita)) {
        $target_dir = "../assets/storage/";
        $target_file = $target_dir . basename($gambar_berita);
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        $check = getimagesize($_FILES["gambar_berita"]["tmp_name"]);
        if ($check === false) {
            $_SESSION['error_message'] = "File is not an image.";
            header("Location: ../view/perusahaan/internship.php"); 
            exit; 
        }


        if (file_exists($target_file)) {
            $_SESSION['error_message'] = "Sorry, file already exists.";
            header("Location: ../view/perusahaan/internship.php"); 
            exit; 
        }


        if ($_FILES["gambar_berita"]["size"] > 50000000) {
            $_SESSION['error_message'] = "Sorry, your file is too large.";
            header("Location: ../view/perusahaan/internship.php"); 
            exit; 
        }

        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
            $_SESSION['error_message'] = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            header("Location: ../view/perusahaan/internship.php"); 
            exit; 
        }

 
        if (!move_uploaded_file($_FILES["gambar_berita"]["tmp_name"], $target_file)) {
            $_SESSION['error_message'] = "Sorry, there was an error uploading your file.";
            header("Location: ../view/perusahaan/internship.php"); 
            exit;
        }
    } else {
        $gambar_berita = $_POST['gambar_berita_lama'];
    }

    $sql = "UPDATE berita SET judul_berita='$judul_berita', nama_internship='$nama_internship', deskripsi_berita='$deskripsi_berita', tanggal_awal='$tanggal_awal', tanggal_akhir='$tanggal_akhir', id_kategori='$id_kategori', gambar_berita='$gambar_berita', id_perusahaan='$id_perusahaan' WHERE id_berita='$id_berita'";

    if ($conn->query($sql) === TRUE) {
        $_SESSION['success_message'] = "Record updated successfully";
        header("Location: ../view/perusahaan/internship.php"); 
    } else {
        $_SESSION['error_message'] = "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>
