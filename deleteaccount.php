<?php

include("connection.php");

if ($_POST) {
    $user_id = $_POST["userId"]; // Değişiklik: $userId -> $user_id
}

$connection->autocommit(false);

$deleteUserDetailQuery = "DELETE FROM user_detail WHERE user_detail.user_id = '$user_id' "; // Değişiklik: userId -> user_id
$deleteRepliesQuery = "DELETE FROM reply WHERE reply.user_id = '$user_id' "; // Değişiklik: userId -> user_id
$deletePostQuery = "DELETE FROM post WHERE post.user_id = '$user_id' "; // Değişiklik: userId -> user_id
$deleteUserQuery = "DELETE FROM user WHERE user.user_id = '$user_id' "; // Değişiklik: userId -> user_id

$resultDeleteUserDetail = mysqli_query($connection, $deleteUserDetailQuery);
$resultDeleteReplies = mysqli_query($connection, $deleteRepliesQuery);
$resultDeletePost = mysqli_query($connection, $deletePostQuery);
$resultDeleteUser = mysqli_query($connection, $deleteUserQuery);

if ($resultDeleteUserDetail && $resultDeleteReplies && $resultDeletePost && $resultDeleteUser) {
    $connection->commit();
    echo "deleted successfully";
} else {
    $connection->rollback();
    echo "error";
}

$connection->autocommit(true);

mysqli_close($connection);



?>