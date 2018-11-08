<!DOCTYPE html>
<html>

<?php 	
	
	$i=1;
	$x=1;
	include 'navbar.php';

	$user_id = $_SESSION['user_id'];

	$sql_order = "SELECT * FROM orders WHERE `user_id` = '$user_id' AND `status` = 'pending'  OR  `status` = 'shipping'";

	$result_order = mysqli_query($conn,$sql_order);




	$sql_order_close = "SELECT * FROM orders WHERE `user_id` = '$user_id' AND `status` = 'close'";

	$result_order_close = mysqli_query($conn,$sql_order_close);



?>



<body>


<div class="container" >
  
               
    	<h4><i style="color:#008000">Pending Order</i></h4>
  <table class="table">
    <thead>
      <tr>
      	<th>Id</th>
        <th>Firstname</th>
        <th>Lastname</th>
        <th>Shipping Address</th>
        <th>Total Price</th>
        <th>Order Date</th>
        <th colspan="2">Status</th>
      </tr>
    </thead>
    <tbody>



      <?php while ($row = mysqli_fetch_assoc($result_order)){   ?>
      <tr  data-order="<?php echo $row['id']?>">
		
		<td><?php echo $i ?></td>
	   	<td hidden ><?php echo $row['id']?></td>
	   	<td><?php echo $row['first_name']?></td>
		<td><?php echo $row['last_name']?></td>
		<td><?php echo $row['shipping_address']?></td>
        <td>RM <?php echo $row['total_price']?></td>
        
		<td><?php echo $row['date']?></td>


    <?php if($row['paid'] == 0) :?>
         <td style="color:red" class="font-weight-bold">Not yet Paid</td>
         <?php else : ?>


                 <?php if($row['status'] == 'shipping') :?>
                <td style="color:orange" class="font-weight-bold">Shipping Now</td>
               <?php else : ?>
                  <td style="color:green" class="font-weight-bold">Paid (waiting to be approve)</td>

                 <?php endif; ?>

    <?php endif; ?>



         <?php if($row['paid'] == 0) :?>
        <td style="color:green"><a href="#payment_modal" data-toggle="modal"><i>open payment</i></a></td>
          <?php endif; ?>
		</tr>
		<?php $i++; ?>
	   <?php }?>


   
     
    </tbody>
  </table>





  <div class="modal fade" id="payment_modal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
       <h5 class="modal-title"><center><i class="fas fa-registered"></i> Card Payment</center></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form name="payment_form" action="paid_process.php" method="post">
      <div class="modal-body">
        

          
        <div class="form-group row">
            <label class="col-sm-3 col-form-label">Name</label>
           <div class="col-sm-9">
              <input type="name" class="form-control" name="name">
            </div>
        </div>
          
    

       
      

        <div class="form-group row">
            <label class="col-sm-3 col-form-label">Card No</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" name="">
            </div>
        </div>


            <div class="form-group row">
            <label class="col-sm-3 col-form-label">Password</label>
            <div class="col-sm-9">
              <input type="password" class="form-control" name="pass">
            </div>
        </div>


      </div>
        <div class="modal-footer">
            <input type="hidden" class="form-control" name="order_id">
          <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-times"></i> Close</button>
          <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Submit</button>
        </div>
      </form>
    </div>
  </div>
</div>































<button class="btn btn-warning btn-sm" type="button" data-toggle="collapse" data-target="#closeOrder" >
    Show Complete
  </button>



<div class="collapse" id="closeOrder" style="padding-top:30px ">

    	<h4><i style="color:#B22222">Close Order</i></h4>
  <table class="table">
    <thead>
      <tr>
      	<th>Id</th>
        <th>Firstname</th>
        <th>Lastname</th>
        <th>Shipping Address</th>
        <th>Total Price</th>
        <th>Order Date</th>
      </tr>
    </thead>
    <tbody>



      <?php while ($row = mysqli_fetch_assoc($result_order_close)){   ?>
      <tr>
			<td><?php echo $x ?></td>
	   <td hidden><?php echo $row['id']?></td>
	   <td><?php echo $row['first_name']?></td>
		<td><?php echo $row['last_name']?></td>
		<td><?php echo $row['shipping_address']?></td>
        <td>RM <?php echo $row['total_price']?></td>
        
		 <td><?php echo $row['date']?></td>
		</tr>
		<?php $x++ ?>
	   <?php }?>


   
     
    </tbody>
  </table>
 
</div>




 












</div>







</body>



<script>
  


  $('[href="#payment_modal"]').click(function()
    {
        var order = $(this).closest('tr').attr('data-order');

        
          order = JSON.parse(order);

        
        $('[name="payment_form"]').find('[name="order_id"]').val(order);   
    });




  $('[name="payment_form"]').submit(function(e)
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
                    
                        location.reload();
                    

                    
                }, 1000);
        })
       
    });




</script>



</html>