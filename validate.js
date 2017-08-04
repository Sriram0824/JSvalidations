$(function(){
	$("#first_name_error_msg").hide();
	$("#last_name_error_msg").hide();
	$("#email_error_msg").hide();
	$("#phone_error_msg").hide();
	
	var error_fristName=false;
	var error_lastName=false;
	var error_phone=false;
	var error_email=false;
	
	$("#firstName").focusout(function(){
		check_firstName();
	});
	$("#lastName").focusout(function(){
		check_lastName();
	});
	$("#email").focusout(function(){
		check_email();
	});
	$("#phone").focusout(function(){
		check_phone();
	});
	
	function check_firstName(){
		var firstName_length=$("#firstName").val().length;
		if(firstName_length<=0){
			$("#first_name_error_msg").html("First Name is required");
			$("#first_name_error_msg").show();
			error_firstName=true;
		}
		else{
			$("#first_name_error_msg").hide();
		}
	}
	function check_lastName(){
		var lastName_length=$("#lastName").val().length;
		if(lastName_length<=0){
			$("#last_name_error_msg").html("Last Name is required");
			$("#last_name_error_msg").show();
			error_lastName=true;
		}
		else{
			$("#last_name_error_msg").hide();
		}
	}
	
	function check_email(){
		var email_length=$("#email").val().length;
		var pattern=new RegExp(/^[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+(?:[A-Z]{2}|com|org|net|gov|mil|biz|info|mobi|name|aero|jobs|museum)\b/);
		if(email_length<=0){
			$("#email_error_msg").html("Email is required");
			$("#email_error_msg").show();
			error_email=true;
		}
		else if(pattern.test($("#email").val())){
			$("#email_error_msg").hide();
		}
		else{
			$("#email_error_msg").html("Invalid email address (Ex:abc@gmail.com)");
			$("#email_error_msg").show();
			error_email=true;
		}
	}
	
	function check_phone(){
		var phone_length=$("#phone").val().length;
		var pattern=new RegExp(/^[2-9]\d{2}-\d{3}-\d{4}$/);
		if(phone_length<=0){
			$("#phone_error_msg").html("Phone Number is required");
			$("#phone_error_msg").show();
			error_phone=true;
		}
		else if(pattern.test($("#phone").val())){
			$("#phone_error_msg").hide();
		}
		else{
			$("#phone_error_msg").html("Invalid phone Number (Ex: 800-234-124)");
			$("#phone_error_msg").show();
			error_phone=true;
		}
	}
	
	$("#registration_form").submit(function(){
     error_fristName=false;
	 error_lastName=false;
	 error_phone=false;
	 error_email=false;
	 
	 check_firstName();
	 check_lastName();
	 check_email();
	 check_phone();
	 
	 if(error_firstName==false && error_lastName==false && error_email==false && error_phone==false){
		 return true;
	 }
	 else{
		 return false;
	 }
	});
});