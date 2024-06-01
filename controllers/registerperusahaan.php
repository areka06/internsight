<?php
session_start();
require_once '../config/db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama_perusahaan = $_POST['nama_perusahaan'];
    $username = $_POST['username'];
    $password = $_POST['password']; // Store plain text password

    try {
        $stmt = $pdo->prepare('INSERT INTO akun_perusahaan (nama_perusahaan, username, password) VALUES (?, ?, ?)');
        if ($stmt->execute([$nama_perusahaan, $username, $password])) {
            $_SESSION['success'] = 'Registration successful';
            header('Location: ../view/login.php');
            exit();
        }
    } catch (PDOException $e) {
        if ($e->getCode() == 23000) {
            $_SESSION['error'] = 'Username already exists';
            header('Location: ../view/perusahaan/register.php');
            exit();
        } else {
            echo "Error: " . $e->getMessage();
        }
    }
}
?>
