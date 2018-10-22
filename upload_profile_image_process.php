<?php

session_start(); 
require "connection.php";
$res = array();



$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$email = $_POST['email'];	
$address = $_POST['address'];	
$age = $_POST['age'];	
$contact_no = $_POST['contact_no'];	
$pass = $_POST['pass'];	

$user_id = $_POST['id'];



if(isset($_POST['first_name']) && isset($_POST['last_name']) && isset($_POST['email']) && isset($_POST['address']) && isset($_POST['age']) && isset($_POST['contact_no']) && isset($_POST['pass']))
{
	
		

	$filetmp = $_FILES["file_img"]["tmp_name"];
	$filename = $_FILES["file_img"]["name"];
	$filetype = $_FILES["file_img"]["type"];
	
	
	
	$tmp   = explode('.', $filename);
	$extension = end($tmp);


	if(!empty($filetmp))
	{

		$new_file_name = $user_id.".".$extension;
		$filepath = "src/image/profile/".$user_id.".".$extension;
		move_uploaded_file($filetmp,$filepath);


		$sql_update = "UPDATE `users` SET `image_name` = '$new_file_name',`email` = '$email',`first_name` = '$first_name',`last_name` = '$last_name',`address` = '$address',`age` = '$age',`contact_no` = '$contact_no' WHERE `id` = '$user_id'";
		mysqli_query($conn, $sql_update);


		
		
	}else
	{
		$sql_update = "UPDATE `users` SET `email` = '$email',`first_name` = '$first_name',`last_name` = '$last_name',`address` = '$address',`age` = '$age',`contact_no` = '$contact_no' WHERE `id` = '$user_id'";
		mysqli_query($conn, $sql_update);
	}


	$res['status']    = 'success';	
	$res['msg']    = 'Profile update successful';	


}
else
{
	$res['status']    = 'error';	
	$res['msg']    = 'Profile update failed,please fill in the require information';	
}




echo json_encode($res);	








?>