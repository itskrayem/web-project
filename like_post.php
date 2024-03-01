<?php
session_start();
require "connection.php";

if (isset($_POST['like_submit'])) {
    $postId = $_POST['post_id'];
    $userEmail = $_SESSION['email'];

    
    $sql = "SELECT * FROM likes WHERE user_email = ? AND post_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("si", $userEmail, $postId);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $sql = "DELETE FROM likes WHERE user_email = ? AND post_id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("si", $userEmail, $postId);
        $stmt->execute();

        $sql = "UPDATE posts SET likes = likes - 1 WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $postId);
        $stmt->execute();

        echo "<script>alert('Post unliked successfully!');</script>";
        header('Location: ./forum.php');
        exit;
    } else {

        $sql = "UPDATE posts SET likes = likes + 1 WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $postId);

        if ($stmt->execute()) {
           
            $sql = "INSERT INTO likes (user_email, post_id) VALUES (?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("si", $userEmail, $postId);
            $stmt->execute();

            echo "<script>alert('Post liked successfully!');</script>";
            header('Location: ./forum.php');
            exit;
        } else {
            echo "Error: " . $stmt->error;
        }
    }
}

$conn->close();


?>

