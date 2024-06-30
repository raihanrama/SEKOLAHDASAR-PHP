<?php
session_start();

require_once 'function.php'; // Import the function.php file

// Check if there is a submission of a question
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit_question"])) {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $question = $_POST["question"];

    // Call the tambahPertanyaan function to save the user's question to the database
    tambahPertanyaan($name, $email, $question);

    // After successfully saving, redirect to avoid resubmission
    header("Location: chat.php");
    exit(); // Stop further execution of the script
}

// Check if there is a submission of an answer by admin
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit_answer"])) {
    $id_pertanyaan = $_POST["id_pertanyaan"];
    $jawaban = $_POST["jawaban"];

    // Call the tambahJawaban function to save the admin's answer to the database
    tambahJawaban($id_pertanyaan, $jawaban);

    // After successfully saving, redirect to avoid resubmission
    header("Location: chat.php");
    exit(); // Stop further execution of the script
}

// Get the list of questions from the database that are not answered yet
$daftar_pertanyaan_belum_dijawab = getDaftarPertanyaanBelumDijawab();

// Get the list of questions and answers history from the database
$daftar_riwayat_pertanyaan_jawaban = getRiwayatPertanyaanJawaban();

// Check if $daftar_pertanyaan_belum_dijawab is not null before using it
$daftar_pertanyaan_belum_dijawab = $daftar_pertanyaan_belum_dijawab ?? [];

// Check if $daftar_riwayat_pertanyaan_jawaban is not null before using it
$daftar_riwayat_pertanyaan_jawaban = $daftar_riwayat_pertanyaan_jawaban ?? [];

// Get the user's name if available in session
$active_user_name = isset($_SESSION['user_name']) ? $_SESSION['user_name'] : '';

// Get the user's email if available in session
$active_user_email = isset($_SESSION['user_email']) ? $_SESSION['user_email'] : '';

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Chat with Admin</title>
  
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <style>
  body {
      background-color: #f8f9fa; /* Background color */
      color: #333; /* Text color */
      font-family: Arial, sans-serif; /* Font family */
    }
    .container {
      max-width: 600px; /* Adjust container width as needed */
      margin: 50px auto;
      padding: 30px;
      background-color: #fff /* Background color */
      border-radius: 10px;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }
    h1 {
      text-align: center;
      margin-bottom: 30px;
    }
    .form-group label {
      font-weight: bold;
    }
    .message {
      margin-bottom: 20px;
      padding: 10px;
      border-radius: 10px;
    }
    .user-message {
      background-color: #007bff; /* User message background color */
      color: #fff; /* User message text color */
    }
    .admin-message {
      background-color: #28a745; /* Admin message background color */
      color: #fff; /* Admin message text color */
    }
  </style>
</head>
<body>
  <div class="container">
    <h1>Chat with Admin</h1>

    <!-- Form for submitting questions -->
    <div class="mb-4">
      <h2>Masukkan Pertanyaan Anda:</h2>
      <form id="form-question" method="post" action="">
        <div class="form-group">
          <label for="name">Nama Anda:</label>
          <input type="text" id="name" name="name" class="form-control" placeholder="Enter your name" value="<?php echo $active_user_name; ?>" <?php echo $active_user_name ? 'readonly' : ''; ?>>
        </div>
        <div class="form-group">
          <label for="email">Email Anda:</label>
          <input type="email" id="email" name="email" class="form-control" placeholder="Enter your email" value="<?php echo $active_user_email; ?>" <?php echo $active_user_email ? 'readonly' : ''; ?>>
        </div>
        <div class="form-group">
          <label for="question">Pertanyaan:</label>
          <textarea id="question" name="question" rows="4" class="form-control" placeholder="Enter your question"></textarea>
        </div>
        <button type="submit" name="submit_question" class="btn btn-primary btn-block">Submit</button>
      </form>
    </div>
    </div>

    <!-- Box for displaying unanswered questions -->
    <div class="container mt-5">
      <h2>Pertanyaan yang belum dijawab:</h2>
      <div class="messages">
        <?php foreach ($daftar_pertanyaan_belum_dijawab as $pertanyaan) : ?>
          <div class="message user-message">
            <strong><?php echo $pertanyaan['nama']; ?>:</strong> <?php echo $pertanyaan['pertanyaan']; ?>
          </div>
        <?php endforeach; ?>
      </div>
    </div>

  <!-- Box for displaying questions and answers history -->
  <div class="container mt-5">
    <h2>Pertanyaan yang sudah dijawab:</h2>
    <div class="messages">
        <?php foreach ($daftar_riwayat_pertanyaan_jawaban as $riwayat) : ?>
            <?php if ($riwayat['jawaban']) : ?>
              <div class="message user-message">
                <strong><?php echo $riwayat['nama']; ?>:</strong> <?php echo $riwayat['pertanyaan']; ?>
                </div>
            <?php endif; ?>
            <div class="message admin-message">
                    <strong>Admin:</strong> <?php echo $riwayat['jawaban']; ?>
            </div>
        <?php endforeach; ?>
    </div>
</div>
</body>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
  $(document).ready(function() {
    // Event listener untuk form pertanyaan
    $('#form-question').submit(function(e) {
      e.preventDefault(); // Mencegah pengiriman form secara default
      
      // Ambil data dari form
      var name = $('#name').val();
      var email = $('#email').val();
      var question = $('#question').val();

      // Kirim data ke server melalui AJAX
      $.ajax({
        type: 'POST',
        url: 'chat.php', // Ganti dengan URL yang sesuai
        data: {
          name: name,
          email: email,
          question: question,
          submit_question: true // Tambahkan flag submit_question
        },
        success: function(response) {
          // Refresh halaman setelah pengiriman berhasil
          location.reload();
        }
      });
    });
  });
</script>

</html>

