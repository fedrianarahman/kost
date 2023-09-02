<?php
session_start();
include '../conn.php';

$idPemesanan = $_POST['id_pemesanan'];
$cekData = mysqli_query($conn, "SELECT * FROM tb_pemesanan WHERE id='$idPemesanan'");
$r = mysqli_fetch_array($cekData);

if ($r) {
    $jumlah = $_POST['jumlah_tf'];
    if ($jumlah != $r['sisa_bayar']) {
        $_SESSION['status-fail']="Nominal Tidak Sesuai";
        header("Location:../../addPelunasan.php?id_pemesanan=$idPemesanan");
    }else{
        $bayarSebelumnya = $r['jumlah'];
        $total = $bayarSebelumnya += $jumlah;
        var_dump($total);

        $updatePelunasan = mysqli_query($conn, "UPDATE tb_pemesanan SET jumlah='$total', sisa_bayar=0,  status_pembayaran='L' WHERE id ='$idPemesanan'");

        if ($updatePelunasan) {
            $_SESSION['status-info'] = "Pelunasan Berhasil";
            header("Location:../../dataPenyewa.php");
        } else {
            $_SESSION['status-fail'] = "Pelunasan Gagal";
            header("Location:../../dataPenyewa.php");
        }
        

    }


}
?>