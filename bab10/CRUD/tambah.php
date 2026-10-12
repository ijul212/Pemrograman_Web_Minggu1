<html>
<head>
    <title>CRUD PHP dan MySQLi</title>
</head>

<body>

<h2>CRUD DATA DOSEN</h2>

<br>

<a href="index.php">KEMBALI</a>

<br><br>

<h3>TAMBAH DATA DOSEN</h3>

<form method="post" action="tambah_aksi.php">
    <table>
        <tr>
            <td>NIDN</td>
            <td>
                <input type="text" name="nidn">
            </td>
        </tr>

        <tr>
            <td>Nama Dosen</td>
            <td>
                <input type="text" name="nama_dosen">
            </td>
        </tr>

        <tr>
            <td>Alamat</td>
            <td>
                <input type="text" name="alamat">
            </td>
        </tr>

        <tr>
            <td></td>
            <td>
                <input type="submit" value="SIMPAN">
            </td>
        </tr>
    </table>
</form>

</body>
</html>
