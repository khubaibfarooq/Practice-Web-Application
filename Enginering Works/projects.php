<?php 
session_start();
?>
<?php

$items=0;
if(isset($_SESSION['items'])){
$items=$_SESSION['items'];}


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

		<?php if(isset($_SESSION['login'])==true){?> 
            <nav class="gtco-nav" role="navigation">
			<div class="gtco-container">
				
				<div class="row">
					<div class="col-sm-2 col-xs-12">
						<div id="gtco-logo"><a href="client.php">Engineering Works </div>
					</div>
					<div class="col-xs-10 text-right menu-1">
						<ul>
							<li class="active"><a href="client.php">Home</a></li>
							
							<li class="has-dropdown">
								<a href="services.php">Services</a>
								<ul class="dropdown">
									<li><a href="products.php">Products</a></li>
									<li><a href="projects">Projects</a></li>
								
								</ul>
							</li>
                                                        
                                                        <li><a href="User_Orders.php">Orders</a></li>
                                                        <li><a href="client_agreements.php">My Agreements</a></li>
                                                         <li><a href="cart.php">Cart <sup style="color:red;font-size:14px"> <?php echo $items ?></sup></a></li>
                                                    <li><a href="User_profile.php">Profile</a></li>
                                                       <li><a href="Logout.php">Logout</a></li>
						</ul>
					</div>
				</div>
				
			</div>
                </nav> <?php } else { ?>
          
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
		</nav>  <?php } ?>
                           <br><br>
  <center>
      
   <?php
   $db=mysqli_connect('localhost','root','','engineering');
              
              $sql="select * from project ";
       
              $result=mysqli_query($db,$sql);
              $num_row = mysqli_num_rows($result);
                     
      
      if($num_row > 0){

       

        while($row = mysqli_fetch_assoc($result)){
            $id = $row['PrID'];




$name = $row['name'];
$file = $row['file'];
$detail = $row['functional_requirement'];

    $status=$row['status'];  
    $price=$row['price'];
    $video=$row['video'];
                     ?>
            
<div class="col-md-3 ">
<div class="product-chr-info chr">
<div class="thumbnail">


<a href="video.php">

    <video width="400px" height="500px" controls>
    <source src="video/<?php echo $video ?>" type="video/mp4">
    <source src="video/<?php echo $video ?>" type="video/mp4">
  Your browser does not support HTML5 video.
</video>

</div>
<div class="caption text-center" style="line-height: 1.2em !important">




<div class="matrlf-mid">

<br>
<h4 style="background-color:black;color:white;" ><?php echo $name ?></h4><br>
<h4 style="background-color:black;color:white;" ><?php echo number_format($price) . ' Rs'; ?></h4><br>
    <h4 style="color:orange;"><?php echo($status) ; ?></h4><br> 
    <a href="contact_us.php"> <span style="color:white" class="btn btn-success"><i class="glyphicon glyphicon-phone">Contact</i></span></a>| <a href="view_project.php?project=<?php echo $id ?>"><span style="color:white" class="btn btn-danger">View Details</sapn></a><br></a></p>

<br><hr>


<div class="clearfix"> </div>
</div>

</div>
</div>
</div>


        <?php }}?>
  


<div class='clearfix'></div>

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