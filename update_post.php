<?php
session_start();
require "connection.php";

if (isset($_POST['update_submit'])) {
    $postId = $_POST['post_id'];
    $subject = $_POST['subject'];
    $body = $_POST['body'];

    $userEmail = $_SESSION['email'];

    // Check if the post belongs to the current user
    $sql = "SELECT * FROM posts WHERE id = ? AND user_email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("is", $postId, $userEmail);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Update the post in the database
        $updateSql = "UPDATE posts SET subject = ?, body = ? WHERE id = ?";
        $updateStmt = $conn->prepare($updateSql);
        $updateStmt->bind_param("ssi", $subject, $body, $postId);
        $updateStmt->execute();

        if ($updateStmt->affected_rows > 0) {
            // Post updated successfully
            echo '<script>';
            echo 'alert("Post updated successfully.");';
            echo 'window.location.href = "forum.php";'; // Redirect to the forum page or any other desired page
            echo '</script>';
        } else {
            // Failed to update the post
            echo '<script>';
            echo 'alert("Failed to update the post.");';
            echo 'window.location.href = "forum.php";'; // Redirect to the forum page or any other desired page
            echo '</script>';
        }
    } else {
        // User is not authorized to update this post
        echo '<script>';
        echo 'alert("You are not authorized to update this post.");';
        echo 'window.location.href = "forum.php";'; // Redirect to the forum page or any other desired page
        echo '</script>';
    }
}

$conn->close();
?>
