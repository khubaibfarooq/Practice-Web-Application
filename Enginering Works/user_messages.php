
<?php


ob_start();
session_start(); 
$user_id = $_SESSION['AID'];

include_once'ReplyClient.php';

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
                                                                         <li><a href="agreements.php">Agreements</a></li>
									
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
   
    <table class="table table-bordered">

        <tr>
            
            <th>ID</th>
            <th> Name</th>
          
            <th>Message</th>
           
             <th>Email</th>
          
             <th>Status</th>
            <th>Reply</th>
             <th>Delete</th>


        </tr>

        
        <?php 
$db=mysqli_connect('localhost','root','','engineering');

        $shares = "SELECT * FROM contact ";

        $result = mysqli_query($db,$shares);

        $num = mysqli_num_rows($result);

        if($num == 0){

            echo "<tr><td>Nothing.</td></tr>";

        }else{


            $counter = 0;
            while($row = mysqli_fetch_assoc($result)){

                $id = $row['MID'];
               
                $name = $row['name'];
                $message = $row['message'];
                $date = $row['date&time'];
  $email = $row['email'];
$status = $row['status'];


            $counter++;


            ?>

            <tr>
                
                <td><?php echo $counter ?></td>
   
                  <td><?php echo $name ?></td>
                    <td><?php echo $message ?></td>
                 
                    <td><?php echo $email ?></td>
                    <td><?php echo $status ?></td>

                    <td><a class='btn btn-info' href="user_messages.php?reply=<?php echo $id ?>">Reply</a></td>
<td><a class='btn btn-info' href="user_messages.php?del=<?php echo $id ?>">Delete</a></td>
                

            </tr>

            <?php

            }



            if(isset($_GET['reply'])){

                $edit_id = $_GET['reply'];
                $db=mysqli_connect('localhost','root','','engineering');
                $edit_query = "SELECT * FROM messages WHERE MID = '{$edit_id}' ";
                $result_edit = mysqli_query($db,$edit_query);
               

                 while($row = mysqli_fetch_assoc($result)){

                 $email = $row['email'];}
                ?>

                
<form method="post" action="" >



<input type="hidden" value="<?php echo $edit_id ?>" name="edit_id">


<div class="form-group col-sm-1">
    <a href="user_messages.php" class="btn btn-danger">x</a>
</div>  


<input type="text" value="<?php echo $email?>" name="email" class="form-control" required>

<input type="text" placeholder="Reply" name="reply" class="form-control" required>



<input type="submit"  name="update" value="update" class="btn btn-info">









        </form>



                <?php

            }





            if(isset($_GET['del'])){

                $del_id = $_GET['del'];
                     $db=mysqli_connect('localhost','root','','engineering');
                $del_fav = "DELETE FROM message WHERE MID = '{$del_id}' ";
                $result_del = mysqli_query($db,$del_fav);
                if($result_del){

                    header("Location: user_messages.php");
                }

            }
        

        }


         ?>






        <?php 


        if(isset($_POST['update'])){

            $edit_id = $_POST['edit_id'];
             $reply = $_POST['reply'];
              $email = $_POST['email'];
 $db=mysqli_connect('localhost','root','','engineering');
            $edit_update = "UPDATE contact SET status ='replied'  WHERE MID = '{$edit_id}' ";
            $edit_re = mysqli_query($db,$edit_update);
            if($edit_re){

               
                
    $email=$_POST['email'];
   
    reply($reply,$email);
      header("Location: user_messages.php");
        
            }
        }   




         ?>





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

	<!-- Main -->
	<script src="js/main.js"></script>

	</body>
</html>

