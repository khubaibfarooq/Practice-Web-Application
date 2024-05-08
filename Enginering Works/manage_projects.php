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

                $del = $_GET['del'];
                     $db=mysqli_connect('localhost','root','','engineering');
                $query= "DELETE FROM project WHERE PrID = '{$del}' ";
                $result_delete = mysqli_query($db,$query);
                

            }
        

        


         ?>
    <body>
           
                <?php
             if(isset($_POST['update'])){

            $edit_id = $_POST['edit_id'];
             $status = $_POST['status'];
 $db=mysqli_connect('localhost','root','','engineering');
            $edit_update = "UPDATE project SET  status='$status' WHERE PrID = '{$edit_id}' ";
            $edit_re = mysqli_query($db,$edit_update);
            if($edit_re){

                @header("Location: manage_projects.php");
            }
        }   
        
        


         ?>
    <center>
         
         <br>
         <div style="background-color:white;width:50%">
          
        <h1 style="color:orange"> Add Project</h1>
        <form method="post" action="manage_projects.php" enctype="multipart/form-data"> 
            Enter Project name <br><input type="text" name="name" placeholder="Enter Project Name"><br>
                     Enter Project Description <br><input type="text" name="functional" style="height:200px;width:200px;"  placeholder="Enter functional requirement"><br>
                               Enter Project Price <br><input type="number" name="price" placeholder="price in number"><br>
                                         Upload file <br><input type="file" name="file"><br>
                                       
            
            <input type="submit" name="submit" Value="Enter" class="btn btn-success">
            
        </form>
        <?php
        if(isset($_POST['submit'])){
            $name=$_POST['name'];
              $price=$_POST['price'];
              $des=$_POST['functional'];
              if($_FILES['file']['name']==""){
                $file=null;
            }else
            {
                $destination = __DIR__."/file/";
                $result = move_uploaded_file($_FILES['file']['tmp_name'], $destination.$_FILES['file']['name']);
                $file= $_FILES['file']['name'];
            }
        $db=mysqli_connect('localhost','root','','engineering');
        $sql="INSERT INTO project (name,functional_requirement,file,price,status) VALUES('$name','$des','$file','$price','started');";
    
        $result=mysqli_query($db,$sql);
        
        if($result){
            echo "<p class='alert alert-success'>Project is added</p>";
        }
        }
        ?>
        </div>
    <table class="table table-hover" >

        <tr>
            
            <th>ID</th>
            <th>Video</th>
            <th>Requirement file</th>
            <th>Name</th>
            <th>price</th>
            <th>Details</th>
              <th>status</th>
                 <th>Update status</th>
                <th>Video</th>
            <th>Edit</th>
            <th>Delete</th>


        </tr>

        
        <?php 
$db=mysqli_connect('localhost','root','','engineering');

        $shares = "SELECT * FROM project";

        $result = mysqli_query($db,$shares);

        $num = mysqli_num_rows($result);

        if($num == 0){

            echo "<tr><td>Nothing.</td></tr>";

        }else{


            $counter = 0;
            while($row = mysqli_fetch_assoc($result)){

                $id = $row['PrID'];
                $name = $row['name'];
                 $fr = $row['functional_requirement'];
                $price = $row['price'];
                $file = $row['file'];
                $video = $row['video'];
                $status = $row['status'];



            $counter++;


            ?>

            <tr>
                
                <td><?php echo $id ?></td>
                <td>
                    <a style="color:blue" href="edit_projects.php?video=<?php echo @$id ?>"> see video</a>
</td>
                 <td><a style="color:blue" href="file/<?php echo $file ?>" download >Download File </a></td>
                <td><?php echo $name ?></td>
                  <td><?php echo $price ?></td>
                    <td><?php echo $fr ?></td>

<td><?php echo $status ?></td>
 <td><a class='btn btn-info' href="manage_projects.php?status=<?php echo $id ?>">Update Status</a></td>
                <td><a class='btn btn-warning' href="edit_projects.php?video=<?php echo $id ?>">Add Video</a></td>
                <td><a class='btn btn-success' href="edit_projects.php?edit=<?php echo $id ?>">Update info</a></td>

                
                <td><a class='btn btn-danger' href="manage_projects.php?del=<?php echo $id ?>">Delete</a></td>

            </tr>

           


        





 <?php 


        if(isset($_GET['status'])){

            $edit_id = $_GET['status'];
       
                ?>
<div style="background-color:white;width:500px;height:200px">
<center>

<form method="post"  >



<input type="hidden" value="<?php echo $edit_id ?>" name="edit_id">


<div class="form-group col-sm-1">
    <a href="manage_projects.php" class="btn btn-danger">x</a>
</div>  <br><br>
<select name="status" class="form-control" style="width:300px">
<option value="">Select Status</option>
<option value="partially completed">partially completed</option>
<option value="completed">Completed</option>
<option value="delivered">Deliverd</option>
</select>
<br>
<input type="submit"  name="update" value="Update Status" class="btn btn-info" style="width:400px">


<br><br.






        </form></center></div>
            
   <?php
        }}} ?>



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

