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
  .detail-history{
    margin-bottom: 50px;

  }
  .card-custom{
    box-shadow: 0px 4px 14px 0px rgba(209, 224, 255, 0.30);


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
    <section class="detail-history">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card border-0 shadow-sm">
                        <div class="card-body">
                            
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