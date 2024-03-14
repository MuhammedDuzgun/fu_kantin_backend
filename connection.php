<?php

$url = "gundemgaming.com";
$db_username = "gundemgaming_rootFuKantin";
$db_password = "Mm1.makina";
$database = "gundemgaming_fukantin";

$connection = mysqli_connect($url, $db_username, $db_password, $database); //Connected Successfuly

mysqli_set_charset($connection, "utf8");


?>