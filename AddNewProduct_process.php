<?php

require "connection.php";	
$res = array();

if(!empty($_POST['product_name']) && !empty($_POST['product_price']) && !empty($_POST['status']) && !empty($_POST['unit']) && !empty($_POST['description']))
{
	$product_name = $_POST['product_name'];
	$product_price = $_POST['product_price'];
	$status = $_POST['status'];	
	$unit = $_POST['unit'];	
	$description = $_POST['description'];	
		
	$filetmp = $_FILES["file_img"]["tmp_name"];
	$filename = $_FILES["file_img"]["name"];
	$filetype = $_FILES["file_img"]["type"];
	
	
	
	$tmp   = explode('.', $filename);
	$extension = end($tmp);

	
	
	$sql = "INSERT INTO products (`product_name`, `image_name`,`product_price`,`status`,`unit`,`description`)VALUES ('$product_name', '$filename','$product_price', '$status', '$unit', '$description')";		
	mysqli_query($conn, $sql);		
	$last_id = mysqli_insert_id($conn);
	
	$new_file_name = $last_id.".".$extension;
	$filepath = "src/image/".$last_id.".".$extension;
	move_uploaded_file($filetmp,$filepath);
	

	
	$sql_update = "UPDATE `products` SET `image_name` = '$new_file_name' WHERE `id` = '$last_id'";
	mysqli_query($conn, $sql_update);
	

	$res['status']    = 'success';	
	$res['msg']    = 'New product add successful';	

	
	
	
}
else
{
	$res['status']    = 'error';	
	$res['msg']    = 'Please fill in the require information';	

}




	echo json_encode($res);	








?>