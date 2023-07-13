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
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <!-- link bootstrap css -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ"
      crossorigin="anonymous"
    />
    <!-- font awesome -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
    />
    <!-- link css -->
    <link rel="stylesheet" href="./assets/css/style.css">
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
    <div class="container">
          

            <!-- room with beautiful yeard -->
            <section class="room-with-beauty-backyeard">
              <h2>Kost Room </h2>
              <div class="row">
                <?php
                $getDataKost = mysqli_query($conn, "SELECT * FROM kost INNER JOIN fasilitas ON fasilitas.id = kost.fasilitas INNER JOIN gambar_kost ON gambar_kost.nama_kost  = kost.nama GROUP BY kost.nama");
                while ($dataKost = mysqli_fetch_array($getDataKost)) {
                 
                ?>
               <?php
               if ($dataKost['status']=='Y') {
               ?> 
                <div class="col-md-3">
                  <a href="./detailRoom.php?nama_kost=<?php echo $dataKost['nama']?>&harga_kost=<?php echo $dataKost['harga']?>" class="text-room">
                    <div class="room-with-beauty-backyeard-image">
                      <img src="./admin/images/imageKost/<?php echo $dataKost['photo_kost']?>" alt="" srcset="">
                      <span class="diskon">New Arrival</span>
                      <p class="room-with-beauty-backyeard-title"><?php echo $dataKost['nama']?></p>
                      <p class="room-with-beauty-backyeard-location badge badge-success">
                        <span class=" <?php if ($dataKost['status']=='Y') {
                          echo 'badge light badge-custom-success';
                        } else {
                          echo 'badge light badge-custom-warning';
                        }
                         ?>"><?php if ($dataKost['status']=='Y') {
                          echo 'kosong';
                        } else {
                          echo 'Penuh';
                        }
                         ?></span></p>
                    </div>
                  </a>
                </div>
               <?php } else {
               ?>
                <div class="col-md-3">
                 <span>
                 <div class="room-with-beauty-backyeard-image">
                      <img src="./admin/images/imageKost/<?php echo $dataKost['photo_kost']?>" alt="" srcset="">
                      <span class="diskon">New Arrival</span>
                      <p class="room-with-beauty-backyeard-title"><?php echo $dataKost['nama']?></p>
                      <p class="room-with-beauty-backyeard-location badge badge-success">
                        <span class=" <?php if ($dataKost['status']=='Y') {
                          echo 'badge light badge-custom-success';
                        } else {
                          echo 'badge light badge-custom-warning';
                        }
                         ?>"><?php if ($dataKost['status']=='Y') {
                          echo 'kosong';
                        } else {
                          echo 'Penuh';
                        }
                         ?></span></p>
                    </div>
                 </span>
                </div>
               <?php }?>
               <?php }?>
              </div>
            </section>
            <!-- end room with beautiful yeard -->
          </div>
          <!-- footer -->
          <footer>
            <div class="container">
              <div class="row">
                <div class="col-md-3">
                  <img src="./assets/img/logo.png" alt="">
                  <p>We Provide For Your Beautiful Holiday
                    Instantly and memorable</p>
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
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
      crossorigin="anonymous"
    ></script>
    <!-- script fontawesome -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/js/all.min.js"></script>
  </body>
</html>
