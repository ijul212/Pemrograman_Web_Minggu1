<?php
session_start();

// Kalau belum login, tendang ke halaman login
if (!isset($_SESSION['admin_id'])) {
    header("location: ../login.php");
    exit();
}
?>
