<?php
include 'includes/conn.php';
session_start();

if (isset($_SESSION['admin'])) {
	// header('location: admin/home.php');
	$_SESSION['user-type'] = 1;
}

if (isset($_SESSION['user'])) {
	$conn = $pdo->open();
	try {
		$stmt = $conn->prepare("SELECT * FROM user WHERE user_id=:id");
		$stmt->execute(['id' => $_SESSION['user']]);
		$user = $stmt->fetch();
		$_SESSION['user-type'] = 0;
	} catch (PDOException $e) {
		echo "There is some problem in connection: " . $e->getMessage();
	}

	$pdo->close();
}
