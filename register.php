<!DOCTYPE html>
<html>

<head>
<style>
.error {color: red;}
.success {color: green;}
.container {background-image: url("bookstore.jpeg");}
</style>
	<title>Registration Page</title>

	<link rel="stylesheet" type="text/css" href="register.css" media="all" />

</head>

<body>
	<?php
include "config.php";
$msg='';
$success='';
if(isset($_POST['submit']))
{	
    	
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $repass = $_POST['repassword'];

    if($password == $repass){
        $insert = mysqli_query($db,"INSERT INTO `Register`(`Name`, `Email` , `Password`) VALUES ('$name','$email', '$password')");

        if(!$insert)
        {
            $msg =  'error';
        }
        else
        {
            $success = "Registered successfully.";
        }
        
    }
    else{
        $msg = 'Password must be same';
    }
    
}

mysqli_close($db); 
?>
	<div class="container">



		<div  class="form" >
			<form  id="Registerform" method="POST" action="register.php">
				<p><label for="name">Name</label></p>
				<input id="name" name="name" placeholder="First and last name" required="" tabindex="1" type="text">

				<p><label for="email">Email</label></p>
				<input id="email" name="email" placeholder="example@domain.com" required="" type="email">



				<p><label for="password">Create a password</label></p>
				<input type="password" id="password" name="password" required="">
				<p><label for="repassword">Confirm your password</label></p>
				<input type="password" id="repassword" name="repassword" required="">
				<input class="buttom" name="submit" id="submit" tabindex="5" value="Register here....." type="submit">
                <p><span class="error"><?php echo $msg;?></span></p>
                <p><span class="success"><?php echo $success;?></span></p>
			</form>
		</div>
	</div>

</body>

</html>