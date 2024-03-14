<?php

include("connection.php");

if($_POST) {
    $userId = $_POST["userId"];
}

$_userId = (int) $userId;

$getMyProfileQuery = "SELECT u.userId, u.username, ud.userDetailId, ud.department, ud.instagramAddress, ud.biography FROM Users u LEFT JOIN UserDetails ud ON u.userId = ud.userId WHERE u.userId = '$_userId' ";
$result = mysqli_query($connection, $getMyProfileQuery);

$response = array();

if(mysqli_num_rows($result) > 0) {
    $response["users"] = array();

    while($row = mysqli_fetch_assoc($result)) {
        $user = array();

        $user["userId"] = $row["userId"];
        $user["username"] = $row["username"];
        $user["userDetailId"] = $row["userDetailId"];
        $user["department"] = $row["department"];
        $user["instagramAddress"] = $row["instagramAddress"];
        $user["biography"] = $row["biography"];

        array_push($response["users"], $user);
    }
    print json_encode($response);
} else {
    echo "error";
}

mysqli_close($connection);

?>