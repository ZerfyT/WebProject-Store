<?php
	include_once 'includes/session.php';

	$id = $_POST['id'];

	// $conn = $pdo->open();

	$output = array('list'=>'');

	$stmt = $conn->prepare("SELECT * FROM `order_details` LEFT JOIN `item` ON `order_details`.`item_id`=`item`.`item_id` WHERE `order_details`.`order_id`=:id");
	$stmt->execute(['id'=>$id]);

	$total = 0;
	foreach($stmt as $row){
		$output['title'] = $row['title'];
		$output['description'] = $row['description'];
		$output['price'] = $row['price'];
		$output['quantity'] = $row['quantity'];
		// $output['date'] = date('M d, Y', strtotime($row['sales_date']));
		$subtotal = $row['price']*$row['quantity'];
		$total += $subtotal;
		$output['list'] .= "
			<tr class='prepend_items'>
				<td>".$row['title']."</td>
				<td>".$row['description']."</td>
				<td>LKR ".number_format($row['price'], 2)."</td>
				<td>".$row['quantity']."</td>
				<td>LKR ".number_format($subtotal, 2)."</td>
			</tr>
		";
	}
	
	$output['total'] = '<b>LKR '.number_format($total, 2).'<b>';
	// $pdo->close();
	echo json_encode($output);
