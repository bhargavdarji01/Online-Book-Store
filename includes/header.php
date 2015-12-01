<div id="header">
		<?php 
		if(isset($_SESSION['user_info'])){
		?>
		<span class="welcome">Welcome <?php echo $_SESSION['user_info']['username']."!";?></span>
		<span class="logout"><a href="logout.php" title="Logout">Logout</a>
		<?php } 
		else {?>
		<form method="post" action="listing.php" name="login" class="login_form">
		<span class="user">Username: <input type="text" name="username" value="<?php echo $username; ?>"/></span>
		<span class="user">Passowrd: <input type="password" name="password" /></span>
		<span class="submit"><input type="submit" name="login" value="Login"/></span>
		</form>
		<a href="register.php" title="Register">Register</a>
		<?php } ?>
		<?php
		$cart_count = 0;
		if(isset($_SESSION['products']) && !empty($_SESSION['products']))
		{
			$cart_count = count($_SESSION['products']);
		}
		?>
		<a class="cart" href="cart.php"><img src="images/cart.png" title="Cart" /></a>
		(<span id="cart_item_number"><?php echo $cart_count ;?></span>)
</div>
		<div class="error">
		<p><?php echo $error['username']; ?></p>
		<p><?php echo $error['password']; ?></p>
		<p><?php echo $error['login']; ?></p>
		</div>