var hasNumber = /\d/;
  function check_email_format()
  {
		var email_check = document.login.email;
		var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
		if(!filter.test(email_check.value))
		{
		email_check.value = "Please enter a valid email";
		email_check.style.color = 'red';
		email_check.focus;
		document.login.submit_btn.disabled = true;
		}else
		{
		document.login.submit_btn.disabled = false;
		email_check.style.color = 'black';
		}
  }
  
  function check_register_email()
  {
	var email_check = document.create_account.email;
	var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
	
		if(!filter.test(email_check.value))
		{
		email_check.value = "Please enter a valid email";
		email_check.style.color = 'red';
		email_check.focus;
		document.create_account.create_account_btn.disabled = true;
		}else
		{
		document.create_account.create_account_btn.disabled = false;
		email_check.style.color = 'black';
		}
  }
  
  function check_register_contact_number()
  {
	var contact_number_check = document.create_account.contact_number;
	
		if(isNaN(contact_number_check.value) == true)
		{
		contact_number_check.value = "Please enter a valid contact";
		contact_number_check.style.color = 'red';
		contact_number_check.focus;
		document.create_account.create_account_btn.disabled = true;
		}else
		{
		document.create_account.create_account_btn.disabled = false;
		contact_number_check.style.color = 'black';
		}	
  }
  
   function register_check_first_name()
  {
	var check_first_name = document.create_account.first_name;
	
		if(hasNumber.test(check_first_name.value) == true)
		{
		check_first_name.value = "First name cannot contain number";
		check_first_name.style.color = 'red';
		check_first_name.focus;
		document.create_account.create_account_btn.disabled = true;
		}else
		{
		document.create_account.create_account_btn.disabled = false;
		check_first_name.style.color = 'black';
		}	
  }
  
  function register_check_last_name()
  {
	var check_last_name = document.create_account.last_name;
	
		if(hasNumber.test(check_last_name.value) == true)
		{
		check_last_name.value = "Last name cannot contain number";
		check_last_name.style.color = 'red';
		check_last_name.focus;
		document.create_account.create_account_btn.disabled = true;
		}else
		{
		document.create_account.create_account_btn.disabled = false;
		check_last_name.style.color = 'black';
		}	
  }
  
  

  
  
  
 