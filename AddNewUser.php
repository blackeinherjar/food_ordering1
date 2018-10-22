<!DOCTYPE html>
<html lang="en">
<?php 
	require "connection.php";	
	require 'navbar.php'; 
?>

<div hidden>
		<?php 
		$company_id = $_SESSION['user_id']; 
		$login_role = $_SESSION['login_role'];
		?>
</div>

<body>
<?php if($company_id== NULL):?>

	<div class="alert alert-danger">
    	<h2><i class="fas fa-exclamation-triangle"></i> No Authority</a>.</h2>
  	</div>

<?php else: ?>

	<div class="container">
	  		<h2>Add New User</h2>
		  	<form name="add_newUser" class="form-horizontal" action="AddNewuser_Process.php" method="post" enctype="multipart/form-data">
				<div class="row">
					<div class="col-sm-3">
						<img onerror="this.src = 'src/image/No_available_image.jpg'" src="src/image/users/<?php echo $image_name?>" id='display_image' class="img-thumbnail" style="width:250px;height:250px">
					    <input type="file" accept='image/*' id="upload_image" name="file_img" onchange="openFile(this)"/>  
					</div>

					<div class="col-sm-9">
					    <div class="form-group">
						   <label>First Name:</label>
						   <input type="text" class="form-control" id="first_name" value="" name="first_name" placeholder="enter first name">
					    </div>
						
					    <div class="form-group">
					      	<label>Last Name:</label>
					      	<input type="text" class="form-control" id="last_name" value="" name="last_name" placeholder="enter last name">
					    </div>

					    <div class="form-group">
					      	<label>Address:</label>
					      	<input type="text" class="form-control" id="address" value="" name="address" placeholder="enter address" />
					    </div>

					    <div class="form-group">
					      	<label>Age:</label>
					      	<input type="text" class="form-control" id="age" value="" name="age" placeholder="enter age" />
					    </div>
						
						<div class="form-group">
					      	<label>Email:</label>
					      	<input type="text" class="form-control" id="email" value="" name="email" placeholder="enter email" />
					    </div>
						
					
					    <div class="form-group">
					      	<label>Phone No:</label>
					      	<input type="text" class="form-control" id="contact_no" value="" name="contact_no" placeholder="enter contact no" />	  
					    </div>

					    <div class="form-group">
			  
			  			<input type="hidden" name="company_id" value="<?php echo $company_id ?>">
			  			<button id="update_btn" type="submit" class="btn btn-success" name="update_btn">Add</button>
			 			<a href="users.php" class="btn btn-danger" role="button">Back</a>
						</div> 

				    </div>
			    </div>
		    </form>
	  
	 </div>
<?php endif; ?>
   <script>
   	
    $('[name="add_newUser"]').submit(function(e)
    {
       
        $.Event(e).preventDefault();
        $.ajax({
        url: $(this).attr('action'),
        type: $(this).attr('method'),
        data: new FormData(this), 
        contentType: false,       
        cache: false,           
        processData:false,  
        dataType: 'JSON',
        }).done(function(data)
        { 
            if (data.status != 'success')
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
                     window.location = "users.php";
                }, 1000);
            }    
        })
       
    });

    $('[type="file"]').change(function()
	{
	    currEl = this;
	    if (this.files && this.files[0]) 
	    {
	        var reader = new FileReader();
	        reader.onload = function(e) 
	        {
	            $(currEl).siblings('img').attr('src', e.target.result);
	        }
	        $(currEl).siblings('.form-control').val(this.files[0].name);
	        reader.readAsDataURL(this.files[0]);
	    }
	});




   </script>


</body>

</html>