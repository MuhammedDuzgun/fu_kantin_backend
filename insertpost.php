<?php

include("connection.php");

if($_POST) {
    $userId = $_POST["userId"];
    $categoryId = $_POST["categoryId"];
    $title = $_POST["title"];
    $post = $_POST["post"];
}

$_title = mysqli_real_escape_string($connection, $title);
$_post = mysqli_real_escape_string($connection, $post);
$_categoryId = (int) $categoryId;
$_userId = (int) $userId;

$currentDateTime = date('d.m.Y H:i');

$insertPostQuery = "INSERT INTO `Posts` (`postId`, `userId`, `categoryId`, `title`, `post`, `date`) VALUES (NULL, '$_userId', '$_categoryId', '$_title', '$_post', '$currentDateTime')";
$resultInsertPost = mysqli_query($connection, $insertPostQuery);

if($resultInsertPost) {
    echo "post inserted successfuly";
} else {
    echo "error";
}

mysqli_close($connection);

?>