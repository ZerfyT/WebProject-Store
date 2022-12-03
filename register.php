<?php
include 'includes/session.php';

if (isset($_POST['bt-signup'])) {
    $user_email = $_POST['user-email'];
    $user_passwd = $_POST['user-passwd'];
    $user_name = $_POST['user-name'];
    $user_tp = $_POST['user-tp'];
    $user_address = $_POST['user-address'];
    $repassword = $_POST['repassword'];

    $_SESSION['user-name'] = $user_name;
    $_SESSION['user-email'] = $user_email;
    $_SESSION['user-tp'] = $user_tp;
    $_SESSION['user-address'] = $user_address;

    if ($user_passwd != $repassword) {
        $_SESSION['error'] = 'Passwords did not match';
        header('location: signup.php');
    } else {
        $conn = $pdo->open();

        $stmt = $conn->prepare("SELECT COUNT(*) AS numrows FROM user WHERE email=:em");
        $stmt->execute(['em' => $user_email]);
        $row = $stmt->fetch();
        if ($row['numrows'] > 0) {
            $_SESSION['error'] = 'Email already taken';
            header('location: signup.php');
        } else {
            try {
                $stmt = $conn->prepare("INSERT INTO user (`full_name`, `email`, `password`, `tp_number`, `address`) VALUES (:fn, :em, :pw, :tp, :ad)");
                $stmt->execute(['fn' => $user_name, 'em' => $user_email, 'pw' => $user_passwd, 'tp' => $user_tp, 'ad' => $user_address]);
                $userid = $conn->lastInsertId();

                unset($_SESSION['user-name']);
                unset($_SESSION['user-email']);
                unset($_SESSION['user-tp']);
                unset($_SESSION['user-address']);

                $_SESSION['success'] = 'Account created. Please SignIn.';
                header('location: signin.php');
            } catch (Exception $e) {
                $_SESSION['error'] = 'Something Error: ' . $_SESSION['error'];
                header('location: signup.php');
            } catch (PDOException $e) {
                $_SESSION['error'] = $e->getMessage();
                header('location: register.php');
            }

            $pdo->close();
        }
    }
} else {
    $_SESSION['error'] = 'Fill up signup form first';
    header('location: signup.php');
}
