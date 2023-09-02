<?php
session_start();
include './controller/conn.php';
// Cek apakah sesi login telah diatur
if (!isset($_SESSION['nama'])) {
    header("Location: ./auth/login.php");
    exit();
}
$idPesanan = $_GET['id_pemesanan'];
$nama_kamar = $_GET['nama_kost'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta charset="utf-8">
    <meta name="keywords" content="">
	<meta name="author" content="">
	<meta name="robots" content="">
    <meta name="viewport" content="width=device-width,initial-scale=1">
	<meta name="description" content="Zenix - Crypto Admin Dashboard">
	<meta property="og:title" content="Zenix - Crypto Admin Dashboard">
	<meta property="og:description" content="Zenix - Crypto Admin Dashboard">
	<meta property="og:image" content="https://zenix.dexignzone.com/xhtml/social-image.png">
	<meta name="format-detection" content="telephone=no">
    <title>Zenix - Crypto Admin Dashboard </title>
    <!-- Favicon icon -->
    <link href="vendor/datatables/css/jquery.dataTables.min.css" rel="stylesheet">
    <!-- Custom Stylesheet -->
	<link href="vendor/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
	<style>
        .img-bukti-tf {
    height: 200px;
    max-width: 200px;
    background: #000;
    position: relative;
    overflow: hidden;
}

.img-bukti-tf img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}
.modal-body img{
    width: 100%;
    margin-right: 500px;
}
    </style>
</head>
<body>

    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="sk-three-bounce">
            <div class="sk-child sk-bounce1"></div>
            <div class="sk-child sk-bounce2"></div>
            <div class="sk-child sk-bounce3"></div>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->

    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">

        <!--**********************************
            Nav header start
        ***********************************-->
        <?php include './include/navHeader.php'?>
        <!--**********************************
            Nav header end
        ***********************************-->
		
		<!--**********************************
            Header start
        ***********************************-->
       <?php include './include/navbar.php'?>
        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->

        <!--**********************************
            Sidebar start
        ***********************************-->
        <?php
        include './include/sidebar.php';
        ?>
        <!--**********************************
            Sidebar end
        ***********************************-->
		
		<!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
			<div class="container-fluid">
               <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                           <?php
                           $getdataPemesanan = mysqli_query($conn, "SELECT tb_pemesanan.id AS id_pemesanan,tb_pemesanan.nama_pemesan AS nama_pemesan,tb_pemesanan.email_pemesan AS email_pemesan,tb_pemesanan.total_bulan_sewa AS total_bulan_sewa,tb_pemesanan.harga_kost AS harga_kost,tb_pemesanan.no_hp_pemesan AS no_hp_pemesan,tb_pemesanan.tgk_dari AS tgk_dari,tb_pemesanan.tgl_hingga AS tgl_hingga,tb_pemesanan.nama_kost AS nama_kost,tb_pemesanan.jumlah AS jumlah,tb_pemesanan.sisa_bayar AS sisa_bayar,tb_pemesanan.status_pembayaran AS status_pembayaran,tb_pemesanan.bukti_tf AS bukti_tf,tb_pemesanan.asal_bank AS asal_bank,tb_pemesanan.nama_pengirim AS nama_pengirim,tb_pemesanan.created_at AS created_at,tb_pemesanan.status_pemesanan AS status_pemesanan,bank.nama_bank AS nama_bank,bank.nama_pemilik AS nama_pemilik, user.photo_ktp AS photo_ktp, user.alamat AS alamat FROM tb_pemesanan INNER JOIN bank ON bank.id = tb_pemesanan.via_bank INNER JOIN user ON user.id = tb_pemesanan.userId WHERE tb_pemesanan.id = '$idPesanan' ");
                           while ($dataPemesanan = mysqli_fetch_array($getdataPemesanan)) {
                           ?>
                            <div class="row">
                                <div class="col-md-4">
                                    <p>Nama: <?php echo $dataPemesanan['nama_pemesan']?></p>
                                </div>
                                <div class="col-md-4">
                                    <p>Email : <?php echo $dataPemesanan['email_pemesan']?></p>
                                </div>
                                <div class="col-md-4">
                                    <p>NO HP : <?php echo $dataPemesanan['no_hp_pemesan']?></p>
                                </div>
                                <div class="col-md-4">
                                    <p>Asal : <?php echo $dataPemesanan['alamat']?></p>
                                </div>
                                <div class="col-md-4">
                                    <p class="mb-2 font-weight-bold">Identitas Diri :</p>
                                    <a href="" data-toggle="modal" data-target="#exampleModalCenter1">
                                    <div class="img-bukti-tf mb-2">
                                    <img src="../assets/img/imageKtp/<?php echo $dataPemesanan['photo_ktp']  ?>" alt="">
                                    </div>
                                    </a>
                                         <!-- Modal -->
                                    <div class="modal fade" id="exampleModalCenter1">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Identitas Diri</h5>
                                                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                <img src="../assets/img/imageKtp/<?php echo $dataPemesanan['photo_ktp']  ?>" alt="">
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-danger light" data-dismiss="modal">Close</button>
                                                   
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end modal -->
                                </div>
                                <div class="col-md-4">
                                    <p>Tanggal Pemesanan : <?php $created_at_old = strtotime($dataPemesanan['created_at']); echo date('d F Y', $created_at_old) ?></p>
                                </div>
                                <div class="col-md-4">
                                    <p>Nama Kamar : <?php echo $dataPemesanan['nama_kost']?></p>
                                </div>
                                <div class="col-md-4">
                                    <p class="font-weight-bold">Batas Sewa : <?php $created_at_old = strtotime($dataPemesanan['tgl_hingga']); echo date('d F Y', $created_at_old)?></p>
                                </div>
                            </div>
                            <a href="./dataPenyewa.php" class="btn btn-warning btn-sm text-white">Kembali</a>
                           <?php }?>
                        </div>
                    </div>
                </div>
               </div>
			</div>
		</div>
        <!--**********************************
            Content body end
        ***********************************-->

        <!--**********************************
            Footer start
        ***********************************-->
        <?php include './include/footer.php' ?>
        <!--**********************************
            Footer end
        ***********************************-->
		
		
		
		
		
		<!--**********************************
           Support ticket button start
        ***********************************-->

        <!--**********************************
           Support ticket button end
        ***********************************-->


    </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->

    <!--**********************************
        Scripts
    ***********************************-->
    <script data-cfasync="false" src="../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script src="vendor/global/global.min.js"></script>
	<script src="vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
    <!-- Datatable -->
    <script src="vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="js/plugins-init/datatables.init.js"></script>
    <script src="js/custom.min.js"></script>
	<script src="js/deznav-init.js"></script>
    <script src="js/demo.js"></script>
    <script src="js/styleSwitcher.js"></script>

</body>
</html>