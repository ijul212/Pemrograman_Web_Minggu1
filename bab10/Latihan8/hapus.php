<?php

include 'koneksi.php';

if (!isset($_GET['kode_mk'])) {
    die("Kode MK tidak ditemukan.");
}

$kode_mk = $_GET['kode_mk'];

$stmt = mysqli_prepare($koneksi, "DELETE FROM matakuliah WHERE Kode_MK = ?");
mysqli_stmt_bind_param($stmt, "s", $kode_mk);

if (!mysqli_stmt_execute($stmt)) {
    die("Gagal menghapus data: " . mysqli_stmt_error($stmt));
}

mysqli_stmt_close($stmt);

header("location:index.php");
exit();

?>