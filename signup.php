<?php
require "connection.php";
session_start();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <meta name="viewport" content=" width-device-width, initial-scale-1.0">
    <link rel="stylesheet" href="assets/css/bubble.css">
    <link rel="stylesheet" href="assets/css/index.css">
    <link rel="stylesheet" href="assets/css/log.css">
</head>

<body>
    <header>
        <h1 id="bubble-hover"></h1>
        <ul>
            <li><a href="index.php" class="active">Home</a></li>
        </ul>
    </header>


    <div class="form-container">

        <form action="" method="post">
            <h3>register</h3>

            <input type="text" name="name" required placeholder="enter your name">
            <input type="email" name="email" required placeholder="enter your email">
            <input type="password" name="password" required placeholder="enter your password">
            <input type="password" name="cpassword" required placeholder="confirm your password">
            <input type="submit" name="submit" value="register now">
            <p>already have an account? <a href="login.php">login now</a></p>

        </form>


    </div>


    <section>
        <img src="assets/img/stars.png" id="stars">
        <img src="assets/img/layer 3.png" id="layer_3">
        <img src="assets/img/layer 2.png" id="layer_2">
        <img src="assets/img/layer 1.png" id="layer_1">
    </section>

    <?php
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $Em = $_POST['email'];
    $pass = $_POST['password'];
    $cpass = $_POST['cpassword'];

    if ($pass != $cpass) {
        $error = "Passwords do not match";
    }

    if (isset($error)) {
        echo $error;
        header('Location: http://localhost/deploy1/signup.php');
    } else {
        $Em = filter_var(htmlspecialchars($Em));
        $pass = filter_var(htmlspecialchars($pass));
        $pass = password_hash($pass, PASSWORD_DEFAULT);
        
        // Set default role to 'user'
        if ($Em == 'mma032@usal.edu.lb') {
            $role = 'admin';
        } else {
            $role = 'user';
        }
    

        $sql = "INSERT INTO users (name, email, password, role) VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssss", $name, $Em, $pass, $role);
        $stmt->execute();
        $result = $stmt->get_result();

        $_SESSION['email'] = $Em;
        $_SESSION['posts'] = 'all';
        $_SESSION["word"]="";
        header('Location: http://localhost/deploy1/home.php');
        die;
    }
}
?>

    
    
    <script src="assets/js/login.js">
    </script>
</body>

</html>