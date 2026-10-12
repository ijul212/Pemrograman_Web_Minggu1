<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: index.php?menu=login");
    exit;
}

$menu  = isset($_GET['menu']) ? $_GET['menu'] : 'matakuliah';
$act   = isset($_GET['act']) ? $_GET['act'] : '';
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Admin - BAB 11</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="navbar">
        <span class="judul">SISTEM INFORMASI KAMPUS</span>
        <span class="subjudul">Halaman Admin - <?php echo $_SESSION['admin']; ?></span>
    </div>

    <table class="layout" cellpadding="0" cellspacing="0">
        <tr>
            <td class="menu-kiri" valign="top">
                <table class="menu" cellpadding="0" cellspacing="0">
                    <tr><td><a class="btn3d" href="index_admin.php?menu=matakuliah">List Matakuliah</a></td></tr>
                    <tr><td><a class="btn3d" href="index_admin.php?menu=user">List User</a></td></tr>
                    <tr><td><a class="btn3d" href="index_admin.php?act=logout.php&menu=logout">Logout</a></td></tr>
                </table>
            </td>

            <td class="isi" valign="top">
                <?php
                if ($act == 'logout.php') {
                    include("logout.php");
                } elseif ($menu == 'user') {
                    tampil_user_admin();
                } else {
                    tampil_matakuliah_admin();
                }
                ?>
            </td>

            <td class="menu-kanan" valign="top">
                <table class="menu" cellpadding="0" cellspacing="0">
                    <tr><td><a class="btn3d" href="index_admin.php?menu=matakuliah">Beranda</a></td></tr>
                    <tr><td><a class="btn3d" href="index_admin.php?act=logout.php&menu=logout">Logout</a></td></tr>
                </table>
            </td>
        </tr>
    </table>

    <div class="footer">
        &copy; 2026 Politeknik Manufaktur Bandung - Halaman Admin
    </div>
</body>
</html>

<?php
// ============================================================
// Fungsi halaman admin
// ============================================================

// Admin : menampilkan data tabel matakuliah + tombol Tambah, Edit dan Hapus
function tampil_matakuliah_admin() {
    include("koneksi.php");
    $hasil = $conn->query("SELECT * FROM matakuliah ORDER BY Kode_MK");
    echo "<h3>List Matakuliah</h3>";
    echo "<a href='form_tambah.php?tabel=matakuliah'>[+] Tambah Data</a><br><br>";
    echo "<table class='tabel' border='1' cellpadding='6' cellspacing='0'>";
    echo "<tr><th>Kode_MK</th><th>Nama_MK</th><th>SKS</th><th>Semester</th><th>Aksi</th></tr>";
    while ($row = $hasil->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row['Kode_MK'] . "</td>";
        echo "<td>" . $row['Nama_MK'] . "</td>";
        echo "<td>" . $row['SKS'] . "</td>";
        echo "<td>" . $row['Semester'] . "</td>";
        echo "<td>
                <a href='form_edit.php?tabel=matakuliah&id=" . $row['id'] . "'>Edit</a> |
                <a href='hapus.php?tabel=matakuliah&id=" . $row['id'] . "'
                   onclick=\"return confirm('Yakin ingin menghapus?');\">Hapus</a>
              </td>";
        echo "</tr>";
    }
    echo "</table>";
}

// Admin : menampilkan data tabel user + tombol Tambah, Edit dan Hapus
function tampil_user_admin() {
    include("koneksi.php");
    $hasil = $conn->query("SELECT * FROM user");
    echo "<h3>List User</h3>";
    echo "<a href='form_tambah.php?tabel=user'>[+] Tambah Data</a><br><br>";
    echo "<table class='tabel' border='1' cellpadding='6' cellspacing='0'>";
    echo "<tr><th>Nama_pengguna</th><th>alamat</th><th>User_name</th><th>Password</th><th>Aksi</th></tr>";
    while ($row = $hasil->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row['Nama_pengguna'] . "</td>";
        echo "<td>" . $row['alamat'] . "</td>";
        echo "<td>" . $row['User_name'] . "</td>";
        echo "<td>" . $row['Password'] . "</td>";
        echo "<td>
                <a href='form_edit.php?tabel=user&id=" . $row['Id'] . "'>Edit</a> |
                <a href='hapus.php?tabel=user&id=" . $row['Id'] . "'
                   onclick=\"return confirm('Yakin ingin menghapus?');\">Hapus</a>
              </td>";
        echo "</tr>";
    }
    echo "</table>";
}
?>
