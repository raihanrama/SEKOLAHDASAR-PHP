<?php
session_start();

include "function.php";

// Cek apakah pengguna telah login
if (!isset($_SESSION["logged_in"]) || $_SESSION["logged_in"] !== true) {
    header("Location: login.php");
    exit();
}
if (isset($_POST['logout'])) {
    // Sesi keluar akan dihandle di logout.php
    header("Location: logout.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Website Informasi Sekolah Dasar</title>
    <link rel="stylesheet" href="css/style.css">
    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>
<body>
    <section id="header" class="header" style="background-image: linear-gradient(rgba(4, 9, 60, 0.9), rgba(4, 9, 60, 0.9)), url('uploads/cover.png');">
      <nav>
        <a href="index.html"><img src="image/logosd.png" /></a>
        <div class="nav-link" id="navLink">
          <i class="fa fa-times" id="menu-toggle" onclick="hideMenu()"></i>
          <ul>
          <li><a href="index.php">HOME</a></li>
            <li><a href="about.php">ABOUT</a></li>
            <li><a href="blog.php">BLOG</a></li>
            <li><a href="logout.php">LOGOUT</a></li>
          </ul>
        </div>
        <i class="fa fa-bars" onclick="showMenu()"></i>
      </nav>
      <div class="text-box">
        <h1>Sekolah Dasar Di Wilayah Pondok Gede</h1>
        <p>Ayo Tentukan Sekolah Dasar Untuk Buah Hati Anda,
           Karena Sekolah Menentukan Masa Depan Buah Hati Anda
        </p>
      </div>
    </section>

    <!---------------Contact----------->
    <section id="cta" class="cta">
      <h1>Jika Ada yang Ditanyakan Hubungi Admin Kami</h1>
      <a
        href="chat.php"
        class="hero-btn"
        >CONTACT US</a
      >
    </section>
    
    <!---------------Footer----------->
    <!---------------JS buat navigasi mobile--------------->
    <script>
      var navLink = document.getElementById("navLink");

      function showMenu() {
        navLink.style.right = "0";
      }

      function hideMenu() {
        navLink.style.right = "-200px";
      }

      // Add smooth scrolling behavior to navigation links
      document.querySelectorAll('a[href^="#"]').forEach((anchor) => {
        anchor.addEventListener("click", function (e) {
          e.preventDefault();

          document.querySelector(this.getAttribute("href")).scrollIntoView({
            behavior: "smooth",
          });
        });
      });
    </script>
  </body>
</html>
