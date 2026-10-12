<?php
$active = 'user';
include 'koneksi.php';
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>List User - Portal Data Kampus</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="wrapper">
    <?php include 'sidebar.php'; ?>

    <div class="content">
        <div class="topbar">
            <h1>List User</h1>
        </div>

        <div class="card">
            <!-- Hanya menampilkan Nama Lengkap dan Alamat, tanpa username/password -->
            <table class="data">
                <tr>
                    <th>Nama Lengkap</th>
                    <th>Alamat</th>
                </tr>

                <?php
                $data = mysqli_query($koneksi, "SELECT Nama_pengguna, alamat FROM user ORDER BY Nama_pengguna");

                if ($data && mysqli_num_rows($data) > 0) {
                    while ($d = mysqli_fetch_array($data)) {
                ?>
                    <tr>
                        <td><?php echo htmlspecialchars($d['Nama_pengguna']); ?></td>
                        <td><?php echo htmlspecialchars($d['alamat']); ?></td>
                    </tr>
                <?php
                    }
                } else {
                    echo '<tr><td colspan="2" class="empty-state">Belum ada data user.</td></tr>';
                }
                ?>
            </table>
        </div>
    </div>
</div>

</body>
</html>
