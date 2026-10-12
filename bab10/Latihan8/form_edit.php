<!DOCTYPE html>
<html>
<head>
    <title>CRUD Matakuliah - PHP dan MySQLi</title>
</head>

<body>

<h2>CRUD DATA MATAKULIAH</h2>

<br>

<a href="index.php">KEMBALI</a>

<br><br>

<h3>EDIT DATA MATAKULIAH</h3>

<?php
include 'koneksi.php';

if (!isset($_GET['kode_mk'])) {
    die("Kode MK tidak ditemukan.");
}

$kode_mk = $_GET['kode_mk'];

$stmt = mysqli_prepare($koneksi, "SELECT * FROM matakuliah WHERE Kode_MK = ?");
mysqli_stmt_bind_param($stmt, "s", $kode_mk);
mysqli_stmt_execute($stmt);
$data = mysqli_stmt_get_result($stmt);

if (!$data || mysqli_num_rows($data) === 0) {
    echo "<p>Data tidak ditemukan.</p>";
} else {
    $d = mysqli_fetch_array($data);
?>

    <form method="post" action="edit.php">
        <table>

            <tr>
                <td>Kode MK</td>
                <td>
                    <input
                        type="hidden"
                        name="kode_mk_lama"
                        value="<?php echo htmlspecialchars($d['Kode_MK']); ?>"
                    >

                    <input
                        type="text"
                        name="kode_mk"
                        value="<?php echo htmlspecialchars($d['Kode_MK']); ?>"
                    >
                </td>
            </tr>

            <tr>
                <td>Nama MK</td>
                <td>
                    <input
                        type="text"
                        name="nama_mk"
                        value="<?php echo htmlspecialchars($d['Nama_MK']); ?>"
                    >
                </td>
            </tr>

            <tr>
                <td>SKS</td>
                <td>
                    <input
                        type="number"
                        name="sks"
                        value="<?php echo htmlspecialchars($d['SKS']); ?>"
                    >
                </td>
            </tr>

            <tr>
                <td>Semester</td>
                <td>
                    <input
                        type="number"
                        name="semester"
                        value="<?php echo htmlspecialchars($d['Semester']); ?>"
                    >
                </td>
            </tr>

            <tr>
                <td></td>
                <td>
                    <input
                        type="submit"
                        value="EDIT"
                    >
                </td>
            </tr>

        </table>
    </form>

<?php
}

mysqli_stmt_close($stmt);
?>

</body>

</html>