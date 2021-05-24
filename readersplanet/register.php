<!DOCTYPE html>
<html>
<head>
  <style>
    .error {color: red;}
.success {color: green;}
.container {background-image: url("images/bookstore.jpeg");}
  </style>
<title>Registration Page</title>
	<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7; IE=EmulateIE9">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
  <link rel="stylesheet" type="text/css" href="css/style4.css" media="all" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body >
  <?php
include "Database/config.php";
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
  <header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">ReadersPlanet</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
    
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
              <a class="nav-link" href="index_su.html">Home <span class="sr-only">(current)</span></a>     <!--Home page anchor link-->
            </li>
            
            <li class="nav-item">
              <a class="nav-link" href="login.html">Login</a>   <!--Login page link-->
            </li>
    
            <li class="nav-item">
              <a class="nav-link" href="register.php">Register</a>   <!--New Registration page link-->
            </li>
    
            <li class="nav-item">
              <a class="nav-link" href="category.html">Categories</a>     <!--Books Categories page link-->
            </li>
            
            <li class="nav-item">
              <a class="nav-link" href="contact.html">Contact us</a>      <!--Contact us page link-->
            </li>
    
            <li class="nav-item">
              <a class="nav-link" href="cart.html">Cart</a>               <!--Shopping cart page link-->
            </li>
    
          </ul>
          <form class="form-inline my-2 my-lg-0" action="Search.php" method="GET">
            <input class="form-control mr-sm-2" type="search" placeholder="Type Book Name" aria-label="Search" name="bookname">
            <button class="btn btn-outline-success my-2 my-sm-0" name="submit" type="submit">Find books now</button>
            
          </form>
        </div>
      </nav>
</header>
<div class="container">
			<!-- freshdesignweb top bar -->
            <div class="freshdesignweb-top">
                <div class="clr"></div>
            </div><!--/ freshdesignweb top bar -->      
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
