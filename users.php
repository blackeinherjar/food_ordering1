<!DOCTYPE html>
<html lang="en">


<?php
include 'navbar.php';
?>
<body>

	<div>
		<?php 
		$user_id = $_SESSION['user_id']; 
		$login_role = $_SESSION['login_role'];
		

	


		?>
	</div>

	<?php
		
		$sql = "SELECT * FROM `users`";
		
		$result = mysqli_query($conn,$sql);	
		
	?>

	
	<div class="container">
		<center><h2>Users</h2></center>        
		
		<table class="table table-striped">
		    <thead>
		    <tr>
		        <th>ID</th>
		        <th>Profile Picture</th>
		          <th>Email</th>
		        <th>First Name</th>
		        <th>Last Name</th>
		         <th>Age</th>
		        <th>Address</th>
		        <th>Contact No</th>
		       
		            <th>Ordering Count</th>
		        <th>Action</th>
		   
		    </tr>
		    </thead>

		    <tbody>

		    <?php while ($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){   ?>
		    	<?php if($row['is_deleted'] == 0):?>
		    		<?php 
		    			$id = $row['id'];


		    				$order_count = "SELECT COUNT(*) as count FROM orders WHERE user_id = $id";

	$result_count = mysqli_query($conn,$order_count); 
	$rowCount = mysqli_fetch_array($result_count,MYSQLI_ASSOC);

	$num_rows = $rowCount['count']; 

		    		?>




			 	<tr>
			        <td><b><a href='user_detail.php?id=<?php echo $row['id'] ?>'><?php echo $row['id'] ?></a></b></td>
			        <td><img class="img-thumbnail" onerror="this.src = 'src/image/No_available_image.jpg'" src="src/image/profile/<?php echo $row['image_name'] ?>" style="width:100px;height:100px"></td>
			          <td><?php echo $row['email'] ?></td>
			        <td><?php echo $row['first_name'] ?></td>
			        <td><?php echo $row['last_name'] ?></td>
			        <td><?php echo $row['age'] ?></td>
			        <td><?php echo $row['address'] ?></td>
			        <td><?php echo $row['contact_no'] ?></td>
			   
			           <td><h6 style="color:purple"><?php echo $num_rows; ?></h6></td>   	
			       	<td>
			       		<form action="delete_user_process.php" method="post" name="delete">
			       			<input type="hidden" name="id" value="<?php echo $row['id']?>">
			       			<button type="submit" class="btn btn-danger"
			       			<?php if($row['id'] == $user_id ):?>
				        	 	disabled
				        	<?php endif; ?>
			       			><i class="fas fa-trash-alt"></i> Delete</button><!-- only admin can delete,admin are not allow to delete themself,user delete will be disabled -->
			       		</form>
			       	</td>    

			        
			    </tr>
			    <?php endif; ?>
			<?php }?>
		    </tbody>
		</table>
	</div>


	
<?php if($user_id != NULL):?>

<div id="Add_product_btn">
<a href="AddNewUser.php"><button type="button" class="btn btn-primary btn-md">
      <span class="glyphicon glyphicon-upload"></span> Add Users
</button></a>
</div>




<?php endif; ?>

</body>

<script>




$('[name="delete"]').submit(function(e)
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
                location.reload();
            }, 1000);
        }      
       
    })
});

</script>


</html>



