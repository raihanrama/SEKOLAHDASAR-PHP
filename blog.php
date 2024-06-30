<?php
include "function.php";
session_start();

// Ensure user_id and username are set in session when user logs in
if (!isset($_SESSION["logged_in"]) || $_SESSION["logged_in"] !== true) {
    header("Location: login.php");
    exit();
}

$daftar_berita = getDaftarBerita();

// Handle like form submission
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['like'])) {
    $id_berita = $_POST['id_berita']; // Assuming you have user_id in session
    tambahLike($id_berita);
}

// Handle comment form submission
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['comment'])) {
    $id_berita = $_POST['id_berita'];// Assuming you have user_id in session
    $username = !empty($_POST['username']) ? $_POST['username'] : 'anonymous';
    $comment = $_POST['comment_text'];
    tambahKomentar($id_berita, $comment, $username);
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

<!-- Navigasi -->
<nav>
    <a href="index.php"><img src="image/logosd.png" /></a>
    <div class="nav-link" id="navLink">
        <i class="fa fa-times" onclick="hideMenu()"></i>
        <ul>
            <li><a href="index.php">HOME</a></li>
            <li><a href="about.php">ABOUT</a></li>
            <li><a href="blog.php">BLOG</a></li>
            <li><a href="logout.php">LOGOUT</a></li>
        </ul>
    </div>
    <i class="fa fa-bars" onclick="showMenu()"></i>
</nav>

<!-- Berita Section -->
<section id="berita" class="berita">
  <div class="container">
    <h1 style="text-align: center;">Berita Terbaru</h1>
    <?php if(isset($daftar_berita) && count($daftar_berita) > 0): ?>
      <?php foreach ($daftar_berita as $berita): ?>
        <div class="content">
          <h1><?= $berita['judul'] ?></h1>
          <div class="carousel">
            <img src="uploads/<?= $berita['gambar'] ?>" alt="<?= $berita['judul'] ?>" class="gambar-berita">
          </div>
          <p style="text-align: justify;"><?= $berita['konten'] ?></p>
          <form method="post" action="">
            <input type="hidden" name="id_berita" value="<?= $berita['id'] ?>">
            <button type="submit" name="like" class="like-button"><i class="fas fa-thumbs-up"></i> Like</button>
          </form>
          <p class="likes-count">Likes: <?= getLikesCount($berita['id']) ?></p>
          <div class="comment-box">
            <form method="post" action="">
              <input type="hidden" name="id_berita" value="<?= $berita['id'] ?>">
              <input type="text" name="username" placeholder="Your name (optional)">
              <textarea name="comment_text" placeholder="Add a comment..."></textarea>
              <button type="submit" name="comment" class="comment-button"><i class="fas fa-comment"></i> Comment</button>
            </form>
            <?php 
              $comments = getComments($berita['id']);
              foreach ($comments as $comment) {
                echo "<div class='comment'><span class='username'>{$comment['username']}</span>: {$comment['comment']}</div>";
              }
            ?>
          </div>
        </div>
      <?php endforeach; ?>
    <?php else: ?>
      <p>Tidak ada berita yang tersedia saat ini.</p>
    <?php endif; ?>
  </div>
</section>

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
