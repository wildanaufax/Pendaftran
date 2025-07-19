<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include 'db/koneksi.php';

if (!isset($_GET['id'])) {
  echo "ID tidak ditemukan!";
  exit;
}

$id = $_GET['id'];
$query = mysqli_query($conn, "SELECT * FROM siswa WHERE id='$id'");
$data = mysqli_fetch_assoc($query);

if (!$data) {
  echo "Data tidak ditemukan!";
  exit;
}

if (isset($_POST['simpan'])) {
  $nama = $_POST['nama'];
  $alamat = $_POST['alamat'];
  $jk = $_POST['jk'];

  $update = mysqli_query($conn, "UPDATE siswa SET nama='$nama', alamat='$alamat', jk='$jk' WHERE id='$id'");

  if ($update) {
    echo "<script>alert('Data berhasil diupdate'); window.location='admin.php';</script>";
  } else {
    echo "Gagal update data: " . mysqli_error($conn);
  }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Edit Data Siswa</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f0f8ff;
      padding: 30px;
    }

    .container {
      max-width: 500px;
      margin: auto;
      background-color: #fff;
      padding: 25px;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
    }

    h2 {
      text-align: center;
      color: #007BFF;
      margin-bottom: 20px;
    }

    label {
      display: block;
      margin-bottom: 5px;
      margin-top: 15px;
    }

    input[type="text"], textarea, select {
      width: 100%;
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 6px;
    }

    button {
      margin-top: 20px;
      background-color: #007BFF;
      color: white;
      padding: 12px;
      border: none;
      width: 100%;
      border-radius: 6px;
      font-size: 16px;
    }

    button:hover {
      background-color: #0056b3;
    }

    a {
      display: inline-block;
      margin-top: 10px;
      text-align: center;
      color: #007BFF;
      text-decoration: none;
    }

    @media screen and (max-width: 600px) {
      .container {
        padding: 15px;
      }

      button {
        font-size: 14px;
      }
    }
  </style>
</head>
<body>

  <div class="container">
    <h2>Edit Data Siswa</h2>
    <form method="POST">
      <label>Nama Lengkap:</label>
      <input type="text" name="nama" value="<?= $data['nama'] ?>" required>

      <label>Alamat:</label>
      <textarea name="alamat" required><?= $data['alamat'] ?></textarea>

      <label>Jenis Kelamin:</label>
      <select name="jk" required>
        <option value="">-- Pilih --</option>
        <option value="Laki-laki" <?= $data['jk'] == 'Laki-laki' ? 'selected' : '' ?>>Laki-laki</option>
        <option value="Perempuan" <?= $data['jk'] == 'Perempuan' ? 'selected' : '' ?>>Perempuan</option>
      </select>

      <button type="submit" name="simpan">Simpan</button>
      <a href="admin.php">← Kembali ke Dashboard</a>
    </form>
  </div>

</body>
</html>
