<?php
session_start();
include("koneksi.php");

$username = $_POST['User_name'];
$password = $_POST['Password'];

$sql = "SELECT * FROM user WHERE User_name='$username' AND Password='$password'";
$hasil = mysqli_query($koneksi, $sql);

if ($hasil && mysqli_num_rows($hasil) > 0) {
    $row = mysqli_fetch_assoc($hasil);

    $_SESSION['admin']       = $username;   
    $_SESSION['admin_id']    = $row['id'];
    $_SESSION['admin_nama']  = $row['Nama_pengguna'];

    header("location: index_admin.php");
    exit();
} else {
    header("location: index.php?menu=login&error=1");
    exit();
}
?>
