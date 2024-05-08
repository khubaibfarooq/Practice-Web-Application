
<?php


ob_start();
session_start(); 
$user_id = $_SESSION['AID'];


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
th{
    background-color:black;
    color:white;
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
             
    <body>
    <center>
          <?php
          if(isset($_GET['reviews'])){
     $reviews=$_GET['reviews'];
   $database=mysqli_connect('localhost','root','','engineering');
              
              $query="select * from feedback where PID='$reviews'";
       
              $result=mysqli_query($database,$query);
              $num_row = mysqli_num_rows($result);
                     
      
      if($num_row > 0){

       

        while($row = mysqli_fetch_assoc($result)){
            $id = $row['FID'];
$cid = $row['CID'];
 $sql_c="select * from client where CID=$cid;";
    $result_c=mysqli_query($database,$sql_c);
              $num_row_c = mysqli_num_rows($result_c);
                     
      
      if($num_row_c > 0){

       

        while($row_c = mysqli_fetch_assoc($result_c)){

$name = $row_c['name'];
      }}
$feedback = $row['feedback'];
$date = $row['datetime'];
 $PID = $row['PID'];
  $sql_P="select * from product where PID=$PID;";
    $result_P=mysqli_query($database,$sql_P);
              $num_row_P = mysqli_num_rows($result_P);
                     
      
      if($num_row_P > 0){

       

        while($row_P = mysqli_fetch_assoc($result_P)){

$pname = $row_P['name'];
$pimage = $row_P['image'];
      }}
                     ?>
         <h1>          Product Name:  <?php echo $pname ?></h1>
                                                     <p>             <img src="img/<?php echo $pimage ?>" height="80px" width="80px"> 
        <table class="table table-hover">
            <tr>
           
                <th>Client Name</th>
             <th>Feedback</th>
                 <th>Date AND TIme</th>
                    
            </tr>
       
            <tr>
                                                     <td>   <?php echo $name ?></td> 
        <td> <?php echo $feedback ?></td>
                                                    <td>   <?php echo $date ?></td>
            </tr>
                                                    <?php 
          }}}
                                                    ?>
    </table>
    
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
