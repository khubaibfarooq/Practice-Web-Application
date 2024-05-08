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
                                                        <li><a href="cart.php">Cart</a></li>
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
  </div>
                           <br><br> <br><br>
    <BR><BR><BR><BR>
    <CENTER>
          <h3 style="background-color:green;color:white;width:50%"> Checkout </h3>
    <form method="post"  action="checkout.php" style="width:400px">
       
       
          
         Enter Credit Card no <input type="number" name="ano" class="form-control" placeholder="Enter your credit card no " >
        Enter Pin COde  <input type="number" name="pin" class="form-control" placeholder="pin Code " >
        Enter Delivery Address <input type="text" name="address" class="form-control" placeholder="Enter Where to Deliver " ><br>
     
     <input type="submit" class="btn-success" name="confirm" value="Confirm-Order"><hr>
         
    </form>
               

      
    <?php 
        if(isset($_POST['confirm'])){
       $ano=$_POST['ano'];
       
        $pin=$_POST['pin'];
         $address=$_POST['address'];
          
        if(isset($_SESSION['CID'])){
        $uid=$_SESSION['CID'];}
        ELSE{ $uid=0;}
     $pid=$_SESSION['PID'];
    
 
  $date= date("Y-m-d");
  

     $totalprice=$_SESSION['totalprice'];
  
      $db=mysqli_connect('localhost','root','','engineering');
 $order="INSERT INTO `orders`(`OID`, `TotalAmount`, `CID`, `status`, `date&time`, `ano`, `pin`, `address`) VALUES (null,'$totalprice','$uid','pending','$date','$ano','$pin','$address');";

         $r = mysqli_query($db,$order);
         
         $oid=mysqli_insert_id($db);
   
foreach ($_SESSION['Products'] as $pid => $quantity) {
 
     
      echo"<tr>";
        $db=mysqli_connect('localhost','root','','engineering');
       
         $query="select * from product where PID='$pid';";

         $re = mysqli_query($db,$query);
        $row = mysqli_fetch_assoc($re);
        $name=$row['name'];
      
     $sprice=$row['saleprice'];
        $pprice=$row['purchaseprice'];

      
     $order_p="insert into  order_details(OID,PID,quantity,price,purchaseprice,date) values('$oid','$pid','$quantity','$sprice','$pprice',now())";

         $result = mysqli_query($db,$order_p);
      

     
    if($result){
     
     echo"<h4>Your order is successfully placed .Product will be delivered Upon Admin approval. Tracking id# $oid </h4>";
    
 unset($_SESSION['Products']);
       unset($_SESSION['items']);
         unset($_SESSION['totalprice']);
    
    
} } }
        ?>

  
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




    
        