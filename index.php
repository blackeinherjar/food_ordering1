



<!DOCTYPE html>
<html>
<?php 
	include 'navbar.php';
		
			
?>

 <link rel="stylesheet" href="src/css/index.css">

<body>

<section class="login-block">
    <div class="container">
	<div class="row">
		<div class="col-md-4 login-sec">
			<i><h6 class="text-center">Nard Nard Foodhouse</h6></i>
		    <h2 class="text-center">Login Now</h2>

		    <form class="login-form" id="login" action="login.php" method="post">
  <div class="form-group">
    <label class="text-uppercase">Email</label>
    <input type="text" name="email" id="email" class="form-control" placeholder="">
    
  </div>
  <div class="form-group">
    <label class="text-uppercase">Password</label>
    <input type="password" name="pass" id="pass" class="form-control" placeholder="">
  </div>

  
  
    <div class="form-check">
    <label class="form-check-label">
      <input type="checkbox" class="form-check-input">
      <small>Remember Me</small>
    </label>
    <button type="submit" id="submit" class="btn btn-login float-right">Submit</button>
  </div>
  
</form>
<div class="small-text"> <p class="text-center text-muted">Not a member? <i class="fa fa-heart"></i> <a name="registerModal_Test" href="#" data-toggle="modal" data-target="#registerModal">
  Register an Account
</a></p></div>

</div>




		<div class="col-md-8 banner-sec" style="background: src/image/1.jpg">
       
	</div>
</div>
</section>











 
<!-- Modal -->
<div class="modal fade" id="registerModal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
       <h5 class="modal-title"><center><i class="fas fa-registered"></i> Register</center></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form name="register_form" action="register_process.php" method="post">
      <div class="modal-body">
        

      		
				<div class="form-group row">
				    <label class="col-sm-3 col-form-label">Email</label>
				   <div class="col-sm-9">
				      <input type="email" class="form-control" placeholder="Enter Email" id="email" name="email">
				    </div>
				</div>
					
				<div class="form-group row">
				    <label class="col-sm-3 col-form-label">Password</label>
				    <div class="col-sm-9">
				      <input type="password" class="form-control" placeholder="Enter Password" name="pass">
				    </div>
				</div>

				<div class="form-group row">
				    <label class="col-sm-3 col-form-label">First Name</label>
				    <div class="col-sm-9">
				      <input type="text" class="form-control" placeholder="Enter First Name" name="first_name">
				    </div>
				</div>

				<div class="form-group row">
				    <label class="col-sm-3 col-form-label">Last Name</label>
				    <div class="col-sm-9">
				      <input type="text" class="form-control" placeholder="Enter Last Name" name="last_name">
				    </div>
				</div>

				<div class="form-group row">
				    <label class="col-sm-3 col-form-label">Age</label>
				    <div class="col-sm-9">
				      <input type="number" class="form-control" placeholder="Enter Age" name="age">
				    </div>
				</div>

				<div class="form-group row">
				    <label class="col-sm-3 col-form-label">Address</label>
				    <div class="col-sm-9">
				      <input type="text" class="form-control" placeholder="Enter Address" name="address">
				    </div>
				</div>

				<div class="form-group row">
				    <label class="col-sm-3 col-form-label">Contact No</label>
				    <div class="col-sm-9">
				      <input type="text" class="form-control" placeholder="Password" name="contact_no">
				    </div>
				</div>

			








      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-times"></i> Close</button>
	        <button id="submit" type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Register</button>
	      </div>
      </form>
    </div>
  </div>
</div>















	

    <script>



    $('#login').submit(function(e)
	{
	    $.Event(e).preventDefault();
	    $.ajax({
	        url: $(this).attr('action'),
	        type: $(this).attr('method'),
	        data: $(this).serialize(),
	        dataType: 'JSON',
	    }).done(function(data)
	    {        
	     	if (data.status == 'error')
	        {
	            new Noty({          
	                type: data.status,
	                text: data.msg,            
	                timeout: 2000
	            }).show();
	        }
	        else
	        {
	            new Noty({          
	                type: data.status,
	                text: data.msg,            
	                timeout: 2000
	            }).show();

	            setTimeout(function()
	            {
	                
	                    window.location = "products.php";
	                

	                
	            }, 1000);
	        }      
	       
	    })
	});

	 $('[name="register_form"]').submit(function(e)
	{
	    $.Event(e).preventDefault();
	    $.ajax({
	        url: $(this).attr('action'),
	        type: $(this).attr('method'),
	        data: $(this).serialize(),
	        dataType: 'JSON',
	    }).done(function(data)
	    {        
	     	
   			if (data.status == 'error')
	        {
	            new Noty({          
	                type: data.status,
	                text: data.msg,            
	                timeout: 2000
	            }).show();
	        }
	        else
	        {
	            new Noty({          
	                type: data.status,
	                text: data.msg,            
	                timeout: 2000
	            }).show();

	            setTimeout(function()
	            {
	                $('#registerModal').modal('hide');
	            }, 1000);
	        }     	    
	    })
	});

	</script>




</body>










</html>
