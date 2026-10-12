<?php
include 'auth.php';
include '../koneksi.php';

$tabel = isset($_POST['tabel']) && $_POST['tabel'] === 'user' ? 'user' : 'matakuliah';

if ($tabel === 'matakuliah') {

    if (!isset($_POST['kode_mk'], $_POST['nama_mk'], $_POST['sks'], $_POST['semester'])) {
        die("Data tidak lengkap.");
    }

    $kode_mk = $_POST['kode_mk'];
    $nama_mk = $_POST['nama_mk'];
    $sks = $_POST['sks'];
    $semester = $_POST['semester'];

    $stmt = mysqli_prepare(
        $koneksi,
        "INSERT INTO matakuliah (Kode_MK, Nama_MK, SKS, Semester) VALUES (?, ?, ?, ?)"
    );

    if (!$stmt) {
        die("Gagal menyiapkan query: " . mysqli_error($koneksi));
    }

    mysqli_stmt_bind_param($stmt, "ssii", $kode_mk, $nama_mk, $sks, $semester);

    if (!mysqli_stmt_execute($stmt)) {
        die("Gagal menyimpan data: " . mysqli_stmt_error($stmt));
    }

    mysqli_stmt_close($stmt);

    header("location: index.php?tabel=matakuliah");
    exit();

} else {

    if (!isset($_POST['nama_pengguna'], $_POST['alamat'], $_POST['username'], $_POST['password'])) {
        die("Data tidak lengkap.");
    }

    $nama_pengguna = $_POST['nama_pengguna'];
    $alamat = $_POST['alamat'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    $stmt = mysqli_prepare(
        $koneksi,
        "INSERT INTO user (Nama_pengguna, alamat, User_name, Password) VALUES (?, ?, ?, ?)"
    );

    if (!$stmt) {
        die("Gagal menyiapkan query: " . mysqli_error($koneksi));
    }

    mysqli_stmt_bind_param($stmt, "ssss", $nama_pengguna, $alamat, $username, $password);

    if (!mysqli_stmt_execute($stmt)) {
        die("Gagal menyimpan data: " . mysqli_stmt_error($stmt));
    }

    mysqli_stmt_close($stmt);

    header("location: index.php?tabel=user");
    exit();

}

?>
