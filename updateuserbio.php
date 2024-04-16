<?php

include("connection.php");

if ($_POST) {
    $userId = $_POST["userId"];
    $bio = $_POST["bio"];
}

$updateUserBioQuery = "UPDATE user_detail SET biography = '$bio' WHERE user_detail.userId = '$userId'";
$resultBio = mysqli_query($connection, $updateUserBioQuery);

if ($resultBio) {
    echo "Bio Updated Successfully";
} else {
    echo "error";
}

mysqli_close($connection);


?>