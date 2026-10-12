<?php
include 'auth.php';
include '../koneksi.php';

$tabel = isset($_GET['tabel']) && $_GET['tabel'] === 'user' ? 'user' : 'matakuliah';

if (!isset($_GET['id'])) {
    die("ID tidak ditemukan.");
}
$id = $_GET['id'];

if ($tabel === 'matakuliah') {
    $stmt = mysqli_prepare($koneksi, "SELECT * FROM matakuliah WHERE Kode_MK = ?");
} else {
    $stmt = mysqli_prepare($koneksi, "SELECT * FROM user WHERE id = ?");
}
mysqli_stmt_bind_param($stmt, "s", $id);
mysqli_stmt_execute($stmt);
$data = mysqli_stmt_get_result($stmt);
$d = ($data && mysqli_num_rows($data) > 0) ? mysqli_fetch_array($data) : null;
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Data - Admin</title>
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
            <h1>Edit <?php echo $tabel === 'matakuliah' ? 'Matakuliah' : 'User'; ?></h1>
        </div>

        <div class="card" style="max-width:500px;">

            <?php if (!$d): ?>
                <p>Data tidak ditemukan.</p>

            <?php elseif ($tabel === 'matakuliah'): ?>

                <form method="post" action="edit.php">
                    <input type="hidden" name="tabel" value="matakuliah">
                    <input type="hidden" name="kode_mk_lama" value="<?php echo htmlspecialchars($d['Kode_MK']); ?>">

                    <div class="form-group">
                        <label>Kode MK</label>
                        <input type="text" name="kode_mk" value="<?php echo htmlspecialchars($d['Kode_MK']); ?>" required>
                    </div>

                    <div class="form-group">
                        <label>Nama MK</label>
                        <input type="text" name="nama_mk" value="<?php echo htmlspecialchars($d['Nama_MK']); ?>" required>
                    </div>

                    <div class="form-group">
                        <label>SKS</label>
                        <input type="number" name="sks" value="<?php echo htmlspecialchars($d['SKS']); ?>" required>
                    </div>

                    <div class="form-group">
                        <label>Semester</label>
                        <input type="number" name="semester" value="<?php echo htmlspecialchars($d['Semester']); ?>" required>
                    </div>

                    <button type="submit" class="btn btn-success">EDIT</button>
                    <a href="index.php?tabel=matakuliah" class="btn btn-secondary">BATAL</a>
                </form>

            <?php else: ?>

                <form method="post" action="edit.php">
                    <input type="hidden" name="tabel" value="user">
                    <input type="hidden" name="id" value="<?php echo htmlspecialchars($d['id']); ?>">

                    <div class="form-group">
                        <label>Nama Lengkap</label>
                        <input type="text" name="nama_pengguna" value="<?php echo htmlspecialchars($d['Nama_pengguna']); ?>" required>
                    </div>

                    <div class="form-group">
                        <label>Alamat</label>
                        <input type="text" name="alamat" value="<?php echo htmlspecialchars($d['alamat']); ?>" required>
                    </div>

                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" name="username" value="<?php echo htmlspecialchars($d['User_name']); ?>" required>
                    </div>

                    <div class="form-group">
                        <label>Password <small style="font-weight:400;color:#94a3b8;">(kosongkan jika tidak diubah)</small></label>
                        <input type="password" name="password" placeholder="••••••••">
                    </div>

                    <button type="submit" class="btn btn-success">EDIT</button>
                    <a href="index.php?tabel=user" class="btn btn-secondary">BATAL</a>
                </form>

            <?php endif; ?>

        </div>
    </div>
</div>

</body>
</html>
