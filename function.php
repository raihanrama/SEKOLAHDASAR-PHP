<?php

include "koneksi.php"; 

// tambah berita
function tambahBerita($judul, $konten, $gambar) {
    $conn = ambilkoneksi();

    // menambahkan berita ke dalam database
    $sql = "INSERT INTO berita (judul, konten, gambar) VALUES ('$judul', '$konten', '$gambar')";

    // Lakukan query ke database
    if ($conn->query($sql) === TRUE) {
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
// menghapus berita dari database berdasarkan ID berita
function hapusBerita($id_berita) {
    $conn = ambilkoneksi();
    $sql = "DELETE FROM berita WHERE id = '$id_berita'";

    if ($conn->query($sql) === TRUE) {
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Tutup koneksi ke database
    $conn->close();
}

// Fungsi untuk mengedit berita berdasarkan ID berita
function editBerita($id_berita, $judul_edit, $konten_edit, $gambar_edit) {
    $conn = ambilkoneksi();

    if ($gambar_edit != "") {
        $target_dir_edit = "uploads/";
        $target_file_edit = $target_dir_edit . basename($_FILES["gambar_edit"]["name"]);
        move_uploaded_file($_FILES["gambar_edit"]["tmp_name"], $target_file_edit);
        $sql = "UPDATE berita SET judul = '$judul_edit', konten = '$konten_edit', gambar = '$gambar_edit' WHERE id = '$id_berita'";
    } else {
        $sql = "UPDATE berita SET judul = '$judul_edit', konten = '$konten_edit' WHERE id = '$id_berita'";
    }

    if ($conn->query($sql) === TRUE) {
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}

function getDaftarBerita() {
    $conn = ambilkoneksi();

    $sql = "SELECT * FROM berita";

    $result = $conn->query($sql);

    $daftar_berita = array();

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $daftar_berita[] = $row;
        }
    }
    $conn->close();

    return $daftar_berita;
}

// Fungsi untuk menambahkan pertanyaan pengguna ke dalam database
function tambahPertanyaan($nama, $email, $pertanyaan) {
    $conn = ambilkoneksi();

    $sql = "INSERT INTO pertanyaan (nama, email, pertanyaan) VALUES ('$nama', '$email', '$pertanyaan')";

    if ($conn->query($sql) === TRUE) {
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
// Mendapatkan daftar pertanyaan dari database
function getDaftarPertanyaan() {
    $conn = ambilkoneksi();

    $sql = "SELECT * FROM pertanyaan";

    $result = $conn->query($sql);

    $daftar_pertanyaan = array();

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $daftar_pertanyaan[] = $row;
        }
    }
    $conn->close();

    return $daftar_pertanyaan;
}

function getDaftarPertanyaanBelumDijawab() {
    $conn = ambilkoneksi();

    $sql = "SELECT * FROM pertanyaan WHERE jawaban IS NULL"; // Select questions that do not have an answer yet

    $result = $conn->query($sql);

    $daftar_pertanyaan = array();

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $daftar_pertanyaan[] = $row;
        }
    }
    $conn->close();

    return $daftar_pertanyaan;
}

// Function to get the list of questions and answers history from the database
function getRiwayatPertanyaanJawaban() {
    $conn = ambilkoneksi();

    $sql = "SELECT * FROM pertanyaan WHERE jawaban IS NOT NULL"; // Select questions that have been answered

    $result = $conn->query($sql);

    $daftar_riwayat = array();

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $daftar_riwayat[] = $row;
        }
    }
    $conn->close();

    return $daftar_riwayat;
}

// Menambahkan jawaban dari admin ke dalam database
function tambahJawaban($id_pertanyaan, $jawaban) {
    $conn = ambilkoneksi();

    // Update record pertanyaan dengan jawaban yang diberikan admin
    $sql = "UPDATE pertanyaan SET jawaban = '$jawaban' WHERE id = '$id_pertanyaan'";

    if ($conn->query($sql) === TRUE) {
        // Jika berhasil, tambahkan log atau lakukan tindakan lain jika diperlukan
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}

// Menghapus pertanyaan dari tampilan admin
function hapusPertanyaan($id_pertanyaan) {
    $conn = ambilkoneksi();

    // Hapus pertanyaan dari tampilan admin tanpa menghapus dari database
    $sql = "UPDATE pertanyaan SET tampilkan = '0' WHERE id = '$id_pertanyaan'";

    if ($conn->query($sql) === TRUE) {
        // Jika berhasil, tambahkan log atau lakukan tindakan lain jika diperlukan
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}

// Fitur Like and Comment

if (!function_exists('tambahLike')) {
    function tambahLike($berita_id) {
        $conn = ambilkoneksi(); // Assumes user_id is stored in session
        $sql = "INSERT INTO likes (berita_id) VALUES ('$berita_id')";
        $conn->query($sql);
        $conn->close();
    }
}

if (!function_exists('getLikesCount')) {
    function getLikesCount($berita_id) {
        $conn = ambilkoneksi();
        $sql = "SELECT COUNT(*) as likes_count FROM likes WHERE berita_id = '$berita_id'";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        $conn->close();
        return $row['likes_count'];
    }
}

if (!function_exists('tambahKomentar')) {
    function tambahKomentar($berita_id, $comment, $username) {
        $conn = ambilkoneksi();
        $sql = "INSERT INTO comments (berita_id, comment, username) VALUES ('$berita_id', '$comment', '$username')";
        $conn->query($sql);
        $conn->close();
    }
}

if (!function_exists('getComments')) {
    function getComments($berita_id) {
        $conn = ambilkoneksi();
        $sql = "SELECT * FROM comments WHERE berita_id = '$berita_id' ORDER BY created_at DESC";
        $result = $conn->query($sql);
        $comments = [];
        while ($row = $result->fetch_assoc()) {
            $comments[] = $row;
        }
        $conn->close();
        return $comments;
    }
}

?>
