<?php

include("connection.php");

if($_POST) {
    $userId = $_POST["userId"];
}

$_userId = (int) $userId;

$getMyPostsQuery = "SELECT p.postId, p.title, p.post, p.date, u.username, COUNT(r.replyId) AS numberOfReplies
FROM Posts p
LEFT JOIN Users u ON p.userId = u.userId
LEFT JOIN Replies r ON p.postId = r.postId
WHERE u.userId = '$_userId'
GROUP BY p.postId, p.title, p.post, p.date, u.username
ORDER BY p.postId DESC;
";

$result = mysqli_query($connection, $getMyPostsQuery);

$response = array();

if(mysqli_num_rows($result) > 0) {

    $response["posts"] = array();

    while($row = mysqli_fetch_assoc($result)) {
        
        $post = array();

        $post["postId"] = $row["postId"];
        $post["title"] = $row["title"];
        $post["post"] = $row["post"];
        $post["date"] = $row["date"];
        $post["username"] = $row["username"];
        $post["numberOfReplies"] = $row["numberOfReplies"];

        array_push($response["posts"], $post);
    }

    print json_encode($response);

} else if (mysqli_num_rows($result) == 0) {
    echo "zero";
} else {
    echo "error";
}

mysqli_close($connection);

?>  