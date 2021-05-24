<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("localhost","root","","book_store");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
	//catch the value of id using GET method in ID variable 
 $ID=$_GET['id'];
// Attempt select query execution
$sql = "SELECT * FROM book WHERE BookID = '$ID';";
$res=mysqli_query($link,$sql) or die("Can't Execute Query..");
 //fetch book querry filter by BookID
	$row=mysqli_fetch_assoc($res);

    //get Category name
    $category= $row['CategoryID'];
    $cat = "SELECT * FROM category WHERE Id = '$category'";
    
    $catQuerry = mysqli_query($link,$cat);
    //execute the category name.
    $catrow=mysqli_fetch_assoc($catQuerry);


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<head>
		
</head>

<body>

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
			
			<!-- start page -->

				<div id="page">
					<!-- start content -->
							<div id="content">
								<div class="post">
									<h1 class="title">Book Details of <?php echo $row['BookTitle'];?></h1>
									<div class="entry">
                                        
										
										<table border="1" width="50%" align="center" >
                                            
											<?php
												echo '	<table border="0" width="100%">
                                                <tr>
                                                   <td><hr color="purple"></td>
                                               </tr>
                                                <tr align="center" bgcolor="#EEE9F3">
                                                    <td>Item Details</td>
                                               </tr>
                                               <tr>
                                                   <td><hr color="purple"></td>
                                               </tr>
                                            </table>
                                           
                                           <table border="0"  width="100%" bgcolor="#ffffff">
                                               <tr> 
                                                   
                                                   <td width="15%" rowspan="3">
                                                   <img src="data:image/png;base64,'.base64_encode($row['Image']).' "/>
                                                   
                                                   </td>
                                               </tr>
                                           
                                               <tr> 
                                                   <td width="50%" height="100%">
                                                       <table border="0"  width="100%" height="100%">
                                                           <tr valign="top">
                                                               <td align="right" width="20%">Book Name</td>
                                                               <td width="6%">: </td>
                                                               <td align="left">'.$row['BookTitle'].'</td>
                                                           </tr>

                                                           
                                                           <tr>
                                                               <td align="right">Published Date</td>
                                                               <td>: </td>
                                                               <td align="left">'.$row['PublishedDate'].'</td>
                                                               
                                                           </tr>
                                                           
                                                                                   
                                                           <tr>
                                                               <td align="right">Author Name </td>
                                                               <td>: </td>
                                                               <td align="left">'.$row['AuthorName'].'</td>
                                                               
                                                           </tr>
                                                           <tr>
                                                           <td align="right">Price</td>
                                                           <td>: </td>
                                                           <td align="left">$'.$row['Price'].'</td>
                                                           
                                                       </tr>
                                                           <tr>
                                                               <td align="right">Category </td>
                                                               <td>: </td>
                                                               <td align="left">'.$catrow['Category_name'].'</td>
                                                               
                                                           </tr>											
                                                           
                                                          
                                                           
                                                          
                                                           
                                                          
                                                       </table>
                                       
                                                       
                                                   </td>
                                               </tr>
                                           </table>
                                       
                                               
                                           
                                           <table border="0" width="100%">
                                                <tr>
                                                   <td><hr color="purple"></td>
                                               </tr>
                                                <tr align="center" bgcolor="#EEE9F3">
                                                    <td>DESCRIPTION</td>
                                               </tr>
                                               <tr>
                                                   <td><hr color="purple"></td>
                                               </tr>
                                                                       
                                            </table>
                                            
                                            '.$row['Description'].'
                                                                               

                                            
                                            <tr><td colspan=2><hr color="purple"></td></tr>
                                           
                                           <table border="0" width="100%">
                                               
                                                <tr align="center" bgcolor="#EEE9F3">';
                                                echo ' <td><a href="">
                                                        <img src="images/addcart.jpg">
                                                    </a></td>';
                                            //     if(isset($_SESSION['status']))
                                            //     {
                                            //        echo ' <td><a href="process_cart.php?nm='.$row['b_nm'].'&cat='.$_GET['cat'].'&rate='.$row['b_price'].'">
                                            //            <img src="images/addcart.jpg">
                                            //        </a></td>';
                                            //    }
                                            //    else
                                            //    {
                                            //        echo '<td><img src="images/addcart.jpg"><br><a href="register.php"> <h4>Please Login..</h4></a></td>';
                                            //    }
                                                echo '</tr>
                                           </table>';
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