<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: index.php?menu=login");
    exit;
}
$tabel = isset($_GET['tabel']) ? $_GET['tabel'] : 'matakuliah';
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Data - BAB 11</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="isi" style="padding:20px;">
        <h3>Tambah Data <?php echo ucfirst($tabel); ?></h3>
        <form action="tambah.php" method="post">
            <input type="hidden" name="tabel" value="<?php echo $tabel; ?>">
            <?php if ($tabel == 'matakuliah') { ?>
            <table cellpadding="4">
                <tr><td>Kode_MK</td><td><input type="text" name="Kode_MK" required></td></tr>
                <tr><td>Nama_MK</td><td><input type="text" name="Nama_MK" required></td></tr>
                <tr><td>SKS</td><td><input type="number" name="SKS" min="1" max="6" required></td></tr>
                <tr><td>Semester</td><td><input type="number" name="Semester" min="1" max="8" required></td></tr>
            </table>
            <?php } else { ?>
            <table cellpadding="4">
                <tr><td>Nama Pengguna</td><td><input type="text" name="Nama_pengguna" required></td></tr>
                <tr><td>Alamat</td><td><input type="text" name="alamat" required></td></tr>
                <tr><td>Username</td><td><input type="text" name="User_name" required></td></tr>
                <tr><td>Password</td><td><input type="text" name="Password" required></td></tr>
            </table>
            <?php } ?>
            <br>
            <input type="submit" value="Simpan">
            <a href="index_admin.php">Batal</a>
        </form>
    </div>
</body>
</html>
