<?php
session_start();
include './controller/conn.php';
// Cek apakah sesi login telah diatur
if (!isset($_SESSION['nama'])) {
    header("Location: ./auth/login.php");
    exit();
}
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
                <?php include './include/welcomeBack.php'?>
				<div class="row">
                <div class="col-12">
                <?php
                        if (isset($_SESSION['status-info'])) {
                            echo '
                            <div class="alert alert-success alert-dismissible fade show">
                            <svg viewbox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="mr-2">
                                <polyline points="9 11 12 14 22 4"></polyline>
                                <path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path>
                            </svg>
                            <strong>Success!</strong> '.$_SESSION['status-info'].'.
                            <button type="button" class="close h-100" data-dismiss="alert" aria-label="Close"><span><i class="mdi mdi-close"></i></span>
                            </button>
                        </div>';
                            unset($_SESSION['status-info']);
                        }
                        if (isset($_SESSION['status-fail'])) {
                            echo '<div class="alert alert-danger alert-dismissible fade show">
                            <svg viewbox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="mr-2"><polygon points="7.86 2 16.14 2 22 7.86 22 16.14 16.14 22 7.86 22 2 16.14 2 7.86 7.86 2"></polygon><line x1="15" y1="9" x2="9" y2="15"></line><line x1="9" y1="9" x2="15" y2="15"></line></svg>
                            <strong>Error!</strong> '.$_SESSION['status-fail'].'.
                            <button type="button" class="close h-100" data-dismiss="alert" aria-label="Close"><span><i class="mdi mdi-close"></i></span>
                            </button>
                        </div>';
                            unset($_SESSION['status-fail']);
                        }
                        ?>
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Data Penyewa</h4>
                                <!-- <a href="./addKost.php" class="btn btn-sm btn-info">+ Add Kamar Kost</a> -->
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="example3" class="display" style="min-width: 845px">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Nama Pemesan</th>
                                                <th>NO HP</th>
                                                <th>Nama Kamar</th>
                                                <th>Tanggal Pemesanan</th>
                                                <th>Tunggakan</th>
                                                <th>Sewa Dari</th>
                                                <th>Sewa Hingga</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            // get data
                                            $getPemesanan = mysqli_query($conn, "SELECT * FROM tb_pemesanan WHERE DATE_FORMAT(created_at, '%Y-%m') = DATE_FORMAT(CURDATE(), '%Y-%m') AND status_pemesanan ='A' ORDER BY tb_pemesanan.id ASC 
                                            ");
                                            $i = 1;
                                            while ($dataPemesanan = mysqli_fetch_array($getPemesanan)) {
                                            ?>
                                            <tr>
                                                <td><?php echo $i?></td>
                                                <td>
                                                <?php echo $dataPemesanan['nama_pemesan']?>
                                                </td>
                                                <td><a href="https://api.whatsapp.com/send?phone=<?php echo $dataPemesanan['no_hp_pemesan'] ?>&text=Halo! <?php echo $dataPemesanan['nama_pemesan'] ?> Saya ingin berbicara dengan Anda." target="_blank"><?php echo $dataPemesanan['no_hp_pemesan']?></a></td>
                                                <td><?php echo $dataPemesanan['nama_kost']?></td>
                                                <td class=""><?php $created_at_old = strtotime($dataPemesanan['created_at']); echo date('d F Y', $created_at_old) ?></td>
                                                <!-- <td><span class="<?php if ($dataPemesanan['sisa_bayar'] !='0') {
                                                    echo 'text-danger';
                                                } else {
                                                    echo '';
                                                }
                                                 ?>">Rp.<?php echo number_format($dataPemesanan['sisa_bayar'], 0, ',', '.') ?></span></td> -->
                                                 <td><?php if ($dataPemesanan['sisa_bayar'] != 0) {
                                                    ?>
                                                    <a href="./addPelunasan.php?id_pemesanan=<?php echo $dataPemesanan['id']?>" class="text-danger">Rp.<?php echo number_format($dataPemesanan['sisa_bayar'], 0, ',', '.') ?></a>
                                                    <?php }else {
                                                        ?>
                                                        <span>Rp.<?php echo number_format($dataPemesanan['sisa_bayar'], 0, ',', '.') ?></span>
                                                    <?php }?></td>
                                                <td><?php $created_at_old = strtotime($dataPemesanan['tgk_dari']); echo date('d F Y', $created_at_old) ?></td>
                                                <td><?php $created_at_old = strtotime($dataPemesanan['tgl_hingga']); echo date('d F Y', $created_at_old) ?></td>
                                                <td>
													<div class="d-flex">
														<a href="./detailPenyewa.php?id_pemesanan=<?php echo $dataPemesanan['id']?>&nama_kost=<?php echo $dataPemesanan['nama_kost']?>" class="btn btn-warning shadow btn-xs sharp mr-1"><i class="fa fa-eye" data-toggle="tooltip" title="Detail"></i></a>
                                                        
														<a href="#" class="btn btn-success shadow btn-xs sharp"><i class="fa fa-cog"></i></a>
													</div>												
												</td>												
                                            </tr>
                                            <?php $i++?>
                                            <?php }?>
                                        </tbody>
                                    </table>
                                </div>
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