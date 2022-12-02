<?php
include 'includes/session.php';
$conn = $pdo->open();

if (isset($_POST['login'])) {

	$email = $_POST['user-email'];
	$password = $_POST['user-passwd'];

	try {
		$sql = "SELECT * FROM user WHERE email = :email";
		$stmt = $conn->prepare($sql);
		$stmt->execute(['email' => $email]);
		$rows = $stmt->rowCount();
		// $row = $stmt->fetch();
		if (!($rows < 1)) {
			if (hash_equals($password, $row['password'])) {
				if ($row['ac_type'] == 1) {
					$_SESSION['admin'] = $row['id'];
				} else {
					$_SESSION['user'] = $row['id'];
				}
			} else {
				$_SESSION['error'] = 'Incorrect Password';
			}
		} else {
			$_SESSION['error'] = 'Email not found';
		}
	} catch (PDOException $e) {
		echo "There is some problem in connection: " . $e->getMessage();
	}
} else {
	$_SESSION['error'] = 'Input login credentails first';
}

$pdo->close();

header('location: signin.php');

?>
