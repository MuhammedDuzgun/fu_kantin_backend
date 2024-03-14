<?php

include("connection.php");

if($_POST) {
    $username = $_POST["username"];
    $password = $_POST["password"];
}

$_password = md5($password);

$getUsersQuery = "SELECT * FROM Users WHERE username = '$username' AND  password = '$_password' ";

$result = mysqli_query($connection, $getUsersQuery);

$response = array();

if(mysqli_num_rows($result) > 0) {

    $response["users"] = array();

    while($row = mysqli_fetch_assoc($result)) {
        
        $user = array();

        $user["userId"] = $row["userId"];
        $user["username"] = $row["username"];
        $user["password"] = $row["password"];

        array_push($response["users"], $user);
    }

    print json_encode($response);

} else {
    echo "error";
}

mysqli_close($connection);

?>