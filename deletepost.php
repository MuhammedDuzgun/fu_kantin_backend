<?php

include("connection.php");

if($_POST) {
    $postId = $_POST["postId"];
}

$connection->autocommit(false);

$deleteRepliesQuery = "DELETE FROM Replies WHERE Replies.postId = '$postId' ";
$deletePostQuery = "DELETE FROM Posts WHERE Posts.postId = '$postId' ";

$resultDeleteReplies = mysqli_query($connection, $deleteRepliesQuery);
$resultDeletePost = mysqli_query($connection, $deletePostQuery);

if($resultDeleteReplies && $deletePostQuery) {
    $connection->commit();
    echo "deleted successfully";
} else {
    $connection->rollback();
    echo "error";
}

$connection->autocommit(true);

mysqli_close($connection);

?>