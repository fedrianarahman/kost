<?php
session_start();
include '../conn.php';
$namaKamar = $_GET['nama_kamar'];

$updateData = mysqli_query($conn, "UPDATE kost SET status='Y' WHERE nama = '$namaKamar'");

if ($updateData) {
    $_SESSION['status-info'] = "Status Kamar Berhasil Dirubah";
} else {
    $_SESSION['status-fail'] = "Status Kamar Tidak Berhasil Dirubah";
}


header("Location:../../dataKost.php");