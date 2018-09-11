<?php require 'connection.php'; ?>
<?php 
	session_start();
	if(isset($_SESSION['login_role']))
	{
		
	$login_role = $_SESSION['login_role'];
	}

?>
<head>

<title>Nard Nard Foodhouse</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>



	
	<link href="src/css/login_page.css" rel="stylesheet">
	<script type="text/javascript" src="src/js/check_format.js"></script>  
	<link href="src/css/hover_effect.css" rel="stylesheet">
	<link href="src/css/products_layout.css" rel="stylesheet">
	

	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
    <script src="//cdnjs.cloudflare.com/ajax/libs/noty/3.1.2/noty.js"></script>
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/noty/3.1.2/noty.css">


	<style>
		.status_title
		{
		
		font-weight:bold;
		}
		
		hr
		{
			height:1px;
			border:none;
			color:#333;
			background-color:#333;
		}
	</style>
</head>

<div hidden>
<?php

	$currentCartCount = array();
	$string  = $_SESSION['cart'];
	$currentCartCount = explode(',' , $string);

	if(isset($_SESSION['cart']))
	{
		$currentCartCount = count($currentCartCount);
	}else
	{
		$currentCartCount = 0;
	}
	

?>
</div>



<nav class="navbar navbar-expand-md bg-dark navbar-dark" style="margin-bottom: 0px;">
  <ul class="navbar-nav mr-auto">
    <li class="nav-item">
      <a href="index.php" class="navbar-brand"><i class="fas fa-home"></i> Home</a> 
    </li>
    <li class="nav-item">
     <a href="products.php" class="nav-link"><i class="fas fa-list-alt"></i> Menu</a> 
    </li>

    <?php if(isset($_SESSION['login_role'])):?>
	    <?php if($login_role == "user"):?>
		    <li class="nav-item">
		      <a href="cart.php" class="nav-link"><i class="fas fa-cart-plus"></i> Cart <span class="badge badge-primary"></span></a> 
				     	<input type="hidden" name="currentCartCount" value="<?php echo $currentCartCount ?>">
		    </li>
	    <?php endif; ?>	
    <?php endif; ?>	
  </ul>



    <ul class="navbar-nav">

		<?php if(isset($_SESSION['login_role'])):?>

	   	  	<li class="nav-item">
	  	 		<a href="#" class="nav-link"><i class="fas fa-user"></i> Profile</a> 
	   	   	</li>

		    <li class="nav-item">
		      	<a href="" class="nav-link logout"><i class="fas fa-sign-out-alt"></i> Logout</a> 
		      	<form name="logoutForm" action="log_out.php" method="GET" hidden> 
			    	
			   </form>
		    </li>    

		<?php endif; ?>	
    
	</ul>

  
</nav>
















	
	
</head>



<script>
	

$(document).ready(function() {
	$currentCartCount = $('[name="currentCartCount"]').val();
    $( ".badge" ).text($currentCartCount);
});



 $('.logout').click(function(e)
{
	$.Event(e).preventDefault();
	$(this).siblings('form').submit();
});





$('[name="logoutForm"]').submit(function(e)
{
    $.Event(e).preventDefault();
    $.ajax({
        url: $(this).attr('action'),
        type: $(this).attr('method'),
        data: $(this).serialize(),
        dataType: 'JSON',
    }).done(function(data)
    {
               
     	
            new Noty({          
                type: data.status,
                text: data.msg,            
                timeout: 1000
            }).show();

           
         setTimeout(function()
	            {
	                
	                    window.location = "index.php";
	                

	                
	            }, 1000);
  
    })
});





</script>



