<?php

$conn = mysqli_connect('localhost', 'root', 'root', 'db_fetchapi');
if ($conn->connect_error) {
    die("Connection Error" . $conn->connect_error);
} else {

    $sql = "SELECT * FROM users";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $output = $result->fetch_all(MYSQLI_ASSOC);
        echo json_encode($output);
    } else {
        echo json_encode(['status' => 'error', 'message' => mysqli_error($conn)]);
    }

    mysqli_close($conn);

}