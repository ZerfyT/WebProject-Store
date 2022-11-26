<?php

$host = "localhost";
$user = "root";
$passwd = "";
$db = "web_project_store";

$conn = mysqli_connect($host, $user, $passwd, $db);

if($conn -> connect_error){
    die("Error: Failed to connect to database. " . $conn -> connect_error);
}

?>