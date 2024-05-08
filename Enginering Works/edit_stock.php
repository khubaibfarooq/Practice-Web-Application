
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

    <body>
    <center>
         <br>
         <div style="background-color:white;width:50%">
       
            <?php
            if(isset($_GET['stock'])){

                $edit_id = $_GET['stock'];
                $db=mysqli_connect('localhost','root','','engineering');
                $edit_query = "SELECT * FROM stock WHERE PID = '{$edit_id}' ";
                $result_edit = mysqli_query($db,$edit_query);
                $row_edit = mysqli_fetch_assoc($result_edit);
       $editPID = $row_edit['PID'];
                $editq = $row_edit['quantity'];

                   $editsprice = $row_edit['saleprice'];
                      $editpprice = $row_edit['purchaseprice'];
                         $editd = $row_edit['date'];

                ?>

                
<form method="post" action="" >



<input type="hidden" value="<?php echo $_GET['stock']; ?>" name="edit_id">


<div class="form-group col-sm-1">
    <a href="manage_products.php" class="btn btn-danger"><<</a>
</div>  


Product Quantity<input type="text"  name="pq" class="form-control" required>
Purchase price<input type="text" value="<?php echo $editpprice ?>" name="pprice" class="form-control" required>
Sale Price<input type="text" value="<?php echo $editsprice ?>" name="sprice" class="form-control" required>



<input type="submit"  name="update" value="update" class="btn btn-info">









        </form>



                <?php

            }





  
             


         ?>






        <?php 


        if(isset($_POST['update'])){

            $edit_id = $_POST['edit_id'];
            $quantity = $_POST['pq'];
              $purchaseprice = $_POST['pprice'];
                 $saleprice = $_POST['sprice'];
                  
 $db=mysqli_connect('localhost','root','','engineering');
            $edit_update = "INSERT INTO stock (PID,quantity,saleprice,purchaseprice,date) VALUES('$edit_id','$quantity','$saleprice',' $purchaseprice',now());";
            ECHO $edit_update;
                  $edit_re = mysqli_query($db,$edit_update);
            if($edit_re){
 $edit="UPDATE product SET inhand =inhand+'$quantity' ,saleprice='$saleprice',purchaseprice='$purchaseprice' WHERE PID = '{$PID}'";
   $edit_re = mysqli_query($db,$edit);
                header("Location: manage_products.php");
            }
        }   




         ?>





</center>

<table class="table table-bordered w3-table w3-striped w3-bordered">

        <tr>
            
            <th>ID</th>
            <th>Product</th>
            <th>Quantity</th>
    <th>Sale Price</th>
    <th>Purchase Price</th>
       <th>Date</th>
            <th>Edit</th>
            <th>Delete</th>


        </tr>

        
        <?php 
$db=mysqli_connect('localhost','root','','engineering');
$PID=$_GET['stock'];
        $shares = "SELECT * FROM stock WHERE PID=$PID ";

        $result = mysqli_query($db,$shares);

        $num = mysqli_num_rows($result);

        if($num == 0){

            echo "<tr><td>Nothing.</td></tr>";

        }else{


            $counter = 0;
            while($row = mysqli_fetch_assoc($result)){

                $id = $row['StID'];
                 $PID = $row['PID'];
        $P = "SELECT * FROM product where PID=$PID ";

        $result_P = mysqli_query($db,$P);

       
            while($row_p = mysqli_fetch_assoc($result_P)){
                $name = $row_p['name'];
            
            }
                $quantity = $row['quantity'];
             
 $saleprice = $row['saleprice'];
  $purchaseprice= $row['purchaseprice'];
   $date = $row['date'];


            $counter++;


            ?>

            <tr>
                
                <td><?php echo $id ?></td>
             <td><?php echo $name ?></td>
             
                <td><?php echo $quantity ?></td>
                         <td><?php echo $saleprice ?></td>
                                 <td><?php echo $purchaseprice ?></td>        <td><?php echo $date ?></td>
                                 
                    


                <td><a class='btn btn-info' href="stock.php?edit=<?php echo $id ?>">Edit</a></td>

                
                <td><a class='btn btn-danger' href="stock.php?del=<?php echo $id ?>">delete</a></td>

            </tr>

            <?php

            }



            if(isset($_GET['edit'])){

                $edit_id = $_GET['edit'];
                $db=mysqli_connect('localhost','root','','engineering');
                $edit_query = "SELECT * FROM stock WHERE StID = '{$edit_id}' ";
                $result_edit = mysqli_query($db,$edit_query);
                $row_edit = mysqli_fetch_assoc($result_edit);
       $editPID = $row_edit['PID'];
                $editq = $row_edit['quantity'];

                   $editsprice = $row_edit['saleprice'];
                      $editpprice = $row_edit['purchaseprice'];
                         $editd = $row_edit['date'];

                ?>

                
<form method="post" action="" >



<input type="hidden" value="<?php echo $edit_id ?>" name="edit_id">
<input type="hidden" value="<?php echo $editPID ?>" name="editPID">

<div class="form-group col-sm-1">
    <a href="edit_stock.php" class="btn btn-danger">x</a>
</div>  


<input type="text" value="<?php echo $editq ?>" name="pq" class="form-control" required>
<input type="text" value="<?php echo $editpprice ?>" name="pprice" class="form-control" required>
<input type="text" value="<?php echo $editsprice ?>" name="sprice" class="form-control" required>
<input type="text" value="<?php echo $editd ?>" name="date" class="form-control" required>


<input type="submit"  name="up_cat" value="update" class="btn btn-info">









        </form>



                <?php

            }





            if(isset($_GET['del'])){

                $del_id = $_GET['del'];
                     $db=mysqli_connect('localhost','root','','enggworks');
                $del_fav = "DELETE FROM stock WHERE StID = '{$del_id}' ";
                $result_del = mysqli_query($db,$del_fav);
                if($result_del){

                    header("Location: edit_stock.php");
                }

            }
        

        }


         ?>






        <?php 


        if(isset($_POST['up_cat'])){
$editPID = $_POST['editPID'];
            $edit_id = $_POST['edit_id'];
            $editq = $_POST['pq'];
              $editpprice = $_POST['pprice'];
                 $editsprice = $_POST['sprice'];
                    $editd = $_POST['date'];
 $db=mysqli_connect('localhost','root','','engineering');
            $edit_update = "UPDATE stock SET quantity ='$editq' ,saleprice='$editsprice',purchaseprice='$editpprice',date='$date' WHERE StID = '{$edit_id}'";
            
                  $edit_re = mysqli_query($db,$edit_update);
            if($edit_re){
 $edit="UPDATE product SET inhand =inhand+'$editq' ,saleprice='$editsprice',purchaseprice='$editpprice' WHERE PID = '{$editPID}'";
   $edit_re = mysqli_query($db,$edit);
                header("Location: edit_stock.php");
            }
        }   




         ?>



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

