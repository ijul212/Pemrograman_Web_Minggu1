<?php
$active = 'matakuliah';
include 'koneksi.php';
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>List Matakuliah - Portal Data Kampus</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="wrapper">
    <?php include 'sidebar.php'; ?>

    <div class="content">
        <div class="topbar">
            <h1>List Matakuliah</h1>
        </div>

        <div class="card">
            <table class="data">
                <tr>
                    <th>Kode MK</th>
                    <th>Nama MK</th>
                    <th>SKS</th>
                    <th>Semester</th>
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
                    </tr>
                <?php
                    }
                } else {
                    echo '<tr><td colspan="4" class="empty-state">Belum ada data matakuliah.</td></tr>';
                }
                ?>
            </table>
        </div>
    </div>
</div>

</body>
</html>
