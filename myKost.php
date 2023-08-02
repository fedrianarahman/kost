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
  <link rel="stylesheet" href="./assets/css/style2.css" />
</head>
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
  .my-kost-content h2{
    margin-bottom: 15px;
  }
  .my-kost-content p {
    text-decoration: none;
    color: #B0B0B0;
    font-family: Poppins;
    font-size: 14px;
    font-style: normal;
    line-height: 10px;
    font-weight: 300;
  }
  .img-my-kost {
    /* height: 300px; */
    width: 150px;
    /* background: #000; */
    position: relative;
    overflow: hidden;
}
.img-my-kost img{
    /* width: 100%; */
    object-fit: fill;
    /* height: 100%; */
}
</style>

<body>
  <!-- navigasi -->
  <?php include './include/navbar.php' ?>
  <!-- end navigasi -->
  <br />
  <br />
  <br />
  <br />
  <br />
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
               <div class=" mb-4 ">
                <img src="./assets/img/imageProfile/<?php echo $dataPhoto['photo'] ?>" alt="" class="rounded-3 shadow-4"  style="width: 150px;" alt="Avatar">
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
                <li><a href="./profileUser.php"><i class="fa-regular fa-user mr-4"></i><span class="side-menu-item">My Profile</span></a></li>
                <li><a href="./myHistory.php"><i class="fa-regular fa-user mr-4"></i><span class="side-menu-item">History</span></a></li>
                <li class="bg-primary text-white"><a href="./myKost.php"><i class="fa-regular fa-user mr-4"></i><span class="side-menu-item">My Kost</span></a></li>
              </ul>
            </div>
          </div>
        </div>
        <div class="col-md-8">
          <div class="card border-0 shadow-lg">
            <div class="card-body ">
              <?php
              $getKost = mysqli_query($conn, "SELECT * FROM tb_pemesanan LEFT JOIN kost ON kost.nama = tb_pemesanan.nama_kost INNER JOIN gambar_kost ON gambar_kost.nama_kost = tb_pemesanan.nama_kost WHERE tb_pemesanan.userId = '$idUSer' AND tb_pemesanan.status_pemesanan = 'A' GROUP BY kost.nama");
              while ($dataKost = mysqli_fetch_array($getKost)) {          
                date_default_timezone_set('Asia/Jakarta'); // Atur zona waktu ke WIB (Waktu Indonesia Bagian Barat)
                $currentDari = strtotime($dataKost['tgk_dari']);  
                $currentHingga = strtotime($dataKost['tgl_hingga']);
                $realTglDari = date('F d, Y H:i:s', $currentDari);   
                $realHingga = date('F d, Y H:i:s', $currentHingga);
              ?>
               <div class="row mb-4">
                <div class="col-md-3">
                  <div class="img-my-kost">
                    <img src="./admin/images/imageKost/<?php echo $dataKost['photo_kost']?>" class="rounded-3 shadow-4" alt="">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="my-kost-content">
                    <h2><?php echo $dataKost['nama']?></h2>
                    <p>Tanggal Sewa : <?php echo $realTglDari?> hingga <?php echo $realHingga?></p>
                  </div>
                </div>
              </div>
              <?php }?>
             
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- footer -->
  <?php include './include/footer.php'?>
  <!-- end footer -->

  <!-- script bootstrap -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
  <!-- script fontawesome -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/js/all.min.js"></script>
</body>

</html>