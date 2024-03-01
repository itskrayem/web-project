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
    <title>Binary Brains</title>
    <meta name= "viewport" content=" width-device-width, initial-scale-1.0">
    <link rel="stylesheet" href="assets/css/bubble.css">
    <link rel="stylesheet" href="assets/css/index.css">
    <link rel="stylesheet" href="assets/css/sidebar.css">
</head>


<body>

    
    <header>
        <h1 id="bubble-hover" ></h1>
        <ul>
            <!-- <li><a href="index.html" class="active">Home</a></li> -->
            <li><a href="login.php">Login</a></li>
            <li><a href="signup.php">Register</a></li>
        </ul>
        
    </header>


    <!-- parallax -->


    <section>
        <img src="assets/img/stars.png" id="stars">
        <img src="assets/img/layer 3.png" id="layer_3">
        <img src="assets/img/layer 2.png" id="layer_2">
        <img src="assets/img/laptop.png" id="laptop">
        <!-- <h2 id="text">hello world</h2> -->
        <img src="assets/img/layer 1.png" id="layer_1">  
        <a href="#sec" id="btn">Explore</a>
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
                <div class="grid-item"><img src="assets/img/yasser.png" alt="" ><h1>Dr. Yasser fadlallah</h1></div>
                <!-- <div class="grid-item"><img src="assets/img/ahmad.png" alt="" ><h1>Dr. Ahmad fadlallah</h1></div> -->
                <div class="grid-item"><img src="assets/img/mj.png" alt="" ><h1>Mohammad jawad</h1></div>
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
            <a href="#" class="social-media">instagram</a><br><br>
            <a href="#" class="social-media">linked-in</a>
            
        </div>

        <div class="footer-data"> 
            <a href="https://www.usal.edu.lb" target="_blank"><img src="assets/img/logo-usal.png"  style="width: 8%;position: absolute;right: 5%;margin-top: 6px;" ></a>
        </div>
        
    </div>

<div id="error"></div>
<script src="assets/js/login.js"></script>
 <script src="assets/js/main.js"></script>
 
</body>
</html>