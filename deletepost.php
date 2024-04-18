<?php

include("connection.php");

if ($_POST) {
    $post_id = $_POST["postId"]; // Değişiklik: $postId -> $post_id
}

$connection->autocommit(false);

$deleteRepliesQuery = "DELETE FROM reply WHERE reply.post_id = '$post_id' "; // Değişiklik: postId -> post_id
$deletePostQuery = "DELETE FROM post WHERE post.post_id = '$post_id' "; // Değişiklik: postId -> post_id

$resultDeleteReplies = mysqli_query($connection, $deleteRepliesQuery);
$resultDeletePost = mysqli_query($connection, $deletePostQuery);

if ($resultDeleteReplies && $resultDeletePost) {
    $connection->commit();
    echo "deleted successfully";
} else {
    $connection->rollback();
    echo "error";
}

$connection->autocommit(true);

mysqli_close($connection);


?>