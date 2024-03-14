<?php

include("connection.php");

if($_POST) {
    $postId = $_POST["postId"];
    $userId = $_POST["userId"];
    $reply = $_POST["reply"];
}

$_postId = mysqli_real_escape_string($connection, $postId);
$_userId = mysqli_real_escape_string($connection, $userId);
$_reply  = mysqli_real_escape_string($connection, $reply);

$_postId = (int) $_postId;
$_userId = (int) $_userId;

$currentDateTime = date('d.m.Y H:i');

$insertReplyQuery = "INSERT INTO `Replies` (`replyId`, `postId`, `userId`, `reply`, `date`) VALUES (NULL, '$_postId' , '$_userId', '$_reply', '$currentDateTime')";
$resultInsertReply = mysqli_query($connection, $insertReplyQuery);

if($resultInsertReply) {
    echo "reply inserted successfuly";
} else {
    echo "error";
}

mysqli_close($connection);

?>