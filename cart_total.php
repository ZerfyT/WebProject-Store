<?php
	include 'includes/session.php';

	if(isset($_SESSION['user'])){
		$conn = $pdo->open();

		$stmt = $conn->prepare("SELECT * FROM `item` INNER JOIN `cart` ON `cart`.`item_id`=`item`.`item_id` WHERE  `cart`.`user_id`= :id");
		$stmt->execute(['id'=>$user['user_id']]);

		$total = 0;
		foreach($stmt as $row){
			$subtotal = $row['price'] * $row['quantity'];
			$total += $subtotal;
		}

		$pdo->close();

		echo json_encode($total);
	}
?>