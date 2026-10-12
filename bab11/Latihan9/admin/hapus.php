<?php
include 'auth.php';
include '../koneksi.php';

$tabel = isset($_GET['tabel']) && $_GET['tabel'] === 'user' ? 'user' : 'matakuliah';

if (!isset($_GET['id'])) {
    die("ID tidak ditemukan.");
}
$id = $_GET['id'];

if ($tabel === 'matakuliah') {
    $stmt = mysqli_prepare($koneksi, "DELETE FROM matakuliah WHERE Kode_MK = ?");
} else {
    $stmt = mysqli_prepare($koneksi, "DELETE FROM user WHERE id = ?");
}

mysqli_stmt_bind_param($stmt, "s", $id);

if (!mysqli_stmt_execute($stmt)) {
    die("Gagal menghapus data: " . mysqli_stmt_error($stmt));
}

mysqli_stmt_close($stmt);

header("location: index.php?tabel=" . $tabel);
exit();

?>
