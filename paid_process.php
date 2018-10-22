<?php

	require "connection.php";
	$res = array();
	$id = $_POST['order_id'];

	

	$sql = "UPDATE `orders` SET `paid`= 1 WHERE `id`='$id'";	

		
		if (mysqli_query($conn, $sql)) {
			$res['status'] = 'success';
		    $res['msg']    = 'Paid successful';
		} else {
		
			$res['status'] = 'error';
		    $res['msg']    = 'Paid Failed';
		}
		

	echo json_encode($res);	


?>