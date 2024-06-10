<?php
session_start();

require_once '../config/db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Check in admin table
    $stmt = $conn->prepare('SELECT * FROM akun_admin WHERE username = ? AND password = ?');
    $stmt->execute([$username, $password]);
    $admin = $stmt->fetch();
    
    if ($admin) {
        $_SESSION['user'] = $admin;
        $_SESSION['role'] = 'admin';
        header('Location: ../view/admin/dashboard.php');
        exit();
    }

    // Check in pelamar table
    $stmt = $conn->prepare('SELECT * FROM akun_pelamar WHERE username = ? AND password = ?');
    $stmt->execute([$username, $password]);
    $pelamar = $stmt->fetch();
    
    if ($pelamar) {
        $_SESSION['user'] = $pelamar;
        $_SESSION['role'] = 'pelamar';
        header('Location: ../view/pelamar/dashboard.php');
        exit();
    }

    // Check in perusahaan table
    $stmt = $conn->prepare('SELECT * FROM akun_perusahaan WHERE username = ? AND password = ?');
    $stmt->bind_param('ss', $username, $password);
    $stmt->execute();
    $result = $stmt->get_result();
    $perusahaan = $result->fetch_assoc(); // Mengambil hasil sebagai array asosiatif
    
    if ($perusahaan) {
        $_SESSION['user'] = $perusahaan;
        $_SESSION['role'] = 'perusahaan';
        $_SESSION['id_perusahaan'] = $perusahaan['id_perusahaan']; // Simpan id_perusahaan ke dalam session
        $_SESSION['nama_perusahaan'] = $perusahaan['nama_perusahaan'];
        header('Location: ../view/perusahaan/dashboard.php');
        exit();
    } else {
        // Handle login failure (misalnya, kembali ke halaman login dengan pesan error)
        header('Location: ../view/login.php?error=invalid_credentials');
        exit();
    }

    // If no user found
    header('Location: ../view/login.php?error=Invalid username or password.');
    exit();
}
?>