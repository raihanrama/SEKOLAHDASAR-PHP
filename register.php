<!-- register.php -->
<!DOCTYPE html>
<html lang="en">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register</title>
  <link rel="stylesheet" href="css/login.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
</head>
<body>
  <div class="wrapper">
    <h1>Buat Akun Baru</h1>
    <p> </p>
    <form method="post" action="proses_register.php">
      <input type="text" name="username" placeholder="Masukkan Username Anda" required>
      <input type="password" name="password" placeholder="Masukkan Password Anda" required>
      <input type="text" name="fullname" placeholder="Masukkan Nama Lengkap" required>
      <button type="submit">Register</button>
    </form>
    <p class="or">
  </div>
</body>
</html>
