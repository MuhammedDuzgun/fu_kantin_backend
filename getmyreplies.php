<?php

include("connection.php");

if($_POST) {
    $userId = $_POST["userId"];
}

$getMyRepliesQuery = "SELECT r.replyId, u.username, r.reply, r.date FROM Replies r LEFT JOIN Users u ON r.userId =u.userId WHERE r.userId = '$userId' ORDER BY r.replyId DESC";

$result = mysqli_query($connection, $getMyRepliesQuery);

$response = array();

if(mysqli_num_rows($result) > 0) {

    $response["replies"] = array();

    while($row = mysqli_fetch_assoc($result)) {
        
        $reply = array();

        $reply["replyId"] = $row["replyId"];
        $reply["username"] = $row["username"];
        $reply["reply"] = $row["reply"];
        $reply["date"] = $row["date"];

        array_push($response["replies"], $reply);
    }

    print json_encode($response);

} else if (mysqli_num_rows($result) == 0) {
    echo "zero";
} else {
    echo "error";
}

mysqli_close($connection);

?>