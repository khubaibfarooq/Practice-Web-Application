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
                                                        <li><a href="client_aggrements.php">My Agreements</a></li>
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
                           <br><br> <br><br>
    <body>
    <center>
         <br>
         
    <table class="table table-hover">

        <tr>
            
            <th>Order ID</th>
           <th>Total Amount</th>
          
                  <th>Order Status</th>
         
          <th>Order Date</th>
          
            <th>Details</th>
           
        </tr>

        
        <?php 
$db=mysqli_connect('localhost','root','','engineering');
$CID=$_SESSION['CID'];
        $shares = "SELECT * FROM orders WHERE CID=$CID";

        $result = mysqli_query($db,$shares);

        $num = mysqli_num_rows($result);

        if($num == 0){

            echo "<tr><td>Nothing.</td></tr>";

        }else{


            $counter = 0;
            while($row = mysqli_fetch_assoc($result)){

                $id = $row['OID'];
                $total= $row['TotalAmount'];
                $status= $row['status'];
                $date = $row['date&time'];
          



            $counter++;


            ?>

            <tr>
                
                <td><?php echo $id ?></td>
 <td><?php echo $total ?></td>
 
                  <td><?php echo $status ?></td>
                    <td><?php echo $date ?></td>
                    

          
                    <td><a class='btn btn-info' href="User_Orders.php?details=<?php echo $id ?>">Details</a></td>
             

            </tr>

         

            <?php
if(isset($_GET['details'])){?>
     <table class="table table-hover">
<div class="form-group col-sm-1">
    <a href="User_Orders.php" class="btn btn-danger">x</a>
    </div>  
        <tr>
            
            <th>Product ID</th>
        <th>Image</th>
             <th>Name</th>
                  <th>Price</th>
                  <th>Quantity</th>
                  
          


        </tr>

        
        <?php 
$db=mysqli_connect('localhost','root','','engineering');
$OID=$_GET['details'];
        $shares = "SELECT * FROM order_details WHERE OID=$OID";

        $result = mysqli_query($db,$shares);

        $num = mysqli_num_rows($result);

        if($num == 0){

            echo "<tr><td>Nothing.</td></tr>";

        }else{


            $counter = 0;
            while($row = mysqli_fetch_assoc($result)){

                $id = $row['OID'];
                $PID= $row['PID'];
                 $or = "SELECT * FROM product WHERE PID=$PID";

        $result_or = mysqli_query($db,$or);

       
            while($row_or = mysqli_fetch_assoc($result_or)){
                  $name= $row_or['name'];
                    $image= $row_or['image'];
            }
                $price= $row['price'];
                $quantity = $row['quantity'];
          



            $counter++;


            ?>

            <tr>
                
                <td><?php echo $id ?></td>
                <td><?php echo $name ?></td>
                <td><img src="images/<?php echo $image ?>" height="200px" width="200px"></td>
 <td><?php echo $price ?></td>
 
                  <td><?php echo $quantity ?></td>
                   
                    

          

            </tr>
<?php 
            } }}}}?>





</center>

   
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