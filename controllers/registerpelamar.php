<?php
session_start();
require_once '../config/db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama_pelamar = $_POST['nama_pelamar'];
    $username = $_POST['username'];
    $password = $_POST['password']; // Store plain text password

    try {
        $stmt = $conn->prepare('INSERT INTO akun_pelamar (nama_pelamar, username, password) VALUES (?, ?, ?)');
        if ($stmt->execute([$nama_pelamar, $username, $password])) {
            $_SESSION['success'] = 'Registration successful';
            header('Location: ../view/login.php');
            exit();
        }
    } catch (Exception $e) {
        // Check if the error code indicates a duplicate entry
        if ($e->getCode() == 23000) {
            $_SESSION['error'] = 'Username already exists';
            header('Location: ../view/pelamar/register.php');
            exit();
        } else {
            // Redirect back to the registration page for other errors
            $_SESSION['error'] = 'Username already exists';
            header('Location: ../view/pelamar/register.php');
            exit();
        }
    }    
}
?>
