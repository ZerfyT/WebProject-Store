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

            if(isset($_POST['bt-login'])){

                if(empty($_POST['user-email']) || empty($_POST['user-passwd'])){
                    die("ERROR: Email or Password is empty.");
                }
                $user_email = $_POST['user-email'];
                $user_passwd = $_POST['user-passwd'];

                $sql = "SELECT `password` FROM `user` WHERE `email` LIKE '$user_email'";
                $result = $conn->query($sql);
            
                if ($result->num_rows != 1) {
                    die('ERROR: Email did not match.');
                }

                $row = $result->fetch_assoc();
                $passwd = $row['password'];
                if(!hash_equals($user_passwd, $passwd)){
                    die('ERROR: Password did not match.');
                }
                echo "<p>Login Successful : $user_email , $user_passwd , $passwd </p>";
            }
        ?>
    </div>
</body>
</html>