<?php
session_start();
include '../conn.php';

$id = $_GET['id'];

$cek = mysqli_query($conn, "SELECT * FROM tb_pemesanan WHERE id = '$id'");
$r = mysqli_fetch_array($cek);
$nama_kost = $r['nama_kost'];
if ($r['status_pemesanan']== 'P') {
    $updateStatus = mysqli_query($conn, "UPDATE `tb_pemesanan` SET `status_pemesanan` = 'R', `status_pembayaran` = 'R' WHERE `tb_pemesanan`.`id` = $id");
    if ($updateStatus) {
        $_SESSION['status-info'] = "Pemesanan Berhasil Dibatalkan";    
    }else{
        $_SESSION['status-fail'] = "Pemesanan Gagal Dibatalkan";    
    }

}



header("Location:../../dataPemesanan.php");
?>