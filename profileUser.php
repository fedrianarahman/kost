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
                <li class="bg-primary"><a href="./profileUser.php"><i class="fa-regular fa-user mr-4"></i><span class="side-menu-item">My Profile</span></a></li>
                <li><a href="myHistory.php"><i class="fa-regular fa-user mr-4"></i><span class="side-menu-item">History</span></a></li>
                <li><a href="./myKost.php"><i class="fa-regular fa-user mr-4"></i><span class="side-menu-item">My Kost</span></a></li>
              </ul>
            </div>
          </div>
        </div>
        <div class="col-md-8">
          <div class="card">
            <div class="card-body">
              <form action="./controller/user/updateProfile.php" method="POST" enctype="multipart/form-data">
                <?php
                $getDataUser = mysqli_query($conn, "SELECT * FROM user WHERE id = '$idUSer'");
                while ($dataUser = mysqli_fetch_array($getDataUser)) {

                ?>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group mb-2">
                        <label for="" class="mb-2">Nama</label>
                        <input type="text" name="nama" class="form-control" id="" value="<?php echo $dataUser['nama'] ?>">
                        <input hidden type="text" name="old_photo" class="form-control" id="" value="<?php echo $dataUser['photo'] ?>">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group mb-2">
                        <label for="" class="mb-2">Email</label>
                        <input type="text" name="email" class="form-control" id="" value="<?php echo $dataUser['email'] ?>">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group mb-2">
                        <label for="" class="mb-2">NO HP</label>
                        <input type="text" name="no_hp" class="form-control" id="" value="<?php echo $dataUser['no_telpon'] ?>">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group mb-2">
                        <label for="" class="mb-2">Alamat</label>
                        <input type="text" name="alamat" class="form-control" id="" value="<?php echo $dataUser['alamat'] ?>">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group mb-2">
                        <label for="" class="mb-2">Username</label>
                        <input type="text" name="username" class="form-control" id="" value="<?php echo $dataUser['username'] ?>">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group mb-2">
                        <label for="" class="mb-2">Password</label>
                        <input type="password" name="password" class="form-control" id="" value="<?php echo $dataUser['password'] ?>">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group mb-2">
                        <label for="" class="mb-2">Joined At</label>
                        <input type="text" name="" class="form-control" id="" value="<?php echo $dataUser['created_at'] ?>">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group mb-2">
                        <label for="" class="mb-2">Upload Photo</label>
                        <input type="file" name="photo" class="form-control" id="">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12  mt-4">
                      <button class="btn btn-cs-order" type="submit">Update</button>
                    </div>
                  </div>
                <?php } ?>

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
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
  <!-- script fontawesome -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/js/all.min.js"></script>
</body>

</html>