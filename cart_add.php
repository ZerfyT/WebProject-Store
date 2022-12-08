<?php
include 'includes/session.php';

// Add Item to Cart Table.
$isAddedMsg = "";
if (isset($_GET['add-to-cart'])) {
	if (isset($_SESSION['user'])) {
		$conn = $pdo->open();
		$item_id = $_GET['item_id'];
		$qty = $_GET['quantity'];

		$stmt = $conn->prepare("SELECT COUNT(*) AS numrows FROM cart WHERE `user_id`=:user_id AND `item_id`=:item_id");
		$stmt->execute(['user_id' => $_SESSION['user'], 'item_id' => $item_id]);
		$row = $stmt->fetch();
		if ($row['numrows'] < 1) {
			// New Item to Cart
			try {
				$stmt = $conn->prepare("INSERT INTO cart (user_id, item_id, quantity) VALUES (:user_id, :item_id, :qty)");
				$stmt->execute(['user_id' => $_SESSION['user'], 'item_id' => $item_id, 'qty' => $qty]);
				$isAddedMsg = 'Item added to cart';
				
				// die();
			} catch (PDOException $e) {
				$isAddedMsg = $e->getMessage();
			}
		} else {
			// Already Added
			$isAddedMsg = 'Product already in cart';
		}
		$pdo->close();
		// header('location: item.php?item_id='.$item_id);
		header('location: item.php?item_id='.$item_id.'&msg='.$isAddedMsg);
	}
}


// echo json_encode($output);
?>
