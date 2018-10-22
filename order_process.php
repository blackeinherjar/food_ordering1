
<?php 

	session_start(); 
	require "connection.php";	

	$res = array();

$item_name = $_POST['item_name'];
$item_price = $_POST['item_price'];
$cart_count = $_POST['cart_count'];
$user_id = $_POST['user_id'];

$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$shipping_address = $_POST['shipping_address'];
$total_price = $_POST['total_price'];

$sql_order = "INSERT INTO orders (`user_id`,`first_name`,`last_name`,`shipping_address`,`total_price`) VALUES ('$user_id','$first_name','$last_name','$shipping_address','$total_price')"; 




if (mysqli_query($conn, $sql_order)) {
    $order_id = mysqli_insert_id($conn);

}


for ($x = 0;$x<$cart_count;$x++) {

	$sql_order_list = "INSERT INTO order_list (`product_name`,`price`,`order_id`) VALUES ('$item_name[$x]','$item_price[$x]','$order_id')"; 
	$check = mysqli_query($conn, $sql_order_list);
	
}




if($check == true)
{
	unset($_SESSION["cart"]);
	$res['status']    = 'success';	
	$res['msg']    = 'Check out complete';	

}else
{
	$res['status']    = 'error';	
	$res['msg']    = 'Something went wrong,please try again';	
}

echo json_encode($res);	


 ?>