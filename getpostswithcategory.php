<?php

include("connection.php");

if($_POST) {
    $categoryId = $_POST["categoryId"];
}

$getPostsQuery = "SELECT p.postId, p.categoryId, p.title, p.post, p.date, u.userId, u.username, COUNT(r.replyId) AS numberOfReplies FROM Posts p LEFT JOIN Users u ON p.userId = u.userId LEFT JOIN Replies r ON p.postId = r.postId WHERE p.categoryId = '$categoryId' GROUP BY p.postId, p.categoryId, p.title, p.post, p.date, u.userId, u.username ORDER BY p.postId DESC";
$result = mysqli_query($connection, $getPostsQuery);

$response = array();

if(mysqli_num_rows($result) > 0) {

    $response["posts"] = array();

    while($row = mysqli_fetch_assoc($result)) {
        
        $post = array();

        $post["postId"] = $row["postId"];
        $post["categoryId"] = $row["categoryId"];
        $post["title"] = $row["title"];
        $post["post"] = $row["post"];
        $post["userId"] = $row["userId"];
        $post["username"] = $row["username"];
        $post["date"] = $row["date"];
        $post["numberOfReplies"] = $row["numberOfReplies"];

        array_push($response["posts"], $post);
    }

    print json_encode($response);

} else if(mysqli_num_rows($result) == 0) {
    echo "zero";
} else {
    echo "error";
}

mysqli_close($connection);

?>