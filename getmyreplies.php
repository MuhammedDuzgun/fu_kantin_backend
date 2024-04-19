<?php

include("connection.php");

if ($_POST) {
    $userId = $_POST["userId"];
}

$getMyRepliesQuery = "SELECT r.reply_id, u.username, r.reply, r.date FROM reply r LEFT JOIN user u ON r.user_id = u.user_id WHERE r.user_id = '$userId' ORDER BY r.reply_id DESC";

$result = mysqli_query($connection, $getMyRepliesQuery);

$response = array();

if (mysqli_num_rows($result) > 0) {

    $response["replies"] = array();

    while ($row = mysqli_fetch_assoc($result)) {

        $reply = array();

        $reply["replyId"] = $row["reply_id"];
        $reply["username"] = $row["username"];
        $reply["reply"] = $row["reply"];
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