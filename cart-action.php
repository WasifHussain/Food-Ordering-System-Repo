<?php
$conn=mysqli_connect('localhost','root','','db_projecti');
if(!empty($_GET["action"])) 
{
$productId = isset($_GET['id']) ? htmlspecialchars($_GET['id']) : '';
$quantity = isset($_POST['quantity']) ? htmlspecialchars($_POST['quantity']) : '';

switch($_GET["action"])
 {
	case "add":
		if(!empty($quantity)) {
			$stmt = $conn->prepare("SELECT * FROM items where itemID= ?");
			$stmt->bind_param('i',$productId);
			$stmt->execute();
			$productDetails = $stmt->get_result()->fetch_object();
           	$itemArray = array($productDetails->itemID=>array('itemname'=>$productDetails->itemname, 
           		'itemID'=>$productDetails->itemID, 'quantity'=>$quantity, 'price'=>$productDetails->price));
					if(!empty($_SESSION["cart"])) 
					{
						if(in_array($productDetails->itemID,array_keys($_SESSION["cart"]))) 
						{
							foreach($_SESSION["cart"] as $k => $v) 
							{
								if($productDetails->itemID == $k) 
								{
									if(empty($_SESSION["cart"][$k]["quantity"])) 
									{
									$_SESSION["cart"][$k]["quantity"] = 0;
									}
									$_SESSION["cart"][$k]["quantity"] += $quantity;
								}
							}
						}
						else 
						{
								$_SESSION["cart"] = $_SESSION["cart"] + $itemArray;
						}
					} 
					else 
					{
						$_SESSION["cart"] = $itemArray;
					}
			}
			break;
			
	case "remove":
		if(!empty($_SESSION["cart"]))
			{
				foreach($_SESSION["cart"] as $k => $v) 
				{
					if($productId == $v['itemID'])
						unset($_SESSION["cart"][$k]);
				}
			}
			break;
			
	case "empty":
			unset($_SESSION["cart"]);
			break;
			
	case "check":
			header("location:customer-dashboard.php");
			break;
	}
}
?>