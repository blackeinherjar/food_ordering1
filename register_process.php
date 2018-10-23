<?php
	session_start(); 
	require "connection.php";




	$res = array();
	if(!empty($_POST['email']) && !empty($_POST['pass']) && !empty($_POST['first_name']) && !empty($_POST['last_name']) && !empty($_POST['age']) && !empty($_POST['address'])&& !empty($_POST['contact_no']))
	{
		$email = $_POST['email'];
		$pass = $_POST['pass'];	
		$first_name = $_POST['first_name'];
		$last_name = $_POST['last_name'];	
		$age = $_POST['age'];	
		$address = $_POST['address'];	
		$contact_no = $_POST['contact_no'];	

		


		$query_email = "SELECT `email` FROM `users` WHERE `email`='$email'";
		$query_run_email = mysqli_query($conn,$query_email);

		if(!filter_var($email, FILTER_VALIDATE_EMAIL) === FALSE)
		{
			if (mysqli_num_rows($query_run_email))
			{
				$res['status']    = 'error';	
				$res['msg']    = 'Email already exists';	
			}
			else
			{
				$sql = "INSERT INTO users(`email`, `pass`,`first_name`,`last_name`,`address`,`age`,`contact_no`)VALUES ('$email', '$pass','$first_name','$last_name', '$age', '$address', '$contact_no')";		
				mysqli_query($conn, $sql);



			
				$res['status']    = 'success';	
				$res['msg']    = 'Account created successful,please check your email for account verification';	

				require('email_verification.php');	

			}
		}else
		{			
			$res['status']    = 'error';	
			$res['msg']    = 'Email format wrong,example : test@example.c';	
		}
	}else
	{
		$res['status']    = 'error';	
		$res['msg']    = 'Please fill in the require information';	
	}	



	echo json_encode($res);	





			

			
?>