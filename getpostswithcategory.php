<?php

include("connection.php");

if ($_POST) {
    $category_id = $_POST["categoryId"];
}

$getPostsQuery = "SELECT p.post_id, p.category_id, p.title, p.post, p.date, u.user_id, u.username, COUNT(r.reply_id) AS numberOfReplies FROM post p LEFT JOIN user u ON p.user_id = u.user_id LEFT JOIN reply r ON p.post_id = r.post_id WHERE p.category_id = '$category_id' GROUP BY p.post_id, p.category_id, p.title, p.post, p.date, u.user_id, u.username ORDER BY p.post_id DESC";
$result = mysqli_query($connection, $getPostsQuery);

$response = array();

if (mysqli_num_rows($result) > 0) {

    $response["posts"] = array();

    while ($row = mysqli_fetch_assoc($result)) {

        $post = array();

        $post["postId"] = $row["post_id"];
        $post["categoryId"] = $row["category_id"];
        $post["title"] = $row["title"];
        $post["post"] = $row["post"];
        $post["userId"] = $row["user_id"];
        $post["username"] = $row["username"];
        $post["date"] = $row["date"];
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