<?php

// Koneksi database
include 'koneksi.php';

// Menangkap data yang dikirim dari form
$nidn = $_POST['nidn'];
$nama_dosen = $_POST['nama_dosen'];
$alamat = $_POST['alamat'];

// Menginput data ke database
mysqli_query(
    $koneksi,
    "INSERT INTO dosen VALUES ('', '$nidn', '$nama_dosen', '$alamat')"
);

// Mengalihkan halaman kembali ke index.php
header("location:index.php");

?>
