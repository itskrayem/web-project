<?php
session_start();
require "connection.php";

if (isset($_POST['publish_submit'])) {
    $title = $_POST['title'];
    $body = $_POST['body'];

    // Process the cover photo upload
    $targetDirectory = "uploads/"; // Specify the directory where you want to store the uploaded files
    $coverPhotoName = $_FILES["cover_photo"]["name"];
    $coverPhotoTmpName = $_FILES["cover_photo"]["tmp_name"];
    $coverPhotoPath = $targetDirectory . $coverPhotoName;
    move_uploaded_file($coverPhotoTmpName, $coverPhotoPath);

    // Insert the news article into the database with the cover photo path
    $sql = "INSERT INTO news (title, body, cover_photo) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $title, $body, $coverPhotoPath);

    if ($stmt->execute()) {
        echo "<script>alert('Article successfully published!');</script>";
        header('Location: ./news.php');
        exit;
    } else {
        echo "Error: " . $stmt->error;
    }
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
    <link rel="stylesheet" href="assets/css/bubble.css">
    <link rel="stylesheet" href="assets/css/main.css">
    <link rel="stylesheet" href="assets/css/sidebar.css">
    <link rel="stylesheet" href="assets/css/add_post.css">

</head>


<body>

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

    <header>
        <h1 id="bubble-hover"></h1>
    </header>

    <div>
        <section class="forum-section">

            <img src="assets/img/stars.png" id="stars">
            <div class="poster">
            <form action="add_news.php" method="POST" enctype="multipart/form-data">
                    <h4>Title:</h4>

                    <input type="text" name="title" id="sub" rows="4" cols="50" required>
                    <br><br>
                    <h4>Body:</h4>
                    <textarea id="postbody" name="body" rows="4" cols="50" style="width: 100%" required></textarea>
                    <br>
                    <label style=" cursor: pointer; border-radius: 10px" for="file">

                        <br><br>

                        <input type="file" name="cover_photo" required>
                        <input type="submit" name="publish_submit" id="post" class="add-post" value="Publish">
                        <input type="submit" name="submit" id="cancel" class="add-post" value="Cancel">
                </form>

                
                    
                    
                   
                   
             


            </div>
        </section>
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
    <script src="assets/js/add_post.js"></script>
</body>

</html>