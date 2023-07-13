<?php
session_start();
include '../conn.php';

$id = $_GET['id'];
$nama_kost = $_GET['nama_kost'];

// mengahpus data dari parameter id yang dilempar
$deleteData = mysqli_query($conn, "DELETE FROM `kost` WHERE nama = '$nama_kost'");

if ($deleteData) {
    $_SESSION['status-info'] = "Data Kost Berhasil Dihapus";
} else {
    $_SESSION['status-fail'] = "Data Kost Tidak Berhasil Dihapus";
}

header("Location:../../dataKost.php");

?>