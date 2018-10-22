<?php

	session_start(); 
	require "connection.php";	
	
	
	$res = array();
	if(!empty($_POST['email']) && !empty($_POST['pass']) )
	{
		
		$email = $_POST['email'];
		$pass = $_POST['pass'];
		$sql = "SELECT * FROM `users` WHERE `email`='$email' && `pass`='$pass' ";
		$result = mysqli_query($conn,$sql);
		$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
		
		
		$id = $row['id'];
		$login_role = $row['role'];
		$first_name = $row['first_name'];
		$last_name = $row['last_name'];
		$address = $row['address'];
		
		
		if($row['email'] == $email && $row['pass'] == $pass)
		{		
			
			$full_name = $first_name." ".$last_name;
			$_SESSION['user_id'] = $id;
			$_SESSION['login_role'] = $login_role;
			$_SESSION['full_name'] = $full_name;
			$_SESSION['address'] = $address;
			$_SESSION['first_name'] = $first_name;
			$_SESSION['last_name'] = $last_name;
			
			if($row['role'] == "user")
			{
				$res['status']    = 'success';	
				$res['msg']    = 'login successful';	
				$res['name'] = $full_name;
				$res['id'] = $id;
			}
			
			if($row['role'] == "admin")
			{
				$res['status']    = 'success';	
				$res['msg']    = 'login successful';	
				$res['name'] = $full_name;
				$res['id'] = $id;
			}
		}
		else
		{

			$res['status']    = 'error';	
			$res['msg']    = 'login failed';	
		}
	}
	else
	{
			$res['status']  = 'error';	
			$res['msg']    = 'No login data...';	
	}	

	echo json_encode($res);	
	
?>