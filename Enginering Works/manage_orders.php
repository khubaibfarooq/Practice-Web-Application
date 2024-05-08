
<?php


ob_start();
session_start(); 
$user_id = $_SESSION['AID'];

include_once'SendMail.php';
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
     
    <table class="table table-hover">

        <tr>
            
            <th>Order ID</th>
            <th>Client ID</th>
             <th>Status</th>
             <th>Total Amount</th>
            
         <th>Date &time</th>
            <th>Details</th>
            
            <th>Update Status</th>
            <th>Delete</th>


        </tr>

        
        <?php 
$db=mysqli_connect('localhost','root','','engineering');

        $shares = "SELECT * FROM orders ";

        $result = mysqli_query($db,$shares);

        $num = mysqli_num_rows($result);

        if($num == 0){

            echo "<tr><td>Nothing.</td></tr>";

        }else{


            $counter = 0;
            while($row = mysqli_fetch_assoc($result)){

                $id = $row['OID'];
            
                 
               
                $CID = $row['CID'];
                $client= "SELECT * FROM client where CID= $CID";

        $result_c = mysqli_query($db,$client);

        $num_c = mysqli_num_rows($result_c);

            while($row_c= mysqli_fetch_assoc($result_c)){
                $name= $row_c['name'];
                $email= $row_c['email_id'];
            }
                $status= $row['status'];
                $total= $row['TotalAmount'];
                $date = $row['date&time'];
          



            $counter++;


            ?>

            <tr>
                
                <td><?php echo $id ?></td>
 <?PHP
$db=mysqli_connect('localhost','root','','engineering');
$order= "SELECT * FROM order_details WHERE OID=$id;";

        $result_order = mysqli_query($db,$order);


            $row_order= mysqli_fetch_assoc($result_order);
                $ProductID= $row_order['PID'];
              
                $q= $row_order['quantity'];
               
                ?>
               
                <td><?php echo $name ?></td>
                  <td><?php echo $status ?></td>
                   <td><?php echo $total ?></td>
                    <td><?php echo $date ?></td>
                   
                    <td><a class='btn btn-info' href="manage_orders.php?details=<?php echo $id ?>">details</a></td>
                <td><a class='btn btn-info' href="manage_orders.php?status=<?php echo $id ?>">Status</a></td>

                
                <td><a class='btn btn-danger' href="manage_orders.php?del=<?php echo $id ?>">delete</a></td>

            </tr>

            <?php

            }



            if(isset($_GET['status'])){

                $edit_id = $_GET['status'];
                $db=mysqli_connect('localhost','root','','engineering');
                $edit_query = "SELECT * FROM orders WHERE OID = '{$edit_id}' ";
                $result_edit = mysqli_query($db,$edit_query);
                $row_edit = mysqli_fetch_assoc($result_edit);

              

                ?>

            <div style="width:500px">
<form method="post" action=""  style="width:300px">



<input type="hidden" value="<?php echo $edit_id ?>" name="edit_id">

<input type="hidden" value="<?php echo $email ?>" name="email">
<input type="hidden" value="<?php echo @$q ?>" name="quantity">



<div class="form-group col-sm-1">
    <a href="manage_orders.php" class="btn btn-danger">x</a>
</div>  
<select name="status" class="form-control">
    <option value="">select Status</option>
    <option value="Approve">Approve</option>
    <option value="Reject">Reject</option>
</select>

<input type="submit"  name="up_cat" value="update" class="btn btn-info">

        </form>
</div> 


                <?php

            }





            if(isset($_GET['del'])){

                $del_id = $_GET['del'];
                     $db=mysqli_connect('localhost','root','','engineering');
                $del_fav = "DELETE FROM orders WHERE OID = '{$del_id}' ";
                $result_del = mysqli_query($db,$del_fav);
                if($result_del){

                    header("Location: manage_orders.php");
                }

            }
        

        }


         ?>



  <?php
if(isset($_GET['details'])){?>
     <table class="table table-hover">
<div class="form-group col-sm-1">
    <a href="manage_orders.php" class="btn btn-danger">x</a>
    </div>  
        <tr>
            
            <th>Product ID</th>
        <th>Image</th>
             <th>Name</th>
                  <th>Price</th>
                  <th>Quantity</th>
                  
          


        </tr>

        
        <?php 
        if(isset($_GET['details'])){
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
                    $inhand= $row_or['inhand'];
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
}}}}
?>



        <?php 


        if(isset($_POST['up_cat'])){

            $edit_id = $_POST['edit_id'];
            $oid = $_POST['edit_id'];
            $status = $_POST['status'];
          $order= "SELECT * FROM order_details WHERE OID=$edit_id;";

        $result_order = mysqli_query($db,$order);


           while( $row_order= mysqli_fetch_assoc($result_order)){
                $PID= $row_order['PID'];
              
                $quantity= $row_order['quantity'];
            $email=$_POST['email'];
 $db=mysqli_connect('localhost','root','','engineering');
            $edit_update = "UPDATE orders SET status ='$status'  WHERE OID = '{$edit_id}' ";
            $edit_re = mysqli_query($db,$edit_update);
            if($edit_re){
                
              
             if($status='Approve')  { 
          
                 $productupdate = "UPDATE product SET inhand =inhand-'$quantity',date=now() WHERE PID = '{$PID}' ";
            $edit_re = mysqli_query($db,$productupdate);
             $edit_update = "UPDATE order_details SET date =now()  WHERE OID = '{$edit_id}' ";
            $edit_re = mysqli_query($db,$edit_update);
            SendMail($oid,$email,$db);}
            }
        }   }
        



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

