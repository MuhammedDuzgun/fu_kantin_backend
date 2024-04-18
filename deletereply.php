<?php

include("connection.php");

if ($_POST) {
    $reply_id = $_POST["replyId"]; // Değişiklik: $replyId -> $reply_id
}

$connection->autocommit(false);

$deleteReplyQuery = "DELETE FROM reply WHERE reply.reply_id = '$reply_id' "; // Değişiklik: replyId -> reply_id
$resultDeleteReply = mysqli_query($connection, $deleteReplyQuery);

if ($resultDeleteReply) {
    $connection->commit();
    echo "deleted successfully";
} else {
    $connection->rollback();
    echo "error";
}

$connection->autocommit(true);

mysqli_close($connection);



?>