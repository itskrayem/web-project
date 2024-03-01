<?php
session_start();
require "connection.php";

if (isset($_POST['delete_submit'])) {
    $postId = $_POST['post_id'];
    $userEmail = $_SESSION['email'];

    // Check if the post belongs to the current user
    $sql = "SELECT * FROM posts WHERE id = ? AND user_email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("is", $postId, $userEmail);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Delete the post from the database
        $deleteSql = "DELETE FROM posts WHERE id = ?";
        $deleteStmt = $conn->prepare($deleteSql);
        $deleteStmt->bind_param("i", $postId);
        $deleteStmt->execute();

        if ($deleteStmt->affected_rows > 0) {
            // Post deleted successfully
            echo '<script>';
            echo 'alert("Post deleted successfully.");';
            echo 'window.location.href = "forum.php";'; // Redirect to the forum page or any other desired page
            echo '</script>';
        } else {
            // Failed to delete the post
            echo '<script>';
            echo 'alert("Failed to delete the post.");';
            echo 'window.location.href = "forum.php";'; // Redirect to the forum page or any other desired page
            echo '</script>';
        }
    } else {
        // User is not authorized to delete this post
        echo '<script>';
        echo 'alert("You are not authorized to delete this post.");';
        echo 'window.location.href = "forum.php";'; // Redirect to the forum page or any other desired page
        echo '</script>';
    }
}

$conn->close();
?>
