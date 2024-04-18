<?php

include("connection.php");

if ($_POST) {
    $user_id = $_POST["userId"];
}

$_userId = (int)$user_id;

$getMyProfileQuery = "SELECT u.user_id, u.username, ud.user_detail_id, ud.department, ud.instagram_address, ud.biography FROM user u LEFT JOIN user_detail ud ON u.user_id = ud.user_id WHERE u.user_id = '$_userId' ";
$result = mysqli_query($connection, $getMyProfileQuery);

$response = array();

if (mysqli_num_rows($result) > 0) {
    $response["users"] = array();

    while ($row = mysqli_fetch_assoc($result)) {
        $user = array();

        $user["userId"] = $row["user_id"];
        $user["username"] = $row["username"];
        $user["userDetailId"] = $row["user_detail_id"];
        $user["department"] = $row["department"];
        $user["instagramAddress"] = $row["instagram_address"];
        $user["biography"] = $row["biography"];

        array_push($response["users"], $user);
    }
    echo json_encode($response);
} else {
    echo "error";
}

mysqli_close($connection);


?>