
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
       
            <?php

            if(isset($_GET['edit'])){

                $edit_id = $_GET['edit'];
                $db=mysqli_connect('localhost','root','','engineering');
                $edit_query = "SELECT * FROM project WHERE PrID = '{$edit_id}' ";
                $result_edit = mysqli_query($db,$edit_query);
                $row_edit = mysqli_fetch_assoc($result_edit);

                $edit_name = $row_edit['name'];
$edit_fr = $row_edit['functional_requirement'];
$edit_price = $row_edit['price'];
$edit_file = $row_edit['file'];
$edit_video = $row_edit['video'];
$edit_status= $row_edit['status'];

                ?>

                
<form method="post" action="" style="width:300px" >



<input type="hidden" value="<?php echo $edit_id ?>" name="edit_id">


<div class="form-group col-sm-1">
    <a href="manage_products.php" class="btn btn-danger"><<</a>
</div>  


Project Name<input type="text" value="<?php echo $edit_name ?>" name="pname" class="form-control" required>
Project Price<input type="text" value="<?php echo $edit_price ?>" name="pprice" class="form-control" required>
Project File<input type="file" value="<?php echo $edit_file ?>" name="pfile" class="form-control" required>
Functional Requirement<input type="text" value="<?php echo $edit_fr ?>" name="pfr" class="form-control" required>
Status<input type="text" value="<?php echo $edit_status ?>" name="pstatus" class="form-control" required>

<input type="submit"  name="update" value="update" class="btn btn-info">









        </form>

        <?php 


        if(isset($_POST['update'])){

            $edit_id = $_POST['edit_id'];
            $editpname = $_POST['pname'];
             $editpprice = $_POST['pprice'];
              $editpfr = $_POST['pfr'];
               $editpfile = $_POST['pfile'];
                 $status = $_POST['pstatus'];
 $db=mysqli_connect('localhost','root','','engineering');
            $edit_update = "UPDATE project SET name ='$editpname' , price ='$editpprice' , file ='$editpfile', functional_requirement ='$editpfr' , status='$status' WHERE PrID = '{$edit_id}' ";
            $edit_re = mysqli_query($db,$edit_update);
            if($edit_re){

                header("Location: manage_projects.php");
            }
        }   

            }


         ?>
         
<div class="form-group col-sm-1">
    <a href="manage_projects.php" class="btn btn-danger"><<</a>
</div>  

<?php


        if(isset($_GET['video'])){

            $edit_id = $_GET['video'];
            
       
                ?>
         <?php 
$db=mysqli_connect('localhost','root','','engineering');

        $shares = "SELECT * FROM project where PrID=$edit_id";

        $result = mysqli_query($db,$shares);

        $num = mysqli_num_rows($result);

        if($num == 0){

            echo "<tr><td>Nothing.</td></tr>";

        }else{


            $counter = 0;
            while($row = mysqli_fetch_assoc($result)){

               
                $video = $row['video'];
            }
        }

            ?>

<input type="hidden" value="<?php echo $edit_id ?>" name="edit_id">
  <a href="edit_projects.php?video=<?php $video ?>">

    <video width="1000px" height="500px" controls>
    <source src="video/<?php echo $video ?>" type="video/mp4">
    <source src="video/<?php echo $video ?>" type="video/mp4">
  Your browser does not support HTML5 video.
  </a> </video>
<form method="post" action="" style="width:300px" >




      <br>
<label>Change Video</label><input type="file" name="pfile" class="form-control" required>


<input type="submit"  name="up_video" value="Enter" class="btn btn-info">









        </form>
            
            <?php
             if(isset($_POST['up_video'])){

            $edit_id = $_GET['video'];
             $pfile = $_POST['pfile'];
 $db=mysqli_connect('localhost','root','','engineering');
            $edit_update = "UPDATE project SET  video='$pfile' WHERE PrID = '{$edit_id}' ";
            $edit_re = mysqli_query($db,$edit_update);
            if($edit_re){

           header('location:manage_projects.php');
            }
        }   
        }



         ?>

</center>

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

