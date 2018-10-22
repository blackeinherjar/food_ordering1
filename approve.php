
<?php
	session_start();
	require "connection.php";
	$res = array();


	$id = $_GET['id'];


$sql = "UPDATE `orders` SET `status`='close' WHERE `id`='$id'";

if (mysqli_query($conn, $sql)) {
   $res['status'] = 'success';
	$res['msg']    = 'approve success';
} else {
  $res['status'] = 'error';
	$res['msg']    = 'approve failed';
}

	

	
	echo json_encode($res);	
?>