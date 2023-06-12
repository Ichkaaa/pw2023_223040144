<?php 
// koneksi ke database
$conn = mysqli_connect("localhost:3306", "root", "", "tubes");

function query($query)
{
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}
function registrasi($data)
{
    global $conn;

    $email = strtolower(stripslashes($data["email"])); // Ambil nilai email dari $data
    $username = strtolower(stripslashes($data["username"])); // Ambil nilai username dari $data
    $password = mysqli_real_escape_string($conn, $data["password"]);
    $password2 = mysqli_real_escape_string($conn, $data["password2"]);

    // Cek email sudah terdaftar atau belum
    $result = mysqli_query($conn, "SELECT email FROM users WHERE email = '$email'");
    if (mysqli_fetch_assoc($result)) {
        echo "<script>
        alert('Email sudah terdaftar!');
        </script>";
        return false;
    }

    // Cek username sudah terdaftar atau belum
    $result = mysqli_query($conn, "SELECT username FROM users WHERE username = '$username'");
    if (mysqli_fetch_assoc($result)) {
        echo "<script>
        alert('Username sudah terdaftar!');
        </script>";
        return false;
    }

    // Cek konfirmasi password
    if ($password !== $password2) {
        echo "<script>
            alert('Konfirmasi password tidak sesuai!');
        </script>";
        return false;
    }

    // Enkripsi password
    $password = password_hash($password, PASSWORD_DEFAULT);

    // Nilai default untuk role
    $role = 'user';

    // Insert user baru ke database
    $query = "INSERT INTO users (email, username, password, role) VALUES ('$email', '$username', '$password', '$role')";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}


// Fungsi tambah merchandise

function tambahMerchandise($data)
{
    global $conn;

    $nama = htmlspecialchars($data["nama"]);
    $harga = htmlspecialchars($data["harga"]);
    $deskripsi = htmlspecialchars($data["deskripsi"]);
    $stok = htmlspecialchars($data['stok']);

    // Upload gambar merchandise
    $gambar = upload('gambar');
    if (!$gambar) {
        return false;
    }

    // Query insert data
    $query = "INSERT INTO merchandise (nama, harga, deskripsi, stok, gambar) VALUES ('$nama', '$harga', '$deskripsi', '$stok', '$gambar')";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function tambahTiket($data) {
    global $conn;

    $jenis = htmlspecialchars($data["jenis"]);
    $harga = htmlspecialchars($data["harga"]);
    $jumlah_tiket = htmlspecialchars($data["jumlah_tiket"]);
    $keterangan = htmlspecialchars($data["keterangan"]);
    $guest_star_id = htmlspecialchars($data["guest_star_id"]);

    $gambar = upload('gambar');
    if (!$gambar) {
        return false;
    }

    $query = "INSERT INTO tiket (jenis, harga, jumlah_tiket, keterangan, guest_star_id, gambar) VALUES ('$jenis', '$harga', '$jumlah_tiket', '$keterangan', '$guest_star_id', '$gambar')";
    $result = mysqli_query($conn, $query);

    if ($result) {
        echo "<script> 
            alert('Data berhasil ditambahkan!');
            document.location.href = 'admin.php';
           </script>";
    } else {
        echo "<script>
            alert('Data gagal ditambahkan!');
            document.location.href = 'admin.php';
            </script>";
    }
}


function tambahGuestStar($data) {
    // Lakukan koneksi ke database
    global $conn;

    // Ambil data dari tiap elemen dalam form
    $nama = isset($data["nama"]) ? htmlspecialchars($data["nama"]) : '';
    $deskripsi = isset($data["deskripsi"]) ? htmlspecialchars($data["deskripsi"]) : '';

    // Upload gambar
    $gambar = upload();
    if (!$gambar) {
        return false;
    }

    // Buat query INSERT untuk menambah data ke tabel guest_stars
    $query = "INSERT INTO guest_stars (name, description, gambar) VALUES ('$nama', '$deskripsi', '$gambar')";

    // Eksekusi query
    $result = mysqli_query($conn, $query);

    // Cek apakah query berhasil dieksekusi
    if ($result) {
        // Jika berhasil, kembalikan nilai true
        return true;
    } else {
        // Jika gagal, kembalikan nilai false
        return false;
    }
}



function upload()
{
    // Cek apakah input file 'gambar' ada
    if (!isset($_FILES['gambar'])) {
        var_dump($_FILES['gambar']);
        return "Gambar tidak ditemukan";
    }

    $namafile = $_FILES['gambar']['name'];
    $ukuranfile = $_FILES['gambar']['size'];
    $error = $_FILES['gambar']['error'];
    $tmpName = $_FILES['gambar']['tmp_name'];

    // Cek apakah tidak ada gambar yang diupload
    if ($error === 4) {
        return "Pilih gambar terlebih dahulu";
    }

    // Cek apakah yang diupload adalah gambar
    $ekstensigambarValid = ['jpg', 'jpeg', 'png'];
    $ekstensigambar = explode('.', $namafile);
    $ekstensigambar = strtolower(end($ekstensigambar));
    if (!in_array($ekstensigambar, $ekstensigambarValid)) {
        return "Yang Anda upload bukan gambar";
    }

    // Cek jika ukurannya terlalu besar
    if ($ukuranfile > 5097152) {
        return "Ukuran gambar terlalu besar";
    }

    // Lolos pengecekan, gambar siap diupload
    // Generate nama gambar baru
    $namafilebaru = uniqid();
    $namafilebaru .= '.';
    $namafilebaru .= $ekstensigambar;

    move_uploaded_file($tmpName, '../assets/img/' . $namafilebaru);

    return $namafilebaru;
}

function hapus($id, $guest_star_id)
{
    global $conn;

    if ($id !== null) {
        mysqli_query($conn, "DELETE FROM merchandise WHERE id = $id");
        mysqli_query($conn, "DELETE FROM tiket WHERE id = $id");
    }

    if ($guest_star_id !== null) {
        mysqli_query($conn, "DELETE FROM guest_stars WHERE guest_star_id = $guest_star_id");
    }

    return mysqli_affected_rows($conn);
}

function getUserList() {
    global $conn;
    
    $query = "SELECT * FROM users";
    $result = mysqli_query($conn, $query);
    
    $users = array();
    
    while ($row = mysqli_fetch_assoc($result)) {
        $users[] = $row;
    }
    
    return $users;
}

// functions.php

function deleteUser($id) {
    global $conn;
    // Query untuk menghapus user berdasarkan ID
    $query = "DELETE FROM users WHERE id = $id";
    
    // Eksekusi query
    mysqli_query($conn, $query);
}


function ubahMerchandise($data) {
    global $conn;

    $id = $data["id"];
    $nama = htmlspecialchars($data["nama"]);
    $harga = htmlspecialchars($data["harga"]);
    $deskripsi = htmlspecialchars($data["deskripsi"]);
    $stok = htmlspecialchars($data['stok']);

   // Cek apakah user pilih gambar baru atau tidak
if ($_FILES['gambar']['error'] === 4) {
    // Jika tidak ada gambar baru dipilih, gunakan gambar lama
    $query = "UPDATE merchandise SET nama='$nama', harga='$harga', deskripsi='$deskripsi', stok='$stok' WHERE id='$id'";
} else {
    // Jika ada gambar baru dipilih, proses gambar baru dan gunakan nama gambar yang dihasilkan
    $gambar = upload('gambar');
    if (!$gambar) {
        // Jika upload gambar gagal, kembalikan nilai false
        return false;
    }

    $query = "UPDATE merchandise SET nama='$nama', harga='$harga', deskripsi='$deskripsi', stok='$stok', gambar='$gambar' WHERE id='$id'";
}


    // Eksekusi query
    $result = mysqli_query($conn, $query);

    if ($result) {
        // Jika berhasil diubah, kembalikan nilai true
        return true;
    } else {
        // Jika gagal, kembalikan nilai false
        return false;
    }
}







function ubahTiket($data) {
    global $conn;

    $id = $data["id"];
    $gambarlama = isset($data["gambarlama"]) ? htmlspecialchars($data["gambarlama"]) : "";
    $jenis = htmlspecialchars($data["jenis"]);
    $harga = htmlspecialchars($data["harga"]);
    $jumlah_tiket = htmlspecialchars($data['jumlah_tiket']);
    $guest_star_id = htmlspecialchars($data["guest_star_id"]);

    // cek apakah user pilih gambar baru atau tidak
    if ($_FILES['gambar']['error'] === 4) {
        $gambar = $gambarlama;
    } else {
        $gambar = upload();
    }

    // Query untuk mengubah data tiket
    $query = "UPDATE tiket SET gambar = CASE
    WHEN '$gambar' = '$gambarlama' THEN gambar
    ELSE '$gambar' END,
    jenis='$jenis',
    harga='$harga',
    jumlah_tiket='$jumlah_tiket',
    guest_star_id='$guest_star_id'
    WHERE id='$id'";

    // Eksekusi query
    $result = mysqli_query($conn, $query);

    if ($result) {
        // Jika berhasil diubah, kembalikan nilai true
        return true;
    } else {
        // Jika gagal, kembalikan nilai false
        return false;
    }
}

function ubahGuestStar($data) {
    global $conn;

    $guest_star_id = $data["guest_star_id"];
    $nama = htmlspecialchars($data["name"]);
    $deskripsi = htmlspecialchars($data["description"]);
    $gambarlama = htmlspecialchars($data["gambarlama"]);

    // cek apakah user pilih gambar baru atau tidak
    if ($_FILES['gambar']['error'] === 4) {
        $gambar = $gambarlama;
    } else {
        $gambar = upload();
    }

    

    // Query untuk mengubah data guest star
    $query = "UPDATE guest_stars SET name='$nama', description='$deskripsi',   gambar = CASE
    WHEN '$gambar' = '$gambarlama' THEN gambar
    ELSE '$gambar'
 END    WHERE guest_star_id='$guest_star_id'";

    // Eksekusi query
    $result = mysqli_query($conn, $query);

    if ($result) {
        // Jika berhasil diubah, kembalikan nilai true
        return true;
    } else {
        // Jika gagal, kembalikan nilai false
        return false;
    }
}

function cariMerchandise($keyword)
{
    global $conn;
    $query = "SELECT * FROM merchandise WHERE nama LIKE '%$keyword%' OR harga LIKE '%$keyword%' OR deskripsi LIKE '%$keyword%' OR stok LIKE '%$keyword%'";
    $result = mysqli_query($conn, $query);

    $merchandise = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $merchandise[] = $row;
    }

    return $merchandise;
}


function cariGuestStars($keyword)
{
    global $conn;
    $query = "SELECT * FROM guest_stars WHERE name LIKE '%$keyword%' OR description LIKE '%$keyword%'";
    $result = mysqli_query($conn, $query);
    return mysqli_fetch_all($result, MYSQLI_ASSOC);

    $guestStars = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $guestStars[] = $row;
    }

    return $guestStars;
}


// Fungsi untuk menyimpan data pelanggan ke tabel "pelanggan"
function saveCustomerData($email) {
    global $conn;
    // Mendapatkan nilai email dari sesi login (jika ada)
    $username = isset($_SESSION['email']) ? getUsernameByEmail($_SESSION['email']) : null;

    // Menyiapkan pernyataan SQL untuk menyisipkan data ke tabel pelanggan
    $sql = "INSERT INTO pelanggan (username, email) VALUES (?, ?)";
    $stmt = $conn->prepare($sql);
    
    // Mengikat nilai parameter ke pernyataan SQL
    $stmt->bind_param("ss", $username, $email);
    
    // Menjalankan pernyataan SQL
    $stmt->execute();

    // Menutup pernyataan SQL
    $stmt->close();
}

function getUsernameByEmail($email) {
    global $conn;

    // Mencari username berdasarkan email
    $query = "SELECT username FROM users WHERE email = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        return $row['username'];
    }

    return null;
}
