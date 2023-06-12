<?php
session_start();
require 'functions.php';

if (isset($_SESSION['role']) && $_SESSION['role'] === 'admin') {
    // Izinkan akses ke halaman admin
} else {
    // Redirect atau tampilkan pesan kesalahan jika bukan admin
    echo "<script>
    alert('Anda bukan admin!');
    window.location = '../index.php';
    </script>;";
    exit();
}

// Cek apakah user memiliki akses admin (sesuai dengan implementasi Anda)

if (isset($_GET['delete_id'])) {
    $delete_id = $_GET['delete_id'];
    deleteUser($delete_id); // Panggil fungsi deleteUser() untuk menghapus user berdasarkan ID
    header("Location: admincek.php?deleted=true"); // Redirect kembali ke halaman admincek.php setelah menghapus user
    exit();
}

$users = getUserList(); // Panggil fungsi getUserList() untuk mendapatkan daftar user
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Halaman Admin</title>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght@100" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>

<body>
<?php include('../modular/navbarAdmin.php') ?>

    <h1>Daftar User</h1>
    <div class="table-responsive">
        <table class="table table-bordered admin-container mt-3">
            <tr>
                <th>ID</th>
                <th>Email</th>
                <th>Username</th>
                <th>Role</th>
                <th>Aksi</th> <!-- Kolom tambahan untuk tombol "Hapus" -->
            </tr>
            <?php foreach ($users as $user) : ?>
            <tr>
                <td><?php echo $user['id']; ?></td>
                <td><?php echo $user['email']; ?></td>
                <td><?php echo $user['username']; ?></td>
                <td><?php echo $user['role']; ?></td>
                <td>
            <a href="admincek.php?delete_id=<?php echo $user['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</a>
        </td>
            </tr>
            <?php endforeach; ?>
        </table>
    </div>

    <script>
    // Cek apakah terdapat parameter 'deleted' di URL
    const urlParams = new URLSearchParams(window.location.search);
    const deleted = urlParams.get('deleted');

    // Jika 'deleted' bernilai 'true', tampilkan pesan alert
    if (deleted === 'true') {
        alert('Data berhasil dihapus!');
    }
</script>
</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</html>
