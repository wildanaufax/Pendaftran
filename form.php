<?php
session_start();
include 'db/koneksi.php';

$notif = "";

// Proses pendaftaran siswa
if (isset($_POST['daftar'])) {
  $nama = $_POST['nama'];
  $alamat = $_POST['alamat'];
  $jk = $_POST['jk'];

  $insert = mysqli_query($conn, "INSERT INTO siswa (nama, alamat, jk) VALUES ('$nama', '$alamat', '$jk')");

  if ($insert) {
    $notif = "Pendaftaran berhasil!";
  } else {
    $notif = "Pendaftaran gagal: " . mysqli_error($conn);
  }
}

// Proses login admin
if (isset($_POST['login'])) {
  $username = $_POST['username'];
  $password = md5($_POST['password']);

  $cek = mysqli_query($conn, "SELECT * FROM admin WHERE username='$username' AND password='$password'");
  if (mysqli_num_rows($cek) > 0) {
    $_SESSION['admin'] = true;
    header("Location: admin.php");
    exit;
  } else {
    $notif = "Login admin gagal!";
  }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Formulir Pendaftaran Siswa</title>
  <link rel="stylesheet" href="style.css">
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f0f8ff;
      padding: 40px;
      max-width: 600px;
      margin: auto;
    }

    h2 {
      text-align: center;
      color: #007BFF;
      margin-bottom: 25px;
    }

    form {
      background: white;
      padding: 25px;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
      margin-bottom: 30px;
    }

    label {
      display: block;
      margin-top: 15px;
      font-weight: bold;
    }

    input, select, button {
      width: 100%;
      padding: 10px;
      margin-top: 5px;
      border: 1px solid #ccc;
      border-radius: 6px;
    }

    button {
      background-color: #007BFF;
      color: white;
      margin-top: 20px;
      cursor: pointer;
      font-weight: bold;
    }

    button:hover {
      background-color: #0056b3;
    }

    #loginBox {
      display: none;
    }

    .notif {
      text-align: center;
      margin-bottom: 20px;
      font-weight: bold;
      color: green;
    }

    .error {
      color: red;
    }

    @media screen and (max-width: 600px) {
      body {
        padding: 20px;
      }

      form {
        padding: 15px;
      }
    }
  </style>
</head>
<body>

  <h2>Formulir Pendaftaran Siswa</h2>

  <?php if ($notif != ""): ?>
    <div class="notif <?php echo (str_contains($notif, 'gagal') || str_contains($notif, 'Gagal')) ? 'error' : ''; ?>">
      <?= $notif ?>
    </div>
  <?php endif; ?>

  <form method="post">
    <label>Nama Lengkap:</label>
    <input type="text" name="nama" required>

    <label>Alamat:</label>
    <input type="text" name="alamat" required>

    <label>Jenis Kelamin:</label>
    <select name="jk" required>
      <option value="">-- Pilih --</option>
      <option value="Laki-laki">Laki-laki</option>
      <option value="Perempuan">Perempuan</option>
    </select>

    <button type="submit" name="daftar">Daftar</button>
  </form>

  <h2 style="cursor: pointer;" onclick="toggleLogin()">🔐 Login Admin</h2>

  <div id="loginBox">
    <form method="post">
      <label>Username:</label>
      <input type="text" name="username" required>

      <label>Password:</label>
      <input type="password" name="password" required>

      <button type="submit" name="login">Login</button>
    </form>
  </div>

  <script>
    function toggleLogin() {
      var box = document.getElementById("loginBox");
      box.style.display = (box.style.display === "none") ? "block" : "none";
    }
  </script>

</body>
</html>
