<?php 

$host = "localhost";
$user = "root";
$pass = "";
$db   ="glowing_by_skin";
$conn = new mysqli($host, $user, $pass, $db);

if ($conn -> connect_error) 
{
	die($conn -> error);
}
else
{
	//echo "database connected";
}

?>