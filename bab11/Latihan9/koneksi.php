<?php

$koneksi = mysqli_connect(
    "localhost",
    "root",
    "",
    "kampus"
);

// Check connection
if (!$koneksi) {
    die("Koneksi database gagal : " . mysqli_connect_error());
}

// Pastikan encoding konsisten
mysqli_set_charset($koneksi, "utf8mb4");

?>
