<?php
include('database.php');
$table_reg = "user";
$table_login = "user_login";
$display = true;
$error_check = 0; 
$error = array("username" => "","password"=>"","fname"=>"","lname"=>"","address"=>"","email"=>"","register"=>"");
$registered = 0; $username = ""; $fname= ""; $lname = ""; $address = ""; $email = ""; 

if(isset($_POST['register']) && !empty($_POST['register']))
{
	if(isset($_POST['username']) && !empty($_POST['username']))
	{
		$username = $_POST['username'];
		$display = false;
		
	}
	else 
	{
		$error['username'] = "Please Enter User Name";
		$display = true;
		$error_check =1;
	}
	if(isset($_POST['password']) && !empty($_POST['password'])) 
	{
		$password = $_POST['password'];
		$display = false;
	}
	else
	{	
		$error['password'] = "Please Enter Password";
		$display = true;
		$error_check =1;
			
	}
	if(isset($_POST['fname']) && !empty($_POST['fname']))
	{
		$fname = $_POST['fname'];
		$display = false;
		
	}
	else 
	{
		$error['fname'] = "Please Enter First Name";
		$display = true;
		$error_check =1;
	}
	if(isset($_POST['lname']) && !empty($_POST['lname']))
	{
		$lname = $_POST['lname'];
		$display = false;
	}
	else 
	{
		$error['lname'] = "Please Enter Last Name";
		$display = true;
		$error_check =1;
	}
	if(isset($_POST['email']) && !empty($_POST['email']))
	{
		$email = $_POST['email'];
		$display = false;
	}
	else 
	{
		$error['email'] = "Please Enter Email";
		$display = true;
		$error_check =1;
	}
	if(isset($_POST['address']) && !empty($_POST['address']))
	{
		$address = $_POST['address'];
		$display = false;
	}
	else 
	{
		$error['address'] = "Please Enter Address";
		$display = true;
		$error_check =1;
	}
	
	if(!$display AND $error_check == 0)
	{

    $sql = "select count(*) from ".$table_reg." where email='".$email."'";
    $queryResult = @mysql_query($sql,$dbconnect);
        if($queryResult != FALSE)
        {
            $row = mysql_fetch_row($queryResult);
            if($row[0]>0)
                {
				$error['register'] = "Email Address entered ".$email." is already registered";
                ++$registered;
				$display = true;
                }
        }
		$sql_user = "select count(*) from ".$table_login." where user_name='".$username."'";
		$queryResult_user = @mysql_query($sql_user,$dbconnect);
        if($queryResult_user != FALSE)
        {
            $row_user = mysql_fetch_row($queryResult_user);
            if($row_user[0]>0)
                {
				$error['register'] .= "User Name ".$username." is already registered";
                ++$registered;
				$display = true;
                }
        }
		if($registered == 0 AND $display == false)
           {
	
            $sql_string = "insert into ".$table_reg." (first_name,last_name,address,email) values('$fname','$lname','$address','$email')";
			$query_result = @mysql_query($sql_string,$dbconnect);
            $clien_id = mysql_insert_id($dbconnect);
			$sql_string2 = "insert into ".$table_login." (user_id,user_name,password) values('$clien_id','$username','".md5($password)."')";
			$query_result2 = @mysql_query($sql_string2,$dbconnect);
            $sccuess = "<strong><p>Thank You ".$fname." ".$lname." For Registering with Us!</p></strong><p><a href='listing.php'>Click Here to View Books</a></p>";
			mysql_close();
			session_start();
			$_SESSION['user_info'] = array("user_id" =>  $clien_id,
											"first_name" => $fname,
											"last_name" => $lname,
											"address" => $address,
											"email" => $email,
											"username" => $username	
											);
            
           }
		
    
    }
	
	
}

?>
