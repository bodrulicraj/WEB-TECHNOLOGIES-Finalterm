<html>
<head>
	<title>Register</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/bootstrap.min.css">
  	<script src="js/bootstrap.min.js"></script>
	
		<style>
				.error {color: #FF0000;}
				a{
					text-decoration: none;
				}
		</style>
</head>

<body class="container">
<br>
<a href="index.php"><span class="btn btn-primary">Home</span></a> <br />
<?php
//include("config.php");
//connect to db here

		$aiubid_error = $fullname_error = $email_error = $phone_error = $password_error = $conpassword_error = $info = "";
		$aiubid = $fullname = $email = $phone  = $password = $conpassword = "";	
		$boolen = false;
		
		
		if(isset($_POST['submit'])){
		
			//id
			if(empty($_POST["aiubid"])){
				$aiubid_error = "ID is required";
				$boolen = false;
			} else{
				$aiubid = test_input( $_POST["aiubid"] );
				if(!preg_match("/^[1-9]{2}-[0-9]{5}-[1-3]{1}/",$aiubid)){
					$aiubid_error = "Invalid Format!"; 
					$boolen = false;
				}else{
					$aiubid_error = "";
				    $boolen = true;
				}
			}
			 
			//fullname
			if(empty($_POST["fullname"])){
				$fullname_error = "Fullname is required";
				$boolen = false;
			} else {
				$fullname = test_input($_POST["fullname"]);
				// check if name only contains letters and whitespace
				if (!preg_match("/^[a-zA-Z ]/",$fullname)) {
					$fullname_error = "Invalid Format!";
					$boolen = false;
				} else{
					$fullname_error = "";
						if($boolen){
							$boolen = true;
						} else{
							$boolen = false;
						}
					}
				}
		
			//Email
			if(empty($_POST["email"])){
				$email_error = "Email is required";
				$boolen = false;
			}else{
				$email = test_input($_POST["email"]);
				$email_error = "";
				if(!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)){
					$email_error = "Invalid email format";
					$boolen = false;
				}else{
					$email_error = "";
					if($boolen){
						$boolen = true;
					}else{
						$boolen = false;
					}
				}
			}		
			
			//phone
			if(empty($_POST["phone"])){
				$phone_error = "phone is required";
				$boolen = false;
			} else {
				$phone = test_input($_POST["phone"]);
				// check if phone only contains letters and whitespace
				if (!preg_match("/^[0-9]{11}/",$phone)) {
					$phone_error = "Invalid Format!";
					$boolen = false;
				} else{
					$phone_error = "";
					$boolen = true;
					if($boolen){
						$boolen = true;
					} else{
						$boolen = false;
					}
				}
			}
			
			//password
			if(empty($_POST["password"])){
				$password_error = "Password is required";
				$boolen = false;
			}else{
				$str = $_POST["password"];
				$passln = strlen($str);
				
				if($passln > 15){
					$password_error = "Password Should be less than 15 charecters";
					$boolen = false;
					
				}elseif($passln < 6 && $passln >= 1){
					$password_error = "Password Should be greater than 6 charecters";
					$boolen = false;
				}else{
					$password = test_input($_POST["password"]);
					if(!preg_match("/^[a-zA-Z0-9.@?]/",$password)){
						$password_error = "Invalid Format!"; 
						$boolen = false;
					}else{
						$password_error = "";
						if($boolen){
							$boolen = true;
						}else{
							$boolen = false;
						}	
					}
				}
			}

			//conpassword
			if(empty($_POST["conpassword"])){
				$conpassword_error = "Password is required";
				$boolen = false;
			}elseif($_POST["conpassword"] != $password){
				$conpassword_error = "Password don't match!";
				$boolen = false;
			}else{
				$conpassword = test_input($_POST["conpassword"]);
				if(!preg_match("/^[a-zA-Z0-9.@?]/",$conpassword)){
					$conpassword_error = "Invalid Format!"; 
					$boolen = false;
				}else{
					$conpassword_error = "";
					if($boolen){
						$boolen = true;
					}else{
						$boolen = false;
					}	
				}
			}
		}
			
		if ($boolen){
			include_once("config.php");
				$aiubid = $_POST['aiubid'];
				$fullname = $_POST['fullname'];
				$email = $_POST['email'];
				$phone = $_POST['phone'];
				$pass = md5($_POST['password']);

				$sql = mysqli_query($conn,"INSERT INTO user(aiubid,fullname,email,phone,password) VALUES('$aiubid','$fullname','$email','$phone', md5('$pass'))")
						or die("Could not execute the insert query.");
						if ($sql){
							$info = "<hr><div class='alert alert-success'>Registration successfully done. Click Home for login Now</div>";
						} else{
							$info = "Somthing is wrong!";
						}	
			}


		function test_input($data){
			$data = trim($data);
			$data = stripslashes($data);
			$data = htmlspecialchars($data);
			return $data;
		}

?>
	<center><h2>New User Registration</h2><hr></center>
	<form name="form1" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
		<span id="error"><?php echo $info; ?></span>
		<table class="table table-striped table-bordered table-condensed">
            <tr>
                <td>AIUB ID</td>
                <td><input type="text" name="aiubid" placeholder="Enter Id" class="form-control"value=""><span class="error">* <?php echo $aiubid_error;?></span></td>
            </tr>
            <tr>
				<td>Full Name</td>
				<td><input type="text" name="fullname" placeholder="Enter Username" class="form-control" value=""><span class="error">* <?php echo $fullname_error;?></span></td>
				
            </tr>
            <tr>
				<td>Email</td>
				<td><input type="text" name="email" placeholder="Enter Email" class="form-control"value=""><span class="error">* <?php echo $email_error;?></span></td>
			</tr>
            <tr>
                <td>Phone Number</td>
                <td><input type="text" name="phone" placeholder="Enter Phone Number" class="form-control"value=""><span class="error">* <?php echo $phone_error;?></span></td>
            </tr>
			<tr> 
				<td>Password</td>
				<td><input type="password" name="password" placeholder="Enter Password" class="form-control"value=""><span class="error">* <?php echo $password_error;?></span></td>
			</tr>
			<tr> 
				<td>Confirm Password</td>
				<td><input type="password" name="conpassword" placeholder="Repeat Password" class="form-control" value=""><span class="error">* <?php echo $conpassword_error;?></span></td>
			</tr>
			<tr>
            <td colspan="2"><br></td>
            </tr>
            <tr> 
				<td colspan="2"><input type="submit" class="btn btn-success btn-block btn-lg" name="submit" value="Register"></td>
			</tr>
		</table>
	</form>
<?php
//close the db connection here
?>
</body>
</html>