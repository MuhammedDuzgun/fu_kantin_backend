<?php

include("connection.php");

if($_POST) {
    $userId = $_POST["userId"];
    $bio = $_POST["bio"];
}

$updateUserBioQuery = "UPDATE UserDetails SET biography = '$bio' WHERE UserDetails.userId = '$userId' ";
$resultBio = mysqli_query($connection, $updateUserBioQuery);

if($resultBio) {
    echo "Bio Updated Successfuly";
} else {
    echo "error";
}

mysqli_close($connection);

?>