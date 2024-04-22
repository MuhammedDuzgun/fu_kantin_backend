<?php

include("connection.php");

if ($_POST) {
    $userId = $_POST["userId"];
    $instagram = $_POST["instagram"];
}

$updateInstagramQuery = "UPDATE user_detail SET instagram_address = '$instagram' WHERE user_detail.user_id = '$userId'";
$resultInstagram = mysqli_query($connection, $updateInstagramQuery);

if ($resultInstagram) {
    echo "Instagram Updated Successfully";
} else {
    echo "error";
}

mysqli_close($connection);


?>