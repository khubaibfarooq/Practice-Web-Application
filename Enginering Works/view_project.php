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
  <body>
	<?php
        if(isset($_GET['project'])){
        $id=$_GET['project'];
   $db=mysqli_connect('localhost','root','','enggworks');
              
              $sql="select * from project where PrID=$id;";
       
              $result=mysqli_query($db,$sql);
              $num_row = mysqli_num_rows($result);
                     
      
      if($num_row > 0){

       

        while($row = mysqli_fetch_assoc($result)){
            $id = $row['PrID'];




$name = $row['name'];
$freq = $row['functional_requirement'];
$file = $row['file'];

    $status=$row['status'];
    $price=$row['price'];
    $video=$row['video'];
 
                     ?>
            
	<div class="container">
		<div class="card">
			<div class="container-fliud">
				<div class="wrapper row">
					<div class="preview col-md-6">
						
						<div class="preview-pic tab-content">
                                                    <div class="tab-pane active" id="pic-1">
    <video width="400px" height="500px" controls>
    <source src="video/<?php echo $video ?>" type="video/mp4">
    <source src="video/<?php echo $video ?>" type="video/mp4">
  Your browser does not support HTML5 video.
</video></div>
						 
						</div>
						
						
					</div>
					<div class="details col-md-6">
						<h3 class="product-title"><?php  echo $name ?></h3>
						<div class="rating">
							<div class="stars">
								<span class="fa fa-star checked"></span>
								<span class="fa fa-star checked"></span>
								<span class="fa fa-star checked"></span>
								<span class="fa fa-star"></span>
								<span class="fa fa-star"></span>
							</div>
							<span class="review-no">41 reviews</span>
						</div>
						<p class="product-description"><?php echo $freq ?></p>
						<h4 class="price">current price: <span><?php echo $price ?></span></h4>
                                                <h5> <a href="view_project.php?file=file/<?php echo $file ?>" download>Project Details File</a></h5>
                                                <h5> Project Status : <?php echo $status ?></h5>
						<div class="action">
                                                    <b> <a href="contact.php?project=<?php echo $id ?>"  class="btn btn-warning" type="button"><span class="glyphicon glyphicon-phone" >Contact</span></a></b>
						
						</div>
                                               
					</div>
				</div>
			</div>
		</div>
	</div>
   
           <?php
if(isset($_GET['project']{
        $id=$_GET['project'];
   $db=mysqli_connect('localhost','root','','enggworks');
              
              $sql="select * from feedback where PrID=$id;";
       
              $result=mysqli_query($db,$sql);
              $num_row = mysqli_num_rows($result);
                     
      
      if($num_row > 0){

       

        while($row = mysqli_fetch_assoc($result)){
            $id = $row['FID'];
$cid = $row['CID'];
 $sql_c="select * from client where CID=$cid;";
    $result_c=mysqli_query($db,$sql_c);
              $num_row_c = mysqli_num_rows($result_c);
                     
      
      if($num_row_c > 0){

       

        while($row_c = mysqli_fetch_assoc($result_c)){

$name = $row_c['name'];
      }}
$feedback = $row['feedback'];
$date = $row['datetime'];

 
                     ?>
        <div style="background-color:whitesmoke">
          
                                                          
                                                    <h1>Feedbacks</h1>
                                                    <br>
                                                    <h3><b><?php echo $feedback ?></b></h3><br>
                                                     <p><?php echo $name ?> | <?php echo $date ?></p>
                                                      <?php
        } }}} }?>
                                                     <form method="post" >
          <?php  if(isset($_SESSION['login'])==true){?>   <input type="text" name="feedback" class="form-control" placeholder="Post your feedback" style="height:300px;width:100%">
          <input type="submit" name="submit" value="POST" class="btn btn-info"> <?php } ?></form>
                                                </div>
            <?php 
      if(isset($_POST['feed'])){ 
           $db=mysqli_connect('localhost','root','','engineering');
             $CID=$_SESSION['CID'];
              $feedback=$_POST['feedback'];
              $PID=$_GET['id'];
              $date= date("Y-m-d h-m-s");
              $sql_f="INSERT INTO `feedback`(`CID`, `feedback`, `datetime`, `PID`) VALUES ('$CID','$feedback','$date','$PID');";
      
              $result_f=mysqli_query($db,$sql_f);
              if($result_f){
                  echo "<p class='alert alert-success'>Thanks for your feedback</p>";
              }
      }}
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