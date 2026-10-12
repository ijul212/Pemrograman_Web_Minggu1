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
    $hasil = $conn->query("SELECT * FROM matakuliah WHERE id=$id");
} else {
    $hasil = $conn->query("SELECT * FROM user WHERE Id=$id");
}
$row = $hasil->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Data - BAB 11</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="isi" style="padding:20px;">
        <h3>Edit Data <?php echo ucfirst($tabel); ?></h3>
        <form action="edit.php" method="post">
            <input type="hidden" name="tabel" value="<?php echo $tabel; ?>">
            <input type="hidden" name="id" value="<?php echo (isset($row['id'])) ? $row['id'] : $row['Id']; ?>">
            <?php if ($tabel == 'matakuliah') { ?>
            <table cellpadding="4">
                <tr><td>Kode_MK</td><td><input type="text" name="Kode_MK" value="<?php echo $row['Kode_MK']; ?>" required></td></tr>
                <tr><td>Nama_MK</td><td><input type="text" name="Nama_MK" value="<?php echo $row['Nama_MK']; ?>" required></td></tr>
                <tr><td>SKS</td><td><input type="number" name="SKS" min="1" max="6" value="<?php echo $row['SKS']; ?>" required></td></tr>
                <tr><td>Semester</td><td><input type="number" name="Semester" min="1" max="8" value="<?php echo $row['Semester']; ?>" required></td></tr>
            </table>
            <?php } else { ?>
            <table cellpadding="4">
                <tr><td>Nama Pengguna</td><td><input type="text" name="Nama_pengguna" value="<?php echo $row['Nama_pengguna']; ?>" required></td></tr>
                <tr><td>Alamat</td><td><input type="text" name="alamat" value="<?php echo $row['alamat']; ?>" required></td></tr>
                <tr><td>Username</td><td><input type="text" name="User_name" value="<?php echo $row['User_name']; ?>" required></td></tr>
                <tr><td>Password</td><td><input type="text" name="Password" value="<?php echo $row['Password']; ?>" required></td></tr>
            </table>
            <?php } ?>
            <br>
            <input type="submit" value="Edit">
            <a href="index_admin.php">Batal</a>
        </form>
    </div>
</body>
</html>
