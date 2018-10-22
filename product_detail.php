<!DOCTYPE html>
<html lang="en">
<?php 
	require "connection.php";	
	require 'navbar.php'; 
?>



<?php 
	$id = $_GET['id'];
	$sql = "SELECT * FROM `products` WHERE `id`=$id";
	$result = mysqli_query($conn,$sql);
	$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
	$product_name = $row['product_name'];
	$image_name = $row['image_name'];
	$status = $row['status'];

	
	$description = $row['description'];
	$price = $row['product_price'];
?>

<body>
<div class="container">
  		<h2>Edit Product</h2>
	  	<form name="update_product" class="form-horizontal" action="update_product_process.php" method="post" enctype="multipart/form-data">
			<div class="row">

				<div class="col-sm-3">
					<img onerror="this.src = 'src/image/No_available_image.jpg'" src="src/image/<?php echo $image_name?>" id='display_image' class="img-thumbnail" style="width:250px;height:250px">
				    <input type="file" accept='image/*' id="upload_image" name="file_img" onchange="openFile(this)"/>  
				</div>

				<div class="col-sm-9">
				    <div class="form-group">
					   <label>Product Name:</label>
					   <input type="text" class="form-control" value="<?php echo $row['product_name'] ?>" name="product_name">
				    </div>
					
				    <div class="form-group">
				      	<label>Status:</label>
				      	


				      	<select name="status" class="form-control">
						    <option value="In Stock">In Stock</option>
						    <option value="Out Of Stock">Out Of Stock</option>

						    
						  </select>


				    </div>

				    
					
					<div class="form-group">
				      	<label>Description:</label>
				      	<textarea style="height: 150px;display: inline-block; " type="text" class="form-control" name="description"/><?php echo $description ?></textarea>



			
				    </div>
					

				    <div class="form-group">
				      	<label>Quantity</label>
				      	<input type="text" class="form-control" value="<?php echo $row['unit'] ?>" name="unit"/>	  
				    </div>
				
				    <div class="form-group">
				      	<label>Price: (RM)</label>
				      	<input type="text" class="form-control" value="<?php echo $row['product_price'] ?>" name="product_price"/>	  
				    </div>



				    <div class="form-group">
		  			<input type="hidden" name="id" value="<?php echo $id ?>">
		  			<button id="update_btn" type="submit" class="btn btn-success" name="update_btn">Update</button>
		 			<a href="products.php" class="btn btn-danger" role="button">Back</a>
					</div> 

			    </div>
		    </div>
	    </form>
 </div>
   
   <script>


   	
    $('[name="update_product"]').submit(function(e)
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
            new Noty({          
                type: data.status,
                text: data.msg,            
                timeout: 2000
            }).show();
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