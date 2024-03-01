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
    <title>Log in</title>
    <meta name="viewport" content=" width-device-width, initial-scale-1.0">
    <link rel="stylesheet" href="assets/css/index.css">
    <link rel="stylesheet" href="assets/css/bubble.css">
    <link rel="stylesheet" href="assets/css/log.css">
</head>

<body>
    <header>
        <!-- <a href="main.html"> -->
        <h1 id="bubble-hover" class="bu"></h1>
        <!-- </a> -->
        <ul>
            <li><a href="index.php" class="active">Home</a></li>
        </ul>

    </header>
    <div class="form-container">

        <form action="" method="POST">

            <h3>login</h3>
            <input type="email" name="email" id="username" required placeholder="enter your email">
            <input type="password" name="password" id="password" required placeholder="enter your password">
            <input type="submit" name="go" value="login now">


            <p>don't have an account? <a href="signup.php">register now</a></p>

        </form>

        <?php
        if (isset($_POST['go'])) {
            $email = $_POST['email'];
            $pass = $_POST['password'];
            $email  = filter_var(htmlspecialchars($email));
            $pass = filter_var(htmlspecialchars($pass));
            $sql = "SELECT * from users WHERE email=?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $result = $stmt->get_result();
            $user = $result->fetch_assoc();
            if (isset($user["email"])) {
                // header('Location: http://localhost/deploy1/home.php');
                // die;
                if (password_verify($pass, $user['password'])) {
                    $_SESSION['email'] = $email;
                    $_SESSION["word"]="";
                    header('Location: http://localhost/deploy1/home.php');
                    die;
                } else {
                    echo "<script>alert('incorrect password');</script>";
                    // header('Location: http://localhost/deploy1/login.php');
                    // die;
                }
            } else {
                echo "<script>alert('Account does not exist pleas sign up first');</script>";
            }
        }
        ?>

    </div>
    <section>
        <img src="assets/img/stars.png" id="stars">
        <img src="assets/img/layer 3.png" id="layer_3">
        <img src="assets/img/layer 2.png" id="layer_2">
        <img src="assets/img/layer 1.png" id="layer_1">
    </section>



    <footer>

    </footer>

    <script src="assets/js/login.js"></script>
    <script src="assets/js/main.js"></script>
</body>

</html>