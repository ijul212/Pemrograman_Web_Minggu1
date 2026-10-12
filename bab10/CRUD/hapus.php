<?php

// Koneksi database
include 'koneksi.php';

// Menangkap data ID yang dikirim dari URL
$id = $_GET['id'];

// Menghapus data dari database
mysqli_query(
    $koneksi,
    "DELETE FROM dosen WHERE id='$id'"
);

// Mengalihkan halaman kembali ke index.php
header("location:index.php");

?>
