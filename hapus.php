<?php
include 'db/koneksi.php';
$id = $_GET['id'];
mysqli_query($conn, "DELETE FROM siswa WHERE id=$id");
header("Location: admin.php");
exit;
?>
