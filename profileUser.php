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
    <link rel="stylesheet" href="./assets/css/style.css" />
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
    <section class="profile">
      <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="my-profile">
                    <h3>My Profile</h3>
                    <div class="img-profile">
                        <img src="./assets/img/pic2.jpg" alt="">
                    </div>
                    <div class="side-menu">
                      <ul>
                        <li class="mm-active"><a href=""><i class="fa-regular fa-user mr-4"></i><span class="side-menu-item">My Profile</span></a></li>
                        <li><a href="myHistory.html"><i class="fa-regular fa-user mr-4"></i><span class="side-menu-item">History</span></a></li>
                        <li><a href="./myKost.html"><i class="fa-regular fa-user mr-4"></i><span class="side-menu-item">My Kost</span></a></li>
                      </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
              <div class="card">
                <div class="card-body">
                  <form action="">
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group mb-2">
                          <label for="" class="mb-2">Nama</label>
                          <input type="text" name="" class="form-control" id="" value="<?php echo $_SESSION['nama']?>">
                        </div>
                      </div>
                       <div class="col-md-6">
                        <div class="form-group mb-2">
                          <label for="" class="mb-2">Email</label>
                          <input type="text" name="" class="form-control" id="" value="<?php echo $_SESSION['email']?>">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group mb-2">
                          <label for="" class="mb-2">NO HP</label>
                          <input type="text" name="" class="form-control" id="" value="<?php echo $_SESSION['no_hp']?>">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group mb-2">
                          <label for="" class="mb-2">Alamat</label>
                          <input type="text" name="" class="form-control" id="" value="<?php echo $_SESSION['nama']?>">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group mb-2">
                          <label for="" class="mb-2">Joined At</label>
                          <input type="text" name="" class="form-control" id="" value="<?php echo $_SESSION['joined_at']?>">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group mb-2">
                          <label for="" class="mb-2">Upload Photo</label>
                          <input type="file" name="" class="form-control" id="">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12  mt-4">
                        <button class="btn btn-cs-order" type="submit">Update</button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
        </div>
    </div>
    </section>
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
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
      crossorigin="anonymous"
    ></script>
    <!-- script fontawesome -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/js/all.min.js"></script>
  </body>
</html>
