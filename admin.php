<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();
if (!isset($_SESSION['admin'])) {
  header("Location: formulir_login.php");
  exit;
}

include 'db/koneksi.php';

$data = mysqli_query($conn, "SELECT * FROM siswa");
if (!$data) {
  die("Query error: " . mysqli_error($conn));
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Dashboard Admin</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <style>
    * {
      box-sizing: border-box;
    }

    body {
      font-family: Arial, sans-serif;
      background-color: #f0f8ff;
      margin: 0;
      padding: 20px;
    }

    h2 {
      text-align: center;
      color: #007BFF;
    }

    .logout {
      display: inline-block;
      background-color: red;
      color: white;
      padding: 10px 18px;
      text-decoration: none;
      border-radius: 6px;
      float: right;
      font-size: 14px;
      margin-bottom: 10px;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 25px;
    }

    th, td {
      border: 1px solid #ccc;
      padding: 12px;
      text-align: center;
    }

    th {
      background-color: #007BFF;
      color: white;
    }

    tr:nth-child(even) {
      background-color: #f9f9f9;
    }

    .aksi a {
      text-decoration: none;
      padding: 6px 10px;
      margin: 0 4px;
      border-radius: 4px;
    }

    .edit {
      background-color: #28a745;
      color: white;
    }

    .hapus {
      background-color: #dc3545;
      color: white;
    }

    @media screen and (max-width: 600px) {
      th, td {
        font-size: 12px;
        padding: 8px;
      }

      .logout {
        font-size: 12px;
        padding: 8px 14px;
      }
    }
  </style>
</head>
<body>

  <a href="logout.php" class="logout">Logout</a>
  <h2>Data Siswa Terdaftar</h2>

  <table>
    <tr>
      <th>No</th>
      <th>Nama</th>
      <th>Alamat</th>
      <th>Jenis Kelamin</th>
      <th>Aksi</th>
    </tr>

    <?php
    $no = 1;
    while ($siswa = mysqli_fetch_assoc($data)) {
      echo "<tr>
        <td>{$no}</td>
        <td>{$siswa['nama']}</td>
        <td>{$siswa['alamat']}</td>
        <td>{$siswa['jk']}</td>
        <td class='aksi'>
          <a href='edit.php?id={$siswa['id']}' class='edit'>Edit</a>
          <a href='hapus.php?id={$siswa['id']}' class='hapus' onclick='return confirm(\"Yakin mau hapus?\")'>Hapus</a>
        </td>
      </tr>";
      $no++;
    }
    ?>
  </table>

</body>
</html>
