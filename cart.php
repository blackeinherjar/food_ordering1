<?php 
include 'navbar.php';
$total = 0;
$i=1;
?>

<div class="container" style="padding-top: 100px">
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
			 	<?php if(isset($_SESSION['cart'])):?>	<!--check if session cart isset-->

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
					  		<td>$<?php echo $row['product_price']; ?></td>
					  		<td><a href="delcart.php?remove=<?php echo $key; ?>">Remove</a></td>
					  	</tr>

						<?php 
							$total = $total + $row['product_price'];
							$i++;
						?>

					<?php } ?> <!--foreach close-->

					<tr>
						<td><strong>Total Price</strong></td>
						<td><strong>$<?php echo $total; ?></strong></td>
						<td><a href="#" class="btn btn-info">Checkout</a></td>
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






  	


