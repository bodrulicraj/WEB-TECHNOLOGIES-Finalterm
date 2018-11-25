<?php
    $aiubid_error = $password_error = $info = "";
    $boolen = false;
    
    if(isset($_POST['login'])){
            if(empty($_POST["aiubid"])){
                $aiubid_error = "Id is required";
                $boolen = false;
            }else{
                $id = test_input( $_POST["aiubid"] );
                if(!preg_match("/^[1-9]{2}-[0-9]{5}-[1-3]{1}/",$id)){
                    $aiubid_error = "Invalid Format!"; 
                    $boolen = false;
                }else{
                    $aiubid_error = "";
                    $boolen = true;
                }
            }
            
            if(empty($_POST["password"])){
                    $password_error = "Password is required";
                    $boolen = false;
            }else{
                $str = $_POST["password"];
                $passln = strlen($str);
                    
                if($passln > 15){
                    $password_error = "Password less than 15 charecters";
                    $boolen = false;
                }elseif($passln < 5 && $passln >= 1){
                    $password_error = "Password greater than 6 charecters";
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
    }

    function test_input($data){
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
    }
    
    if($boolen){
        include_once("config.php");
        
        $aiubid = $_POST['un'];
        $pass = md5($_POST['pw']);
        
        $sql="SELECT * FROM user WHERE aiubid='$aiubid'";
        $result=mysqli_query($conn,$sql);
        
        
        if(mysqli_num_rows($result) >0 ){
            $res=mysqli_fetch_array($result);
            
            if($aiubid == $res['aiubid'] && $pass == $res['password']){
                $_SESSION['aiubid'] = $aiubid;
                
                if($res['type']==1) {
                    $_SESSION['admin']=1;
                header("location:admin.php");
                }
                else{
                    header("location:user.php");
                }
            }else{
                $info = "Wrong Pass or id";
                $aiubid_error = $password_error = "";
            }
        }else{
            $info = "Wrong Pass or id";
            $aiubid_error = $password_error = "";
        }
    }
 ?>


<html>
<head>
    <link rel="stylesheet" href="css.css">

    <link rel="stylesheet" href="css/bootstrap.min.css">

    <script src="js/bootstrap.min.js"></script>
    
    <style>
        #error{
            color: red;
            margin-left: 50px;
        }
    
    </style>
</head>
<body class="container-fluid">
<h1>Assignment Uploading System</h1>
<hr>
<h3>Login Here or <a href="register.php">Click Here for Registration</a></h3><br>
        <form name="login" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <span id="error"><?php echo $info; ?></span>
            <div class="form-group">
                <label for="AIUB ID">AIUB ID:</label>
                <input type="text" class="form-control" id="un" name="un">
                <span id="error"><?php echo $aiubid_error; ?></span>
            </div>
            <div class="form-group">
                <label for="pwd">Password:</label>
                <input type="password" class="form-control" id="pw" name="pw">
                <span id="error"><?php echo $password_error; ?></span>
            </div>
            <input type="submit" name="login" value="Login" class="btn btn-default">
            <!--<button type="submit" class="btn btn-default">Submit</button>-->
        </form>
</body>
</html>
