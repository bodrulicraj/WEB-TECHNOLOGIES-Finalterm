


<?php
	$info = "";
	if( isset( $_POST['submit'] ) ) {
		if( $_POST['submit'] == "Submit" ) {
			include_once("config.php");
			
			$name = $_POST['name'];
			$email = $_POST['email'];
			$phone = $_POST['phone'];
			$pass = md5($_POST['password']);
			
			$sql = mysqli_query($conn,"INSERT INTO user(fullname,email,phone,password) VALUES('$name','$email','$phone','$pass')") or die("Could not execute the insert query.");
			
			if($sql){
				$info = "Registration Successful!";
			}else{
				$info = "Somthing is wrong!";
			}
		}
	}
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta charset="UTF-8">
		<meta name="description" content="Free Web tutorials">
		<meta name="keywords" content="HTML,CSS,XML,JavaScript">
		<meta name="author" content="John Doe">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		
		<title>Sign Up</title>
		
		<link rel="stylesheet" type="text/css" href="mystyle.css" />
		
		<script type="text/javascript" src="email.js" ></script>
	</head>
	<body>
		<div class="full_container">
			<div class="Registration_wraper">
				<form name="signup" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" onsubmit="return signup_form_validate()" >
					<div class="registration_form">
						<div class="form_title">
							<h3>Registration Form</h3>
						</div>
						<span id="error" ><?php echo $info;?></span>
						<div class="form_content">
							<div class="content_area">
								<input type="text" name="name"  placeholder="Enter Your Name" />
								<span id="icon1" ></span>
							</div>
							<span id="error1" ></span>
							
							<div class="content_area">
								<input type="text" name="email"  placeholder="Enter Email" onblur="email_validation(this.value)" />
								<!---->
								<span id="icon2" ></span>
							</div>
							<span id="error2" ></span>
							
							<div class="content_area">
								<input type="text" name="phone"  placeholder="Enter Phone"  />
								<span id="icon3" ></span>
							</div>
							<span id="error3" ></span>
							
							<div class="content_area">
								<input type="password" name="password"  placeholder="Enter Password" />
								<span id="icon4" ></span>
								<!---->
							</div>
							<span id="error4" ></span>
							
							<div class="content_area">
								<input type="password" name="cpassword" placeholder="Confirm your Password" />
								<span id="icon5" ></span>
							</div>
							<span id="error5" ></span>
			
							<div class="content2">
								<input type="submit" name="submit" value="Submit" />
							</div>
						</div>
					</div>
				</form>
				<script type="text/javascript" src="form.js" ></script>
			</div>
		</div>
	</body>
</html>