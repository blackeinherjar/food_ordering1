<?php 

session_start(); 
	require "connection.php";	
		$res = array();

$id = $_GET['id'];
$is_deleted = $_GET['is_deleted'];

$sql = "UPDATE `products` SET `is_deleted`='1' WHERE `id`='$id'";

if (mysqli_query($conn,$sql)) 
{
		$res['status']    = 'success';	
				$res['msg']    = 'delete successful';	
			
			
}
else
{
			$res['status']    = 'error';	
				$res['msg']    = 'delete failed';	
}


	echo json_encode($res);	

?>