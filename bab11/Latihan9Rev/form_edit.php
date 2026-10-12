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
    $hasil = mysqli_query($koneksi, "SELECT * FROM matakuliah WHERE Kode_MK='$id'");
} else {
    $hasil = mysqli_query($koneksi, "SELECT * FROM user WHERE id=$id");
}
$d = ($hasil && mysqli_num_rows($hasil) > 0) ? mysqli_fetch_assoc($hasil) : null;
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Data - Admin</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="wrapper">
    <div class="sidebar">
        <div class="brand">Kampus<span>DB</span></div>
        <nav>
            <a href="index_admin.php?menu=matakuliah">📚 Kelola Matakuliah</a>
            <a href="index_admin.php?menu=user">👤 Kelola User</a>
            <a href="index_admin.php?act=logout.php">🚪 Logout</a>
        </nav>
    </div>

    <div class="content">
        <div class="topbar">
            <h1>Edit <?php echo $tabel === 'matakuliah' ? 'Matakuliah' : 'User'; ?></h1>
        </div>

        <div class="card" style="max-width:500px;">

            <?php if (!$d): ?>
                <p>Data tidak ditemukan.</p>

            <?php elseif ($tabel === 'matakuliah'): ?>

                <form method="post" action="edit.php">
                    <input type="hidden" name="tabel" value="matakuliah">
                    <input type="hidden" name="kode_mk_lama" value="<?php echo $d['Kode_MK']; ?>">

                    <div class="form-group">
                        <label>Kode MK</label>
                        <input type="text" name="Kode_MK" value="<?php echo $d['Kode_MK']; ?>" required>
                    </div>

                    <div class="form-group">
                        <label>Nama MK</label>
                        <input type="text" name="Nama_MK" value="<?php echo $d['Nama_MK']; ?>" required>
                    </div>

                    <div class="form-group">
                        <label>SKS</label>
                        <input type="number" name="SKS" min="1" max="6" value="<?php echo $d['SKS']; ?>" required>
                    </div>

                    <div class="form-group">
                        <label>Semester</label>
                        <input type="number" name="Semester" min="1" max="8" value="<?php echo $d['Semester']; ?>" required>
                    </div>

                    <button type="submit" class="btn btn-success">EDIT</button>
                    <a href="index_admin.php?menu=matakuliah" class="btn btn-secondary">BATAL</a>
                </form>

            <?php else: ?>

                <form method="post" action="edit.php">
                    <input type="hidden" name="tabel" value="user">
                    <input type="hidden" name="id" value="<?php echo $d['Id']; ?>">

                    <div class="form-group">
                        <label>Nama Lengkap</label>
                        <input type="text" name="Nama_pengguna" value="<?php echo $d['Nama_pengguna']; ?>" required>
                    </div>

                    <div class="form-group">
                        <label>Alamat</label>
                        <input type="text" name="alamat" value="<?php echo $d['alamat']; ?>" required>
                    </div>

                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" name="User_name" value="<?php echo $d['User_name']; ?>" required>
                    </div>

                    <div class="form-group">
                        <label>Password</label>
                        <input type="text" name="Password" value="<?php echo $d['Password']; ?>" required>
                    </div>

                    <button type="submit" class="btn btn-success">EDIT</button>
                    <a href="index_admin.php?menu=user" class="btn btn-secondary">BATAL</a>
                </form>

            <?php endif; ?>

        </div>
    </div>
</div>

</body>
</html>
