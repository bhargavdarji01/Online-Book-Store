 <?php
	include('database.php');
	$table_product = "product";
	$sql_product = "select * from ".$table_product;
    $queryResult = @mysql_query($sql_product,$dbconnect);
	
		while($row = mysql_fetch_assoc($queryResult)){
 ?>

<div class="product_container">
	<div class="prod_img"><img src="http://localhost/onlineBook/images/<?php echo $row['image']?>" /></div>
	<div class="descr">
	<p><span>Title: </span><span><?php echo $row['title']; ?></span></p>
	<p><span>Author: </span><span><?php echo $row['author']; ?></span></p>
	<p><span>Year: </span><span>(<?php echo $row['year']; ?>)</span></p>
	<p><span>Price: </span><span>CDN$ <?php echo $row['unit_price']; ?></span></p>
	<form name="product" method="post" action="cart.php">
	<input type="hidden" name="product_id" value="<?php echo $row['product_id']; ?>" />
	<input type="hidden" name="title" value="<?php echo $row['title']; ?>" />
	<input type="hidden" name="author" value="<?php echo $row['author']; ?>" />
	<input type="hidden" name="year" value="<?php echo $row['year']; ?>" />
	<input type="hidden" name="unit_price" value="<?php echo $row['unit_price']; ?>" />
	<!-- <input type="hidden" name="qunatity" value="1" />-->
	<input type="submit" name="cart_submit" value="Add To Cart" />
	</form>
	</div>
</div>
<?php }
?>