<!DOCTYPE html>

<html>

<head>
    <title>CRUD PHP dan MySQLi</title>
</head>

<body>

<h2>CRUD DATA DOSEN</h2>

<br>

<a href="index.php">KEMBALI</a>

<br><br>

<h3>EDIT DATA DOSEN</h3>

<?php
include 'koneksi.php';

$id = $_GET['id'];

$data = mysqli_query(
    $koneksi,
    "SELECT * FROM dosen WHERE id='$id'"
);

while ($d = mysqli_fetch_array($data)) {
?>

    <form method="post" action="update.php">
        <table>

            <tr>
                <td>NIDN</td>
                <td>
                    <input
                        type="hidden"
                        name="id"
                        value="<?php echo $d['id']; ?>"
                    >

                    <input
                        type="text"
                        name="nidn"
                        value="<?php echo $d['NIDN']; ?>"
                    >
                </td>
            </tr>

            <tr>
                <td>Nama Dosen</td>
                <td>
                    <input
                        type="text"
                        name="nama_dosen"
                        value="<?php echo $d['nama_dosen']; ?>"
                    >
                </td>
            </tr>

            <tr>
                <td>Alamat</td>
                <td>
                    <input
                        type="text"
                        name="alamat"
                        value="<?php echo $d['alamat']; ?>"
                    >
                </td>
            </tr>

            <tr>
                <td></td>
                <td>
                    <input
                        type="submit"
                        value="SIMPAN"
                    >
                </td>
            </tr>

        </table>
    </form>

<?php
}
?>

</body>

</html>
