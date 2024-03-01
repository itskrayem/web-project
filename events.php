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
    <title>Events</title>
    <meta name= "viewport" content=" width-device-width, initial-scale-1.0">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="assets/css/bubble.css">
    <link rel="stylesheet" href="assets/css/main.css">
    <link rel="stylesheet" href="assets/css/events.css">
    <link rel="stylesheet" href="assets/css/sidebar.css">
</head>


<body>

    <div class="sidebar">
        <div class="logo-details">
          <i class='bx bx-code icon'></i>
            <div class="logo_name">Binary Brains</div>
            <i class='bx bx-menu' id="menu_btn" ></i>
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
             <i class='bx bx-news' ></i>
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
             <i class='bx bx-chat' ></i>
             <span class="links_name">Forum</span>
           </a>
           <span class="tooltip">Forum</span>
         </li>
         <li>
            <a href="profile.php">
              <i class='bx bx-user' ></i>
              <span class="links_name">Profile</span>
            </a>
            <span class="tooltip">Profile</span>
          </li>
         <li>
           <a href="#">
             <i class='bx bx-info-circle' ></i>
             <span class="links_name">Contact Us</span>
           </a>
           <span class="tooltip">About Us</span>
         </li>
         
         <li>
           <a href="#">
             <i class='bx bx-cog' ></i>
             <span class="links_name">Settings</span>
           </a>
           <span class="tooltip">Settings</span>
         </li>
         <li class="profile">
             <div class="profile-details">
               <!--<img src="profile.jpg" alt="profileImg">-->
               
             </div>
             <i class='bx bx-log-out' id="log_out" ></i>
         </li>
        </ul>
    </div>

    <header>
        <h1 id="bubble-hover" ></h1>    
    </header>

    <section>
        <img src="assets/img/stars.png" id="stars">
        <div class="calendar"></div>
    </section>

<!-- footer  -->

    <div class="footer">
        <div class="footer-data"> 
            <a href="https://www.usal.edu.lb" target="_blank"><img src="assets/img/logo-usal.png"  style="width: 8%;" ></a>
        </div>
    </div>


<script src="assets/js/login.js"></script>
<script src="assets/js/main.js"></script>
<script src="assets/js/sidebar.js"></script>
<script src="assets/js/events.js"></script>
</body>
</html>