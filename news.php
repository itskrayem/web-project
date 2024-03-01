<?php
session_start();
require "connection.php";

$userEmail = $_SESSION['email'];
$sql = "SELECT role FROM users WHERE email = '$userEmail'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  $row = $result->fetch_assoc();
  $userRole = $row['role'];
  if ($userRole === 'admin') {
    $isAdmin = true;
  } else {
    $isAdmin = false;
  }
} else {
  $isAdmin = false;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Forum</title>
  <meta name="viewport" content=" width-device-width, initial-scale-1.0">
  <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
  <!-- <link rel="stylesheet" href="assets/css/bubble.css"> -->
  <link rel="stylesheet" href="assets/css/main.css">
  <link rel="stylesheet" href="assets/css/sidebar.css">
  <link rel="stylesheet" href="assets/css/forum.css">

</head>


<body>
  <header>
    <h1 id="bubble-hover"></h1>
    <button onclick="location.href='add_news.php'" class="add-post-button" name="add-post" <?php if (!$isAdmin) {
                                                                                              echo ' style="display: none;"';
                                                                                            } ?>>Add</button>
  </header>

  <div class="sidebar">
    <div class="logo-details">
      <i class='bx bx-code icon'></i>
      <div class="logo_name">Binary Brains</div>
      <i class='bx bx-menu' id="menu_btn"></i>
    </div>
    <ul class="nav-list">
      <!-- <li>
        <i class='bx bx-search'></i>
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
          <i class='bx bx-alarm'></i>
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
          <i class='bx bx-cog'></i>
          <span class="links_name">Settings</span>
        </a>
        <span class="tooltip">Settings</span>
      </li> -->
      <li class="profile">
        <div class="profile-details">
          <!--<img src="profile.jpg" alt="profileImg">-->

        </div>
        <!-- <i class='bx bx-log-out' id="log_out"></i> -->
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



  <section>

    <img src="assets/img/stars.png" id="stars">

    <!-- <div class="posts"> -->

    <?php

    $sql = "SELECT * from news 
            ORDER BY news.date DESC";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {

      while ($row = $result->fetch_assoc()) {
        $newsId = $row['id'];
        $newstitle = $row['title'];
        $body = $row['body'];
        // $username = $row['user_email'];
        $coverPhoto = $row['cover_photo'];

        echo '<div class="post" style=" height:500px;  background-size: cover; background-position: center; background-image: url(' . $coverPhoto . ');">';

        // echo '<img  src="' . $coverPhoto . '" alt="Cover Photo">';
        echo '<h3>' . $newstitle . '</h3>';
        echo '<p>' . $body . '</p>';


        if ($username === $userEmail) {
          echo '<form action="edit_post.php" method="POST">';
          echo '<input type="hidden" name="post_id" value="' . $postId . '">';
          echo '<button type="submit" name="edit_submit" class="edit-button">Edit</button>';
          echo '</form>';
        }


        if ($username === $userEmail) {
          echo '<form action="delete_post.php" method="POST">';
          echo '<input type="hidden" name="post_id" value="' . $postId . '">';
          echo '<button type="submit" name="delete_submit" class="delete-button">Delete</button>';
          echo '</form>';
        }

        echo '</div>';
      }
    } else {
      echo '<h1 style="color: white">No posts found.</h1>';
    }


    $conn->close();
    ?>
    <!-- </div> -->
  </section>
  <div>


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
  <!-- <script src="assets/js/forum.js"></script> -->
</body>

</html>