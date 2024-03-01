<?php
session_start();
require "connection.php";
if (isset($_POST["search"])) {
  $_SESSION["word"] = $_POST["search-word"];
  header('Location: http://localhost/deploy1/forum.php');
  die;
}
if (isset($_POST["clear"])) {
  $_SESSION["word"] = "";
  header('Location: http://localhost/deploy1/forum.php');
  die;
}

if (isset($_POST['logout'])) {
  session_destroy(); // Destroy the session
  header('Location: index.php'); // Redirect to the login page or any other page
  die;
}


// $sql = "SELECT posts.*, users.name FROM posts INNER JOIN users ON posts.user_email = users.email ORDER BY posts.date DESC";
// $result = $conn->query($sql);
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
    <button onclick="location.href='add_post.php'" class="add-post-button" name="add-post">Add Post</button>
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
        <!-- <i class='bx bx-log-out' id="log_out" ></i> -->
        <form method="POST">
          <button style=" position: relative; margin: 8px 0; list-style: none; background-color: transparent;" type="submit" name="logout" class="logout-button"><i class='bx bx-log-out'></i></button>
        </form>


      </li>
    </ul>
  </div>


  <form id="search-form" method="POST">
    <input id="search-input" name="search-word" type="text" placeholder="Search...">
    <input style="display:none " name="search" id="search" type="submit" class="search-button">
    <!-- <label for="search" class="search-label"><i class='bx bx-search'></i></label> -->

  </form>
  <br>
  <form method="POST">
    <input style=" text-decoration: none;
  font-size: medium;
  padding: 6px 15px;
  color: black;
  border-radius: 50px;
  background-color: #fff;" name="clear" id="clear-search" value="clear" type="submit" >
  </form>
  <section>
    <!-- <form id="search-form" method="POST">
    <input id="search-input" type="text" placeholder="Search...">
    <input style="display:none " id = "search" type="submit" class="search-button">
    <label for="search"><i class='bx bx-search'></i></label>
    
    </form> -->
    <br><br>
    <img src="assets/img/stars.png" id="stars">

    <!-- <div class="posts"> -->

    <?php

    

    $userEmail = $_SESSION['email'];

    // $sql = "SELECT posts.*, users.name 
    // FROM posts 
    // INNER JOIN users ON posts.user_email = users.email 
    // ORDER BY posts.date DESC";

    $sql = "SELECT * from posts 
            ORDER BY posts.date DESC";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {

      while ($row = $result->fetch_assoc()) {
        if ($_SESSION['word'] !== "") {
          if (strpos($row['body'], $_SESSION['word']) !== false) {
            $postId = $row['id'];
            $subject = $row['subject'];
            $body = $row['body'];
            $likes = $row['likes'];
            $username = $row['user_email'];

            echo '<div class="post">';



            echo '<h3>' . $username . '</h3>';
            echo '<h4>' . $subject . '</h4>';
            echo '<p>' . $body . '</p>';
            echo '<p>Likes: ' . $likes . '</p>';
          }
        } else {
          $postId = $row['id'];
          $subject = $row['subject'];
          $body = $row['body'];
          $likes = $row['likes'];
          $username = $row['user_email'];

          echo '<div class="post">';



          echo '<h3>' . $username . '</h3>';
          echo '<h4>' . $subject . '</h4>';
          echo '<p>' . $body . '</p>';
          echo '<p>Likes: ' . $likes . '</p>';
        }
        // Edit button
        // echo '<form action="edit_post.php" method="POST">';
        // echo '<input type="hidden" name="post_id" value="' . $postId . '">';
        // echo '<button type="submit" name="edit_submit" class="edit-button">Edit</button>';
        // echo '</form>';

        if ($username === $userEmail) {
          echo '<form action="edit_post.php" method="POST">';
          echo '<input type="hidden" name="post_id" value="' . $postId . '">';
          echo '<button type="submit" name="edit_submit" class="edit-button">Edit</button>';
          echo '</form>';
        }

        // Like button and form
        echo '<form method="POST" action="like_post.php">';
        echo '<input type="hidden" name="post_id" value="' . $postId . '">';
        echo '<button type="submit" name="like_submit" class="like-button">Like</button>';
        echo '</form>';


        // Delete button and form
        // echo '<form method="POST" onsubmit="return confirm(\'Are you sure you want to delete this post?\')">';
        // echo '<input type="hidden" name="post_id" value="' . $postId . '">';
        // echo '<button type="submit" name="delete_submit" class="delete-button">Delete</button>';
        // echo '</form>';

        // Display the delete button only for posts created by the logged-in user
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