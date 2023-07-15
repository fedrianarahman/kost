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
$tglSekarang = date('Y-m-d');

$cek = mysqli_query($conn, "SELECT * FROM tb_pemesanan WHERE tgk_dari = '$sewaDari' AND tgl_hingga = '$sewaHingga' AND nama_kost = '$namaKamar'");
$result = mysqli_fetch_array($cek);

if ($result != null) {
    $_SESSION['status-fail'] = "Kamar Sudah Terpesan";
    header("Location:../../bookingPage.php?nama_kost=$namaKamar&harga_kost=$hargaKamar");
} elseif (isset($sewaDari) && $sewaDari <= $tglSekarang && isset($sewaHingga) && $sewaHingga <= $tglSekarang ) {
    $_SESSION['status-fail'] = "Tanggal Sudah Lewat";
    header("Location:../../bookingPage.php?nama_kost=$namaKamar&harga_kost=$hargaKamar");
}elseif (isset($sewaDari) && $sewaDari >= $sewaHingga && isset($sewaHingga) && $sewaHingga <= $sewaDari ) {
    $_SESSION['status-fail'] = "Pilih Tanggal Yang Benar";
    header("Location:../../bookingPage.php?nama_kost=$namaKamar&harga_kost=$hargaKamar");
}
 else {
    // Menambahkan data ke tb_pemesanan
    $query = mysqli_query($conn, "INSERT INTO `tb_pemesanan`(`id`, `userId`, `nama_pemesan`, `email_pemesan`, `no_hp_pemesan`, `tgk_dari`, `tgl_hingga`, `nama_kost`, `harga_kost`, `via_bank`, `nama_pengirim`, `bukti_tf`, `jumlah`, `asal_bank`, `sisa_bayar`, `status_pemesanan`, `created_at`, `updated_at`) VALUES ('','$userId','$namaPenyewa','$emailPenyewa','$noHpPenyewa','$sewaDari','$sewaHingga','$namaKamar','$hargaKamar','','','','','','','','$created_at','')");

    $idPemesanan = mysqli_insert_id($conn);
    if ($query) {
        $_SESSION['status-info'] = "Silahkan Lakukan Pembayaran";
        $_SESSION['id_pemesanan'] = $idPemesanan;
        $_SESSION['harga'] = $hargaKamar;
        header("Location:../../paymentPage.php");
    }
}

?>