<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("localhost","root","","book_store");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
//check line 51 of index_su.html, sending value from input and getting the same value using $_GET method
	//catch the value of bookname using GET method in book variable 
  
 $book=$_GET['bookname'];
// Attempt select query execution
$sql = "SELECT * FROM book WHERE BookTitle like '%$book%';";
$result = mysqli_query($link, $sql);
    
// Close connection

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<head>
		
</head>

<body>
			<!-- start header -->
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
			<!-- end header -->
			
			<!-- start page -->

				<div id="page">
					<!-- start content -->
							<div id="content">
								<div class="post">
									<h1 class="title">Search Result for <?php echo $book;?></h1>
									<div class="entry">
                                        
										
										<table border="1" width="auto" align="center" >
                                            
											<?php
												while($row = mysqli_fetch_array($result)){
                                                    echo'<div valign="top" width="20%" align="center" >
                                                    <th>
                                          
                                                     
                                                                                                 <a href="details.php?id='.$row['BookID'].'">
                                                                     <img src="data:image/png;base64,'.base64_encode($row['Image']).' "/>
                                                                                                 
                                                                                                 <br>'.$row['BookTitle'].'</a>
                                                                                             ';
                                                         
                                                                   echo '</th></div>';
                                                 }
											?>
											
										</table>
									</div>
									
								</div>
								
							</div>
					<!-- end content -->
					
			
				</div>
			<!-- end page -->
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>