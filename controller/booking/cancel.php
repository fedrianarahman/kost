
<?php
// Gantilah ini dengan informasi koneksi database Anda
$host = 'localhost'; // Host database
$username = 'root'; // Nama pengguna database
$password = ''; // Kata sandi database
$database = 'kostan'; // Nama database

// Membuat koneksi
$mysqli = new mysqli($host, $username, $password, $database);

// Memeriksa koneksi
if ($mysqli->connect_error) {
    die('Koneksi ke database gagal: ' . $mysqli->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Ambil ID yang dikirim dari JavaScript
    $id = $_POST['id'];

    // Lakukan operasi penghapusan berdasarkan ID
    $query = "UPDATE  tb_pemesanan SET status_pemesanan = 'B', status_pembayaran='B' WHERE id = '$id'";
    $stmt = $mysqli->prepare($query);
    if ($stmt->execute()) {
        echo 'sukses';
    } else {
        echo 'gagal';
    }
}
?>






