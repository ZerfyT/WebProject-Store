<?php
	include 'includes/session.php';

	$conn = $pdo->open();

	$output = array('error'=>false);
	
	if(isset($_SESSION['user'])){
		$id_item = $_POST['id_item'];
		$id_user = $_SESSION['user'];
		$qty = $_POST['qty'];

		try{
			$stmt = $conn->prepare("UPDATE cart SET `quantity`=:qty WHERE `user_id`=:id_user AND `item_id`=:id_item");
			$stmt->execute(['qty'=>$qty, 'id_user'=>$id_user, 'id_item'=>$id_item]);
			$output['message'] = 'Updated';
		}
		catch(PDOException $e){
			$output['message'] = $e->getMessage();
		}
	}
	// else{
	// 	foreach($_SESSION['cart'] as $key => $row){
	// 		if($row['productid'] == $id){
	// 			$_SESSION['cart'][$key]['quantity'] = $qty;
	// 			$output['message'] = 'Updated';
	// 		}
	// 	}
	// }

	$pdo->close();
	echo json_encode($output);

?>