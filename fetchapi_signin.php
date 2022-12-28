<?php

$conn = mysqli_connect('localhost', 'root', '', 'db_fetchapi');
if (!$conn) {
    die("Connection Error" . mysqli_connect_error());
} else {
    $uname = $_POST['username'];
    $pass = $_POST['password'];

    $sql = "INSERT INTO users(username, password) VALUES('$uname', '$pass')";

    if (mysqli_query($conn, $sql)) {
        echo json_encode(['status' => 'success']);
    } else {
        echo json_encode(['status' => 'error', 'message' => mysqli_error($conn)]);
    }

    mysqli_close($conn);

}



?>