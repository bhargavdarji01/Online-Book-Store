<?php
	
		if(isset($_POST['dataString']))
		{	
			session_start();
			$sum = 0;
			$quantity_array = explode(",",$_POST['dataString']);
			for($i = 0; $i < count($_SESSION['products']);$i++)
			{
				if($quantity_array[0] == $_SESSION['products'][$i]['product_id'])
				{
					$_SESSION['products'][$i]['quantity'] = $quantity_array[1];
				}
			$sum += $_SESSION['products'][$i]['quantity'] * $_SESSION['products'][$i]['unit_price'];
			}
			$_SESSION['user_total'] = $sum;
			echo $sum;
		}
	
	
?>