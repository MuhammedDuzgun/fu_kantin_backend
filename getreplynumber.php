<?php

include("connection.php");

if($_POST) {
    $postId = $_POST["postId"];
}

$_postId = (int) $postId;

$getReplyNumberQuery = "SELECT COUNT(replyId) FROM `PostReplies` WHERE postId = '$_postId' ";
$result = mysqli_query($connection, $getReplyNumberQuery);

if(mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $replyNumber = $row["COUNT(replyId)"];
    echo "$replyNumber";
} else {
    echo "error";
}

?>