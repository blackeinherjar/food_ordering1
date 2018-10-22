<?php
	session_start(); 
	require "connection.php";
	$res = array();

	if(!empty($_POST['first_name']) && !empty($_POST['last_name']) && !empty($_POST['email']) && !empty($_POST['contact_no']) && !empty($_POST['address'])&& !empty($_POST['age']))
	{


		$sql_check_empty = "SELECT * FROM users";
		$query_run_email = mysqli_query($conn,$sql_check_empty);
		$num_rows = mysqli_num_rows($query_run_email);
		$role = "user";

		

			$first_name = $_POST['first_name'];
			$last_name = $_POST['last_name'];	
			$contact_no = $_POST['contact_no'];	
			$email = $_POST['email'];
			$address = $_POST['address'];	
		
			$age = $_POST['age'];	
			
			$query_email = "SELECT `email` FROM `users` WHERE `email`='$email'";
			$query_run_email = mysqli_query($conn,$query_email);


			

			if(!filter_var($email, FILTER_VALIDATE_EMAIL) === FALSE)
			{
				if (mysqli_num_rows($query_run_email))
				{
					$res['status'] = 'error';
		    		$res['msg']    = 'Email already exists.';

				}
				else
				{
					$sql = "INSERT INTO users(`first_name`, `last_name`,`contact_no`,`email`,`address`,`age`)VALUES ('$first_name', '$last_name','$contact_no', '$email', '$address', '$age')";		
					mysqli_query($conn, $sql);
					$last_id = mysqli_insert_id($conn);
					$filetmp = $_FILES["file_img"]["tmp_name"];
					$filename = $_FILES["file_img"]["name"];
					$filetype = $_FILES["file_img"]["type"];
					$tmp   = explode('.', $filename);
					$extension = end($tmp);

					$new_file_name = $last_id.".".$extension;
					$filepath = "src/image/profile/".$last_id.".".$extension;
					move_uploaded_file($filetmp,$filepath);
					
					$sql = "UPDATE `users` SET `image_name`='$new_file_name' WHERE `id`='$last_id'";	
					mysqli_query($conn, $sql);
								
					$res['status'] = 'success';
		    		$res['msg']    = 'New user created successful';
				}
			}else
			{			

				$res['status'] = 'error';
		    	$res['msg']    = 'email format wrong,example : test@example.c';
			
			}
	}else
	{
				$res['status'] = 'error';
		    	$res['msg']    = 'New user create failed,please fill in the require information';
	}		
			

echo json_encode($res);	
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
		
		
?>