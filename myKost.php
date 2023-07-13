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
    <nav
      class="navbar navbar-expand-lg justify-content-between shadow-sm bg-white fixed-top mb-4"
    >
      <div class="container">
        <a class="navbar-brand" href="#"
          ><img src="./assets/img/logo.png" alt=""
        /></a>
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navbarNav"
          aria-controls="navbarNav"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav ms-auto">
            <li class="nav-item">
              <a class="nav-link active" href="index.html">Beranda </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="about.html">About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="room.html">Room</a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="contact.html">Contact</a>
            </li>
            <!-- <li class="nav-item">
              <a class="nav-link text-sign-up " href="page-login.html">Sign In</a>
            </li> -->
          </ul>
        </div>
      </div>
    </nav>
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
                        <li><a href="./profileUser.html"><i class="fa-regular fa-user mr-4"></i><span class="side-menu-item">My Profile</span></a></li>
                        <li><a href=""><i class="fa-regular fa-user mr-4"></i><span class="side-menu-item">History</span></a></li>
                        <li><a href="./myKost.html"><i class="fa-regular fa-user mr-4"></i><span class="side-menu-item">My Kost</span></a></li>
                      </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
              <div class="card">
                <div class="card-body">
                  <div class="row">
                      <div class="col-md-3">
                        <div class="img-my-kost">
                            <img src="./assets/img/most-picked-1.jpg" alt="">
                        </div>
                    </div>
                    <div class="col-md-6">
                      <div class="my-kost-content">
                        <h2>Ramayana Kost</h2>
                        <p>Joined at : Rabu, 2 februari 2023</p>
                      </div>
                    </div>
                  </div>
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
