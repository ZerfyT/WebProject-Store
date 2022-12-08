<?php
	include 'includes/session.php';

	$conn = $pdo->open();

	$output = array('error'=>false);
	
	if(isset($_SESSION['user'])){
		$id_item = $_POST['id_item'];
		$id_user = $_SESSION['user'];

		try{
			$stmt = $conn->prepare("DELETE FROM cart WHERE `user_id`=:id_user AND `item_id`=:id_item");
			$result = $stmt->execute(['id_user'=>$id_user, 'id_item' => $id_item]);
			if($result == TRUE){
				$output['message'] = 'Deleted';
			}
			$output['message'] = 'Cannot find this item.';
		}
		catch(PDOException $e){
			$output['message'] = $e->getMessage();
		}
	}
	else{
		// foreach($_SESSION['cart'] as $key => $row){
		// 	if($row['productid'] == $id){
		// 		unset($_SESSION['cart'][$key]);
		// 		$output['message'] = 'Deleted';
		// 	}
		// }
	}

	$pdo->close();
	echo json_encode($output);

?>