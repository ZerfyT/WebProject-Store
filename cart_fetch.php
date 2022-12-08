<?php
	include 'includes/session.php';
	$conn = $pdo->open();

	$output = array('list'=>'','count'=>0);

	if(isset($_SESSION['user'])){
		try{
			$stmt = $conn->prepare("SELECT * FROM `item` INNER JOIN `cart` ON `cart`.`item_id`=`item`.`item_id` WHERE  `cart`.`user_id`= :id");
			$stmt->execute(['id'=>$user['user_id']]);
			foreach($stmt as $row){
				$output['count']++;
				$image = (!empty($row['pictures'])) ? 'uploads/'.$row['pictures'] : 'images/noimage.jpg';
				$title = (strlen($row['title']) > 30) ? substr_replace($row['title'], '...', 27) : $row['title'];
				$output['list'] .= 
					'<!-- Single item -->
					<div class="row">
						<div class="col-lg-3 col-md-12 mb-4 mb-lg-0">
							<!-- Image -->
							<div class="bg-image hover-overlay hover-zoom ripple rounded" data-mdb-ripple-color="light">
								<img src="'. $image .'" class="w-100" alt="" style="object-fit: fill; max-height: 150px;" />
								<a href="#">
									<div class="mask" style="background-color: rgba(251, 251, 251, 0.2)"></div>
								</a>
							</div>
							<!-- Image -->
						</div>
		
						<div class="col-lg-5 col-md-6 mb-4 mb-lg-0">
							<!-- Data -->
							<p><strong>' . $title . '</strong></p>
							<p>' . $row['description'] . '</p>
							<button type="button" class="btn btn-primary btn-sm me-1 mb-2 bt-delete" data-mdb-toggle="tooltip" data-id-item="' . $row['item_id'] .'" title="Remove item">
								<i class="fas fa-trash"></i>
							</button>
							<!-- Data -->
						</div>
		
						<div class="col-lg-4 col-md-6 mb-4 mb-lg-0">
							<!-- Quantity -->
							<div class="d-flex mb-4" style="max-width: 300px">
								<button class="btn btn-primary px-3 me-2 minus" data-id-item="' . $row['item_id'] .'">
									<i class="fas fa-minus"></i>
								</button>
		
								<div class="form-outline">
									<input id="qty_'. $row['item_id'] .'" min="0" name="quantity" value="' . $row['quantity'] . '" type="number" class="form-control" readonly />
									
								</div>
		
								<button class="btn btn-primary px-3 ms-2 add" data-id-item="' . $row['item_id'] .'">
									<i class="fas fa-plus"></i>
								</button>
							</div>
							<!-- Quantity -->
		
							<!-- Price -->
							<p class="text-start text-md-center">
								<strong>' . $row['price'] . '</strong>
							</p>
							<!-- Price -->
						</div>
					</div>
					<!-- Single item -->
					<hr class="my-4" />';
			}
		}
		catch(PDOException $e){
			$output['message'] = $e->getMessage();
		}
	}
	// else{
	// 	if(!isset($_SESSION['cart'])){
	// 		$_SESSION['cart'] = array();
	// 	}

	// 	if(empty($_SESSION['cart'])){
	// 		$output['count'] = 0;
	// 	}
	// 	else{
	// 		foreach($_SESSION['cart'] as $row){
	// 			$output['count']++;
	// 			$stmt = $conn->prepare("SELECT *, products.name AS prodname, category.name AS catname FROM products LEFT JOIN category ON category.id=products.category_id WHERE products.id=:id");
	// 			$stmt->execute(['id'=>$row['productid']]);
	// 			$product = $stmt->fetch();
	// 			$image = (!empty($product['photo'])) ? 'images/'.$product['photo'] : 'images/noimage.jpg';
	// 			$output['list'] .= "
	// 				<li>
	// 					<a href='product.php?product=".$product['slug']."'>
	// 						<div class='pull-left'>
	// 							<img src='".$image."' class='img-circle' alt='User Image'>
	// 						</div>
	// 						<h4>
	// 	                        <b>".$product['catname']."</b>
	// 	                        <small>&times; ".$row['quantity']."</small>
	// 	                    </h4>
	// 	                    <p>".$product['prodname']."</p>
	// 					</a>
	// 				</li>
	// 			";
				
	// 		}
	// 	}
	// }

	$pdo->close();
	echo json_encode($output);

?>

