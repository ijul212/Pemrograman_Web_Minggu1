<?php
session_start();

if (!isset($_SESSION['admin'])) {
    header("location: index.php?menu=login");
    exit();
}

$menu = isset($_GET['menu']) ? $_GET['menu'] : 'matakuliah';
$act  = isset($_GET['act']) ? $_GET['act'] : '';

if ($act === 'logout.php') {
    include("logout.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Admin - Portal Data Kampus</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="wrapper">
    <div class="sidebar">
        <div class="brand">Kampus<span>DB</span></div>
        <nav>
            <a href="index_admin.php?menu=matakuliah" class="<?php echo $menu === 'matakuliah' ? 'active' : ''; ?>">📚 Kelola Matakuliah</a>
            <a href="index_admin.php?menu=user" class="<?php echo $menu === 'user' ? 'active' : ''; ?>">👤 Kelola User</a>
            <a href="index_admin.php?act=logout.php">🚪 Logout</a>
        </nav>
    </div>

    <div class="content">
        <div class="topbar">
            <h1>Admin - <?php echo $menu === 'matakuliah' ? 'Data Matakuliah' : 'Data User'; ?></h1>
            <div class="user-info">
                Masuk sebagai <strong><?php echo $_SESSION['admin']; ?></strong>
                <a href="index_admin.php?act=logout.php">Logout</a>
            </div>
        </div>

        <div class="tabs">
            <a href="index_admin.php?menu=matakuliah" class="<?php echo $menu === 'matakuliah' ? 'active' : ''; ?>">Matakuliah</a>
            <a href="index_admin.php?menu=user" class="<?php echo $menu === 'user' ? 'active' : ''; ?>">User</a>
        </div>

        <div class="card">
            <?php
            if ($menu === 'user') {
                tampil_user_admin();
            } else {
                tampil_matakuliah_admin();
            }
            ?>
        </div>
    </div>
</div>

</body>
</html>

<?php
function tampil_matakuliah_admin() {
    include("koneksi.php");
    $hasil = mysqli_query($koneksi, "SELECT * FROM matakuliah ORDER BY Kode_MK");

    echo "<div style='margin-bottom:16px;'>";
    echo "<a href='form_tambah.php?tabel=matakuliah' class='btn btn-success'>+ Tambah Matakuliah</a>";
    echo "</div>";

    echo "<table class='data'>";
    echo "<tr><th>Kode MK</th><th>Nama MK</th><th>SKS</th><th>Semester</th><th>Opsi</th></tr>";

    if ($hasil && mysqli_num_rows($hasil) > 0) {
        while ($row = mysqli_fetch_assoc($hasil)) {
            echo "<tr>";
            echo "<td>" . $row['Kode_MK'] . "</td>";
            echo "<td>" . $row['Nama_MK'] . "</td>";
            echo "<td>" . $row['SKS'] . "</td>";
            echo "<td>" . $row['Semester'] . "</td>";
            echo "<td class='actions'>
                    <a class='btn btn-edit' href='form_edit.php?tabel=matakuliah&id=" . $row['Kode_MK'] . "'>Edit</a>
                    <a class='btn btn-hapus' href='hapus.php?tabel=matakuliah&id=" . $row['Kode_MK'] . "' onclick=\"return confirm('Yakin hapus matakuliah ini?');\">Hapus</a>
                  </td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='5' class='empty-state'>Belum ada data matakuliah.</td></tr>";
    }
    echo "</table>";
}

function tampil_user_admin() {
    include("koneksi.php");
    $hasil = mysqli_query($koneksi, "SELECT * FROM user ORDER BY id");

    echo "<div style='margin-bottom:16px;'>";
    echo "<a href='form_tambah.php?tabel=user' class='btn btn-success'>+ Tambah User</a>";
    echo "</div>";

    echo "<table class='data'>";
    echo "<tr><th>Nama Lengkap</th><th>Alamat</th><th>Username</th><th>Password</th><th>Opsi</th></tr>";

    if ($hasil && mysqli_num_rows($hasil) > 0) {
        while ($row = mysqli_fetch_assoc($hasil)) {
            echo "<tr>";
            echo "<td>" . $row['Nama_pengguna'] . "</td>";
            echo "<td>" . $row['alamat'] . "</td>";
            echo "<td>" . $row['User_name'] . "</td>";
            echo "<td>" . $row['Password'] . "</td>";
            echo "<td class='actions'>
                    <a class='btn btn-edit' href='form_edit.php?tabel=user&id=" . $row['Id'] . "'>Edit</a>
                    <a class='btn btn-hapus' href='hapus.php?tabel=user&id=" . $row['Id'] . "' onclick=\"return confirm('Yakin hapus user ini?');\">Hapus</a>
                  </td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='5' class='empty-state'>Belum ada data user.</td></tr>";
    }
    echo "</table>";
}
?>
