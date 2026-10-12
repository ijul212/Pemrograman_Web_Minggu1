<?php
session_start();
include 'koneksi.php';

// Kalau sudah login, langsung arahkan ke halaman admin
if (isset($_SESSION['admin_id'])) {
    header("location: Latihan9/admin/index.php");
    exit();
}

$error = '';
$debug = ''; // pesan teknis, hanya tampil kalau ada error database

if ($_SERVER['REQUEST_METHOD'] === 'POST') {    
    // trim() menghapus spasi tak sengaja di awal/akhir input
    $username = trim($_POST['username'] ?? '');
    $password = trim($_POST['password'] ?? '');

    if ($username === '' || $password === '') {
        $error = 'Username dan password wajib diisi.';
    } else {
        try {
            // Prepared statement supaya aman dari SQL Injection
            $stmt = mysqli_prepare($koneksi, "SELECT * FROM user WHERE User_name = ?");

            if (!$stmt) {
                throw new Exception("Gagal menyiapkan query: " . mysqli_error($koneksi));
            }

            mysqli_stmt_bind_param($stmt, "s", $username);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);

            if ($result && mysqli_num_rows($result) === 1) {
                $row = mysqli_fetch_array($result);

                // Catatan: password di tabel contoh disimpan plain text.
                // Untuk produksi sebaiknya password di-hash dengan password_hash()
                // dan dicek dengan password_verify().
                if ($password === trim($row['Password'])) {
                    $_SESSION['admin_id'] = $row['id'];
                    $_SESSION['admin_nama'] = $row['Nama_pengguna'];
                    $_SESSION['admin_username'] = $row['User_name'];

                    header("location: admin/index.php");
                    exit();
                } else {
                    $error = 'Username atau password salah.';
                }
            } else {
                $error = 'Username atau password salah.';
            }

            mysqli_stmt_close($stmt);

        } catch (\mysqli_sql_exception $e) {
            // Menangkap error database (mis. nama tabel/kolom tidak cocok)
            // supaya tidak muncul sebagai fatal error mentah ke user
            $error = 'Terjadi masalah saat memproses login.';
            $debug = $e->getMessage();
        } catch (\Exception $e) {
            $error = 'Terjadi masalah saat memproses login.';
            $debug = $e->getMessage();
        }
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login Admin - Portal Data Kampus</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="login-page">
    <div class="login-box">
        <h2>Login Admin</h2>
        <p class="subtitle">Masuk untuk mengelola data matakuliah &amp; user</p>

        <?php if ($error): ?>
            <div class="alert alert-error">
                <?php echo htmlspecialchars($error); ?>
                <?php if ($debug): ?>
                    <br><small style="opacity:0.8;">Detail teknis: <?php echo htmlspecialchars($debug); ?></small>
                <?php endif; ?>
            </div>
        <?php endif; ?>

        <form method="post" action="login.php">
            <div class="form-group">
                <label>Username</label>
                <input type="text" name="username" required autofocus>
            </div>

            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" required>
            </div>

            <button type="submit" class="btn btn-primary">MASUK</button>
        </form>

        <a href="index.php" class="back-link">&larr; Kembali ke Beranda</a>
    </div>
</div>

</body>
</html>