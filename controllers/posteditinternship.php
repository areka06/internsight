<?php
// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Handle form data
    $judul_internship = $_POST['judul_internship'];
    $nama_internship = $_POST['nama_internship'];
    $deskripsi_lowongan = $_POST['deskripsi_lowongan'];
    $tanggal_awal = $_POST['tanggal_awal'];
    $tanggal_akhir = $_POST['tanggal_akhir'];

    // Handle file upload
    $targetDir = "../../assets/storage/";
    $targetFile = $targetDir . basename($_FILES["gambar_berita"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

    // Check if image file is a actual image or fake image
    if ($_FILES["gambar_berita"]["tmp_name"] != "") {
        $check = getimagesize($_FILES["gambar_berita"]["tmp_name"]);
        if ($check !== false) {
            $uploadOk = 1;
        } else {
            $uploadOk = 0;
        }
    } else {
        $uploadOk = 0;
    }
    

    // Check file size
    if ($_FILES["gambar_berita"]["size"] > 5000000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    // Allow certain file formats
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif") {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["gambar_berita"]["tmp_name"], $targetFile)) {
            echo "The file " . basename($_FILES["gambar_berita"]["name"]) . " has been uploaded.";
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }

    // Update database with form data and file name
    // Add your database update logic here
}
?>
