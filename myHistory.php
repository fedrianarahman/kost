<?php
session_start();
include './controller/conn.php';
// Cek apakah sesi login telah diatur
if (!isset($_SESSION['nama'])) {
    header("Location: ./auth/login.php");
    exit();
}
$idUSer = $_SESSION['user_id'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <!-- link bootstrap css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous" />
    <!-- font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
    <!-- link css -->
    <link rel="stylesheet" href="./assets/css/style.css" />
    <style>
         .whats-app {
    position: fixed;
    width: 50px;
    height: 50px;
    bottom: 40px;
    background-color: #25d366;
    color: #FFF;
    border-radius: 50px;
    text-align: center;
    font-size: 30px;
    box-shadow: 3px 4px 3px #999;
    right: 15px;
    z-index: 100;
  }

  .my-float {
    margin-top: 10px;
  }
    </style>
</head>

<body>
    <!-- navigasi -->
    <?php include './include/navbar.php' ?>
    <!-- end navigasi -->
    <br />
    <br />
    <br />
    <br />

    <div class="message-from-booking mb-4">
        <?php
        if (isset($_SESSION['status-info'])) {
            echo '<div class="message-from-booking">
                        <div class="alert alert-success light alert-dismissible fade show" role="alert">
                        <strong>Success!</strong>' . $_SESSION['status-info'] . '.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                        </div>';
            unset($_SESSION['status-info']);
        }
        if (isset($_SESSION['status-fail'])) {
            echo '<div class="message-from-booking">
                        <div class="alert alert-danger light alert-dismissible fade show" role="alert">
                        <strong>Success!</strong>' . $_SESSION['status-fail'] . '.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                        </div>';
            unset($_SESSION['status-fail']);
        }
        ?>
    </div>
    <!-- whatsapp icon -->
  <a class="whats-app" href="#" target="_blank">
    <i class="fa-brands  fa-whatsapp my-float"></i>
  </a>
  <!-- whatsapp icon -->
    <section class="profile">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="my-profile">
                        <h3>My Profile</h3>
                        <?php
                        $getPhoto = mysqli_query($conn, "SELECT * FROM user WHERE id = '$idUSer'");
                        $dataPhoto = mysqli_fetch_array($getPhoto);

                        if ($dataPhoto && $dataPhoto['photo'] !== '') {
                            // Jika terdapat data foto pada tabel user
                        ?>
                            <div class="img-profile">
                                <img src="./assets/img/imageProfile/<?php echo $dataPhoto['photo'] ?>" alt="">
                            </div>
                        <?php
                        } else {
                            // Jika tidak ada data foto pada tabel user, tampilkan gambar default
                        ?>
                            <div class="img-profile">
                                <img src="./assets/img/imageProfile/5.png" alt="">
                            </div>
                        <?php
                        }
                        ?>
                        <div class="side-menu">
                            <ul>
                                <li class="mm-active"><a href="./profileUser.php"><i class="fa-regular fa-user mr-4"></i><span class="side-menu-item">My Profile</span></a></li>
                                <li class="bg-primary text-white"><a href="myHistory.php"><i class="fa-regular fa-user mr-4"></i><span class="side-menu-item">History</span></a></li>
                                <li><a href="./myKost.php"><i class="fa-regular fa-user mr-4"></i><span class="side-menu-item">My Kost</span></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-body">
                            <?php
                            $getDataPemesanan = mysqli_query($conn, "SELECT * FROM tb_pemesanan WHERE userId = '$idUSer'");
                            $dataRiwayat = mysqli_fetch_array($getDataPemesanan);

                            ?>

                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Tanggal Pemesanan</th>
                                        <th scope="col">Status Pemesanan</th>
                                        <th scope="col">Kamar</th>
                                        <th scope="col">Tanggal Sewa</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $getPemesanan = mysqli_query($conn, "SELECT * FROM tb_pemesanan WHERE userId = '$idUSer'");
                                    $i = 1;
                                    if (mysqli_num_rows($getPemesanan) > 0) {
                                        while ($dataRiwayat = mysqli_fetch_array($getPemesanan)) {
                                    ?>
                                            <tr>
                                                <th scope="row"><?php echo $i; ?></th>
                                                <td><?php echo $dataRiwayat['created_at'] ?></td>
                                                <td>
                                                    <span class="<?php
                                                    if ($dataRiwayat['status_pemesanan']=='P') {
                                                        echo 'btn btn-sm btn-warning text-white';
                                                    } else {
                                                        echo 'btn btn-sm btn-success text-white';
                                                    }
                                                     
                                                     ?>">
                                                    <?php
                                                    if ($dataRiwayat['status_pemesanan']=='P') {
                                                        echo 'Menunggu Konfirmasi';
                                                    } else {
                                                        echo 'Terkonfirmasi';
                                                    }
                                                     
                                                     ?>
                                                    </span>
                                                </td>
                                                <td><?php echo $dataRiwayat['nama_kost'] ?></td>
                                                <td><?php echo $dataRiwayat['tgk_dari'] ?> - <?php echo $dataRiwayat['tgl_hingga'] ?></td>
                                            </tr>
                                        <?php
                                            $i++;
                                        }
                                    } else {
                                        ?>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td><span class="fw-bold text-danger">Tidak Ada Riwayat</span></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                    <?php
                                    }
                                    ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- footer -->
    <?php
    include './include/footer.php';
    ?>
    <!-- end footer -->

    <!-- script bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <!-- script fontawesome -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/js/all.min.js"></script>
</body>

</html>