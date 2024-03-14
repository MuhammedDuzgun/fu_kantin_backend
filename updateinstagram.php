<?php

include("connection.php");

if($_POST) {
    $userId = $_POST["userId"];
    $instagram = $_POST["instagram"];
}

$updateInstagramQuery = "UPDATE UserDetails SET instagramAddress = '$instagram' WHERE UserDetails.userId = '$userId' ";
$resultInstagram = mysqli_query($connection, $updateInstagramQuery);

if($resultInstagram) {
    echo "Instagram Updated Successfuly";
} else {
    echo "error";
}

mysqli_close($connection);

?>