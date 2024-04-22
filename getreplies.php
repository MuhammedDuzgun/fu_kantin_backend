<?php

include("connection.php");

if ($_POST) {
    $postId = $_POST["postId"];
}

$_postId = (int)$postId;

$getRepliesQuery = "SELECT r.reply_id, r.reply, r.post_id, r.date, u.user_id, u.username FROM reply r LEFT JOIN user u ON r.user_id = u.user_id WHERE r.post_id = '$_postId' ORDER BY r.reply_id ASC";
$result = mysqli_query($connection, $getRepliesQuery);

$response = array();

if (mysqli_num_rows($result) > 0) {
    $response["replies"] = array();

    while ($row = mysqli_fetch_assoc($result)) {
        $reply = array();

        $reply["replyId"] = $row["reply_id"];
        $reply["reply"] = $row["reply"];
        $reply["userId"] = $row["user_id"];
        $reply["username"] = $row["username"];
        $reply["date"] = $row["date"];

        array_push($response["replies"], $reply);
    }
    echo json_encode($response);
} else if (mysqli_num_rows($result) == 0) {
    echo "zero";
} else {
    echo "error";
}

mysqli_close($connection);


?>