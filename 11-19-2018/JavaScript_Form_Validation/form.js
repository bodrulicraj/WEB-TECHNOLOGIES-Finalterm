
//Signup Form Validation With OnSubmit Event
 
function signup_form_validate() {
	
	//Name Validation
	var result = false;
	
	if( document.signup.name.value == "") {
		document.getElementById("icon1").innerHTML = "";
		document.getElementById("error1").innerHTML = "Please, give your name";
		document.signup.name.focus();
		return false;
	} else {
		var name = document.signup.name.value;
		var error = document.getElementById("error1");
		var icon = document.getElementById("icon1");
		
		//Check Name With Pattern
		
		var str1 = /^[a-zA-Z ]+$/;
		var op = str1.test(name);
		
		if( op ) {
			error.innerHTML = "";
			icon.innerHTML = "&#10004";
			icon.style.color = "green";
			icon.style.fontSize = "18px";
			
			result = true;
			
			document.signup.email.focus();
		} else {
			error.innerHTML = "Only allow letter & white space";
			icon.innerHTML = "&#10006";
			icon.style.color = "red";
			icon.style.fontSize = "18px";
			document.signup.name.focus();
			return false;
		}	
	}
	
	//Email Validation
	
	if( document.signup.email.value == "" ) {
		document.getElementById("icon2").innerHTML = "";
		document.getElementById("error2").innerHTML = "Please, give your email";
		document.signup.email.focus();
		return false;
	} else {
		var email = document.signup.email.value;
		var error = document.getElementById("error2");
		var icon = document.getElementById("icon2");
		
		//Check Email With Pattern
		
		var str2 = /^[a-zA-Z0-9_]+@[a-zA-Z]+\.[a-zA-Z]{2,4}$/
		var op = str2.test(email);
		
		if( op ) {
			//error.innerHTML = "";
			icon.innerHTML = "&#10004";
			icon.style.color = "green";
			icon.style.fontSize = "18px";
			
			result = true;
			
			document.signup.phone.focus();
		} else {
			error.innerHTML = "Invalid Email";
			icon.innerHTML = "&#10006";
			icon.style.color = "red";
			icon.style.fontSize = "17px";
			document.signup.email.focus();
			return false;
		}	
	}
	
	//Phone Validation
	
	if( document.signup.phone.value == "" ) {
		document.getElementById("icon3").innerHTML = "";
		document.getElementById("error3").innerHTML = "Please, give your phone";
		document.signup.phone.focus();
		return false;
	} else {
		var phone = document.signup.phone.value;
		var error = document.getElementById("error3");
		var icon = document.getElementById("icon3");
		
		//Check Phone With Pattern
		
		var str3 = /^[0-9]{11}$/;
		var op = str3.test(phone);
		
		if( op ) {
			error.innerHTML = "";
			icon.innerHTML = "&#10004";
			icon.style.color = "green";
			icon.style.fontSize = "18px";
			
			result = true;
			
			document.signup.password.focus();
		} else {
			error.innerHTML = "Invalid Phone";
			icon.innerHTML = "&#10006";
			icon.style.color = "red";
			icon.style.fontSize = "18px";
			document.signup.phone.focus();
			return false;
		}	
	}
	
	//Password Validation
	
	if( document.signup.password.value == "" ) {
		document.getElementById("icon4").innerHTML = "";
		document.getElementById("error4").innerHTML = "Please, give your password";
		document.signup.password.focus();
		return false;
	} else {
		var password = document.signup.password.value;
		var error = document.getElementById("error4");
		var icon = document.getElementById("icon4");
		
		//Check Password With Pattern
		
		var str4 = /^[a-zA-Z0-9.?%@]{5,10}$/;
		var op = str4.test(password);
		
		if( op ) {
			error.innerHTML = "";
			icon.innerHTML = "&#10004";
			icon.style.color = "green";
			icon.style.fontSize = "18px";
			
			result = true;
				
			document.signup.cpassword.focus();
		} else {
			error.innerHTML = "Password length should be between 5 & 10";
			icon.innerHTML = "&#10006";
			icon.style.color = "red";
			icon.style.fontSize = "18px";
			document.signup.password.focus();
			return false;
		}	
	}
	
	//Confirm Password Validation
	
	if( document.signup.cpassword.value == "" ) {
		document.getElementById("icon5").innerHTML = "";
		document.getElementById("error5").innerHTML = "Please, give confirm password";
		document.signup.cpassword.focus();
		return false;
	} else if( document.signup.cpassword.value != document.signup.password.value ) {
		var error = document.getElementById("error5");
		var icon = document.getElementById("icon5");
		error.innerHTML = "Password don't match";
		icon.innerHTML = "&#10006";
		icon.style.color = "red";
		icon.style.fontSize = "18px";
		document.signup.cpassword.focus();
		return false;
	}else if( document.signup.cpassword.value == document.signup.password.value ) {
		var error = document.getElementById("error5");
		var icon = document.getElementById("icon5");
		error.innerHTML = "Password Matched";
		icon.innerHTML = "&#10004";
		icon.style.color = "green";
		icon.style.fontSize = "18px";
		
		result = true;
	}
	
	return result;
}

