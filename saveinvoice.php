<?php
include("config.php");
if(!empty($_POST))
{
if(!isset($_POST['discountrate']) || $_POST['discountrate']=="") $discountrate=0.00;else $discountrate=$_POST['discountrate'];
 $sql="INSERT INTO `orders`(`customerName`, `customerAddress`, `totalTax`, `subtotalWithoutTax`, `subtotalWithTax`, `discountType`, `discount`, `totalAmount`) VALUES ('".$_POST['customerName']."','".$_POST['address']."','".$_POST['taxRate']."','".$_POST['subTotal']."','".$_POST['taxAmount']."','".$_POST['discount']."','".$discountrate."','".$_POST['totalAmount']."')";
	           $result = mysqli_query($db, $sql);
			   //$id =mysqli_insert_id($db, $sql);
				if(isset($result))
				{
					for ($i = 0; $i < count($_POST['name']); $i++) {
			 $sqlInsertItem = "INSERT INTO `order_items`(`idOrder`, `itemName`, `itemQuantity`, `itemPrice`, `tax`, `totalAmount`) VALUES ('".$result."','".$_POST['name'][$i]."','".$_POST['qnty'][$i]."','".$_POST['prce'][$i]."','".$_POST['tx'][$i]."','".$_POST['totamnt'][$i]."')";			
			mysqli_query($db, $sqlInsertItem);
			
		}   
				header("location:viewinvoice.php?inv=$result");	
				}
				
}
else
{
header("location:addinvoice.php");	
}
?>
