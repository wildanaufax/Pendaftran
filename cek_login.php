<?php
session_start();
include 'db/koneksi.php';

$username = $_POST['username'];
$password = md5($_POST['password']); // samain dengan DB

$query = "SELECT * FROM admin WHERE username='$username' AND password='$password'";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) {
    $_SESSION['admin'] = $username;
    header("Location: admin.php");
} else {
    echo "<script>
        alert('Login gagal! Username atau password salah.');
        window.location='login.php';
    </script>";
}
?>
