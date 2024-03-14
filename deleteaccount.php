<?php

include("connection.php");

if($_POST) {
    $userId = $_POST["userId"];
}

$connection->autocommit(false);

$deleteUserDetailsQuery = "DELETE FROM UserDetails WHERE UserDetails.userId = '$userId' ";
$deleteRepliesQuery = "DELETE FROM Replies WHERE Replies.userId = '$userId' ";
$deletePostQuery = "DELETE FROM Posts WHERE Posts.userId = '$userId' ";
$deleteUserQuery = "DELETE FROM Users WHERE Users.userId = '$userId' ";

$resultDeleteUserDetails = mysqli_query($connection, $deleteUserDetailsQuery);
$resultDeleteReplies = mysqli_query($connection, $deleteRepliesQuery);
$resultDeletePost = mysqli_query($connection, $deletePostQuery);
$resultDeleteUser = mysqli_query($connection, $deleteUserQuery);

if($resultDeleteUserDetails && $resultDeleteReplies && $resultDeletePost && $resultDeleteUser) {
    $connection->commit();
    echo "deleted successfully";
} else {
    $connection->rollback();
    echo "error";
}

$connection->autocommit(true);

mysqli_close($connection);

?>