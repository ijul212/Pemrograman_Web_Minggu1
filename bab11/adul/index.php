<?php
session_start();
$menu  = isset($_GET['menu']) ? $_GET['menu'] : 'matakuliah';
$slink = isset($_GET['slink']) ? $_GET['slink'] : '';
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>BAB 11 - Layout Design Website</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="navbar">
        <span class="judul">SISTEM INFORMASI KAMPUS</span>
        <span class="subjudul">Layout Design Website - Soal Latihan BAB 11</span>
    </div>

    <table class="layout" cellpadding="0" cellspacing="0">
        <tr>
            <td class="menu-kiri" valign="top">
                <table class="menu" cellpadding="0" cellspacing="0">
                    <tr><td><a class="btn3d" href="index.php?menu=matakuliah">List Matakuliah</a></td></tr>
                    <tr><td><a class="btn3d" href="index.php?menu=user">List User</a></td></tr>
                    <tr><td><a class="btn3d" href="index.php?menu=login">Form Login</a></td></tr>
                </table>
            </td>

            <td class="isi" valign="top">
                <?php
                switch ($menu) {
                    case 'user':
                        tampil_user_umum();
                        break;
                    case 'login':
                        frm_login();
                        break;
                    case 'matakuliah':
                    default:
                        tampil_matakuliah_umum();
                        break;
                }
                ?>
            </td>

            <td class="menu-kanan" valign="top">
                <table class="menu" cellpadding="0" cellspacing="0">
                    <tr><td><a class="btn3d" href="index.php?menu=matakuliah">Beranda</a></td></tr>
                    <tr><td><a class="btn3d" href="index.php?menu=login">Login Admin</a></td></tr>
                </table>
            </td>
        </tr>
    </table>

    <div class="footer">
        &copy; 2026 Politeknik Manufaktur Bandung - Laporan Praktik Pemrograman Web
    </div>
</body>
</html>

<?php
// ============================================================
// Fungsi halaman
// ============================================================

// 1. User umum : menampilkan isi tabel matakuliah (tanpa tombol tambah/edit/hapus)
function tampil_matakuliah_umum() {
    include("koneksi.php");
    $hasil = $conn->query("SELECT * FROM matakuliah ORDER BY Kode_MK");
    echo "<h3>List Matakuliah</h3>";
    echo "<table class='tabel' border='1' cellpadding='6' cellspacing='0'>";
    echo "<tr><th>Kode_MK</th><th>Nama_MK</th><th>SKS</th><th>Semester</th></tr>";
    while ($row = $hasil->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row['Kode_MK'] . "</td>";
        echo "<td>" . $row['Nama_MK'] . "</td>";
        echo "<td>" . $row['SKS'] . "</td>";
        echo "<td>" . $row['Semester'] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
}

// 2. User umum : menampilkan isi tabel user (hanya nama lengkap dan alamat,
//    tanpa username dan password, dan tanpa tombol tambah/edit/hapus)
function tampil_user_umum() {
    include("koneksi.php");
    $hasil = $conn->query("SELECT Nama_pengguna, alamat FROM user");
    echo "<h3>List User</h3>";
    echo "<table class='tabel' border='1' cellpadding='6' cellspacing='0'>";
    echo "<tr><th>Nama Pengguna</th><th>Alamat</th></tr>";
    while ($row = $hasil->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row['Nama_pengguna'] . "</td>";
        echo "<td>" . $row['alamat'] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
}

// 3. Form Login
function frm_login() {
    ?>
    <h3>Form Login Admin</h3>
    <form method="post" action="login.php">
        <table cellpadding="4">
            <tr><td>Username</td><td><input type="text" name="User_name" required></td></tr>
            <tr><td>Password</td><td><input type="password" name="Password" required></td></tr>
            <tr><td colspan="2"><input type="submit" value="Login"></td></tr>
        </table>
    </form>
    <?php
}
?>
