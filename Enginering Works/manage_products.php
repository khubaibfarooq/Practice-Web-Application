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

   <?php

            if(isset($_GET['del'])){

                $del_id = $_GET['del'];
                     $db=mysqli_connect('localhost','root','','engineering');
                $del_product = "DELETE FROM product WHERE PID = '{$del_id}' ";
                
               
                    $result_product = mysqli_query($db,$del_product);
                    $del_stock = "DELETE FROM stock WHERE PID = '{$del_id}' ";
                $result_stock = mysqli_query($db,$del_stock);
                if($result_product){

                    header("Location: manage_products.php");
                }

            }
       


         ?>

<center>
 <div style="background-color:white;width:50%">
          
        <h1 style="color:green"> Add Product</h1>
        <form method="post" action="manage_products.php" enctype="multipart/form-data"> 
            Enter Product name <br><input type="text" name="name" placeholder="Product Name"><br>
            Enter Product Description <br><input type="text" name="description" placeholder="Description"><br>
           Enter Sale Price<br><input type="number" name="saleprice" placeholder="SalePrice"><br>
           Enter Purchase Price <br><input type="number" name="purchaseprice" placeholder="PurchasePrice"><br>
             
             Upload Image <br><input type="file" name="image"><br>
            
            <input type="submit" name="submit" Value="Enter" class="btn btn-danger">
            
        </form>
        <?php
        if(isset($_POST['submit'])){
            $name=$_POST['name'];
              
                if($_FILES['image']['name']==""){
                  $image=null;
              }else
              {
                  $destination =__DIR__."/images/";
                  $result = move_uploaded_file($_FILES['image']['tmp_name'], $destination.$_FILES['image']['name']);
                  $image= $_FILES['image']['name'];
              }
              $des=$_POST['description'];
           
               $saleprice=$_POST['saleprice'];
                $purchaseprice=$_POST['purchaseprice'];
                
        $db=mysqli_connect('localhost','root','','engineering');
        $sql="INSERT INTO product (name,image,saleprice,detail,inhand,purchaseprice,date) VALUES('$name','$image','$saleprice','$des','0','$purchaseprice',now())";
  $result=mysqli_query($db,$sql);
        $pid=mysqli_insert_id($db);
      
        if($result){
              $sql1="INSERT INTO stock (PID,quantity,saleprice,purchaseprice,date) VALUES('$pid','0','$saleprice',' $purchaseprice',now());";
    
        $result2=mysqli_query($db,$sql1);
            echo "<p class='alert alert-success'>Product is added</p>";
        }
        }
        ?>
 </div></center>
    <table class="table table-bordered">

        <tr>
            
            <th>ID</th>
            <th>Image</th>
            <th>Name</th>
            <th>Sale price</th>
            <th>Purchase price</th>
            <th>Details</th>
              <th>Inhand</th>
              <th>View Feedback</th>
              <th>Add Stock</th>
            <th>Edit</th>
            <th>Delete</th>


        </tr>

        
        <?php 
$db=mysqli_connect('localhost','root','','engineering');

        $shares = "SELECT * FROM product ";

        $result = mysqli_query($db,$shares);

        $num = mysqli_num_rows($result);

        if($num == 0){

            echo "<tr><td>Nothing.</td></tr>";

        }else{


            $counter = 0;
            while($row = mysqli_fetch_assoc($result)){

                $id = $row['PID'];
                $name = $row['name'];
                $saleprice = $row['saleprice'];
                 $purchaseprice = $row['purchaseprice'];
                $image = $row['image'];
                $detail = $row['detail'];
 $inhand = $row['inhand'];


            $counter++;


            ?>

            <tr>
                
                <td><?php echo $counter ?></td>
                 <td><img src="images/<?php echo $image ?>" height="50px" width="50px"></td>
                <td><?php echo $name ?></td>
                  <td><?php echo $saleprice ?></td>
                  <td><?php echo $purchaseprice ?></td>
                    <td><?php echo $detail ?></td>
                        <td><?php echo $inhand ?></td>
                    

                        <td><a class='btn btn-info' href="view_reviews.php?reviews=<?php echo $id ?>"> View Feedbacks</a></td>
 <td><a class='btn btn-warning' href="edit_stock.php?stock=<?php echo $id ?>">Add Stock</a></td>
 <td><a class='btn btn-success' href="edit_products.php?edit=<?php echo $id ?>">Update info</a></td>

                
 <td><a class='btn btn-danger' href="manage_products.php?del=<?php echo $id ?>">Delete Info</a></td>

            </tr>

           
<?php
        }}
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

