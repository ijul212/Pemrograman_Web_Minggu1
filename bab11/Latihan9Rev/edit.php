<?php
session_start();
include("koneksi.php");

if (!isset($_SESSION['admin'])) {
    header("location: index.php?menu=login");
    exit();
}

$tabel = $_POST['tabel'];

if ($tabel === 'matakuliah') {
    $kode_mk_lama = $_POST['kode_mk_lama'];
    $Kode_MK      = $_POST['Kode_MK'];
    $Nama_MK      = $_POST['Nama_MK'];
    $SKS          = $_POST['SKS'];
    $Semester     = $_POST['Semester'];

    $sql = "UPDATE matakuliah SET
                Kode_MK='$Kode_MK', Nama_MK='$Nama_MK',
                SKS=$SKS, Semester=$Semester
            WHERE Kode_MK='$kode_mk_lama'";
} else {
    $id            = $_POST['id'];
    $Nama_pengguna = $_POST['Nama_pengguna'];
    $alamat        = $_POST['alamat'];
    $User_name     = $_POST['User_name'];
    $Password      = $_POST['Password'];

    $sql = "UPDATE user SET
                Nama_pengguna='$Nama_pengguna', alamat='$alamat',
                User_name='$User_name', Password='$Password'
            WHERE id=$id";
}

if (mysqli_query($koneksi, $sql)) {
    header("location: index_admin.php?menu=$tabel");
    exit();
} else {
    echo "Error: " . mysqli_error($koneksi);
}
?>
