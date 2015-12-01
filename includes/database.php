<?php

$dbname = "onlinebook";

$dbconnect = @mysql_connect('localhost',"root","");
if ($dbconnect === false)
{

echo "<p> connection Error:". mysql_error()."</p> \n";

}
else 
{
	if(@mysql_select_db($dbname,$dbconnect) === false) 
	{
		echo "could not connect to database ".$dbname." database: ".mysql_error($dbconnect)."</p>\n";
		mysql_close($dbconnect);
		$dbconnect = false;
		
	}
	
}

?>