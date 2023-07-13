<?php
session_start();
include './controller/conn.php';
// Cek apakah sesi login telah diatur
if (!isset($_SESSION['nama'])) {
    header("Location: ./auth/login.php");
    exit();
}
$nama_kost = $_GET['nama_kost'];
$harga_kost = $_GET['harga_kost'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <!-- link bootstrap css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous" />
    <!-- font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
    <!-- link css -->
    <link rel="stylesheet" href="./assets/css/style.css" />
    <style>
        .list-group-item {
            border: none;
            font-style: normal;
            font-weight: 400;
            font-size: 15px;
            color: #A5A5A5;
        }

        .btn-cs-order {
           
            background: #FEB500;
           
    color: #FFF;
    text-align: center;
    font-size: 18px;
    font-family: Poppins;
    font-style: normal;
    font-weight: 300;
    margin-bottom: 40px;
        }

        .btn-cs-order:hover {
            background: #da9c00;
            color: white;
        }

        .value-list-group {
            font-style: normal;
            font-weight: 600;
            font-size: 18px;
            color: #595959;
        }

        .name-product-detail {
            font-style: normal;
            font-weight: 400;
            font-size: 14px;
            line-height: 150%;
            color: #595959;
        }

        .price-fish-detail {
            font-style: normal;
            font-weight: 700;
            font-size: 20px;
            letter-spacing: 0.005em;
            color: #FFA500;
        }

        .price-fish-cs-rp {
            font-style: normal;
            font-weight: 400;
            font-size: 20px;
            letter-spacing: 0.005em;
            color: #FFA500;
        }

        .name-fish-detail {
            font-style: normal;
            font-weight: 700;
            font-size: 32px;
            letter-spacing: 0.05em;
            color: #595959;
        }

        .header-order-step {
            font-size: 30px;
            font-weight: bold;
            background-color: #FEB500;
            color: white;
            padding: 10px;
            border-radius: 10px;
        }
    </style>
</head>

<body>
    <!-- navigasi -->
    <?php include './include/navbar.php'?>
    <!-- end navigasi -->
    <br />
    <br />
    <br />
    <br />
    <br />

    <!-- booking -->
    <section class="booking-page">
        <div class="container">
            <div class="row mb-5">
                <div class="col-md-12 text-center">
                    <h1 class="header-order-step">Order Room</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 mb-3">
                    <?php
                     $getDataGambar = mysqli_query($conn, "SELECT * FROM gambar_kost WHERE nama_kost = '$nama_kost' GROUP BY gambar_kost.nama_kost");
                     while ($dataGambar = mysqli_fetch_array($getDataGambar)) {
                    ?>
                    <img src="./admin/images/imageKost/<?php echo $dataGambar['photo_kost']?>" class="img-fluid image-detail-product" alt="">
                    <?php }?>
                </div>
                <div class="col-md-8 mb-3">
                    <h1 class="name-fish-detail"> Room <?php echo $nama_kost?></h1>
                    <h2 class="price-fish-detail"><span class="price-fish-cs-rp">Harga : <?php echo number_format($harga_kost, 0, ',', '.') ?></h2>
                    <div class="group-product-detail">
                        <h5 class="name-product-detail">Data detail pemesan wajib diisi : <?php echo $_SESSION['user_id']?></h5>
                        <form action="./controller/booking/add.php" method="POST">
                            <div class="row">
                                <div class="mb-3 col-md-6">
                                    <label for="" class="mb-2">*Nama</label>
                                    <input type="text" class="form-control" id="nama" required name="user_id" hidden autofocus
                                        placeholder="Nama" value="<?php echo $_SESSION['user_id']?>">
                                    <input type="text" class="form-control" id="nama" required name="nama_kost" hidden autofocus
                                        placeholder="Nama" value="<?php echo $nama_kost?>">
                                    <input type="text" class="form-control" id="nama" required name="harga_kost" hidden autofocus
                                        placeholder="Nama" value="<?php echo $harga_kost?>">
                                    <input type="text" class="form-control" id="nama" required name="nama_penyewa" autofocus
                                        placeholder="Nama">

                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="" class="mb-2">*Email</label>
                                    <input type="email" class="form-control" id="email" required name="email_penyewa"
                                        placeholder="Email">
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="" class="mb-2">No Telpon</label>
                                    <input type="text" class="form-control" id="nophone" required name="no_hp_penyewa"
                                        placeholder="Phone">
                                </div>

                                <div class="mb-3 col-md-6">
                                    <label for="" class="mb-2">Tanggal Sewa Dari</label>
                                    <input type="Date" class="form-control" id="nophone" required name="sewa_dari"
                                        placeholder="Phone">
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="" class="mb-2">Tanggal Sewa Hingga</label>
                                    <input type="Date" class="form-control" id="nophone" required name="sewa_hingga"
                                        placeholder="Phone">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <a class="btn btn-cs-order" href="./detailRoom.php?nama_kost=<?php echo $nama_kost?>&harga_kost=<?php echo $harga_kost?>">Cancel</a>
                                    <button class="btn btn-custom float-end" type="submit">Continue</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- booking -->

    <!-- footer -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <img src="./assets/img/logo.png" alt="" />
                    <p>We Provide For Your Beautiful Holiday Instantly and memorable</p>
                </div>
                <div class="col-md-3">
                    <h2>For Beginer</h2>
                    <ul>
                        <li><a href="">New Account</a></li>
                        <li><a href="">Start Booking Room</a></li>
                        <li><a href="">Use Payment</a></li>
                    </ul>
                </div>
                <div class="col-md-3">
                    <h2>For Beginer</h2>
                    <ul>
                        <li><a href="">New Account</a></li>
                        <li><a href="">Start Booking Room</a></li>
                        <li><a href="">Use Payment</a></li>
                    </ul>
                </div>
                <div class="col-md-3">
                    <h2>For Beginer</h2>
                    <ul>
                        <li><a href="">New Account</a></li>
                        <li><a href="">Start Booking Room</a></li>
                        <li><a href="">Use Payment</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
    <!-- end footer -->

    <!-- script bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
        crossorigin="anonymous"></script>
    <!-- script fontawesome -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/js/all.min.js"></script>
</body>

</html>