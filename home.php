<?php

session_start();
require "connection.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Home</title>
  <meta name="viewport" content=" width-device-width, initial-scale-1.0">
  <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
  <link rel="stylesheet" href="assets/css/bubble.css">
  <link rel="stylesheet" href="assets/css/home.css">
  <link rel="stylesheet" href="assets/css/sidebar.css">

</head>


<body>

  <div class="sidebar">
    <div class="logo-details">
      <i class='bx bx-code icon'></i>
      <div class="logo_name">Binary Brains</div>
      <i class='bx bx-menu' id="menu_btn" style="margin-top: 0;"></i>
    </div>
    <ul class="nav-list">
      <!-- <li>
              <i class='bx bx-search' ></i>
             <input type="text" placeholder="Search...">
             <span class="tooltip">Search</span>
          </li> -->
      <li>
        <a href="home.php">
          <i class='bx bx-home'></i>
          <span class="links_name">Home</span>
        </a>
        <span class="tooltip">Home</span>
      </li>
      <li>
        <a href="news.php">
          <i class='bx bx-news'></i>
          <span class="links_name">News</span>
        </a>
        <span class="tooltip">News</span>
      </li>
      <!-- <li>
           <a href="events.php">
             <i class='bx bx-alarm' ></i>
             <span class="links_name">Events</span>
           </a>
           <span class="tooltip">Events</span>
         </li> -->
      <li>
        <a href="forum.php">
          <i class='bx bx-chat'></i>
          <span class="links_name">Forum</span>
        </a>
        <span class="tooltip">Forum</span>
      </li>
      <li>
        <a href="profile.php">
          <i class='bx bx-user'></i>
          <span class="links_name">Profile</span>
        </a>
        <span class="tooltip">Profile</span>
      </li>
      <li>
        <a href="#">
          <i class='bx bx-info-circle'></i>
          <span class="links_name">Contact Us</span>
        </a>
        <span class="tooltip">About Us</span>
      </li>

      <!-- <li>
           <a href="#">
             <i class='bx bx-cog' ></i>
             <span class="links_name">Settings</span>
           </a>
           <span class="tooltip">Settings</span>
         </li> -->
      <li class="profile">
        <div class="profile-details">
          <!--<img src="profile.jpg" alt="profileImg">-->

        </div>
        <!-- <i class='bx bx-log-out' id="log_out" ></i> -->
        <form method="POST">
          <button style=" position: relative; margin: 8px 0; list-style: none; background-color: transparent;" type="submit" name="logout" class="logout-button"><i class='bx bx-log-out'></i></button>
        </form>
        <?php

        if (isset($_POST['logout'])) {
          session_destroy(); // Destroy the session
          header('Location: index.php'); // Redirect to the login page or any other page
          exit;
        }
        ?>
      </li>
    </ul>
  </div>

  <header>
    <h1 id="bubble-hover"></h1>

  </header>


  <!-- parallax -->


  <section>
    <img src="assets/img/stars.png" id="stars">
    <img src="assets/img/layer 3.png" id="layer_3">
    <img src="assets/img/layer 2.png" id="layer_2">
    <img src="assets/img/laptop.png" id="laptop">
    <!-- <h2 id="text">hello world</h2> -->
    <img src="assets/img/layer 1.png" id="layer_1">
  </section>


  <!-- data -->


  <div class="sec" id="sec">
    <h2>Binary Brains</h2>
    <div class="animate-me">
      <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Delectus similique modi unde quaerat vel aut, doloremque explicabo consequuntur eaque sit ut dignissimos adipisci fugit earum voluptatem quis amet aperiam quasi.
        <br><br>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatibus necessitatibus delectus ullam reprehenderit, ratione et ea cum pariatur ipsum sapiente, unde porro laboriosam quibusdam error commodi animi eius harum soluta.
        <br><br>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Delectus similique modi unde quaerat vel aut, doloremque explicabo consequuntur eaque sit ut dignissimos adipisci fugit earum voluptatem quis amet aperiam quasi.
        <br><br>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatibus necessitatibus delectus ullam reprehenderit, ratione et ea cum pariatur ipsum sapiente, unde porro laboriosam quibusdam error commodi animi eius harum soluta.
        <br><br>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Delectus similique modi unde quaerat vel aut, doloremque explicabo consequuntur eaque sit ut dignissimos adipisci fugit earum voluptatem quis amet aperiam quasi.
      </p>
      <br><br>
    </div>


    <h2>Founders</h2>

    <div class="animate-me">
      <div class="grid-photos">
        <div></div>
        <div class="grid-item"><img src="assets/img/yasser.png" alt="">
          <h1>Dr. Yasser fadlallah</h1>
        </div>
        <!-- <div class="grid-item"><img src="assets/img/ahmad.png" alt="" ><h1>Dr. Ahmad fadlallah</h1></div> -->
        <div class="grid-item"><img src="assets/img/mj.png" alt="">
          <h1>Mohammad jawad</h1>
        </div>
        <div></div>
        <!-- <div class="grid-item"><img src="assets/img/fatima.png" alt="" ><h1>Fatima Mubarak</h1></div> -->
      </div>
    </div>


    <h2>Goals</h2>

    <div class="animate-me">
      <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Delectus similique modi unde quaerat vel aut, doloremque explicabo consequuntur eaque sit ut dignissimos adipisci fugit earum voluptatem quis amet aperiam quasi.
        <br><br>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatibus necessitatibus delectus ullam reprehenderit, ratione et ea cum pariatur ipsum sapiente, unde porro laboriosam quibusdam error commodi animi eius harum soluta.
        <br><br>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Delectus similique modi unde quaerat vel aut, doloremque explicabo consequuntur eaque sit ut dignissimos adipisci fugit earum voluptatem quis amet aperiam quasi.
        <br><br>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatibus necessitatibus delectus ullam reprehenderit, ratione et ea cum pariatur ipsum sapiente, unde porro laboriosam quibusdam error commodi animi eius harum soluta.
        <br><br>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Delectus similique modi unde quaerat vel aut, doloremque explicabo consequuntur eaque sit ut dignissimos adipisci fugit earum voluptatem quis amet aperiam quasi.
      </p><br><br><br><br>
    </div>
  </div>


  <!-- footer  -->

  <div class="footer">
    <div class="footer-data">
      <a href="https://www.usal.edu.lb" target="_blank"><img src="assets/img/logo-usal.png" style="width: 8%;"></a>
    </div>
  </div>

  <script src="assets/js/login.js"></script>
  <script src="assets/js/main.js"></script>
  <script src="assets/js/sidebar.js"></script>
</body>

</html>