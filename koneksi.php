<?php
// File: koneksi.php

// Fungsi untuk mendapatkan koneksi database
function ambilkoneksi() {
    $host = "localhost";
    $username = "root";
    $password = "";
    $database = "sekolah_dasar";

    $conn = new mysqli($host, $username, $password, $database);

    // Periksa koneksi
    if (mysqli_connect_errno()) {
        die("Koneksi gagal: " . mysqli_connect_error());
    }

    return $conn;
}
?>
