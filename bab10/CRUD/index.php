<html>
<head>
    <title>CRUD PHP dan MySQLi</title>
</head>

<body>

<h2>CRUD DATA DOSEN</h2>
<br>

<a href="tambah.php">+ TAMBAH DOSEN</a>
<br><br>

<table border="1">
    <tr>
        <th>NO</th>
        <th>NIDN</th>
        <th>Nama Dosen</th>
        <th>Alamat</th>
        <th>OPSI</th>
    </tr>

    <?php
    include 'koneksi.php';

    $no = 1;

    $data = mysqli_query($koneksi, "SELECT * FROM dosen");

    while ($d = mysqli_fetch_array($data)) {
    ?>

        <tr>
            <td><?php echo $no++; ?></td>
            <td><?php echo $d['NIDN']; ?></td>
            <td><?php echo $d['nama_dosen']; ?></td>
            <td><?php echo $d['alamat']; ?></td>

            <td>
                <a href="edit.php?id=<?php echo $d['id']; ?>">EDIT</a>
                <a href="hapus.php?id=<?php echo $d['id']; ?>">HAPUS</a>
            </td>
        </tr>

    <?php
    }
    ?>

</table>

</body>
</html>
