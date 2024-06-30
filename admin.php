<?php
session_start();
require_once 'function.php';

// Check if the user is logged in
if (!isset($_SESSION["logged_in"]) || $_SESSION["logged_in"] !== true) {
    header("Location: login.php");
    exit();
}

// Handle logout
if (isset($_POST['logout'])) {
    session_unset();
    session_destroy();
    header("Location: login.php");
    exit();
}

// Handle adding news
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["tambah_berita"])) {
    $judul = $_POST["judul"];
    $konten = $_POST["konten"];
    $gambar = $_FILES["gambar"]["name"]; 

    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["gambar"]["name"]);
    move_uploaded_file($_FILES["gambar"]["tmp_name"], $target_file);

    tambahBerita($judul, $konten, $gambar);
    header("Location: admin.php?tab=berita&status=sukses");
    exit();
}

// Handle deleting news
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["hapus_berita"])) {
    $id_berita = $_POST["id_berita"];
    hapusBerita($id_berita);
    header("Location: admin.php?tab=berita&status=hapus_sukses");
    exit();
}

// Handle submitting an answer
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit_jawaban"])) {
    $id_pertanyaan = $_POST["id_pertanyaan"];
    $jawaban = $_POST["jawaban"];
    tambahJawaban($id_pertanyaan, $jawaban);
    hapusPertanyaan($id_pertanyaan);
    header("Location: admin.php?tab=pertanyaan&status=sukses");
    exit();
}

// Determine which tab to show
$tab = isset($_GET['tab']) ? $_GET['tab'] : 'berita';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link href="https://stackpath.bootstrapcdn.com/bootswatch/4.5.2/pulse/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/admin.css">
</head>
<body>
    <?php include 'navbar.php'; ?>
    <div class="container">
        <div class="tab-content" id="adminTabContent">
            <div class="tab-pane fade <?php echo $tab == 'berita' ? 'show active' : ''; ?>" id="berita" role="tabpanel" aria-labelledby="berita-tab">
                <h2>Kelola Berita</h2>
                <form method="POST" action="" enctype="multipart/form-data" class="mb-4">
                    <div class="form-group">
                        <input type="text" name="judul" class="form-control" placeholder="Judul Berita" required>
                    </div>
                    <div class="form-group">
                        <textarea name="konten" class="form-control" rows="5" placeholder="Konten Berita" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="gambar">Unggah Gambar</label>
                        <input type="file" name="gambar" class="form-control-file" accept="image/*">
                    </div>
                    <button type="submit" name="tambah_berita" class="btn btn-primary">Tambah Berita</button>
                </form>
                <div class="daftar-berita mt-4">
                    <?php
                    $daftar_berita = getDaftarBerita();
                    foreach ($daftar_berita as $berita) {
                        echo "<div class=\"card mb-3\">";
                        echo "<div class=\"card-body\">";
                        echo "<h5 class=\"card-title\">" . $berita['judul'] . "</h5>";
                        echo "<p class=\"card-text\">" . $berita['konten'] . "</p>";
                        echo "<img src=\"uploads/" . $berita['gambar'] . "\" class=\"img-fluid\" alt=\"\">";
                        echo "<form method=\"POST\">";
                        echo "<input type=\"hidden\" name=\"id_berita\" value=\"" . $berita['id'] . "\">";
                        echo "<button type=\"submit\" name=\"hapus_berita\" class=\"btn btn-danger\">Hapus</button>";
                        echo "</form>";
                        echo "</div>";
                        echo "</div>";
                    }
                    ?>
                </div>
            </div>
            <div class="tab-pane fade <?php echo $tab == 'pertanyaan' ? 'show active' : ''; ?>" id="pertanyaan" role="tabpanel" aria-labelledby="pertanyaan-tab">
                <h2>Pertanyaan dari Pengguna</h2>
                <div class="daftar-pertanyaan mt-4">
                    <?php
                    $daftar_pertanyaan = getDaftarPertanyaan();
                    foreach ($daftar_pertanyaan as $pertanyaan) {
                        echo "<div class=\"card mb-3\">";
                        echo "<div class=\"card-body\">";
                        echo "<h5 class=\"card-title\">Pertanyaan dari: " . $pertanyaan['nama'] . "</h5>";
                        echo "<p class=\"card-text\">Pertanyaan: " . $pertanyaan['pertanyaan'] . "</p>";
                        echo "<form method=\"POST\">";
                        echo "<input type=\"hidden\" name=\"id_pertanyaan\" value=\"" . $pertanyaan['id'] . "\">";
                        echo "<div class=\"form-group\">";
                        echo "<label for=\"jawaban\">Jawaban:</label>";
                        echo "<textarea id=\"jawaban\" name=\"jawaban\" class=\"form-control\" rows=\"3\" required></textarea>";
                        echo "</div>";
                        echo "<button type=\"submit\" name=\"submit_jawaban\" class=\"btn btn-primary\">Kirim Jawaban</button>";
                        echo "</form>";
                        echo "</div>";
                        echo "</div>";
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
