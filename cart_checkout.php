<?php

include 'includes/session.php';

// if(isset($_POST['cart-checkout'])) {

    // var_dump($_POST['cart-checkout'])
    $conn = $pdo->open();
    $userId = $_SESSION['user'];

    try {
        $stmt = $conn->prepare("SELECT * FROM `cart` INNER JOIN `item` ON `cart`.`item_id`=`item`.`item_id` WHERE `cart`.`user_id`= :id");
        $stmt->execute(['id'=>$userId]);
        foreach($stmt as $row){
            $currentStock = $row['avail_stock'] - $row['quantity'];
            $stmtUpdateItem = $conn->prepare("UPDATE `item` SET `avail_stock`=:qty WHERE `item_id`=:item_id");
            $stmtUpdateItem->execute(['qty'=>$currentStock, 'item_id'=>$row['item_id']]);

            $stmtDelete = $conn->prepare("DELETE FROM `cart` WHERE item_id=:item_id");
            $stmtDelete->execute(['item_id'=>$row['item_id']]);
        }

        
        header('location: cart.php');
    }
    catch(PDOException $e) {
        echo $e->getMessage();
    }
    $pdo->close();
// }
?>