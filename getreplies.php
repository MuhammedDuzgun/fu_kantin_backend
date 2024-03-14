<?php

include("connection.php");

if($_POST) {
    $postId = $_POST["postId"];
}

$_postId = (int) $postId;

$getRepliesQuery = "SELECT r.replyId, r.reply, r.postId, r.date, u.userId, u.username FROM Replies r LEFT JOIN Users u ON r.userId = u.userId WHERE r.postId = '$_postId' ORDER BY r.replyId ASC";
$result = mysqli_query($connection, $getRepliesQuery);

$response = array();

if(mysqli_num_rows($result) > 0) {
    $response["replies"] = array();

    while($row = mysqli_fetch_assoc($result)) {
        $reply = array();

        $reply["replyId"] = $row["replyId"];
        $reply["reply"] = $row["reply"];
        $reply["userId"] = $row["userId"];
        $reply["username"] = $row["username"];
        $reply["date"] = $row["date"];
 
        array_push($response["replies"], $reply);
    }
    print json_encode($response);
} else if(mysqli_num_rows($result) == 0) {
   echo "zero";
} else {
    echo "error";
}

mysqli_close($connection);

?>