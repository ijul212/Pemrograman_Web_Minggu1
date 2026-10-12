<?php
include 'auth.php';

$tabel = isset($_GET['tabel']) && $_GET['tabel'] === 'user' ? 'user' : 'matakuliah';
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Data - Admin</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>

<div class="wrapper">
    <div class="sidebar">
        <div class="brand">Kampus<span>DB</span></div>
        <nav>
            <a href="index.php?tabel=matakuliah">📚 Kelola Matakuliah</a>
            <a href="index.php?tabel=user">👤 Kelola User</a>
            <a href="../index.php">🏠 Lihat Portal Publik</a>
            <a href="../logout.php">🚪 Logout</a>
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
                        <input type="text" name="kode_mk" required>
                    </div>

                    <div class="form-group">
                        <label>Nama MK</label>
                        <input type="text" name="nama_mk" required>
                    </div>

                    <div class="form-group">
                        <label>SKS</label>
                        <input type="number" name="sks" required>
                    </div>

                    <div class="form-group">
                        <label>Semester</label>
                        <input type="number" name="semester" required>
                    </div>

                    <button type="submit" class="btn btn-success">SIMPAN</button>
                    <a href="index.php?tabel=matakuliah" class="btn btn-secondary">BATAL</a>
                </form>

            <?php else: ?>

                <form method="post" action="tambah.php">
                    <input type="hidden" name="tabel" value="user">

                    <div class="form-group">
                        <label>Nama Lengkap</label>
                        <input type="text" name="nama_pengguna" required>
                    </div>

                    <div class="form-group">
                        <label>Alamat</label>
                        <input type="text" name="alamat" required>
                    </div>

                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" name="username" required>
                    </div>

                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="password" required>
                    </div>

                    <button type="submit" class="btn btn-success">SIMPAN</button>
                    <a href="index.php?tabel=user" class="btn btn-secondary">BATAL</a>
                </form>

            <?php endif; ?>

        </div>
    </div>
</div>

</body>
</html>
