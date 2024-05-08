<?php 
session_start();
?>
<html>
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Engineering Works Web Portal</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Free HTML5 Website Template by FreeHTML5.co" />
	<meta name="keywords" content="free website templates, free html5, free template, free bootstrap, free website template, html5, css3, mobile first, responsive" />
	<meta name="author" content="FreeHTML5.co" />

  	<!-- Facebook and Twitter integration -->
	<meta property="og:title" content=""/>
	<meta property="og:image" content=""/>
	<meta property="og:url" content=""/>
	<meta property="og:site_name" content=""/>
	<meta property="og:description" content=""/>
	<meta name="twitter:title" content="" />
	<meta name="twitter:image" content="" />
	<meta name="twitter:url" content="" />
	<meta name="twitter:card" content="" />

	<link href="https://fonts.googleapis.com/css?family=Merriweather:300,400|Montserrat:400,700" rel="stylesheet">
	
	<!-- Animate.css -->
	<link rel="stylesheet" href="css/animate.css">
	<!-- Icomoon Icon Fonts-->
	<link rel="stylesheet" href="css/icomoon.css">
	<!-- Themify Icons-->
	<link rel="stylesheet" href="css/themify-icons.css">
	<!-- Bootstrap  -->
	<link rel="stylesheet" href="css/bootstrap.css">

	<!-- Owl Carousel  -->
	<link rel="stylesheet" href="css/owl.carousel.min.css">
	<link rel="stylesheet" href="css/owl.theme.default.min.css">

	<!-- Theme style  -->
	<link rel="stylesheet" href="css/style.css">

	<!-- Modernizr JS -->
	<script src="js/modernizr-2.6.2.min.js"></script>
	<!-- FOR IE9 below -->
	<!--[if lt IE 9]>
	<script src="js/respond.min.js"></script>
	<![endif]-->

	</head>
	<body>
		
	<div class="gtco-loader"></div>
	
	<div id="page">

		<nav class="gtco-nav" role="navigation">
			<div class="gtco-container">
				
				<div class="row">
					<div class="col-sm-2 col-xs-12">
						<div id="gtco-logo"><a href="index.php">Engineering Works </div>
					</div>
					<div class="col-xs-10 text-right menu-1">
						<ul>
							<li class="active"><a href="index.php">Home</a></li>
							<li><a href="about.php">About</a></li>
							<li class="has-dropdown">
								<a href="services.php">Services</a>
								<ul class="dropdown">
									<li><a href="products.php">Products</a></li>
									<li><a href="projects">Projects</a></li>
								
								</ul>
							</li>
                                                       
                                                      
							<li class="has-dropdown">
									<a href="signin-up.php">Sign In/UP</a>
								<ul class="dropdown">
									<li><a href="signin-up.php">Signin</a></li>
                                                                        <li><a href="signin-up.php">SignUp</a></li>
									
                                                        </ul> 
							</li>
							<li><a href="portfolio.php">Portfolio</a></li>
							<li><a href="contact.php">Contact</a></li>
						</ul>
					</div>
				</div>
				
			</div>
		</nav>
	  <?php
                            if(isset($_POST['signup'])){
                                $name=$_POST['name'];
                                $CNIC=$_POST['CNIC'];
                                $address=$_POST['address'];
                                 $password=$_POST['password'];
                                  $email=$_POST['email'];
                                   $contact=$_POST['contact'];
                                
                                       $conn=mysqli_connect('localhost','root','','engineering');
    $register="INSERT INTO client values(null,'$name','$CNIC','$address','$password','$email','$contact')";
    
    $result_r=mysqli_query($conn,$register);
    if($result_r){
        echo "<p class='alert alert-success' >Congragulation!Your Account is Created </p>";
                            } else {
                                echo "<p class='alert alert-danger' >OOps! Something Went wrong .Please Try Again</p>";
                            }
                            } ?>
                            <?php
                            if(isset($_POST['signin'])){
                                $name=$_POST['name'];
                             $password=$_POST['password'];
                                 $type=$_POST['type'];
                             $db = mysqli_connect('localhost','root','',"engineering");
                             $sql="SELECT * FROM $type WHERE name='$name' and password='$password'  ";
                          
                             $result=mysqli_query($db,$sql);
                             $num_row = mysqli_num_rows($result);
                                    

if($num_row > 0){
   
$row = mysqli_fetch_assoc($result);
$_SESSION['login']=true;


$_SESSION['email']=$row['email_id'];

$_SESSION['name']=$row['name'];
switch ($type){
                                
                                  case'admin':
                                       header('location:admin.php');
                                      $_SESSION['AID']=$row['AID'];
                                     break;
                                      case'client':
                                           header('location: client.php');
                                          $_SESSION['CID']=$row['CID'];
                                            
                                     break;
                                          
                             }
}else{
echo "<p class='alert alert-danger'>Wrong name OR Password OR admin not accept your request.</p>";

           
                            }}?>
		<div class="gtco-section">
			<div class="gtco-container">
				<div class="row gtco-heading">
					
					<div class="col-md-3 col-md-push-2 text-center">
                                            <p class="mt-md"><a href="signin.php"><h1>Sign-in</h1></a></p>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6">
						<form method="post" >
							<div class="form-group">
								<label for="name">Name</label>
								<input type="text" class="form-control" name="name">
							</div>
							<div class="form-group">
								<label for="name">Password</label>
								<input type="password" class="form-control" name="password">
							</div>
                                                    
							<div class="form-group">
                                                            <label for="name">Select User Type</label><br>
                                                                <input type="radio" name="type" value="client">Customer<br>
                                                                <input type="radio" name="type" value="admin">Admin
							</div>
                                                   
							<div class="form-group">
								<input type="submit" name="signin" class="btn btn-danger" value="Sign-IN">
							</div>
						</form>
					</div>
		

			
	
			<div class="col-md-5 col-md-push-1">
                            
						<div class="gtco-contact-info">
                                                    <h1>Sign-UP</h1>
							<form method="post" >
							<div class="form-group">
								<label for="name">Name</label>
                                                                <input type="text" class="form-control" name="name" required>
							</div>
                                                          
							<div class="form-group">
								<label for="name">Password</label>
								<input type="password" class="form-control" name="password" minlength = "8" maxlength = "15" required>
                                                        </div>
							<div class="form-group">
                                                            <label for="name">CNIC</label><br>
                                                              	<input type="number" class="form-control" name="CNIC" maxlength = "12" required>
							</div>
                                                           <div class="form-group">
                                                            <label for="name">Address</label><br>
                                                              	<input type="text" class="form-control" name="address" required>
							</div> 
                                                          
                                                            <div class="form-group">
                                                            <label for="name">PhoneNO</label><br>
                                                            <input type="number" class="form-control" name="contact" maxlength="13" required>
							</div>
                                                            <div class="form-group">
                                                            <label for="name">Email*</label><br>
                                                              	<input type="text" class="form-control" name="email" required>
							</div>
							<div class="form-group">
								<input type="submit" name="signup" class="btn btn-danger" value="Sign-UP">
							</div>
						</form>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- END Contact -->

		<footer id="gtco-footer" class="gtco-section" role="contentinfo">
			<div class="gtco-container">
				<div class="row row-pb-md">
					<div class="col-md-4 gtco-widget gtco-footer-paragraph">
						<h3>Beryllium</h3>
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus placerat enim et urna sagittis, rhoncus euismod.</p>
					</div>
					<div class="col-md-4">
						<div class="row">
							<div class="col-md-6 gtco-footer-link">
								<h3>Links</h3>
								<ul class="gtco-list-link">
									<li><a href="#">Home</a></li>
									<li><a href="#">Features</a></li>
									<li><a href="#">Products</a></li>
									<li><a href="#">Testimonial</a></li>
									<li><a href="#">Contact</a></li>
								</ul>
							</div>
							<div class="col-md-6 gtco-footer-link">
								<h3>Work</h3>
								<ul class="gtco-list-link">
									<li><a href="#">New York Arena</a></li>
									<li><a href="#">Eagle Park</a></li>
									<li><a href="#">Nationals Park</a></li>
									<li><a href="#">Manila Park</a></li>
								</ul>
							</div>
						</div>
					</div>
					<div class="col-md-4 gtco-footer-subscribe">
						<form class="form-inline">
						  <div class="form-group">
						    <label class="sr-only" for="exampleInputEmail3">Email address</label>
						    <input type="email" class="form-control" id="" placeholder="Email">
						  </div>
						  <button type="submit" class="btn btn-primary">Send</button>
						</form>
					</div>
				</div>
			</div>
			<div class="gtco-copyright">
				<div class="gtco-container">
					<div class="row">
						<div class="col-md-6 text-left">
							<p><small>&copy; 2016 Free HTML5. All Rights Reserved. </small></p>
						</div>
						<div class="col-md-6 text-right">
							<p><small>Designed by <a href="http://freehtml5.co/" target="_blank">FreeHTML5.co</a> Demo Images: <a href="http://pixeden.com/" target="_blank">Pixeden</a> &amp; <a href="http://unsplash.com" target="_blank">Unsplash</a></small> </p>
						</div>
					</div>
				</div>
			</div>
		</footer>
		<!-- END footer -->

	</div>

	<div class="gototop js-top">
		<a href="#" class="js-gotop"><i class="icon-arrow-up"></i></a>
	</div>
	
	<!-- jQuery -->
	<script src="js/jquery.min.js"></script>
	<!-- jQuery Easing -->
	<script src="js/jquery.easing.1.3.js"></script>
	<!-- Bootstrap -->
	<script src="js/bootstrap.min.js"></script>
	<!-- Waypoints -->
	<script src="js/jquery.waypoints.min.js"></script>
	<!-- Carousel -->
	<script src="js/owl.carousel.min.js"></script>

	<!-- Google Map -->
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCefOgb1ZWqYtj7raVSmN4PL2WkTrc-KyA&sensor=false"></script>
	<script src="js/google_map.js"></script>

	<!-- Main -->
	<script src="js/main.js"></script>

	</body>
</html>
