<?php
session_start();
include("koneksi.php");

if (!isset($_SESSION['admin'])) {
    header("location: index.php?menu=login");
    exit();
}

$tabel = isset($_GET['tabel']) && $_GET['tabel'] === 'user' ? 'user' : 'matakuliah';

if (!isset($_GET['id'])) {
    die("ID tidak ditemukan.");
}
$id = $_GET['id'];

if ($tabel === 'matakuliah') {
    $sql = "DELETE FROM matakuliah WHERE Kode_MK='$id'";
} else {
    $sql = "DELETE FROM user WHERE id=$id";
}

if (mysqli_query($koneksi, $sql)) {
    header("location: index_admin.php?menu=$tabel");
    exit();
} else {
    echo "Error: " . mysqli_error($koneksi);
}
?>
