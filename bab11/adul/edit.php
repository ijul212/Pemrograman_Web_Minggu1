<?php
session_start();
include("koneksi.php");

if (!isset($_SESSION['admin'])) {
    header("Location: index.php?menu=login");
    exit;
}

$tabel = $_POST['tabel'];
$id    = $_POST['id'];

if ($tabel == 'matakuliah') {
    $Kode_MK  = $_POST['Kode_MK'];
    $Nama_MK  = $_POST['Nama_MK'];
    $SKS      = $_POST['SKS'];
    $Semester = $_POST['Semester'];

    $sql = "UPDATE matakuliah SET
                Kode_MK='$Kode_MK', Nama_MK='$Nama_MK',
                SKS=$SKS, Semester=$Semester
            WHERE id=$id";
} else {
    $Nama_pengguna = $_POST['Nama_pengguna'];
    $alamat        = $_POST['alamat'];
    $User_name     = $_POST['User_name'];
    $Password      = $_POST['Password'];

    $sql = "UPDATE user SET
                Nama_pengguna='$Nama_pengguna', alamat='$alamat',
                User_name='$User_name', Password='$Password'
            WHERE Id=$id";
}

if ($conn->query($sql) === TRUE) {
    header("Location: index_admin.php?menu=$tabel");
} else {
    echo "Error: " . $conn->error;
}
?>
