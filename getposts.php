<?php

include("connection.php");

$getPostsQuery = "SELECT p.postId, p.category_id, p.title, p.post, p.date, u.userId, u.username, COUNT(r.replyId) AS numberOfReplies FROM post p LEFT JOIN user u ON p.userId = u.userId LEFT JOIN reply r ON p.postId = r.postId GROUP BY p.postId, p.category_id, p.title, p.post, p.date, u.userId, u.username ORDER BY p.postId DESC";
$result = mysqli_query($connection, $getPostsQuery);

$response = array();

if (mysqli_num_rows($result) > 0) {

    $response["posts"] = array();

    while ($row = mysqli_fetch_assoc($result)) {

        $post = array();

        $post["postId"] = $row["postId"];
        $post["category_id"] = $row["category_id"];
        $post["title"] = $row["title"];
        $post["post"] = $row["post"];
        $post["userId"] = $row["userId"];
        $post["username"] = $row["username"];
        $post["date"] = $row["date"];
        $post["numberOfReplies"] = $row["numberOfReplies"];

        array_push($response["posts"], $post);
    }

    echo json_encode($response);

} else {
    echo "error";
}

mysqli_close($connection);


?>