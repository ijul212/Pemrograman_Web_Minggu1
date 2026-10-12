<?php

// Koneksi database
include 'koneksi.php';

// Menangkap data yang dikirim dari form
$id = $_POST['id'];
$nidn = $_POST['nidn'];
$nama_dosen = $_POST['nama_dosen'];
$alamat = $_POST['alamat'];

// Update data ke database
mysqli_query(
    $koneksi,
    "UPDATE dosen SET
        NIDN = '$nidn',
        nama_dosen = '$nama_dosen',
        alamat = '$alamat'
    WHERE id = '$id'"
);

// Mengalihkan halaman kembali ke index.php
header("location:index.php");

?>
