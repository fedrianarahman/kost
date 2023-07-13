<?php
include '../conn.php';

$idPemesanan = $_POST['id_pemesanan'];
$photo = upload();
$akunTujuan = $_POST['akun_tujuan'];
$asalBank = $_POST['asal_bank'];
$jumlah = $_POST['jumlah_tf'];
$namaPengirim = $_POST['nama_pengirim'];
$created_at = date('Y-m-d H:i:s');
$hargaKamar = $_POST['jumlah_bayar'];
$sisaBayar = $hargaKamar - $jumlah;

// mengupdate data
$query = mysqli_query($conn, "UPDATE `tb_pemesanan` SET `via_bank` = '$akunTujuan', `nama_pengirim` = '$namaPengirim', `bukti_tf` = '$photo', `jumlah` = '$jumlah', `asal_bank` = '$asalBank', `sisa_bayar` = '$sisaBayar', `status_pemesanan` = 'P', `created_at` = '2023-07-13' WHERE `tb_pemesanan`.`id` = '$idPemesanan'");

function upload (){
    $namaFile = $_FILES['photo']['name'];
    $ukuranFile = $_FILES['photo']['size'];
    $error =  $_FILES['photo']['error'];
    $tmpName = $_FILES['photo']['tmp_name'];

    if ($error === 4) {
        $_SESSION['status-fail'] = "Pilih Gambar Dulu";
        return false;
    }

    //cek apakah yang diupload Adalah Gambar

    $ekstensiGambarValid = ['jpg', 'jpeg', 'png','svg','JPG','JPEG','PNG'];
    $ekstensiGambar = explode('.', $namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));

    if (!in_array( $ekstensiGambar,$ekstensiGambarValid)) {
        $_SESSION['status-fail'] = "Yang Anda Upload Bukan Gambar";
        return false;
    }

    // cek ukuran gambar jika terlalu besar

    if ($ukuranFile > 1000000) {
        $_SESSION['status-fail'] = "Ukuran GAmbar Terlalu Besar";
        return false;
    }

    // lolos pengecekan
    move_uploaded_file($tmpName, "../../admin/images/image-content/" . $namaFile);

	return $namaFile;

}
header("Location:../../seuccessPaymentPage.php");
?>