<html>
<head>
    <title>CRUD Matakuliah - PHP dan MySQLi</title>
</head>

<body>

<h2>CRUD DATA MATAKULIAH</h2>

<br>

<a href="index.php">KEMBALI</a>

<br><br>

<h3>TAMBAH DATA MATAKULIAH</h3>

<form method="post" action="tambah.php">
    <table>
        <tr>
            <td>Kode MK</td>
            <td>
                <input type="text" name="kode_mk" required>
            </td>
        </tr>

        <tr>
            <td>Nama MK</td>
            <td>
                <input type="text" name="nama_mk" required>
            </td>
        </tr>

        <tr>
            <td>SKS</td>
            <td>
                <input type="number" name="sks" required>
            </td>
        </tr>

        <tr>
            <td>Semester</td>
            <td>
                <input type="number" name="semester" required>
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