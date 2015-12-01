<?php
	if(isset($_POST['cart_number']))
		{	
			session_start();
			array_splice($_SESSION['products'],$_POST['cart_number'],1);
			
			$sum = 0;
			for($i = 0; $i < count($_SESSION['products']);$i++)
			{
			$sum += $_SESSION['products'][$i]['quantity'] * $_SESSION['products'][$i]['unit_price'];
			}
			$_SESSION['user_total'] = $sum;
			echo $sum."/".count($_SESSION['products']);
		}
?>