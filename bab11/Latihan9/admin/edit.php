<?php
include 'auth.php';
include '../koneksi.php';

$tabel = isset($_POST['tabel']) && $_POST['tabel'] === 'user' ? 'user' : 'matakuliah';

if ($tabel === 'matakuliah') {

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

    header("location: index.php?tabel=matakuliah");
    exit();

} else {

    if (!isset($_POST['id'], $_POST['nama_pengguna'], $_POST['alamat'], $_POST['username'])) {
        die("Data tidak lengkap.");
    }

    $id = $_POST['id'];
    $nama_pengguna = $_POST['nama_pengguna'];
    $alamat = $_POST['alamat'];
    $username = $_POST['username'];
    $password = $_POST['password'] ?? '';

    if ($password !== '') {
        // Password diisi -> update termasuk password
        $stmt = mysqli_prepare(
            $koneksi,
            "UPDATE user SET Nama_pengguna = ?, alamat = ?, User_name = ?, Password = ? WHERE id = ?"
        );
        mysqli_stmt_bind_param($stmt, "ssssi", $nama_pengguna, $alamat, $username, $password, $id);
    } else {
        // Password dikosongkan -> jangan diubah
        $stmt = mysqli_prepare(
            $koneksi,
            "UPDATE user SET Nama_pengguna = ?, alamat = ?, User_name = ? WHERE id = ?"
        );
        mysqli_stmt_bind_param($stmt, "sssi", $nama_pengguna, $alamat, $username, $id);
    }

    if (!$stmt) {
        die("Gagal menyiapkan query: " . mysqli_error($koneksi));
    }

    if (!mysqli_stmt_execute($stmt)) {
        die("Gagal mengupdate data: " . mysqli_stmt_error($stmt));
    }

    mysqli_stmt_close($stmt);

    header("location: index.php?tabel=user");
    exit();

}

?>
