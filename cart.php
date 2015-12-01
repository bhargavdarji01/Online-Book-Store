 <?php
	session_start();
	include("includes/verify_login.php");
	include("includes/add_to_cart.php");
	
 ?>

 <html>
 <head>
 <title>Online Book Cart</title>
 <link href="css/style.css" rel="stylesheet" type="text/css" />
 <script src="JavaScript/jquery.js"></script>
	<script>		
	function updateQuantity(product_id,update_id)
	{
		
		var quantity = document.getElementById(update_id).value;
		var dataString = product_id+","+quantity;
		$.ajax({
			type:"POST",
			url:"http://localhost/onlineBook/ajax/update_quantity.php",
			data:{'dataString':dataString},
			success:function(result){
						document.getElementById("total_price").innerHTML = result;
						//alert(result);
				},
			error: function(xhr, status, error){
				//alert("Error: "+xhr.status + "-"+ error);
			}
				});
	}
	function removeCart(cart_number,remove_id)
	{
		//alert(cart_number+" "+remove_id);
		$.ajax({
			type:"POST",
			url:"http://localhost/onlineBook/ajax/remove_cart.php",
			data:{'cart_number':cart_number},
			success:function(result){
						$("."+remove_id).remove();
						var res = result.split("/");
						document.getElementById("total_price").innerHTML = res[0];
						document.getElementById("cart_item_number").innerHTML = res[1];		
						//alert(result);
				},
			error: function(xhr, status, error){
				//alert("Error: "+xhr.status + "-"+ error);
			}
				});
		
	}
	
	
	
	</script>
 </head>
	<body>
	<div class="wrapper">
				<?php include('includes/header.php'); ?>
				<?php include('includes/cart_listing.php'); ?>
			
	</div>
	</body> 
 </html>