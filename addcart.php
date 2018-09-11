
<?php
	session_start();

	$res = array();

	if(isset($_SESSION['cart']) & !empty($_SESSION['cart'])){
		$items = $_SESSION['cart'];
		$cartitems = explode(",", $items);
		$items .= "," . $_GET['id'];
		$_SESSION['cart'] = $items;

	}else{
		$items = $_GET['id'];
		$_SESSION['cart'] = $items;
	}

	

	$res['status'] = 'success';
	$res['msg']    = 'Cart Added';
	echo json_encode($res);	
?>