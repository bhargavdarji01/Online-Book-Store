 <?php
if(isset($_POST['cart_submit']) && !empty($_POST['cart_submit']))
{
	$similar_porduct = 0;
	
	if(isset($_SESSION['products']))
	{
	
		for($i=0;$i<count($_SESSION['products']);$i++)
		{
			if($_POST['product_id'] == $_SESSION['products'][$i]['product_id'])
			{
				$_SESSION['products'][$i]['quantity']++;
				$similar_porduct = 1;
			}
		
		}
		if($similar_porduct == 0)
		{			
	
		$count = count($_SESSION['products']);
		$_SESSION['products'][$count] = $_POST;
		$_SESSION['products'][$count]['quantity'] = 1;
				
		}

	
	}
	else
	{

	$_SESSION['products'][0]= $_POST;
	$_SESSION['products'][0]['quantity'] = 1;
	}
	
}
//echo "<pre>";
//print_r($_SESSION['products']);


?>