<?php
include 'auth.php';
include '../koneksi.php';

// Tabel yang aktif ditentukan lewat parameter ?tabel=matakuliah atau ?tabel=user
// Whitelist supaya tidak bisa disisipi nama tabel sembarangan
$tabel = isset($_GET['tabel']) && $_GET['tabel'] === 'user' ? 'user' : 'matakuliah';
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Admin - Portal Data Kampus</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>

<div class="wrapper">
    <div class="sidebar">
        <div class="brand">Kampus<span>DB</span></div>
        <nav>
            <a href="index.php?tabel=matakuliah" class="<?php echo $tabel === 'matakuliah' ? 'active' : ''; ?>">📚 Kelola Matakuliah</a>
            <a href="index.php?tabel=user" class="<?php echo $tabel === 'user' ? 'active' : ''; ?>">👤 Kelola User</a>
            <a href="../index.php">🏠 Lihat Portal Publik</a>
            <a href="../logout.php">🚪 Logout</a>
        </nav>
    </div>

    <div class="content">
        <div class="topbar">
            <h1>Admin - <?php echo $tabel === 'matakuliah' ? 'Data Matakuliah' : 'Data User'; ?></h1>
            <div class="user-info">
                Masuk sebagai <strong><?php echo htmlspecialchars($_SESSION['admin_nama']); ?></strong>
                <a href="../logout.php">Logout</a>
            </div>
        </div>

        <div class="tabs">
            <a href="index.php?tabel=matakuliah" class="<?php echo $tabel === 'matakuliah' ? 'active' : ''; ?>">Matakuliah</a>
            <a href="index.php?tabel=user" class="<?php echo $tabel === 'user' ? 'active' : ''; ?>">User</a>
        </div>

        <div class="card">
            <div style="margin-bottom:16px;">
                <a href="form_tambah.php?tabel=<?php echo $tabel; ?>" class="btn btn-success">+ Tambah <?php echo $tabel === 'matakuliah' ? 'Matakuliah' : 'User'; ?></a>
            </div>

            <?php if ($tabel === 'matakuliah'): ?>

                <table class="data">
                    <tr>
                        <th>Kode MK</th>
                        <th>Nama MK</th>
                        <th>SKS</th>
                        <th>Semester</th>
                        <th>Opsi</th>
                    </tr>
                    <?php
                    $data = mysqli_query($koneksi, "SELECT * FROM matakuliah ORDER BY Kode_MK");
                    if ($data && mysqli_num_rows($data) > 0) {
                        while ($d = mysqli_fetch_array($data)) {
                    ?>
                        <tr>
                            <td><?php echo htmlspecialchars($d['Kode_MK']); ?></td>
                            <td><?php echo htmlspecialchars($d['Nama_MK']); ?></td>
                            <td><?php echo htmlspecialchars($d['SKS']); ?></td>
                            <td><?php echo htmlspecialchars($d['Semester']); ?></td>
                            <td class="actions">
                                <a class="btn btn-edit" href="form_edit.php?tabel=matakuliah&id=<?php echo urlencode($d['Kode_MK']); ?>">Edit</a>
                                <a class="btn btn-hapus" href="hapus.php?tabel=matakuliah&id=<?php echo urlencode($d['Kode_MK']); ?>" onclick="return confirm('Yakin hapus matakuliah ini?');">Hapus</a>
                            </td>
                        </tr>
                    <?php
                        }
                    } else {
                        echo '<tr><td colspan="5" class="empty-state">Belum ada data matakuliah.</td></tr>';
                    }
                    ?>
                </table>

            <?php else: ?>

                <table class="data">
                    <tr>
                        <th>Nama Lengkap</th>
                        <th>Alamat</th>
                        <th>Username</th>
                        <th>Password</th>
                        <th>Opsi</th>
                    </tr>
                    <?php
                    $data = mysqli_query($koneksi, "SELECT * FROM user ORDER BY id");
                    if ($data && mysqli_num_rows($data) > 0) {
                        while ($d = mysqli_fetch_array($data)) {
                    ?>
                        <tr>
                            <td><?php echo htmlspecialchars($d['Nama_pengguna']); ?></td>
                            <td><?php echo htmlspecialchars($d['alamat']); ?></td>
                            <td><?php echo htmlspecialchars($d['User_name']); ?></td>
                            <td>••••••••</td>
                            <td class="actions">
                                <a class="btn btn-edit" href="form_edit.php?tabel=user&id=<?php echo urlencode($d['id']); ?>">Edit</a>
                                <a class="btn btn-hapus" href="hapus.php?tabel=user&id=<?php echo urlencode($d['id']); ?>" onclick="return confirm('Yakin hapus user ini?');">Hapus</a>
                            </td>
                        </tr>
                    <?php
                        }
                    } else {
                        echo '<tr><td colspan="5" class="empty-state">Belum ada data user.</td></tr>';
                    }
                    ?>
                </table>

            <?php endif; ?>
        </div>
    </div>
</div>

</body>
</html>
