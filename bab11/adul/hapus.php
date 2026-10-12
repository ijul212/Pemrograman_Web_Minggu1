<?php
session_start();
include("koneksi.php");

if (!isset($_SESSION['admin'])) {
    header("Location: index.php?menu=login");
    exit;
}

$tabel = $_GET['tabel'];
$id    = $_GET['id'];

if ($tabel == 'matakuliah') {
    $sql = "DELETE FROM matakuliah WHERE id=$id";
} else {
    $sql = "DELETE FROM user WHERE Id=$id";
}

if ($conn->query($sql) === TRUE) {
    header("Location: index_admin.php?menu=$tabel");
} else {
    echo "Error: " . $conn->error;
}
?>
