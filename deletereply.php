<?php

include("connection.php");

if ($_POST) {
    $replyId = $_POST["replyId"];
}

$connection->autocommit(false);

$deleteReplyQuery = "DELETE FROM reply WHERE reply.replyId = '$replyId' ";
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