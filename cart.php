<?php 
include 'navbar.php';
$total = 0;
$i=1;
?>

<div hidden>
<?php echo $_SESSION['cart'] ?>


<?php 
	$x = 0;
	
	$item_name = array(); 
	$item_price = array(); 
	$user_id = $_SESSION['user_id'];

	
?>

</div>


<div class="container" >
	    	<h4>Purchasing Cart</h4>
	<div class="row">
	    <table class="table">
	    	<thead>
			  	<tr>
			  		<th>No</th>
			  		<th>Product Name</th>
			  		<th colspan="2">Price</th>
			  	</tr>
		  	</thead>

		  	<tbody>
			 	<?php if(isset($_SESSION['cart']) && !empty($_SESSION['cart'])):?>	<!--check if session cart isset-->

					<?php

						$items = $_SESSION['cart'];
						$cartitems = explode(",", $items);
					?>
					
					<?php foreach ($cartitems as $key=>$id) { ?>	<!--foreach open-->
						
						<?php 

							$sql = "SELECT * FROM products WHERE id = $id";
							$res=mysqli_query($conn, $sql);
							$row = mysqli_fetch_assoc($res);
						?>

					  	<tr>
					  		
					  		<td><?php echo $i; ?></td>
					  		<td><?php echo $row['product_name']; ?></td>
					  		<td>RM <?php echo $row['product_price']; ?></td>
					  		<td><a href="delete_cart_process.php?remove=<?php echo $key; ?>">Remove</a></td>
					  	</tr>

						<?php 
							$total = $total + $row['product_price'];
							$i++;

							$item_name[] = $row['product_name']; 
							$item_price[] = $row['product_price']; 

							

							

						?>

					<?php } ?> <!--foreach close-->

					<tr>
						<td colspan="2"><strong>Total Price</strong></td>
						<td ><strong>RM <?php echo $total; ?></strong></td>


						<td><a class="btn btn-info" style="color:white" data-toggle="modal" data-target="#checkout_Modal">Check Out</a></td>
							
					
					</tr>


				<?php else:?> <!--check if session cart not isset do else-->
					<tr>
						<td>No Item In Cart</td>	
					</tr>
				<?php endif;?> <!--end if-->

			</tbody>
		</table>
	</div>
</div>


<div class="modal fade" id="checkout_Modal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
       <h5 class="modal-title"><center><i class="fas fa-cart-plus"></i> Check Out</center></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      		<form enctype="multipart/form-data" action="order_process.php" method="post" name="Checkout_form">
      			<div class="modal-body">

      						<div class="form-group row">
				    <label class="col-sm-3 col-form-label">First Name</label>
				    <div class="col-sm-9">
				      <input type="text" class="form-control" placeholder="Enter First Name" name="first_name" value="<?php echo $_SESSION['first_name'] ?>">
				    </div>
				</div>

					<div class="form-group row">
				    <label class="col-sm-3 col-form-label">Last Name</label>
				    <div class="col-sm-9">
				      <input type="text" class="form-control" placeholder="Enter Last Name" name="last_name" value="<?php echo $_SESSION['last_name'] ?>">
				    </div>
				</div>


					<div class="form-group row">
				    <label class="col-sm-3 col-form-label">Shipping Address</label>
				    <div class="col-sm-9">
				      <input type="text" class="form-control" placeholder="Enter Address" name="shipping_address" value="<?php echo $_SESSION['address'] ?>">
				    </div>
				</div>


							
							<?php foreach ($item_name as $name) { ?>

								<input type="hidden" name="item_name[]" value="<?php echo $name?>">
							<?php } ?>
							 
							<?php foreach ($item_price as $price) { ?>
								<input type="hidden" name="item_price[]" value="<?php echo $price?>">
							<?php } ?>

							<input type="hidden" name="cart_count" value="<?php echo ($i)-1 ?>">

							<input type="hidden" name="total_price" value="<?php echo $total ?>">
							<input type="hidden" name="user_id" value="<?php echo $user_id ?>">


							<button type="submit" class="btn btn-info">Submit</button>
						</div>
						</form>





 
    </div>
  </div>
</div>
























<script type="text/javascript">
	
	$('[name="Checkout_form"]').submit(function(e)
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

               setTimeout(function()
	            {
	                
	                    window.location = "products.php";
	                

	                
	            }, 1000);
          
        })
    });


</script>

  	


