
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

	</head>
	<body>
		
	<div class="gtco-loader"></div>
	
	<div id="page">

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
         <br>
         <form method="post">
             <h5> Select Start Date </h5>  <input type="date" placeholder="start date" name="start">
                     <h5>   Select End Date</h5>   <input type="date" placeholder="end date" name="end">
                     <br>
             <input type="submit"  name="generate">


             
         </form>
         <?php
         if(isset($_POST['generate'])){
             $start=$_POST['start'];
             $end=$_POST['end'];
         ?>
     <table class="table" style="width:100%">
 
        <tr>
            
            <th>Product ID</th>
     
             <th>Name</th>
                  <th>SalePrice</th>
                  <th>PurchasePrice</th>
                  <th>Sales</th>
                    <th>Purchases</th>
                      
         


        </tr>

        
        <?php 
$db=mysqli_connect('localhost','root','','engineering');

        $shares = "SELECT st.PID,p.name as name,AVG(st.saleprice) as saleprice,AVG(st.purchaseprice) as pprice,SUM(st.quantity)as quantity FROM stock as   st inner join product as p on st.PID=p.PID where st.date between '$start' and '$end' group by st.PID ";
       

        $result = mysqli_query($db,$shares);

        $num = mysqli_num_rows($result);

        if($num == 0){

            echo "<tr><td>Nothing.</td></tr>";

        }else{


            $counter = 0;
            while($row = mysqli_fetch_assoc($result)){
  $id= $row['PID']; 
               $name= $row['name']; 
      
            $price= $row['saleprice'];
                     
                 $purchaseprice= $row['pprice'];
                $quantity = $row['quantity'];
                $profitloss=$price*$quantity-$purchaseprice*$quantity;
                 
                
          



            $counter++;


            ?>

            <tr>
                
                <td><?php echo $id ?></td>
                <td><?php echo $name ?></td>
               
 <td><?php echo $price ?></td>

 <td><?php echo $purchaseprice ?></td>
                  <td><?php echo $quantity ?></td>
                    <td><?php echo $profitloss ?></td>
                    
          

            </tr>
<?php
         }}}
?>
     </table>

</center>
<!-- END Work -->

		<div class="gtco-section">
			<div class="gtco-container">
				<div class="row">
					<div class="col-md-6 gtco-news">
						<h2>News</h2>	
						<ul>
							<li>
								<a href="#">
									<span class="post-date">September 10, 2016</span>
									<h3>Manila Bridge Re-construction</h3>
									<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus placerat enim et urna sagittis, rhoncus euismod...</p>
								</a>
							</li>

							<li>
								<a href="#">
									<span class="post-date">September 10, 2016</span>
									<h3>Manila Bridge Re-construction</h3>
									<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus placerat enim et urna sagittis, rhoncus euismod...</p>
								</a>
							</li>

							<li>
								<a href="#">
									<span class="post-date">September 10, 2016</span>
									<h3>Manila Bridge Re-construction</h3>
									<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus placerat enim et urna sagittis, rhoncus euismod...</p>
								</a>
							</li>
						</ul>
						<p><a href="#" class="btn btn-sm btn-special">More News</a></p>
					</div>
					<!-- END News -->
					<div class="col-md-5 col-md-push-1 gtco-testimonials">
						<h2>Testimonials</h2>
						<blockquote>
							<p>&ldquo;Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus placerat enim et urna sagittis, rhoncus euismod erat tincidunt. Donec tincidunt volutpat erat.&ldquo;</p>
							<p class="author"><cite>&mdash; John Doe Dueller</cite></p>
						</blockquote>
						<blockquote>
							<p>&ldquo;Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus placerat enim et urna sagittis, rhoncus euismod erat tincidunt. Donec tincidunt volutpat erat.&ldquo;</p>
							<p class="author"><cite>&mdash; John Doe Dueller</cite></p>
						</blockquote>
					</div>
				</div>
			</div>
		</div>
		<!-- END  -->

		<div class="gtco-section gto-features">
			<div class="gtco-container">
				<div class="row">
					<div class="col-md-4">
						<div class="feature-left">
							<i class="ti-zip icon"></i>
							<div class="copy">
								<h3>Architect</h3>
								<p>Lorem ipsum dolor sit ameteista, consectetur adipiscing is not elitistaris.</p>
								<p><a href="#" class="gtco-more">Learn more</a></p>
							</div>
						</div>
					</div>
					<div class="col-md-4">
						<div class="feature-left">
							<i class="ti-hummer icon"></i>
							<div class="copy">
								<h3>Planning</h3>
								<p>Lorem ipsum dolor sit ameteista, consectetur adipiscing is not elitistaris.</p>
								<p><a href="#" class="gtco-more">Learn more</a></p>
							</div>
						</div>
					</div>
					<div class="col-md-4">
						<div class="feature-left">
							<i class="ti-plug icon"></i>
							<div class="copy">
								<h3>Parks &amp; Events</h3>
								<p>Lorem ipsum dolor sit ameteista, consectetur adipiscing is not elitistaris.</p>
								<p><a href="#" class="gtco-more">Learn more</a></p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

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

	<!-- Main -->
	<script src="js/main.js"></script>

	</body>
</html>

