<?php
include('includes/verify_register.php');
?>
<html>
	<head>
	<title>Registration</title>
	<link href="css/style.css" rel="stylesheet" type="text/css" />
	</head>
	<div class="wrapper">
	<?php if ($display || $error_check == 1) {?>
		<div id="header">
		<span class="reg_fnt">Registration Form</span>
		<form method="post" action="register.php" name="register" class="register">
		<p>Username: <input type="text" name="username" value="<?php echo $username;?>" /></p>
		<div class="errors"><?php echo $error['username'];?></div>
		<p>Passowrd: <input type="password" name="password" /></p>
		<div class="errors"><?php echo $error['password'];?></div>
		<p>First Name: <input type="text" name="fname" value="<?php echo $fname;?>" /></p>
		<div class="errors"><?php echo $error['fname'];?></div>
		<p>Last Name: <input type="text" name="lname" value="<?php echo $lname;?>" /></p>
		<div class="errors"><?php echo $error['lname'];?></div>
		<p>Email: <input type="email" name="email" value="<?php echo $email;?>" ></p>
		<div class="errors"><?php echo $error['email'];?></div>
		<p>Address: <textarea name="address" value="<?php echo $address;?>" /></textarea></p>
		<div class="errors"><?php echo $error['address'];?></div>
		<div class="errors"><?php echo $error['register'];?></div>
		<p><input type="reset" name="reset" value="Reset"/><input type="submit" name="register" value="Register"/></p>
		</form>
		<span>Or If Already Registered Please <a href="listing.php">Click Here</a> to Login </span>
		</div>
	<?php }
		else 
		{
		echo $sccuess;
		}?>	
		
	</div>
</html>