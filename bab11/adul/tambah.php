<?php
session_start();
include("koneksi.php");

if (!isset($_SESSION['admin'])) {
    header("Location: index.php?menu=login");
    exit;
}

$tabel = $_POST['tabel'];

if ($tabel == 'matakuliah') {
    $Kode_MK  = $_POST['Kode_MK'];
    $Nama_MK  = $_POST['Nama_MK'];
    $SKS      = $_POST['SKS'];
    $Semester = $_POST['Semester'];

    $sql = "INSERT INTO matakuliah (Kode_MK, Nama_MK, SKS, Semester)
            VALUES ('$Kode_MK', '$Nama_MK', $SKS, $Semester)";
} else {
    $Nama_pengguna = $_POST['Nama_pengguna'];
    $alamat        = $_POST['alamat'];
    $User_name     = $_POST['User_name'];
    $Password      = $_POST['Password'];

    $sql = "INSERT INTO user (Nama_pengguna, alamat, User_name, Password)
            VALUES ('$Nama_pengguna', '$alamat', '$User_name', '$Password')";
}

if ($conn->query($sql) === TRUE) {
    header("Location: index_admin.php?menu=$tabel");
} else {
    echo "Error: " . $conn->error;
}
?>
