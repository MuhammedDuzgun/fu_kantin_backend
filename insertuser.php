<?php

include("connection.php");

if ($_POST) {
    $username = $_POST["username"];
    $password = $_POST["password"];
}

$_username = mysqli_real_escape_string($connection, $username);
$_password = md5($password);

$response = array();
$response["user"] = array();

$insertUserQuery = "INSERT INTO `user` (`user_id`, `username`, `password`) VALUES (NULL, '$_username', '$_password')";
$result = mysqli_query($connection, $insertUserQuery);
$userId =  $connection->insert_id;

if ($result) {
    $insertUserDetailsQuery = "INSERT INTO `user_detail` (`user_detail_id`, `user_id`, `department`, `instagram_address`, `biography`) VALUES (NULL, '$userId', DEFAULT, DEFAULT, DEFAULT)";
    $resultInsertUserDetails = mysqli_query($connection, $insertUserDetailsQuery);
    $userDetailId = $connection->insert_id;
    if ($resultInsertUserDetails) {
        $user = array();
        $user["userId"] = $userId;
        $user["userDetailId"] = $userDetailId;
        array_push($response["user"], $user);
        print json_encode($response);
    } else {
        echo "error";
    }
} else {
    echo "error";
}

mysqli_close($connection);


?>