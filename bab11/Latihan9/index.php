<?php $active = 'home'; ?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Portal Data Kampus</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="wrapper">
    <?php include 'sidebar.php'; ?>

    <div class="content">
        <div class="topbar">
            <h1>Portal Data Kampus</h1>
        </div>

        <div class="card">
            <h2>Selamat Datang 👋</h2>
            <p style="margin-top:10px; color:#475569; line-height:1.6;">
                Ini adalah portal informasi data kampus. Gunakan menu di sebelah kiri untuk melihat
                daftar <strong>Matakuliah</strong> atau <strong>User</strong>.
                Jika kamu seorang admin, silakan masuk lewat menu <strong>Form Login</strong>
                untuk mengelola data (tambah, edit, hapus).
            </p>
        </div>
    </div>
</div>

</body>
</html>
