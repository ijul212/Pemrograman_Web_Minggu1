<?php
session_start();
include("koneksi.php");

$username = $_POST['User_name'];
$password = $_POST['Password'];

$sql = "SELECT * FROM user WHERE User_name='$username' AND Password='$password'";
$hasil = $conn->query($sql);

if ($hasil->num_rows > 0) {
    $_SESSION['admin'] = $username;        
    header("Location: index_admin.php");
} else {
    echo "<div style='font-family:Arial,sans-serif;'>
          Username atau Password salah! <br>
          <a href='index.php?menu=login'>Kembali ke Login</a></div>";
}
?>
