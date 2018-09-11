function openFile()
	{
		 var input = document.getElementById('upload_image');

    var reader = new FileReader();
    reader.onload = function(){
      var dataURL = reader.result;
      var output = document.getElementById('display_image');
      output.src = dataURL;
    };
    reader.readAsDataURL(input.files[0]);
	}
	
	
   function check_price()
  {
	var price_check = document.add_book.product_price;
	
		if(isNaN(price_check.value) == true)
		{
		price_check.value = "Please enter a valid price eg.80";
		price_check.style.color = 'red';
		price_check.focus;
		document.add_book.upload_btn.disabled = true;
		}else
		{
		document.add_book.upload_btn.disabled = false;
		price_check.style.color = 'black';
		}	
  }
  
  function check_unit()
  {
	var unit_check = document.add_book.unit;
	
		if(isNaN(unit_check.value) == true)
		{
		unit_check.value = "Please enter number for unit eg.20";
		unit_check.style.color = 'red';
		unit_check.focus;
		document.add_book.upload_btn.disabled = true;
		}else
		{
		document.add_book.upload_btn.disabled = false;
		unit_check.style.color = 'black';
		}	
  }
  
  var hasNumber = /\d/;
  
   function check_author_name()
  {
	var check_author = document.add_book.author;
	
		if(hasNumber.test(check_author.value) == true)
		{
		check_author.value = "Author name cannot contain number";
		check_author.style.color = 'red';
		check_author.focus;
		document.add_book.upload_btn.disabled = true;
		}else
		{
		document.add_book.upload_btn.disabled = false;
		check_author.style.color = 'black';
		}	
  }