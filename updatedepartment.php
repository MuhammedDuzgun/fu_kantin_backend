<?php

include("connection.php");

if($_POST) {
    $userId = $_POST["userId"];
    $department = $_POST["department"];
}

$updateDepartmentQuery = "UPDATE UserDetails SET department = '$department' WHERE UserDetails.userId = '$userId' ";
$resultDepartment = mysqli_query($connection, $updateDepartmentQuery);

if($resultDepartment) {
    echo "Department Updated Successfuly";
} else {
    echo "error";
}

mysqli_close($connection);

?>