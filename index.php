<?php
session_start();
include './controller/conn.php';
// Cek apakah sesi login telah diatur
if (!isset($_SESSION['nama'])) {
    // header("Location: ./auth/login.php");
    // exit();
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
    <style>
        .btn-login-top{
    border-radius: 4px;
    background: #3572EF;
    box-shadow: 0px 8px 15px 0px rgba(53, 114, 239, 0.30);
    color: #FFF;
    padding-left: 10px;
    padding-right: 10px;
    padding-top: 5px;
    padding-bottom: 5px;
    text-align: center;
    /* margin-top: 5px; */
    text-decoration: none;

}.img {
    padding-top: 15px;
    right: 0;
    padding-left: 10px;
}

.image-wrapper {
    max-width: 498px;
    max-height: 421.875px;
    position: relative;
    z-index: 1;
}

.image-wrapper img {
    width: 100%;
    border-radius: 100px 15px 15px 15px;
    object-fit: fill;
    height: 400px;
}
    </style>
  </head>
  <body>
    <!-- navigasi -->
    <?php 
    include './include/navbar.php';
     ?>
    <!-- end navigasi -->
    <br />
    <br />
    <br />
    <br />
    <br />
    <div class="container">
          <!-- hero -->
            <section class="hero">
                <div class="row">
                    <div class="col-md-6">
                        <h1> Nikmati Tinggal di Kost dengan Fasilitas Terbaik</h1>
                        <p>Kosan bu ida adalah kosan yang berada di kota bandung tepatnya di jalan sekeloa tengah. Kosan yang tidak jadu dari monument perjuangan rakyat  sekitar 530 meter dari kosan, sekitar 1,5 km ke gedung sate, berjarak 90 meter dari indomart sekeloa dan  banyak jajanan bandung di sekitaran kosan.</p>
                        <button class="btn  btn-custom">Show Me Now</button>
                        <div class="hero-icon">
                            <div class="hero-icon-item">
                                <img src="./assets/img/icon/ic-traveller.svg" alt="">
                                <p><span>1,400</span> resident</p>
                            </div>
                            <div class="hero-icon-item">
                                <img src="./assets/img/icon/ic-photo.svg" alt="">
                                <p><span>1,400</span> resident</p>
                            </div>
                            <div class="hero-icon-item">
                                <img src="./assets/img/icon/ic-cities.svg" alt="">
                                <p><span>1,400</span> resident</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="img">
                            <div class="image-wrapper">
                                <img src="./assets/img/buida.jpeg" alt="" height="">
                            </div>
                            <div class="bg-hero-image"></div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- end hero -->

            <!-- most picked -->
            <!-- <section class="most-picked">
              <h2>Most Picked</h2>
              <div class="row">
                <div class="col-md-4">
                  <div class="most-picked-image">
                    <img src="./assets/img/most-picked-1.jpg" alt="">
                    <span>Diskon</span>
                    <p class="most-picked-image-title">Arjuna Room</p>
                    <p class="most-picked-image-location">Bali, Indonesia</p>
                  </div>
                </div>
                <div class="col-md-8">
                  <div class="most-picked-small">
                    <div class="most-picked-item">
                      <img src="./assets/img/most-picked-2.jpg" alt="" srcset="">
                      <span>Diskon</span>
                      <p class="most-picked-image-title">Arjuna Room</p>
                      <p class="most-picked-image-location">Bali, Indonesia</p>
                    </div>
                    <div class="most-picked-item">
                      <img src="./assets/img/most-picked-2.jpg" alt="" srcset="">
                      <span>Diskon</span>
                      <p class="most-picked-image-title">Arjuna Room</p>
                      <p class="most-picked-image-location">Bali, Indonesia</p>
                    </div>
                  </div>
                  <div class="most-picked-small">
                    <div class="most-picked-item">
                      <img src="./assets/img/most-picked-2.jpg" alt="" srcset="">
                      <span>Diskon</span>
                      <p class="most-picked-image-title">Arjuna Room</p>
                      <p class="most-picked-image-location">Bali, Indonesia</p>
                    </div>
                    <div class="most-picked-item">
                      <img src="./assets/img/most-picked-2.jpg" alt="" srcset="">
                      <span>Diskon</span>
                      <p class="most-picked-image-title">Arjuna Room</p>
                      <p class="most-picked-image-location">Bali, Indonesia</p>
                    </div>
                  </div>
                </div>
              </div>
            </section> -->
            <!-- end mos picked -->

            <!-- room with beautiful yeard -->
            <section class="room-with-beauty-backyeard">
              <h2>Kamar Kost</h2>
              <div class="row">
                <?php
                $getDataKost = mysqli_query($conn, "SELECT * FROM kost INNER JOIN fasilitas ON fasilitas.id = kost.fasilitas INNER JOIN gambar_kost ON gambar_kost.nama_kost  = kost.nama GROUP BY kost.nama");
                while ($dataKost = mysqli_fetch_array($getDataKost)) {
                 
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
               <?php }?>
              </div>
            </section>
            <!-- end room with beautiful yeard -->

            <!-- kost with large living room -->
            <!-- <section class="room-with-beauty-backyeard">
              <h2>Kost With Large Living Room</h2>
              <div class="row">
                <div class="col-md-3">
                  <div class="room-with-beauty-backyeard-image">
                    <img src="./assets/img/most-picked-2.jpg" alt="" srcset="">
                    <p class="room-with-beauty-backyeard-title">Arjuna Room</p>
                    <p class="room-with-beauty-backyeard-location">Bali, Indonesia</p>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="room-with-beauty-backyeard-image">
                    <img src="./assets/img/most-picked-2.jpg" alt="" srcset="">
                    <p class="room-with-beauty-backyeard-title">Arjuna Room</p>
                    <p class="room-with-beauty-backyeard-location">Bali, Indonesia</p>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="room-with-beauty-backyeard-image">
                    <img src="./assets/img/most-picked-2.jpg" alt="" srcset="">
                    <span>Diskon</span>
                    <p class="room-with-beauty-backyeard-title">Arjuna Room</p>
                    <p class="room-with-beauty-backyeard-location">Bali, Indonesia</p>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="room-with-beauty-backyeard-image">
                    <img src="./assets/img/most-picked-2.jpg" alt="" srcset="">
                    <p class="room-with-beauty-backyeard-title">Arjuna Room</p>
                    <p class="room-with-beauty-backyeard-location">Bali, Indonesia</p>
                  </div>
                </div>
              </div>
            </section> -->
            <!-- end kost with large living room -->

            <!-- kost with kitchen set -->
            <!-- <section class="room-with-beauty-backyeard">
              <h2>Kost With Kitchen Set</h2>
              <div class="row">
                <div class="col-md-3">
                  <div class="room-with-beauty-backyeard-image">
                    <img src="./assets/img/most-picked-2.jpg" alt="" srcset="">
                    <p class="room-with-beauty-backyeard-title">Arjuna Room</p>
                    <p class="room-with-beauty-backyeard-location">Bali, Indonesia</p>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="room-with-beauty-backyeard-image">
                    <img src="./assets/img/most-picked-2.jpg" alt="" srcset="">
                    <p class="room-with-beauty-backyeard-title">Arjuna Room</p>
                    <p class="room-with-beauty-backyeard-location">Bali, Indonesia</p>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="room-with-beauty-backyeard-image">
                    <img src="./assets/img/most-picked-2.jpg" alt="" srcset="">
                    <span>Diskon</span>
                    <p class="room-with-beauty-backyeard-title">Arjuna Room</p>
                    <p class="room-with-beauty-backyeard-location">Bali, Indonesia</p>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="room-with-beauty-backyeard-image">
                    <img src="./assets/img/most-picked-2.jpg" alt="" srcset="">
                    <p class="room-with-beauty-backyeard-title">Arjuna Room</p>
                    <p class="room-with-beauty-backyeard-location">Bali, Indonesia</p>
                  </div>
                </div>
              </div>
            </section> -->
            <!-- kost with kitchen set -->

            <!-- testimonial -->
            <section class="testimonial">
              <div class="row">
                <div class="col-md-6">
                 <div class="image-testimonial">
                  <div class="img-testimonial-bg">
                  </div>
                  <div class="img-testimonial">
                    <img src="./assets/img/testimonial-img.jpg" alt="">
                  </div>
                 </div>
                </div>
                <div class="col-md-6 ">
                  <div class="testimonial-content">
                    <h2>Testimonial</h2>
                    <div class="icon">
                      <i class="fa-solid fa-star"></i>
                      <i class="fa-solid fa-star"></i>
                      <i class="fa-solid fa-star"></i>
                      <i class="fa-solid fa-star"></i>
                      <i class="fa-solid fa-star"></i>
                    </div>
                    <div class="testimonial-text">What a great trip with my family and i should
                      try again next time soon...</div>
                      <p>Salsabila, collage student</p>
                      <button class="btn btn-custom">Read His Story</button>
                  </div>
                </div>
              </div>
            </section>
            <!-- testimonial -->
          </div>
          <!-- footer -->
         <?php
         include './include/footer.php';
         ?>
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
