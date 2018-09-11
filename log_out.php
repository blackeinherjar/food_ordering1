<?php

	session_start();
	$res = array();


	
	

	
	session_destroy();
	clearstatcache();

	$res['status']    = 'success';	
	$res['msg']    = 'user will now be log out...';	
	echo json_encode($res);	

	
?>