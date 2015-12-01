 <?php
	session_start();
	include("includes/verify_login.php");
 ?>
 <html>
 <head>
 <title>Online Book Store</title>
 <link href="css/style.css" rel="stylesheet" type="text/css" />
 <script src="JavaScript/jquery.js"></script>
 </head>
	<body>
	<div class="wrapper">
				<?php include('includes/header.php'); ?>
			<div class="listing">
				<?php include('includes/product_listing.php'); ?>
			</div>
	</div>
	</body> 
 </html>