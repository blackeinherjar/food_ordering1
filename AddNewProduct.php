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
	  		<h2>Add New Product</h2>
		  	<form name="add_newProduct" class="form-horizontal" action="AddNewProduct_process.php" method="post" enctype="multipart/form-data">
				<div class="row">
					<div class="col-sm-3">
						<img onerror="this.src = 'src/image/No_available_image.jpg'" src="src/image//<?php echo $image_name?>" id='display_image' class="img-thumbnail" style="width:250px;height:250px">
					    <input type="file" accept='image/*' id="upload_image" name="file_img" onchange="openFile(this)"/>  
					</div>

					<div class="col-sm-9">
					    <div class="form-group">
						   <label>Product Name:</label>
						   <input type="text" class="form-control" name="product_name" placeholder="enter product name">
					    </div>
						
					    <div class="form-group">
					      	<label>Status</label>
					      	<select name="status" class="form-control">
					      		<option>--- Pick a status ---</option>
					      		<option value="In Stock">In Stock</option>
					      		<option value="Out Of Stock">Out Of Stock</option>
					      	</select>

					    </div>

					    <div class="form-group">
				      	<label>Description:</label>
				      	<textarea style="height: 150px;display: inline-block; " type="text" class="form-control" name="description"/></textarea>



			
				   	 </div>


					    <div class="form-group">
					      	<label>Quantity</label>
					      	<input type="number" class="form-control" name="unit" placeholder="enter quantity" />
					    </div>

					
					    <div class="form-group">
					      	<label>Price:</label>
					      	<input type="number" class="form-control" name="product_price" placeholder="enter price" />	  
					    </div>



					    <div class="form-group">
			  
			  		
			  			<button id="update_btn" type="submit" class="btn btn-success" name="update_btn">Add</button>
			 			<a href="products.php" class="btn btn-danger" role="button">Back</a>
						</div> 

				    </div>
			    </div>
		    </form>
	  
	 </div>
<?php endif; ?>
   <script>
   	
    $('[name="add_newProduct"]').submit(function(e)
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
                     window.location = "products.php";
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