<?php
session_start();
include '../conn.php';

$userId = $_POST['user_id'];
$namaKamar = $_POST['nama_kost'];
$hargaKamar = $_POST['harga_kost'];
$namaPenyewa = $_POST['nama_penyewa'];
$emailPenyewa = $_POST['email_penyewa'];
$noHpPenyewa = $_POST['no_hp_penyewa'];
$sewaDari = $_POST['sewa_dari'];
$sewaHingga = $_POST['sewa_hingga'];
$created_at = "";
$statusPemesanan = "Y";

// menambahkan data ke tb_pesanan
$query = mysqli_query($conn, "INSERT INTO `tb_pemesanan`(`id`, `userId`, `nama_pemesan`, `email_pemesan`, `no_hp_pemesan`, `tgk_dari`, `tgl_hingga`, `nama_kost`, `harga_kost`, `via_bank`, `nama_pengirim`, `bukti_tf`, `jumlah`, `asal_bank`, `sisa_bayar`, `status_pemesanan`, `created_at`, `updated_at`) VALUES ('','$userId','$namaPenyewa','$emailPenyewa','$noHpPenyewa','$sewaDari','$sewaHingga','$namaKamar','$hargaKamar','','','','','','','','$created_at','')");

    $idPemesanan = mysqli_insert_id($conn);
if ($query) {
    $_SESSION['status-info'] = "Silahkan Lakukan Pembayaran ";
    $_SESSION['id_pemesanan'] = $idPemesanan;
    $_SESSION['harga'] = $hargaKamar;
} else {
    $_SESSION['status-fail'] = "Pemesanan Gagal";
}
header("Location:../../paymentPage.php");

?>