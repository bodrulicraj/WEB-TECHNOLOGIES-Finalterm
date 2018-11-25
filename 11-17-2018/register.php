<?php
	$info = "";
	if( isset( $_POST['submit'] ) ) {
		if( $_POST['submit'] == "Submit" ) {
			include_once("config.php");
			
			$firstname = $_POST['firstname'];
			$lastname = $_POST['lastname'];
			$email = $_POST['email'];
			$phone = $_POST['phone'];
			$pass = md5($_POST['password']);
			
			$sql = mysqli_query($conn,"INSERT INTO user(firstname,lastname,email,phone,password) VALUES('$firstname','$lastname','$email','$phone','$pass')") or die("Could not execute the insert query.");
			
			if($sql){
				$info = "Registration Successful!";
			}else{
				$info = "Somthing is wrong!";
			}
		}
	}
?>

<html>
<head>
	<title>Register javaScript</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/bootstrap.min.css">
  	<script src="js/bootstrap.min.js"></script>
	
		<style>			
			#error{
				color: #009999;
				margin-left: 50px;
				font-size: 17px;
				display: block;
			}
			#firstname_error{
				color: #009999;
			}
			#lastname_error{
				color: #009999;
			}
			#email_error{
				color: #009999;
			}
			#phone_error{
				color: #009999;
			}
			#password_error{
				color: #009999;
			}
			#conpassword_error{
				color: #009999;
			}
			.icon{
				width: 35px;
			    text-align: center;
			}	
		</style>
	<script type="text/javascript">


		var result = false;
    
		function validate(){
			
			//firstname			
			if( document.myForm.firstname.value == ""){
				document.getElementById("icon1").innerHTML = "";
				document.getElementById('firstname_error').innerHTML = "Please provide your first name!";
				document.myForm.firstname.focus();
				return false;
			} else{
				var icon = document.getElementById("icon1");
				var fname = document.myForm.firstname.value;
				var str1 = /^[a-zA-Z ]+$/;
				var op = str1.test(fname);
				if(op){
					document.getElementById("firstname_error").innerHTML = "";
					icon.innerHTML = "&#10004";
					icon.style.color = "green";
					icon.style.fontSize = "18px";
					
					result = true;
					document.myForm.lastname.focus();
				}else{
					document.getElementById("firstname_error").innerHTML = "Only allow letter & white space";
					icon.innerHTML = "&#10006";
					icon.style.color = "red";
					icon.style.fontSize = "18px";
					document.myForm.firstname.focus();
					return false;
				}	
			}
			
			//lastname
			if( document.myForm.lastname.value == "" ){
				document.getElementById("icon2").innerHTML = "";
				document.getElementById('lastname_error').innerHTML = "Please provide your last name!";
				document.myForm.lastname.focus();
				return false;
			} else{
				var icon = document.getElementById("icon2");
				var lname = document.myForm.lastname.value;
				var str2 = /^[a-zA-Z ]+$/;
				var op = str2.test(lname);
				if(op){
					document.getElementById("lastname_error").innerHTML = "";
					icon.innerHTML = "&#10004";
					icon.style.color = "green";
					icon.style.fontSize = "18px";
					
					result = true;
					document.myForm.email.focus();
				}else{
					document.getElementById("lastname_error").innerHTML = "Only allow letter & white space";
					icon.innerHTML = "&#10006";
					icon.style.color = "red";
					icon.style.fontSize = "18px";
					document.myForm.lastname.focus();
					return false;
				}	
			}
			
			//Email
			if( document.myForm.email.value == "" ){
				document.getElementById("icon3").innerHTML = "";
				document.getElementById('email_error').innerHTML = "Please provide your Email!";
				document.myForm.email.focus();
				return false;				
			} else{
				var icon = document.getElementById("icon3");
				var email = document.myForm.email.value;
				var str3 = /^[a-zA-Z0-9_]+@[a-zA-Z]+\.[a-zA-Z]{3,4}/;
				var op = str3.test(email);
				if(op){
					document.getElementById("email_error").innerHTML = "";
					icon.innerHTML = "&#10004";
					icon.style.color = "green";
					icon.style.fontSize = "18px";
					
					result = true;
					document.myForm.phone.focus();
				}else{
					document.getElementById("email_error").innerHTML = "Invalid Email Format!";
					icon.innerHTML = "&#10006";
					icon.style.color = "red";
					icon.style.fontSize = "18px";
					document.myForm.email.focus();
					return false;
				}	
			}

			//Phone
			if( document.myForm.phone.value == "" ){
				document.getElementById("icon4").innerHTML = "";
				document.getElementById("phone_error").innerHTML = "Please provide your Phone!";
				document.myForm.phone.focus();
				return false;				
			} else{
				var icon = document.getElementById("icon4");
				var phone = document.myForm.phone.value;
				var str4 = /^[0-9]{11}$/;
				var op = str4.test(phone);
				if(op){
					document.getElementById("phone_error").innerHTML = "";
					icon.innerHTML = "&#10004";
					icon.style.color = "green";
					icon.style.fontSize = "18px";
					
					result = true;
					document.myForm.password.focus();
				}else{
					document.getElementById("phone_error").innerHTML = "Only allow Number 01711223344";
					icon.innerHTML = "&#10006";
					icon.style.color = "red";
					icon.style.fontSize = "18px";
					document.myForm.phone.focus();
					return false;
				}	
			}
			
			//Password
			if( document.myForm.password.value == "" ){
				document.getElementById("icon5").innerHTML = "";
				document.getElementById('password_error').innerHTML = "Please provide your Password!";
				document.myForm.password.focus();
				return false;				
			} else{
				var icon = document.getElementById("icon5");
				var password = document.myForm.password.value;
				var str5 = /^[a-zA-Z0-9.~!@#$%^&*]{8,15}$/;
				var op = str5.test(password);
				if(op){
					document.getElementById("password_error").innerHTML = "";
					icon.innerHTML = "&#10004";
					icon.style.color = "green";
					icon.style.fontSize = "18px";
					
					result = true;
					document.myForm.conpassword.focus();
				}else{
					document.getElementById("password_error").innerHTML = "Use 8 to 15 characters with a mix of letters, numbers & symbols";
					icon.innerHTML = "&#10006";
					icon.style.color = "red";
					icon.style.fontSize = "18px";
					document.myForm.password.focus();
					return false;
				}	
			}
			
			//Confirm Password
			if( document.myForm.conpassword.value == "" ){
				document.getElementById("icon6").innerHTML = "";
				document.getElementById('conpassword_error').innerHTML = "Please provide your Password!";
				document.myForm.conpassword.focus();
				return false;				
			} else if(document.myForm.conpassword.value != document.myForm.password.value){
				var icon = document.getElementById("icon6");
				document.getElementById("conpassword_error").innerHTML = "Those passwords didn't match. Try again.";	
				return false;
			} else{
				var conpassword = document.myForm.conpassword.value;
				var str6 = /^[a-zA-Z0-9.~!@#$%^&*]{8}$/;
				var op = str6.test(conpassword);
				if(op){
					document.getElementById("conpassword_error").innerHTML = "";
					icon.innerHTML = "&#10004";
					icon.style.color = "green";
					icon.style.fontSize = "18px";
					
					result = true;
				}else{
					document.getElementById("conpassword_error").innerHTML = "Use 8 to 15 characters with a mix of letters, numbers & symbols";
					icon.innerHTML = "&#10006";
					icon.style.color = "red";
					icon.style.fontSize = "18px";
					document.myForm.conpassword.focus();
					return false;
				}	
			}
			
			return result;	 
		}

      </script>	
	
</head>

<body class="container">
<br>
<a href="index.php"><span class="btn btn-primary">Home</span></a> <br/>
	<center><h2>New User Registration</h2><hr></center>
	<center><p><span id="error" ><?php echo $info;?></span></p></center>
	
	<!--<form name="myForm" method="post" action="" onsubmit="return validate()">-->
	<form name="myForm" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" onsubmit="return validate()" >
		<table class="table table-striped table-bordered table-condensed">
            <tr>
				<td>First Name</td>
				<td><input type="text" name="firstname" placeholder="Enter First Name" class="form-control">
					<span id="firstname_error"></span>
				</td>
				<td class="icon"><span id="icon1" ></span></td>
			</tr>
			<tr>
				<td>Last Name</td>
				<td><input type="text" name="lastname" placeholder="Enter Last Name" class="form-control">
					<span id="lastname_error"></span>
				</td>
				<td class="icon"><span id="icon2" ></span></td>
			</tr>
            <tr>
				<td>Email</td>
				<td><input type="text" name="email" placeholder="email@gmail.com" class="form-control"value="">
					<span id="email_error"></span>
				</td>
				<td class="icon"><span id="icon3" ></span></td>				
			</tr> 
			<tr>
				<td>Phone Number</td>
				<td><input type="text" name="phone" placeholder="Enter Phone Number" class="form-control"value="">
					<span id="phone_error"></span>
				</td>
				<td class="icon"><span id="icon4" ></span></td>				
			</tr>
			<tr> 
				<td>Password</td>
				<td><input type="password" name="password" placeholder="Enter Password" class="form-control"value="">
					<span id="password_error"></span>
				</td>
				<td class="icon"><span id="icon5" ></span></td>
			</tr>
			<tr> 
				<td>Confirm Password</td>
				<td><input type="password" name="conpassword" placeholder="Repeat Password" class="form-control" value="">
					<span id="conpassword_error"></span>
				</td>
				<td class="icon"><span id="icon6" ></span></td>
			</tr>
			<tr>
            <td colspan="2"><br></td>
            </tr>
            <tr> 
				<td colspan="2"><input type="submit" class="btn btn-success btn-block btn-lg" name="submit" value="Register"></td>
			</tr>
		</table>
	</form>
</body>
</html>