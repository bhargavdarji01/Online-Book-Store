<?php
include('database.php');
$table_reg = "user";
$table_login = "user_login";
$table_order = "Orders";
$table_invoice = "invoice";
$display = true;
$error_check =0;
$error = array("fname"=>"","lname"=>"","address"=>"","checkout"=>"","card"=>"");
$payment = 0;  $fname= ""; $lname = ""; $address = ""; $card = ""; 

if(isset($_POST['checkout']) && !empty($_POST['checkout']))
{
	
	if(isset($_POST['fname']) && !empty($_POST['fname']))
	{
		$fname = $_POST['fname'];
		$display = false;		
	}
	else 
	{
		$error['fname'] = "Please Enter First Name";
		$error_check = 1;
		$display = true;
			
	}
	if(isset($_POST['lname']) && !empty($_POST['lname']))
	{
		$lname = $_POST['lname'];
		$display = false;		
	}
	else 
	{
		$error['lname'] = "Please Enter Last Name";
		$error_check = 1;
		$display = true;
			
	}
	if(isset($_POST['card']) && !empty($_POST['card']))
	{
		
		$card = $_POST['card'];
		if(strlen($card) < 16)
		{

			$error['card'] = "Please a Valid Card Number";
			$error_check = 1;
			$display = true;
			
		}
		else
		{
			$payment = 1;
			$display = false;
			
		}
	
	}
	else 
	{
		$error['card'] = "Please Enter Credit Card Number";
		$error_check = 1;
		$display = true;
		
	}
	if(isset($_POST['address']) && !empty($_POST['address']))
	{
		$address = $_POST['address'];
		$display = false;
		
	}
	else 
	{
		$error['address'] = "Please Enter Address";
		$error_check = 1;
		$display = true;
			
	}

			
	if($error_check == 0)
	{	

	
		$user_id = $_SESSION['user_info']['user_id'];
		$total = $_SESSION['user_total'];
	
	
	for($i = 0; $i<count($_SESSION['products']); $i++)
	{
		$product_id = $_SESSION['products'][$i]['product_id'];
		$quantity  = $_SESSION['products'][$i]['quantity'];
		
		$sql = "insert into ".$table_order." (user_id,product_id,quantity,date) values(".$user_id.",".$product_id.",".$quantity.",'".date('Y-m-d H:i:s')."')";
		$queryResult = @mysql_query($sql,$dbconnect);
		
	}
	
	if($queryResult!= FALSE)
	{

		$sql_invoice = "insert into ".$table_invoice." (user_id,total,payment,date) values(".$user_id.",".$total.",".$payment.",'".date('Y-m-d H:i:s')."')";
			
		$queryResult = @mysql_query($sql_invoice,$dbconnect);
		if($queryResult != FALSE)
		{	
			unset($_SESSION['products']);
			unset($_SESSION['user_total']);
			$success_payment = "Payment Received. Your Books will be Delivered within 2 Business Days. Thank You for Shopping with Us.<br/><a href='listing.php'> Click Here to Shop More.</a>";
		}
	}
    
    }
	
	
}

?>
