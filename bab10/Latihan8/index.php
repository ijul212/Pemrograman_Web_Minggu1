<html>
<head>
    <title>CRUD Matakuliah - PHP dan MySQLi</title>
</head>

<body>

<h2>CRUD DATA MATAKULIAH</h2>
<br>

<a href="form_tambah.php">+ TAMBAH MATAKULIAH</a>
<br><br>

<table border="1" cellpadding="8">
    <tr>
        <th>NO</th>
        <th>Kode MK</th>
        <th>Nama MK</th>
        <th>SKS</th>
        <th>Semester</th>
        <th>OPSI</th>
    </tr>

    <?php
    include 'koneksi.php';

    $no = 1;

    $data = mysqli_query($koneksi, "SELECT * FROM matakuliah");

    if (!$data) {
        echo "<tr><td colspan='6'>Gagal mengambil data: " . htmlspecialchars(mysqli_error($koneksi)) . "</td></tr>";
    } else {
        while ($d = mysqli_fetch_array($data)) {
    ?>

        <tr>
            <td><?php echo $no++; ?></td>
            <td><?php echo htmlspecialchars($d['Kode_MK']); ?></td>
            <td><?php echo htmlspecialchars($d['Nama_MK']); ?></td>
            <td><?php echo htmlspecialchars($d['SKS']); ?></td>
            <td><?php echo htmlspecialchars($d['Semester']); ?></td>

            <td>
                <a href="form_edit.php?kode_mk=<?php echo urlencode($d['Kode_MK']); ?>">EDIT</a>
                <a href="hapus.php?kode_mk=<?php echo urlencode($d['Kode_MK']); ?>" onclick="return confirm('Yakin hapus data ini?');">HAPUS</a>
            </td>
        </tr>

    <?php
        }
    }
    ?>

</table>

</body>
</html>