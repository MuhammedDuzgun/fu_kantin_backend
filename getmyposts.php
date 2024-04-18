<?php

include("connection.php");

if ($_POST) {
    $user_id = $_POST["userId"];
}

$_user_id = (int)$user_id;

$getMyPostsQuery = "SELECT p.post_id, p.title, p.post, p.date, u.username, COUNT(r.reply_id) AS numberOfReplies
FROM post p
LEFT JOIN user u ON p.user_id = u.user_id
LEFT JOIN reply r ON p.post_id = r.post_id
WHERE u.user_id = '$_user_id'
GROUP BY p.post_id, p.title, p.post, p.date, u.username
ORDER BY p.post_id DESC";

$result = mysqli_query($connection, $getMyPostsQuery);

$response = array();

if (mysqli_num_rows($result) > 0) {
    $response["posts"] = array();

    while ($row = mysqli_fetch_assoc($result)) {

        $post = array();

        $post["postId"] = $row["post_id"];
        $post["title"] = $row["title"];
        $post["post"] = $row["post"];
        $post["date"] = $row["date"];
        $post["username"] = $row["username"];
        $post["numberOfReplies"] = $row["numberOfReplies"];

        array_push($response["posts"], $post);
    }

    echo json_encode($response);

} else if (mysqli_num_rows($result) == 0) {
    echo "zero";
} else {
    echo "error";
}

mysqli_close($connection);



?>  