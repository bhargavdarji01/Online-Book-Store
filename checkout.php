 <?php
	session_start();
	if(!isset($_SESSION['user_info']))
	{ ?>
		<script>
			alert("Please Register");
			window.location = 'http://localhost/onlineBook/register.php';
		</script>
	<?php	
	
	}
	else
	{
		include('includes/verify_checkout.php');
	}
 ?>
 <html>
 <head>
 <title>Online Book Checkout</title>
 <link href="css/style.css" rel="stylesheet" type="text/css" />
 <script src="JavaScript/jquery.js"></script>
 </head>
	<body>
	<div class="wrapper">
		<div id="header">
		<span class="welcome">Welcome <?php echo $_SESSION['user_info']['username']."!";?></span>
		<span class="logout"><a href="logout.php" title="Logout">Logout</a>
		</div>
		
		<?php 
		//echo '<pre>';
		//print_r($_SESSION);?>
		<?php if ($error_check == 1 || $display) {?>
		
		<span class="reg_fnt">Shipping Details:</span>
	<form method="post" action="checkout.php" name="checkout" class="checkout">
		<p>First Name: <input type="text" name="fname" value="<?php echo $_SESSION['user_info']['first_name'];?>" /></p>
		<div class="errors"><?php echo $error['fname'];?></div>
		<p>Last Name: <input type="text" name="lname" value="<?php echo $_SESSION['user_info']['last_name'];?>" /></p>
		<div class="errors"><?php echo $error['lname'];?></div>
		<p>Address: <textarea name="address"/><?php echo $_SESSION['user_info']['address'];?></textarea></p>
		<div class="errors"><?php echo $error['address'];?></div>
		<p>Total: <?php echo $_SESSION['user_total'];?></p>
		<p>Credit Card Number: <input type="text" name="card" value="<?php echo $card; ?>" /></p>
		<div class="errors"><?php echo $error['card'];?></div>
		<p><input type="submit" name="checkout" value="Make Payment"/></p>
		</form>
		<?php } 
		else 
		{
		echo $success_payment;
		}
		?>		
			
	</div>
	</body> 
 </html>