<?php

include 'koneksi.php';

if (!isset($_POST['kode_mk_lama'], $_POST['kode_mk'], $_POST['nama_mk'], $_POST['sks'], $_POST['semester'])) {
    die("Data tidak lengkap.");
}

$kode_mk_lama = $_POST['kode_mk_lama']; 
$kode_mk = $_POST['kode_mk'];           
$nama_mk = $_POST['nama_mk'];
$sks = $_POST['sks'];
$semester = $_POST['semester'];

$stmt = mysqli_prepare(
    $koneksi,
    "UPDATE matakuliah SET Kode_MK = ?, Nama_MK = ?, SKS = ?, Semester = ? WHERE Kode_MK = ?"
);

if (!$stmt) {
    die("Gagal menyiapkan query: " . mysqli_error($koneksi));
}

mysqli_stmt_bind_param($stmt, "ssiis", $kode_mk, $nama_mk, $sks, $semester, $kode_mk_lama);

if (!mysqli_stmt_execute($stmt)) {
    die("Gagal mengupdate data: " . mysqli_stmt_error($stmt));
}

mysqli_stmt_close($stmt);

header("location:index.php");
exit();

?>