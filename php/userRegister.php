<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Result</title>
    <!-- <link rel="stylesheet" href="../css/styles.css"> -->

    <style>
        /* body{
    background-color: rgb(36, 37, 42);
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    height: 100vh;
} */
    </style>
</head>
<body>
    <div>
        <?php
            require 'connection.php';

            if(isset($_POST['bt-register'])){

                if(empty($_POST['user-email']) || 
                    empty($_POST['user-passwd']) || 
                    empty($_POST['user-name']) ||
                    empty($_POST['user-tp']) ||
                    empty($_POST['user-address'])){
                    die("ERROR: Please fill all details.");
                }
                $user_email = $_POST['user-email'];
                $user_passwd = $_POST['user-passwd'];
                $user_name = $_POST['user-name'];
                $user_tp = $_POST['user-tp'];
                $user_address = $_POST['user-address'];

                $sql = "INSERT INTO `user`(`full_name`, `email`, `password`, `tp_number`, `address`) VALUES('$user_name', '$user_email', '$user_passwd', '$user_tp', '$user_address')";
               
                if ($conn->query($sql) === FALSE) {
                    die("Error: " . $sql . "<br>" . $conn->error);
                }
                echo "<p>New record created successfully</p>";
            }
        ?>
    </div>
</body>
</html>