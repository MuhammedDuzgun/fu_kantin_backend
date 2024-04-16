<?php

include("connection.php");

if ($_POST) {
    $userId = $_POST["userId"];
}

$connection->autocommit(false);

$deleteUserDetailQuery = "DELETE FROM user_detail WHERE user_detail.userId = '$userId' ";
$deleteRepliesQuery = "DELETE FROM reply WHERE reply.userId = '$userId' ";
$deletePostQuery = "DELETE FROM post WHERE post.userId = '$userId' ";
$deleteUserQuery = "DELETE FROM user WHERE user.userId = '$userId' ";

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