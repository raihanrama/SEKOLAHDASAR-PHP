<?php
// File: proses_register.php

include "koneksi.php";


// Ambil nilai input dari form
$username = $_POST["username"];
$password = $_POST["password"];
$namalengkap = $_POST["fullname"]; 

function registerUser($username, $password, $namalengkap) {
    // Hash password sebelum menyimpannya
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $conn = ambilkoneksi();

    $stmt = $conn->prepare("INSERT INTO login (username, password, namalengkap) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $username, $password, $namalengkap);

    if ($stmt->execute()) {   
        return true;
    } else {
        return false;
    }

    $stmt->close();
    $conn->close();
}

// Proses registrasi
if (isset($username) && isset($password) && isset($namalengkap)) {
    if (registerUser($username, $password, $namalengkap)) {
        // Registrasi berhasil, arahkan pengguna ke halaman login atau tampilkan pesan sukses
        echo "<script> alert ('Registrasi Berhasil');
            window.location = 'login.php';</script>";
    } else {
        // Registrasi gagal, arahkan pengguna kembali ke halaman register atau tampilkan pesan gagal
        echo "<script> alert ('Registrasi Gagal');
        window.location = 'register.php';</script>";
    }
}
?>
