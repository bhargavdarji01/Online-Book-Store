
<span id="cart_title">Your Book Shopping Cart</span>

	<?php
	 if(isset($_SESSION['products']) && !empty($_SESSION['products']))
 {
	$total_amount = 0;	
	for($i = 0; $i<count($_SESSION['products']); $i++){
	$product_id = $_SESSION['products'][$i]['product_id'];	?>
	<div class="cart<?php echo $i;?>" id="cart_container">
	<p><span><strong>Title:</strong><?php echo $_SESSION['products'][$i]['title'];?></span></p>
	<p><span><strong>Author:</strong><?php echo $_SESSION['products'][$i]['author'];?></span></p>
	<span><strong>Year:</strong><?php echo $_SESSION['products'][$i]['year'];?></span>    <span><strong>Quantity:</strong><input type="text" name="quantity" class="quantity_input" id="quantity<?php echo $i;?>" value="<?php echo $_SESSION['products'][$i]['quantity'];?>"/> </span>
	<input type="button" name="update" id="update" value="Update" onClick="updateQuantity(<?php echo $product_id;?>,'quantity<?php echo $i;?>'); "/>
	<input type="button" name="remove_item" id="remove" value="Remove Item" onClick="removeCart(<?php echo $i;?>,'cart<?php echo $i;?>'); "/>
	<p><span><strong>Price:$ </strong><?php echo $_SESSION['products'][$i]['unit_price'];?></span></p>
	</div>

<?php 
	$total_amount += $_SESSION['products'][$i]['quantity']*$_SESSION['products'][$i]['unit_price'];
	$_SESSION['user_total']= $total_amount;
} ?>
<div class="price">
<span>Total Price: $ <span id="total_price"><?php echo $total_amount; ?></span></span> 
<a href="listing.php" title="Continue Shopping"><input type="button" value="Continue Shopping" /></a>
<a href="checkout.php" title="Check Out"><input type="button" value="Check Out" /></a>  

</div>
<?php }
else {
	echo "<p>There are no Items in Cart. Please Add Items from <a href='listing.php'>Books Listing</a></p>";
} ?>

