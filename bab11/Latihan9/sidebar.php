<?php
// $active dipakai untuk menandai menu mana yang sedang aktif
// diisi dari halaman yang meng-include file ini, misal: $active = 'matakuliah';
if (!isset($active)) $active = '';
?>
<div class="sidebar">
    <div class="brand">Kampus<span>DB</span></div>
    <nav>
        <a href="index.php" class="<?php echo $active === 'home' ? 'active' : ''; ?>">🏠 Beranda</a>
        <a href="list_matakuliah.php" class="<?php echo $active === 'matakuliah' ? 'active' : ''; ?>">📚 List Matakuliah</a>
        <a href="list_user.php" class="<?php echo $active === 'user' ? 'active' : ''; ?>">👤 List User</a>
        <a href="login.php" class="<?php echo $active === 'login' ? 'active' : ''; ?>">🔐 Form Login</a>
    </nav>
</div>
