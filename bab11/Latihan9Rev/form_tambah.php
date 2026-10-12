<?php
session_start();

if (!isset($_SESSION['admin'])) {
    header("location: index.php?menu=login");
    exit();
}

$tabel = isset($_GET['tabel']) && $_GET['tabel'] === 'user' ? 'user' : 'matakuliah';
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Data - Admin</title>
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
            <h1>Tambah <?php echo $tabel === 'matakuliah' ? 'Matakuliah' : 'User'; ?></h1>
        </div>

        <div class="card" style="max-width:500px;">

            <?php if ($tabel === 'matakuliah'): ?>

                <form method="post" action="tambah.php">
                    <input type="hidden" name="tabel" value="matakuliah">

                    <div class="form-group">
                        <label>Kode MK</label>
                        <input type="text" name="Kode_MK" required>
                    </div>

                    <div class="form-group">
                        <label>Nama MK</label>
                        <input type="text" name="Nama_MK" required>
                    </div>

                    <div class="form-group">
                        <label>SKS</label>
                        <input type="number" name="SKS" min="1" max="6" required>
                    </div>

                    <div class="form-group">
                        <label>Semester</label>
                        <input type="number" name="Semester" min="1" max="8" required>
                    </div>

                    <button type="submit" class="btn btn-success">SIMPAN</button>
                    <a href="index_admin.php?menu=matakuliah" class="btn btn-secondary">BATAL</a>
                </form>

            <?php else: ?>

                <form method="post" action="tambah.php">
                    <input type="hidden" name="tabel" value="user">

                    <div class="form-group">
                        <label>Nama Lengkap</label>
                        <input type="text" name="Nama_pengguna" required>
                    </div>

                    <div class="form-group">
                        <label>Alamat</label>
                        <input type="text" name="alamat" required>
                    </div>

                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" name="User_name" required>
                    </div>

                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="Password" required>
                    </div>

                    <button type="submit" class="btn btn-success">SIMPAN</button>
                    <a href="index_admin.php?menu=user" class="btn btn-secondary">BATAL</a>
                </form>

            <?php endif; ?>

        </div>
    </div>
</div>

</body>
</html>
