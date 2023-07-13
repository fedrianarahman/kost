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
            <!-- about -->
            <section class="about">
                <div class="row">
                    <div class="col-md-6">
                        <div class="about-image-img">
                            <img src="./assets/img/most-picked-2.jpg" alt="">
                        </div>
                        <div class="about-bg-image"></div>
                    </div>
                    <div class="col-md-6">
                        <div class="about-content">
                            <h1>About</h1>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quasi quisquam in veniam illo deleniti incidunt adipisci delectus aliquam quae temporibus aspernatur repellat nam illum vel, iure hic ad provident reiciendis.</p>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Odit nobis voluptatem dolore consectetur aliquam neque consequuntur sequi, suscipit illo consequatur unde aut laboriosam deserunt officiis molestiae ad eos porro? Blanditiis!</p>
                        </div>
                    </div>
                </div>
            </section>
            <!-- end about -->
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
