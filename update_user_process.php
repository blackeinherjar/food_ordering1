<?php

	require "connection.php";
	$res = array();
	$id = $_POST['id'];

	if(isset($_POST['first_name']) && isset($_POST['last_name']) && isset($_POST['address']) && isset($_POST['age']) && isset($_POST['email']) && isset($_POST['contact_no']))
	{
		$first_name = $_POST['first_name'];
		$last_name = $_POST['last_name'];
		$address = $_POST['address'];	
		$age = $_POST['age'];	
		$email = $_POST['email'];	
		$contact_no = $_POST['contact_no'];	


		if(!isset($_FILES['file_img']) || $_FILES['file_img']['error'] == UPLOAD_ERR_NO_FILE)
		{
		$sql = "UPDATE `users` SET `first_name`='$first_name',`last_name`='$last_name',`address`='$address',`age`='$age',`email`='$email',`contact_no`='$contact_no' WHERE `id`='$id'";
		}
		else
		{
		$filetmp = $_FILES["file_img"]["tmp_name"];
		$filename = $_FILES["file_img"]["name"];
		$filetype = $_FILES["file_img"]["type"];
		$tmp   = explode('.', $filename);
		$extension = end($tmp);
		
		$new_file_name = $id.".".$extension;
		$filepath = "src/image/profile/".$id.".".$extension;
		move_uploaded_file($filetmp,$filepath);
		
		
		$sql = "UPDATE `users` SET `first_name`='$first_name',`last_name`='$last_name',`image_name`='$new_file_name',`address`='$address',`age`='$age',`email`='$email',`contact_no`='$contact_no' WHERE `id`='$id'";	
		}
		
		if (mysqli_query($conn, $sql)) {
			$res['status'] = 'success';
		    $res['msg']    = 'Update successful';
		} else {
		
			$res['status'] = 'error';
		    $res['msg']    = 'Update Failed';
		}

	}

	echo json_encode($res);	


?>