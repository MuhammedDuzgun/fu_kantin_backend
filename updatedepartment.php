<?php

include("connection.php");

if ($_POST) {
    $userId = $_POST["userId"];
    $department = $_POST["department"];
}

$updateDepartmentQuery = "UPDATE user_detail SET department = '$department' WHERE user_detail.userId = '$userId'";
$resultDepartment = mysqli_query($connection, $updateDepartmentQuery);

if ($resultDepartment) {
    echo "Department Updated Successfully";
} else {
    echo "error";
}

mysqli_close($connection);


?>