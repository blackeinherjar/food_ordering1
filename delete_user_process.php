<?php 

require "connection.php";
$res = array();
$id = $_POST['id'];
// $is_deleted = $_GET['is_deleted'];

$sql = "UPDATE `users` SET `is_deleted`='1' WHERE `id`= $id";

if (mysqli_query($conn,$sql)) 
{
		$res['status'] = 'success';
		$res['msg']    = 'Delete Successful';
			
}
else
{
		$res['status'] = 'error';
		$res['msg']    = 'Delete Failed,please try again';
}

echo json_encode($res);	

?>