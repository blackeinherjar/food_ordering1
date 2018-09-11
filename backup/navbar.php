<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Nard Nard Foodhouse</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="csrf-token" content="{{ csrf_token() }}">
		<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
		<link rel="stylesheet" href="//use.fontawesome.com/releases/v5.0.8/css/all.css" integrity="sha384-3AB7yXWz4OeoZcPbieVW64vVXEwADiYyAEhwilzWsLw+9FgqpyjjStpPnpBO8o8S" crossorigin="anonymous">
		<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/noty/3.1.2/noty.css">
		<link rel="stylesheet" href="base.css">
		<link rel="stylesheet" href="app.css">

		<style>


		</style>
	</head>

	<body>
		<nav class="navbar navbar-expand-lg navbar-dark fixed-top">
			<div class="container-fluid">
				<div class="navbar-brand">
					Nard Nard Foodhouse
				</div>
				
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    				<span class="navbar-toggler-icon"></span>
 				</button>

				<div class="collapse navbar-collapse" id="navbarSupportedContent">
					<ul class="navbar-nav navbar-sidenav">			
					

						<li class="nav-item" data-toggle="tooltip" data-placement="left" title="Claims"><a href="" class="nav-link" ><i class="far fa-money-bill-alt"></i> <span>Claims</span></a></li>
					
						<li class="nav-item" data-toggle="tooltip" data-placement="left" title="Settings"><a href="" class="nav-link"><i class="fa fa-cog"></i> <span>Settings</span></a></li>	
					</ul>

					<ul class="navbar-nav sidenav-toggler">
				        <li class="nav-item"><a href="#" class="nav-link text-center"><i class="fas fa-fw fa-angle-left"></i></a></li>
				    </ul>

					<ul class="navbar-nav ml-auto">
					    <li class="nav-item"><a href="{{route('profile')}}" class="nav-link" class="nav-link"><i class="fas fa-fw fa-user-circle"></i> Profile</a></li>
					    <li class="nav-item">
					    	<a href="" class="nav-link logout"><i class="fas fa-fw fa-sign-out-alt"></i> Sign Out</a>
					    	<form action="{{route('logout')}}" method="POST" hidden> 
					    		<input type="hidden" name="_token" value="{{ csrf_token() }}">
					    	</form>
					    </li>
					</ul>
				</div>
			</div>
		</nav>
		<div class="content">
			<div class="content-wrapper" id="background">

				<div class="content">
					<div class="container-fluid">
					
					
						<?php require "test.php" ?>
						
						
					</div>
				</div>

				<footer>© 2018 Copyright: NardNard Foodhouse</footer>



			</div>
		</div>

		<script src="//code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    	<script src="//cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    	<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
		<script src="//cdnjs.cloudflare.com/ajax/libs/noty/3.1.2/noty.js"></script>
		<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
		
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.0/jquery-confirm.min.css">
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.0/jquery-confirm.min.js"></script>


		<script>

	        $.ajaxSetup({
	            headers: {
	                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	            }
	        });

	        $(document).ajaxSend(function(event, jqxhr, settings) 
	        {
	        	if (settings.type == 'POST')
	        	{
	            	$('form[action="' + settings.url + '"] [type="submit"]').attr('disabled', true).append(' <i class="fas fa-circle-notch fa-spin"></i>');
	            }
	        });

	        $(document).ajaxComplete(function(event, jqxhr, settings) 
	        {
	            $('form[action="' + settings.url + '"] [type="submit"]').attr('disabled', false).find('.fas').remove();
	        });

	        $(document).ajaxError(function() 
	        {
	            new Noty({
	                type: 'error',
	                text: 'Something went wrong, please try again',
	                timeout: 2000
	            }).show();
	        });
	     	
	        $(function()
			 {
	        	$('.navbar-sidenav [data-toggle="tooltip"]').tooltip({
			        template: '<div class="tooltip navbar-sidenav-tooltip" role="tooltip" style="pointer-events: none;"><div class="arrow"></div><div class="tooltip-inner"></div></div>'
			    });
	        });

	        $('body').on('click', '[data-href]', function(e)
	        {
	        	$.Event(e).preventDefault();
	        	loadContent($(this).attr('data-href'));
	        });

	        $('body').on('click', '.browse', function()
	        {
	        	$(this).closest('.input-group').siblings('[type="file"]').click();
	        });

	        $('body').on('change', '[type="file"]', function()
	        {
	        	var input = $(this).siblings('.input-group').find('.form-control');
	        			
	        	if (this.files.length > 0)
	        	{
	        		if (this.files.length > 1)
	        		{
	        			input.val(this.files.length + ' files');
	        		}
	        		else
	        		{
	        			input.val(this.files[0].name);
	        		}
	        	}
	        	else
	        	{
	        		input.val('');
	        	}
	        });

	        $('.navbar-sidenav').mouseover(function()
	        {
	        	if ($(window).width() > 992)
	        	{
	        		$(this).css('overflow-y', 'auto');
	        	}
	        }).mouseout(function()
	       	{
	       		$(this).css('overflow-y', 'hidden');
	       	});

	        $('.sidenav-toggler').click(function()
	        {
	        	$('body').toggleClass('sidenav-toggled');

	        	if ($('body').hasClass('sidenav-toggled'))
	       		{
	       			$('[data-toggle="tooltip"]').tooltip();       			
	        		$(this).find('.nav-link').html('<i class="fas fa-fw fa-angle-right"></i>');
	        	}
	        	else
	        	{
	        		$(this).find('.nav-link').html('<i class="fas fa-fw fa-angle-left"></i>');
	        	}
	      	});

		    $('.navbar-sidenav [data-toggle="tooltip"]').on('shown.bs.tooltip', function () 
		    {
				var x = $(this).offset().left;
				var y = $(this).offset().top + 15;
				$('.bs-tooltip-right').css('transform', 'translate3d('+ 55 +'px, ' + y + 'px, 0px)');
			});
	        $('.logout').click(function(e)
	        {
	        	$.Event(e).preventDefault();
	        	$(this).siblings('form').submit();
	        });
		</script>
		@yield('js')
	</body>
</html>