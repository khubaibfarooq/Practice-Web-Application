
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
         <h1>Handle Agreements AND payments with client</h1>
         <form method="post" style="width:300px">
                <select name="project" class="form-control">
            <option value="">Select project</option>
 <?php  
     $conn=mysqli_connect('localhost','root','','engineering');
    $p="select  * from project";
 $result_u=mysqli_query($conn,$p);
             while($row_u =mysqli_fetch_assoc($result_u)){
            echo " <option value='{$row_u['PrID']}'  >{$row_u['name']} </option>";
       
        }
            

?></select>
                   <select name="client" class="form-control">
            <option value="">Select client</option>
 <?php  
     $conn=mysqli_connect('localhost','root','','engineering');
    $C="select  * from client";
 $result_C=mysqli_query($conn,$C);
             while($row_C =mysqli_fetch_assoc($result_C)){
            echo " <option value='{$row_C['CID']}'  >{$row_C['name']} </option>";
       
        }
            

?></select>
        Upload Aggreement FIle     <input type="file" name="file" class="form-control">
       Amount OF project <input type="number" name="Amount" placeholder="enter price/amount" class="form-control">
       <input type="submit" name="submit" value="Enter" class="btn btn-success">
         </form>
   <?php
   if(isset($_POST['submit'])){
       $project=$_POST['project'];
       $client=$_POST['client'];
       $file=$_POST['file'];
       $Amount=$_POST['Amount'];
       $conn=mysqli_connect('localhost','root','','engineering');
    $query="INSERT INTO agreements values(null,'$project','$client','$file','$Amount','unsigned',now());";
 $result=mysqli_query($conn,$query);
 
 if($result){
     Echo "<p class='alert alert-success'> Agreement added</p>";
 
   }}
   ?>
    <table class="table table-bordered">

        <tr>
              <th>Counter ID</th>
            <th>Agreement ID</th>
            <th>Project ID |  Name </th>
            <th>Client ID |  Name</th>
            <th>FILE</th>
           
             <th>Amount</th>
          
             <th>Status</th>
              <th>Agreement Date</th>
            <th>Edit Status</th>
           

        </tr>

        
        <?php 
$db=mysqli_connect('localhost','root','','engineering');

        $q = "SELECT * FROM agreements ";

        $result = mysqli_query($db,$q);

        $num = mysqli_num_rows($result);

        if($num == 0){

            echo "<tr><td>Nothing.</td></tr>";

        }else{


            $counter = 0;
            while($row = mysqli_fetch_assoc($result)){

                $id = $row['AgID'];
                $PRID = $row['PrID'];
            
    $project_query="select  * from project where PrID=$PRID";
             
 $result_project=mysqli_query($conn,$project_query);
 $row_project = mysqli_fetch_assoc($result_project);
 $projectname=$row_project['name'];
                $CID = $row['CID'];
                        
    $client_query="select  * from client where CID=$CID";
             
 $result_client=mysqli_query($conn,$client_query);
 $row_client = mysqli_fetch_assoc($result_client);
 $clientname=$row_client['name'];
                $file = $row['file'];
                $amount = $row['Amount'];
$status = $row['status'];
$date = $row['Date'];

            $counter++;


            ?>

            <tr>
                
                <td><?php echo $counter ?></td>
   
                <td><?php echo $id ?></td>
                  <td>  <?php echo $PRID ?>   |    <?php echo $projectname ?></td>
                    <td> <?php echo $CID ?>  |   <?php echo $clientname ?></td>
                 
                    <td><a href="file/<?php echo $file ?>" download >File </a></td>
                     <td><?php echo $amount ?></td>
                    <td><?php echo $status ?></td>
<td><?php echo $date ?></td>
                    <td><a class='btn btn-info' href="agreements.php?status=<?php echo $id ?>">Click if(signed-paid)</a></td>

                

            </tr>

        



              


        <?php 


        if(isset($_GET['status'])){

            $edit_id = $_GET['status'];
            
              
 $db=mysqli_connect('localhost','root','','engineering');
            $edit_update = "UPDATE agreements SET status ='signed-paid' ,Date=now() WHERE AgID = '{$edit_id}' ";
            $edit_re = mysqli_query($db,$edit_update);
            if($edit_re){
      header("Location: agreements.php");
        
            }
            }   




         ?>



<?php
        }}
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

