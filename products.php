<!DOCTYPE html>
<html>

	
	
	<div hidden>
		<?php echo "testing" ?>
	</div>
	
	
	
	
	<?php 
		include 'navbar.php';
		if(isset($_SESSION['login_role']))
		{	
			$login_role = $_SESSION['login_role'];
		}
		$sql = "SELECT * FROM `products` WHERE `status`='In Stock'  ORDER BY `product_name` ASC";
		$result = mysqli_query($conn,$sql);
		
?>

<body>
	<h4 class="status_title">In Stock</h4>
	<div hidden>
	<?php echo $_SESSION['cart'] ?>
	</div>
	<hr/>
	
	<section class="products">
		<?php while ($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){   ?>
			<?php
				$id = $row['id'];
				$is_deleted = $row['is_deleted'];
			?>

			<?php if($is_deleted == 0){ ?>
				<div class="product-card" >
					<div class="product-image hovereffect"  style="height:auto;width:auto">
						<?php $id = $row['id']; ?>
						<img class="img-thumbnail" onerror="this.src = 'src/image/No_available_image.jpg'" src="src/image/<?php echo $row['image_name']; ?>">
							
						<div class="overlay">
							<h2 class="product-name"><?php echo $row['product_name'];?></h2>

							<?php if(isset($_SESSION['login_role'])):?>
						  		<?php if($login_role == "user"):?>
									<a class="info addcart">Add Cart</a>
									<form name="addcartForm" action="addcart.php" method="GET" hidden> 
									    <input type="text" name="id" value="<?php echo $id?>">
									    <button type="submit">submit</button>
									</form>
								<?php endif; ?>	
							<?php endif; ?>	
				
							<a href="#detailModal" data-toggle="modal" class="info"> Detail</a>
							<div data-products='<?php echo json_encode($row) ?>'></div>
						</div>
					</div>

				    <div class="product-info" style="width: 200px;">
				      	<h5 class="product-name"><?php echo $row['product_name'];?></h5>	  
				      	<h6>
					 		<center>RM <?php echo $row['product_price'];?></center>
		            		<?php if(isset($_SESSION['login_role'])):?>
								<?php if($login_role == "admin"):?>
									<form name="deleteForm" id="delete_btn" action="delete_product.php" method="get">
										<input type="hidden" name="id" value="<?php echo $id ?>">
										<input type="hidden" name="is_deleted" value="<?php echo $is_deleted ?>">  
										<button class="btn btn-danger btn-sm" type="submit">Delete</button>
									</form>
									
									<form id="edit_btn" action="product_detail.php" method="get">
										<input type="hidden" name="id" value="<?php echo $id ?>">
										<button class="btn btn-info btn-sm" type="submit">Edit</button>
									</form>  
								<?php endif; ?>	
							<?php endif; ?>	
					    </h6>    
				    </div>
				</div>	
			<?php } ?> 

			<div class="modal fade" id="detailModal">
		        <div class="modal-dialog modal-lg">
		            <div class="modal-content">
		                <!-- Modal Header -->
		                <div class="modal-header">
		                	    <h4 class="modal-title"><span name="modal_product_name"></span></h4>
		                    <button id="modalBox_close" class="close" type="button" data-dismiss="modal">&times;</button>
		                
		                </div>
		               
		                <!-- Modal body -->
		                <form name="addcartForm" action="addcart.php" method="GET"> 
		                    <div class="modal-body">
		                    	<div class="container">
								    <div class="row">
									    <div class="col-sm-5">
									       <img class="modalImage img-thumbnail" style="width:300px;height: 300px;">&ensp;
									    </div>
									    <div class="col-sm-7" >
									     	<h4>Description</h4>
									    	<span name="modal_description"></span><br/>
									        <b>RM <span name="modal_product_price"></span></b><br/>
									        <b>Stock Left <span name="modal_unit"></span></b><br/>
									    </div>
								    </div>
								</div>               
		                    </div>
		                    <!-- Modal footer -->
		                    <div class="modal-footer">                   
							    <input type="hidden" name="id" >

							    <?php if(isset($_SESSION['login_role'])):?>
						  			<?php if($login_role == "user"):?>
										<button name="cart_btn" class="btn btn-outline-info" type="submit"><i class="fas fa-cart-plus"></i><b>Add Cart</b></button>    
									<?php endif; ?>	
								<?php endif; ?>	                 
		                        <button type="button" class="btn btn-outline-danger" data-dismiss="modal"><i class="fas fa-times"></i><b> Close</b></button>
		                    </div>
		                </form>
		            </div>
		        </div>
		    </div>	 
		<?php }   ?>
	</section>

	<?php if(isset($_SESSION['login_role'])):?>
		<?php if($login_role == "admin"):?>
			<div id="Add_product_btn">
				<a href="AddNewProduct.php">
					<button type="button" class="btn btn-warning btn-md">
				      <span class="glyphicon glyphicon-upload"></span> Add Product
					</button>
				</a>
			</div>
		<?php endif;?>
	<?php endif;?>
</body>

<script>

	$('#detailModal').on('hidden.bs.modal', function () {
	 location.reload();
	})

	$('[name="cart_btn"]').click(function()
	{
		setTimeout(function()
	    {        
	  	 	$('#detailModal').modal( 'hide' );
	    }, 1000);
	});

	$('[href="#detailModal"]').click(function()
	{
	    var product = $(this).siblings('div').attr('data-products');    	
	    product = JSON.parse(product);   
	   	$('[name="modal_product_name"]').text(product.product_name).end();   
	    $('[name="modal_description"]').text(product.description).end();   
	    $('[name="modal_product_price"]').text(product.product_price).end();   
	   	$('[name="modal_unit"]').text(product.unit).end();   
	   	$('[name="id"]').val(product.id); 




	   	var FirstString = 'src/image/';


	   	var SecondString = product.image_name;

	   	var source = FirstString+SecondString;

	   	


	   	$('.modalImage').attr({
            src: source,
            width: 500,
            height:500
        });







	});

	$('.addcart').click(function(e)
	{
		$.Event(e).preventDefault();
		$(this).siblings('form').submit();
	});

	$('[name="addcartForm"]').submit(function(e)
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

	        $currentCartCount++;
	        $( ".badge-cart" ).text($currentCartCount);
	  
	    })
	});



	$('[name="deleteForm"]').submit(function(e)
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
	                
	                    window.location = "products.php";
	                

	                
	            }, 1000);
	  
	    })
	});




</script>

</html>
