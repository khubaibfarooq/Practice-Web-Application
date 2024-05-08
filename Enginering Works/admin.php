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
<style>
    body{
        background-image: url(img/back.jpg);
        background-size: 100%;
        
    }
    * {
  box-sizing: border-box;
}

/* Create four equal columns that floats next to each other */
.column {
  float: left;
  width: 25%;
  padding:10px;
  
  height: 150px; /* Should be removed. Only for demonstration */
}
.column2 {
  float: left;
  width: 25%;
  padding: 10px;
  height: 400px; /* Should be removed. Only for demonstration */
}
/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}
  
</style>
	</head>
	<body>
		
	<div class="gtco-loader"></div>
	
	<div id="page" >

		<nav class="gtco-nav" role="navigation">
			<div class="gtco-container">
				
				<div class="row">
					<div class="col-sm-2 col-xs-12">
						<div id="gtco-logo"><a href="admin.php">Engineering Works </div>
					</div>
					<div class="col-xs-10 text-right menu-1">
						<ul>
							<li class="active"><a href="admin.php">Home</a></li>
							<li><a href="manage_products.php"></a></li>
							<li class="has-dropdown">
								<a href="services.php">Services</a>
								<ul class="dropdown">
									<li><a href="manage_products.php">Products</a></li>
									<li><a href="manage_projects">Projects</a></li>
								
								</ul>
							</li>
                                                       <li class="has-dropdown">
								<a href="manage_employee.php">Employee Management</a>
								<ul class="dropdown">
									<li><a href="manage_employee.php">Employee</a></li>
									<li><a href="admin_profile.php">Admin</a></li>
								
								</ul>
							</li>
                                                      
							<li class="has-dropdown">
                                                            <a href="#">User Managment</a>
								<ul class="dropdown">
									<li><a href="manage_user.php">Users</a></li>
                                                                        <li><a href="user_messages.php">Messages</a></li>
                                                                         <li><a href=agreements.php">Agreements</a></li>
									
                                                        </ul> 
							</li>
                                                        <li class="has-dropdown">
                                                            <a href="#">Reports</a>
								<ul class="dropdown">
									<li><a href="pfreports.php">Profit/LOSS </a></li>
                                                                        <li><a href="spreports.php">Sale AND PURCHASE </a></li>
                                                                  
									
                                                        </ul> 
							</li>
							<li><a href="manage_orders.php">Orders</a></li>
							<li><a href="signout.php">SignOut</a></li>
						</ul>
					</div>
				</div>
				
			</div>
		</nav>
             

      <br><br><br>
      <center>
<div class="row">
    
  <div class="column" style="background-image:url(images/4.jpg);">
      <h6 style="color:white"><b>Product Orders</b></h6>
    <p ><a  href="manage_orders.php"><img src="images/orers.jpg" heigh="100px" width="100px"></a></p>
  </div>
  <div class="column"  style="background-image:url(images/4.jpg);">
        <h6 style="color:white"><b>Project Agreements</b></h6>
        <p><a href="agreements.php"><img src="images/agreemet.jpg" heigh="100px" width="100px">
      <h6>Orders</h6><br></span></a></p>
    
  </div>
  <div class="column"  style="background-image:url(images/4.jpg);">
   <h6 style="color:white"><b>User Management</b></h6>
   <p><a href="manage_user.php"><img src="images/users.png" heigh="110px" width="110px">
    <br></span></a></p>
    
  </div>
  <div class="column"  style="background-image:url(images/4.jpg);">
     <h6 style="color:white"><b>Employee Managment</b></h6>
     <p><a href="manage_employee.php"><img src="images/employee.jpg" heigh="140px" width="140px">
     <br></span></a></p>
    
  </div>
</div>
      <br><br><br>
<div class="row">
  <div class="column2"  style="background-image:url(images/fa.png);">
       <h6 style="color:white"><b>Client Contact Management</b></h6>
       <p><a href="user_messages.php"><img src="images/messages.png" heigh="300px" width="330px">
    <br></span></a></p>
  </div>
  <div class="column2" style="background-image:url(images/fa.png);">
      <h6 style="color:white"><b>Profit and Loss Reports</b></h6><br>
     <p><a href="pfreports.php"><img src="images/profitloss.jpg" heigh="270px" width="330px">
      <br></span></a></p>
  </div>
  <div class="column2" style="background-image:url(images/fa.png);">
      <h6 style="color:white"><b>Sales AND Purchase Reports</b></h6><br>
      <p><a href="pfreports.php"><img src="images/salespurchase.png" heigh="270px" width="270px">
      <br></span></a></p>
  </div>
  <div class="column2" style="background-image:url(images/fa.png);">
 <h6 style="color:white"><b>Product Managment</b></h6><br
     <p><a href="manage_products.php"><img src="images/hardware.jpg" heigh="270px" width="270px">
      <br></span></a></p>
  </div>
    
</div>
<br>

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

	<!-- Main -->
	<script src="js/main.js"></script>

	</body>
</html>

