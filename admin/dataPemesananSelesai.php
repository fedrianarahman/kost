<?php
session_start();
include './controller/conn.php';
// Cek apakah sesi login telah diatur
if (!isset($_SESSION['nama'])) {
    header("Location: ./auth/login.php");
    exit();
}
$totalTransaksi = 0;
 global $tglSaatIni;
$tglDariForPrint = "";
$tglHinggaForPrint = "";
$statusPembayaranForPrint = "";
 if (isset($_POST['filter'])) {
    $tglDari = $_POST['tgl_dari'];
    $tglHingga = $_POST['tgl_hingga'];

    if ($tglDari != null || $tglHingga != null) {

        $tglDariForPrint= $tglDari;
        $tglHinggaForPrint = $tglHingga;
        $statusPembayaranForPrint = $_POST['status_pembayaran'];

        $tglDari1 = strtotime($tglDari);
        $tglHingga1 = strtotime( $tglHingga);
        $tglDari2 = date('d F Y', $tglDari1);
        $tglHingga2 = date('d F Y', $tglHingga1);
        $tglSaatIni = "$tglDari2 Sampai $tglHingga2"; 
    } else {
        $tglSaatIni = date('F Y');
    }
    
 }else{
    $tglSaatIni = date('F Y');
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
        <?php include './include/navHeader.php' ?>
        <!--**********************************
            Nav header end
        ***********************************-->

        <!--**********************************
            Header start
        ***********************************-->
        <?php include './include/navbar.php' ?>
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
                <?php include './include/welcomeBack.php' ?>
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
                            <strong>Success!</strong> ' . $_SESSION['status-info'] . '.
                            <button type="button" class="close h-100" data-dismiss="alert" aria-label="Close"><span><i class="mdi mdi-close"></i></span>
                            </button>
                        </div>';
                            unset($_SESSION['status-info']);
                        }
                        if (isset($_SESSION['status-fail'])) {
                            echo '<div class="alert alert-danger alert-dismissible fade show">
                            <svg viewbox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="mr-2"><polygon points="7.86 2 16.14 2 22 7.86 22 16.14 16.14 22 7.86 22 2 16.14 2 7.86 7.86 2"></polygon><line x1="15" y1="9" x2="9" y2="15"></line><line x1="9" y1="9" x2="15" y2="15"></line></svg>
                            <strong>Error!</strong> ' . $_SESSION['status-fail'] . '.
                            <button type="button" class="close h-100" data-dismiss="alert" aria-label="Close"><span><i class="mdi mdi-close"></i></span>
                            </button>
                        </div>';
                            unset($_SESSION['status-fail']);
                        }
                        ?>
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title"> Rekap Data Pemesanan Periode <span class="text-danger"><?php echo $tglSaatIni ?></span></h4>
                                <!-- <a href="./addKost.php" class="btn btn-sm btn-info">+ Add Kamar Kost</a> -->
                            </div>
                            <div class="card-body">
                                <div class="row mb-4">
                                    <div class="col-md-12">
                                        <form action="" method="POST">
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <div class="form-group mb-3">
                                                        <label for="">Rentan Tanggal Dari</label>
                                                        <input type="date" class="form-control input-default " placeholder="" name="tgl_dari">
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group mb-3">
                                                    <label for="">Rentan Tanggal Hingga</label>
                                                        <input type="date" class="form-control input-default " placeholder="" name="tgl_hingga">
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group mb-3">
                                                    <label for="">Status Pembayaran</label>
                                                        <select name="status_pembayaran" class="form-control" id="">
                                                            <option value="">Pilih</option>
                                                            <option value="L">Lunas</option>
                                                            <option value="D">Belum Lunas</option>
                                                            <option value="R">Ditolak</option>
                                                            <option value="B">Dibatalkan</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-3 pt-2">
                                                    <button class="btn mt-4 btn-sm btn-success" type="submit" name="filter">Filter Data</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="table-responsive">
                                    <table id="example3" class="display" style="min-width: 845px">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Nama Pemesan</th>
                                                <th>Nama Kamar</th>
                                                <th>NO HP</th>
                                                <th>Status Pemesanan</th>
                                                <th>Status Pembayaran</th>
                                                <th>Tanggal Pemesanan</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                         // Set default value to current month and year

                                          if (isset($_POST['filter'])) {
                                              $tglDari = $_POST['tgl_dari'];
                                              $tglHingga = $_POST['tgl_hingga'];
                                              $statusPembayaran  = $_POST['status_pembayaran'];
                                              
                                              if ($tglDari != null || $tglHingga != null) {
                                                  $tglSaatIni = "$tglDari sampai $tglHingga"; // Set the value to the selected date range
                                                  // tampilkan data yang sesuai dengan range tanggal yang dicari
                                                  $getPemesanan = mysqli_query($conn, "SELECT * FROM tb_pemesanan WHERE created_at BETWEEN '$tglDari' AND DATE_ADD('$tglHingga', INTERVAL 1 DAY) AND status_pemesanan !='P' AND status_pembayaran='$statusPembayaran' ORDER BY tb_pemesanan.id ASC");
                                              } else {
                                                  // get data for current month and year
                                                  $getPemesanan = mysqli_query($conn, "SELECT * FROM tb_pemesanan WHERE DATE_FORMAT(created_at, '%Y-%m') = DATE_FORMAT(CURDATE(), '%Y-%m') AND status_pemesanan !='P' ORDER BY tb_pemesanan.id ASC");
                                                  $tglSaatIni = date('F Y');
                                              }
                                          } else {
                                              // get data for current month and year
                                              $getPemesanan = mysqli_query($conn, "SELECT * FROM tb_pemesanan WHERE DATE_FORMAT(created_at, '%Y-%m') = DATE_FORMAT(CURDATE(), '%Y-%m') AND status_pemesanan !='P' ORDER BY tb_pemesanan.id ASC");
                                          }
                                            $i = 1;
                                            while ($dataPemesanan = mysqli_fetch_array($getPemesanan)) {
                                                $totalTransaksi += $dataPemesanan['jumlah']
                                            ?>
                                                <tr>
                                                    <td><?php echo $i ?></td>
                                                    <td>
                                                        <?php echo $dataPemesanan['nama_pemesan'] ?>
                                                    </td>
                                                    <td><?php echo $dataPemesanan['nama_kost'] ?></td>
                                                    <td><a href="https://api.whatsapp.com/send?phone=085240708560" target="_blank"><?php echo $dataPemesanan['no_hp_pemesan'] ?></a></td>
                                                    <td>
                                                        <?php
                                                        if ($dataPemesanan['status_pemesanan'] == 'A') {
                                                            echo '<span class="badge light badge-success">Accepted</span>';
                                                        } elseif ($dataPemesanan['status_pemesanan'] == 'P') {
                                                            echo '<a href="#" class="badge light badge-warning"><span>Pending</span></a>';
                                                        }elseif ($dataPemesanan['status_pemesanan'] == 'B') {
                                                            echo '<a href="#" class="badge light badge-danger"><span>Canceled</span></a>';
                                                        }
                                                         else {
                                                            echo '<a href="#" class="badge light badge-warning"><span>Rejected</span></a>';
                                                        }

                                                        ?>
                                                    </td>
                                                    <td>
                                                        <?php
                                                        if ($dataPemesanan['status_pembayaran'] == 'L') {
                                                            echo '<span class="badge light badge-success">Lunas</span>';
                                                        } elseif ($dataPemesanan['status_pembayaran'] == 'B') {
                                                            echo '<a href="#" class="badge light badge-danger"><span>expire</span></a>';
                                                        }else {
                                                            echo '<a href="#" class="badge light badge-danger"><span>Belum Lunas</span></a>';
                                                        }

                                                        ?>
                                                    </td>
                                                    <td><?php $created_old = strtotime($dataPemesanan['created_at']);
                                                        echo date('d F Y', $created_old)  ?></td>
                                                </tr>
                                                <?php $i++ ?>
                                            <?php } ?>
                                        </tbody>
                                        <tr>
                                            <th colspan="2"><a href="./cetakLaporanPemesanan.php?tgl_awal=<?php echo $tglDariForPrint?>&tgl_akhir=<?php echo $tglHinggaForPrint?>&status_pembayaran=<?= $statusPembayaranForPrint ?>" target="_blank" class="btn btn-info btn-sm">Cetak Laporan</a></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th><strong>Total Transaksi</strong></th>
                                            <th><strong>Rp.<?php echo number_format($totalTransaksi, 0, ',', '.') ?></strong></th>
                                        </tr>
                                        <!-- <tr>
                                            <th><a href="" class="btn btn-info btn-sm">Cetak</a></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                        </tr> -->
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
    <script data-cfasync="false" src="../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
    <script src="vendor/global/global.min.js"></script>
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