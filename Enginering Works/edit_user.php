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
    <body>
    <center>
        <?php 


        if(isset($_POST['update'])){

            $edit_id = $_POST['edit_id'];
            $editpname = $_POST['pname'];
             $editpCNIC = $_POST['pCNIC'];
              $editpaddress = $_POST['paddress'];
               $editpemail = $_POST['pemail'];
                   $contact = $_POST['pcontact'];
                       $editppassword = $_POST['ppassword'];
 $db=mysqli_connect('localhost','root','','engineering');
            $edit_update = "UPDATE client SET name ='$editpname' , CNIC ='$editpCNIC' , address ='$editpaddress', password ='$editppassword',email_id='$editpemail',contact='$contact' WHERE CID = '{$edit_id}' ";
            $edit_re = mysqli_query($db,$edit_update);
            if($edit_re){

                header("Location: user_profile.php");
            }
        }   

            


         ?>
            <?php

            



            if(isset($_GET['edit'])){

                $edit_id = $_GET['edit'];
                $db=mysqli_connect('localhost','root','','engineering');
                $edit_query = "SELECT * FROM client WHERE CID = '{$edit_id}' ";
                $result_edit = mysqli_query($db,$edit_query);
                $row_edit = mysqli_fetch_assoc($result_edit);

                $edit_name = $row_edit['name'];
$edit_CNIC = $row_edit['CNIC'];
$edit_address = $row_edit['address'];
$edit_password= $row_edit['password'];
$edit_email = $row_edit['email_id'];
$edit_contact = $row_edit['contact'];
            }
                ?>

                
<form method="post" action="" style="width:300px">



<input type="hidden" value="<?php echo $edit_id ?>" name="edit_id">


<div class="form-group col-sm-1">
    <a href="user_profile.php" class="btn btn-danger"><<</a>
</div>  


Client Name<input type="text" value="<?php echo $edit_name ?>" name="pname" class="form-control" required>
CLient CNIC<input type="text" value="<?php echo $edit_CNIC ?>" name="pCNIC" class="form-control" required>
Address<input type="text" value="<?php echo $edit_address ?>" name="paddress" class="form-control" required>
Password<input type="text" value="<?php echo $edit_password ?>" name="ppassword" class="form-control" required>
Email<input type="text" value="<?php echo $edit_email ?>" name="pemail" class="form-control" required>
Contact<input type="text" value="<?php echo $edit_contact ?>" name="pcontact" class="form-control" required>


<input type="submit"  name="update" value="update" class="btn btn-info">









        </form>



           




       





</center>


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

