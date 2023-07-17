<nav
      class="navbar navbar-expand-lg justify-content-between shadow-sm bg-white fixed-top mb-4"
    >
      <div class="container">
        <a class="navbar-brand" href="#"
          ><img src="./assets/img/logo.png"  alt=""
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
              <a class="nav-link active" href="index.php">Beranda </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="about.php">About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="room.php">Room</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="contact.php">Contact</a>
            </li>
            <li class="nav-item">
            </li>
            <?php
          if (!empty($_SESSION['nama'])) {
            
              echo '<li class="nav-item">
              <a class="nav-link" href="profileUser.php">My Profile</a>
            </li>     ';
          } else {
            echo '';
          }
          
          ?>         
            
          </ul>
          <?php
          if (!empty($_SESSION['nama'])) {
            
              echo '<a class="btn-login-top" href="./logout.php">Logout</a>';
          } else {
            echo '<a class="btn-login-top" href="./auth/login.php">Sign In</a>';
          }
          
          ?>
          
        </div>
      </div>
    </nav>