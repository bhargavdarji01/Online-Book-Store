<?php
include('database.php');
$table_reg = "user";
$table_login = "user_login";
$display = true;
$check_error = 0;
$error = array("username" => "","password"=>"","login"=>"");
$login = 0; $username = ""; 

if(isset($_POST['login']) && !empty($_POST['login']))
{
	if(isset($_POST['username']) && !empty($_POST['username']))
	{
		$username = $_POST['username'];
		$display = false;
	}
	else 
	{
		$error['username'] = "* Please Enter User Name";
		$display = true;
	}
	if(isset($_POST['password']) && !empty($_POST['password'])) 
	{
		$password = $_POST['password'];
		$display = false;
	}
	else
	{	
		$error['password'] = "* Please Enter Password";
		$display = true;
			
	}
	if(!$display)
	{
    $sql = "select count(*) from ".$table_login." where user_name='".$username."' AND password='".md5($password)."'";
    $queryResult = @mysql_query($sql,$dbconnect);
        if($queryResult != FALSE)
        {
			//echo md5($password);
			//exit;
			$row = mysql_fetch_row($queryResult);
            if($row[0]>0)
                {	
				
					$login = 1;
					$sql_user_id = "select user_id from ".$table_login." where  user_name='".$username."'";
					$user_query_result = @mysql_query($sql_user_id,$dbconnect);
					$user_id_array = mysql_fetch_assoc($user_query_result);
					$user_id = $user_id_array["user_id"];
					
					$sql_user_info = "select * from ".$table_reg." where  id=".$user_id;
					$user_info_query_result = @mysql_query($sql_user_info,$dbconnect);
					$user_info_array = mysql_fetch_assoc($user_info_query_result);
					
					$_SESSION['user_info'] = array("user_id" =>  $user_info_array["Id"],
											"first_name" => $user_info_array["first_name"],
											"last_name" => $user_info_array["last_name"],
											"address" => $user_info_array["address"],
											"email" => $user_info_array["email"],
											"username" => $username
											);
				
                }
				else
				{
				$error['login'] = "* Username and Password do not match. Please Try again!";
				}
        }
		
	
    }
	else
	{
		$error['login'] = "* Username and Password do not match. Please Try again!";
	}
	
	
}

?>
