<?php
	include 'includes/conn.php';
	session_start();

	if(isset($_SESSION['admin'])){
		// header('location: admin/home.php');
	}

	if(isset($_SESSION['user'])){
		$conn = $pdo->open();

		$stmt = $conn->prepare("SELECT * FROM user WHERE user_id=:id");
		$stmt->execute(['id'=>$_SESSION['user']]);
		$user = $stmt->fetch();

		$pdo->close();
	}
