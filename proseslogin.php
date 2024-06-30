<?php
session_start();
require_once 'koneksi.php';

// Ambil nilai username dan password dari form
$username = $_POST["username"];
$password = $_POST["password"];

// Fungsi untuk memeriksa kecocokan pengguna di database
function authenticateUser($username, $password) {
    // Dapatkan koneksi ke database
    $conn = ambilkoneksi();

    // Hindari serangan SQL Injection dengan menggunakan parameterized query
    $stmt = $conn->prepare("SELECT * FROM login WHERE username = ? AND password = ?");
    $stmt->bind_param("ss", $username, $password);

    // Jalankan query
    $stmt->execute();
    $result = $stmt->get_result();

    // Periksa apakah pengguna ditemukan
    if ($result->num_rows > 0) {
        // Pengguna ditemukan, izinkan akses
        return true;
    } else {
        // Pengguna tidak ditemukan
        return false;
    }

    // Tutup statement dan koneksi
    $stmt->close();
    $conn->close();
}

// Authentikasi pengguna
if (isset($username) && isset($password)) {
    if (authenticateUser($username, $password)) {
        if ($username === "admin" && $password === "admin2903") {
            // Jika username dan password adalah admin dan admin2903, arahkan ke admin.php
            $_SESSION["logged_in"] = true;
            $_SESSION["role"] = "admin";
            header("Location: admin.php");
            exit(); // Penting untuk keluar dari skrip setelah pengalihan halaman
        } else {
            // Jika bukan admin, arahkan ke halaman index.php
            $_SESSION["logged_in"] = true;
            $_SESSION["role"] = "user"; // Atur role pengguna sesuai
            header("Location: index.php");
            exit();
        }
    } else {
        // Jika autentikasi gagal, kembali ke halaman login.php dengan status gagal
        header("Location: login.php?result=failure");
        exit();
    }
}
?>
