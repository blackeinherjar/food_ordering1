

<!DOCTYPE html>
<?php

include "navbar.php";

$user_id = $_SESSION['user_id'];

$sql = "SELECT * FROM `users` WHERE `id`='$user_id'";
$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
$email = $row['email'];
$first_name = $row['first_name'];
$last_name = $row['last_name'];
$pass = $row['pass'];
$address = $row['address'];
$age = $row['age'];
$contact_no = $row['contact_no'];
$image_name = $row['image_name'];






?>
<html lang="en">




<body>


<div class="container">

    <div id="login_form">
          
        
 

        <form action="upload_profile_image_process.php" name="upload_image" enctype="multipart/form-data" method="post">


            <img src="src/image/profile/<?php echo $image_name?>"  onerror="this.src = 'src/image/No_available_image.jpg'" class="img-thumbnail img_display"  style="height: 200px;width: 200px;margin-bottom: 20px;display: block;margin-left: auto;margin-right: auto;">
            <input type="file" name="file_img" class="file_upload d-none">   
             <div class="centered_text">Click Me</div>



          <div class="form-group">
            <label>First Name:</label>
            <input type="text" class="form-control" value="<?php echo $first_name  ?>" name="first_name">
          </div>
          
          <div class="form-group">
            <label>Last Name:</label>
            <input type="text" class="form-control" value="<?php echo $last_name  ?>" name="last_name">
          
          </div>
          
          <div class="form-group">
            <label>Email:</label>
            <input type="text" class="form-control" value="<?php echo $email  ?>" name="email">
            
          </div>
          
          <div class="form-group">
            <label>Address:</label>
            <input type="text" class="form-control" value="<?php echo $address ?>" name="address">
            
          </div>
        
          <div class="form-group">
            <label>Age:</label>
            <input type="text" class="form-control" value="<?php echo $age ?>" name="age">
            
            
          </div>
          
          <div class="form-group">
            <label>Contact No:</label>
            <input type="text" class="form-control" value="<?php echo $contact_no  ?>" name="contact_no">
            
            
          </div>
          
          <div class="form-group">
            <label>Password:</label>
            <input type="text" class="form-control" value="<?php echo $pass  ?>" name="pass"> 
            
          </div>
          
               <input type="hidden" value="<?php echo $user_id ?>" name="id"> 

          <button type="submit" class="btn btn-success" style="margin-bottom: 20px">Update Profile</button>
          
        </form>
      
    </div> 
  </div>
  

  







</body>


<script type="text/javascript">
    

 $('.img_display').click(function() 
{ 
     $(this).siblings('[type="file"]').click();
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



 $('[name="upload_image"]').submit(function(e)
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







</script>


</html>
