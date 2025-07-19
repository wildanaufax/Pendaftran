<?php
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=data_siswa.xls");

include 'db/koneksi.php';
$data = mysqli_query($conn, "SELECT * FROM siswa");
?>

<table border="1">
  <tr>
    <th>No</th>
    <th>Nama</th>
    <th>Alamat</th>
    <th>Jenis Kelamin</th>
  </tr>
  <?php $no = 1; while ($row = mysqli_fetch_assoc($data)): ?>
  <tr>
    <td><?= $no++ ?></td>
    <td><?= $row['nama'] ?></td>
    <td><?= $row['alamat'] ?></td>
    <td><?= $row['jk'] ?></td>
  </tr>
  <?php endwhile; ?>
</table>
