<!DOCTYPE html>
<html lang="en">
<?php 
	require "connection.php";	
	require 'navbar.php'; 
?>


<?php 
	$id = $_GET['id'];
	$sql = "SELECT * FROM `users` WHERE `id`=$id";
	$result = mysqli_query($conn,$sql);
	$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
	$first_name = $row['first_name'];
	$last_name = $row['last_name'];
	$email = $row['email'];
	$contact_no = $row['contact_no'];
	$address = $row['address'];
	$age = $row['age'];
	$image_name = $row['image_name'];






?>





<body>
<div class="container">
  		<h2>Edit User</h2>
	  	<form name="update_user" class="form-horizontal" action="update_user_process.php" method="post" enctype="multipart/form-data">
			<div class="row">
				<div class="col-sm-3">
					<img onerror="this.src = 'src/image/No_available_image.jpg'" src="src/image/profile/<?php echo $image_name?>" id='display_image' class="img-thumbnail" style="width:250px;height:250px">
				    <input type="file" accept='image/*' id="upload_image" name="file_img" onchange="openFile(this)"/>  
				</div>

				<div class="col-sm-9">
				    <div class="form-group">
					   <label>First Name:</label>
					   <input type="text" class="form-control" id="first_name" value="<?php echo $row['first_name'] ?>" name="first_name">
				    </div>
					
				    <div class="form-group">
				      	<label>Last Name:</label>
				      	<input type="text" class="form-control" id="last_name" value="<?php echo $row['last_name'] ?>" name="last_name">
				    </div>

				    <div class="form-group">
				      	<label>Address:</label>
				      	<input type="text" class="form-control" id="address" value="<?php echo $row['address'] ?>" name="address"/>
				    </div>

				    <div class="form-group">
				      	<label>Age:</label>
				      	<input type="text" class="form-control" id="age" value="<?php echo $row['age'] ?>" name="age"/>
				    </div>
					
					<div class="form-group">
				      	<label>Email:</label>
				      	<input type="text" class="form-control" id="email" value="<?php echo $row['email'] ?>" name="email"/>
				    </div>
					
				
				    <div class="form-group">
				      	<label>Phone No:</label>
				      	<input type="text" class="form-control" id="contact_no" value="<?php echo $row['contact_no'] ?>" name="contact_no"/>	  
				    </div>

				    <div class="form-group">
		  			<input type="hidden" name="id" value="<?php echo $id ?>">
		  			<button id="update_btn" type="submit" class="btn btn-success" name="update_btn">Update</button>
		 			<a href="users.php" class="btn btn-danger" role="button">Back</a>
					</div> 

			    </div>
		    </div>
	    </form>
 </div>
   
   <script>
   	
    $('[name="update_user"]').submit(function(e)
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