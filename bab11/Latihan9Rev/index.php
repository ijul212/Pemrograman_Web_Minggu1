<?php
session_start();

if (isset($_SESSION['admin'])) {
    header("location: index_admin.php");
    exit();
}

$menu = isset($_GET['menu']) ? $_GET['menu'] : 'matakuliah';
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Portal Data Kampus</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="wrapper">
    <div class="sidebar">
        <div class="brand">Kampus<span>DB</span></div>
        <nav>
            <a href="index.php?menu=matakuliah" class="<?php echo $menu === 'matakuliah' ? 'active' : ''; ?>">📚 List Matakuliah</a>
            <a href="index.php?menu=user" class="<?php echo $menu === 'user' ? 'active' : ''; ?>">👤 List User</a>
            <a href="index.php?menu=login" class="<?php echo $menu === 'login' ? 'active' : ''; ?>">🔐 Form Login</a>
        </nav>
    </div>

    <div class="content">
        <div class="topbar">
            <h1>Portal Data Kampus</h1>
        </div>

        <div class="card">
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
        </div>
    </div>
</div>

</body>
</html>

<?php

function tampil_matakuliah_umum() {
    include("koneksi.php");
    $hasil = mysqli_query($koneksi, "SELECT * FROM matakuliah ORDER BY Kode_MK");

    echo "<h2 style='margin-bottom:16px;'>List Matakuliah</h2>";
    echo "<table class='data'>";
    echo "<tr><th>Kode MK</th><th>Nama MK</th><th>SKS</th><th>Semester</th></tr>";

    if ($hasil && mysqli_num_rows($hasil) > 0) {
        while ($row = mysqli_fetch_assoc($hasil)) {
            echo "<tr>";
            echo "<td>" . $row['Kode_MK'] . "</td>";
            echo "<td>" . $row['Nama_MK'] . "</td>";
            echo "<td>" . $row['SKS'] . "</td>";
            echo "<td>" . $row['Semester'] . "</td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='4' class='empty-state'>Belum ada data matakuliah.</td></tr>";
    }
    echo "</table>";
}

function tampil_user_umum() {
    include("koneksi.php");
    $hasil = mysqli_query($koneksi, "SELECT Nama_pengguna, alamat FROM user ORDER BY Nama_pengguna");

    echo "<h2 style='margin-bottom:16px;'>List User</h2>";
    echo "<table class='data'>";
    echo "<tr><th>Nama Lengkap</th><th>Alamat</th></tr>";

    if ($hasil && mysqli_num_rows($hasil) > 0) {
        while ($row = mysqli_fetch_assoc($hasil)) {
            echo "<tr>";
            echo "<td>" . $row['Nama_pengguna'] . "</td>";
            echo "<td>" . $row['alamat'] . "</td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='2' class='empty-state'>Belum ada data user.</td></tr>";
    }
    echo "</table>";
}

function frm_login() {
    $error = isset($_GET['error']) ? $_GET['error'] : '';
    ?>
    <div style="max-width:380px; margin:0 auto;">
        <h2 style="margin-bottom:6px;">Login Admin</h2>
        <p style="color:#64748b; font-size:14px; margin-bottom:24px;">Masuk untuk mengelola data matakuliah &amp; user</p>

        <?php if ($error === '1'): ?>
            <div class="alert alert-error">Username atau Password salah!</div>
        <?php endif; ?>

        <form method="post" action="login.php">
            <div class="form-group">
                <label>Username</label>
                <input type="text" name="User_name" required autofocus>
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="Password" required>
            </div>
            <button type="submit" class="btn btn-primary">MASUK</button>
        </form>
    </div>
    <?php
}
?>
