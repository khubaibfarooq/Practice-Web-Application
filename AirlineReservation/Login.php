<?php ob_start();
    session_start();
    ?>
<?php include_once"connect.php";?>
 <!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
 
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
    <title>Airline Reservation System</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">



  
   
  </head>




  <body  >
	<!-- NAVBAR
================================================== -->
  <div class="navbar" style=" background-image:url(img/airline.png);  background-size: cover;"  >
      <!-- Header Text -->
      <header> <h1>Airline Reservation System</h1></header> 


 <!-- Navigation links -->
                     <ul class="nav nav-pills navbar-right">
                        
                                                      <li><a href="index.php" >Home</a></li>
                                                       <li><a href='Login.php' class='btn'>Login</a></li>
                                                                <li><a href='Register.php' class='btn'>Register</a></li>
                                                  
                                                   
                           
                            </ul>
        </div>

	<!-- Content section -->
	<section class="hero-section set-bg" data-setbg="img/bg.jpg">
		<div class="container">
			<div class="hero-text text-white">
				<h2> </h2>
				
			</div>
			<div class="row">
				<div class="col-lg-8 offset-lg-1">
                                    <form class="intro-newslatter" method="post">
                                        <input type="text" placeholder="Enter  UserName" name="username"class="form-control" required>
                                        <input type="password"  placeholder="Password" name="password"class="form-control" required>
						<input type="submit"class="site-btn" name="signin" value="Sign In">
                                                <a href="register.php">Register</a>
					</form>
				</div>
                            <?php
                            if(isset($_POST['signin'])){
                                $user=$_POST['username'];
                             $password=$_POST['password'];
                             $sql="SELECT * FROM login_info WHERE UserName='{$user}' and Password='{$password}' ; ";
              
                             $result=mysqli_query($db,$sql);
                             $num_row = mysqli_num_rows($result);
                                    

if($num_row > 0){

$row = mysqli_fetch_assoc($result);
$type=$row['Type'];
$_SESSION['type']=$type;
$_SESSION['uid']=$row['UID'];
$_SESSION['username']=$row['UserName'];




                            
                         
                             switch ($type){
                                
                                  case'admin':
                                       header('location:Admin.php');
                                     break;
                                      case'user':
                                           header('location: index.php');
                                     break;
                                
                                          
                             }

        
}else{
echo "<p class='alert alert-danger'>Wrong UserName OR Password.</p>";

           
                            }}?>
			</div>
		</div>
	</section>
        
     
	<!-- Content section end -->

<div class="clearfix"></div>
<div class="footerBottomSection">
		<div class="container">
			&copy; 2019, Allright reserved. <a href="#">Terms and Condition</a> | <a href="#">Privacy Policy</a> 
			<div class="pull-right"> <a href="index.html">Online Air Line Reservation System</a></div>
		</div>
	</div>
	</body>
        
</html>
