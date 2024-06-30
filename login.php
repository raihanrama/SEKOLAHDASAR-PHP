<?php
session_start();

// Tangani formulir login
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data dari formulir
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Panggil fungsi untuk memproses login
    require_once 'proseslogin.php';
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Login form</title>
  <link rel="stylesheet" href="css/login.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
  <script>
    function showLoading() {
      const form = document.querySelector('form');
      const loadingAnimation = document.getElementById('loading-animation');
      
      // Hide the form and show the loading animation
      form.style.display = 'none';
      loadingAnimation.style.display = 'flex';
    }
  </script>
</head>
<body>
  <div class="wrapper">
    <h1>Login</h1><br>
    <p>Selamat Datang di Website Informasi Sekolah Dasar Diwilayah Pondok Gede</p>
    <form method="post" action="" onsubmit="showLoading()">
      <input type="text" placeholder="Masukkan Username" name="username" required>
      <input type="password" placeholder="Masukkan Password" name="password" required>
      <p class="recover">
        <a href="#">Hapus Password</a>
      </p>
      <button type="submit" name="submit" value="login">Sign in</button>
    </form>
    <div class="or"></div>
    <div class="not-member">
      Not a member? <a href="register.php">Register Now</a>
    </div>
  </div>
  <div id="loading-animation" class="loading-animation" style="display: none;">
    <div class="spinner"></div>
    <p>Logging in...</p>
  </div>
  <div id="result-animation" class="result-animation" style="display: none;">
    <div class="result-icon"></div>
    <p class="result-message"></p>
  </div>
  <script>
    function showResult(success) {
      const loadingAnimation = document.getElementById('loading-animation');
      const resultAnimation = document.getElementById('result-animation');
      const resultIcon = document.querySelector('.result-icon');
      const resultMessage = document.querySelector('.result-message');

      loadingAnimation.style.display = 'none';

      if (success) {
        resultAnimation.style.backgroundColor = 'rgba(0, 255, 0, 0.8)';
        resultIcon.innerHTML = '<i class="fas fa-check-circle"></i>';
        resultMessage.innerHTML = 'Login Berhasil!';
      } else {
        resultAnimation.style.backgroundColor = 'rgba(255, 0, 0, 0.8)';
        resultIcon.innerHTML = '<i class="fas fa-times-circle"></i>';
        resultMessage.innerHTML = 'Login Gagal!';
      }

      resultAnimation.style.display = 'flex';
    }

    <?php
    if (isset($_GET['result'])) {
      echo 'showResult(' . ($_GET['result'] == 'success' ? 'true' : 'false') . ');';
    }
    ?>
  </script>
</body>
</html>
