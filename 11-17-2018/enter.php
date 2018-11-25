<?php
session_start();
ob_start();

	$id_error = $pass_error = "";
	if(isset($_POST['submit'])){
			if(empty($_POST["aiubid"])){
				$id_error = "Id is required";
				$boolen = false;
			}else{
				$id = test_input( $_POST["aiubid"] );
				if(!preg_match("/^[1-9]{2}-[0-9]{5}-[1-3]{1}/",$id)){
					$id_error = "Invalid Format!"; 
					$boolen = false;
				}else{
					$id_error = "";
					$boolen = true;
				}
			}
			
			if(empty($_POST["password"])){
					$pass_error = "Password is required";
					$boolen = false;
			}else{
				$str = $_POST["password"];
				$passln = strlen($str);
					
				if($passln > 15){
					$pass_error = "Password less than 15 charecters";
					$boolen = false;
				}elseif($passln < 5 && $passln >= 1){
					$pass_error = "Password greater than 6 charecters";
					$boolen = false;
				}else{
					$password = test_input($_POST["password"]);
					if(!preg_match("/^[a-zA-Z0-9.@?]/",$password)){
						$pass_error = "Invalid Format!"; 
						$boolen = false;
					}else{
						$pass_error = "";
						if($boolen){
							$boolen = true;
						}else{
							$boolen = false;
						}	
					}
				}
			}	
	}

	function test_input($data){
			$data = trim($data);
			$data = stripslashes($data);
			$data = htmlspecialchars($data);
			return $data;
	}
	
	
 $sql="SELECT * FROM user WHERE aiubid='$un' and password=md5('$pw')";
 $result=mysqli_query($conn,$sql);


$res=mysqli_fetch_array($result);
// Mysql_num_row is counting table row
 $count=mysqli_num_rows($result);

// If result matched $un and $pw, table row must be 1 row

if($count==1){

    $_SESSION['aiubid']=$un;
    //close the db connection here
    if($res['type']==1) {
        $_SESSION['admin']=1;
        header("location:admin.php");
    }
    else{
        header("location:user.php");
    }
}
else {
    //close the db connection here
    header("location:index.php");
}
//close the db connection here
ob_end_flush();
 ?>
