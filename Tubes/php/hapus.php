<?php
session_start();

if (!isset($_SESSION["submit"])) {
    header("Location: login.php");
}
require 'functions.php';

$id = isset($_GET['id']) ? htmlspecialchars($_GET['id']) : null;
$guest_star_id = isset($_GET['guest_star_id']) ? htmlspecialchars($_GET['guest_star_id']) : null;

$currentPage = '';

// Tentukan halaman saat ini berdasarkan nama file
if (strpos($_SERVER['PHP_SELF'], 'admin.php') !== false) {
    $currentPage = 'admin.php';
} elseif (strpos($_SERVER['PHP_SELF'], 'admin2.php') !== false) {
    $currentPage = 'admin2.php';
} elseif (strpos($_SERVER['PHP_SELF'], 'admin3.php') !== false) {
    $currentPage = 'admin3.php';
}

if (hapus($id, $guest_star_id) > 0) {
    echo "<script>
        alert('Data Berhasil dihapus!');
        </script>";
    header("Location: $currentPage");
    exit;
} else {
    echo "<script>
        alert('Data Gagal dihapus!');
        </script>";
    header("Location: $currentPage");
    exit;
}
?>
