     <?php ob_start();
  session_start(); 
     ?>

     <!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
 
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
    <title>Engineering Works Web Portal </title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  
   
  </head>
<style>
   
    * {
  box-sizing: border-box;
}

/* Create four equal columns that floats next to each other */
.column {
  float: left;
  width: 25%;
  padding: 10px;
  height: 300px; /* Should be removed. Only for demonstration */
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}
  
</style>

</head>
<!-- NAVBAR
================================================== -->
  <body>
      <nav class="navbar navbar-inverse" style="background-color: black;height:100px"  >
  
     <li> <a  style="color:white;" class="navbar-brand" href="client.php" > <h1> <span >  Engineering Works Web Portal</span></h1></a></li>
  <ul class="nav nav-pills navbar-right">

                                                                                     <?php
$items=0;
if(isset($_SESSION['cart'])){
$items=$_SESSION['cart'];}


?> 
    
 <ul class="nav nav-pills navbar-right">
      <li><a style="color:white" class="btn btn-success" href="index.php" >Home</a></li>
  <li><a style="color:white" class="btn btn-success" href="about_us.php" >About Us</a></li>
  <li><a style="color:white" class="btn btn-success" href="contact_us.php" >Contact_US</a></li>
  <li><a style="color:white" class="btn btn-success" href="products_clients.php" >Products</a></li>
      <li><a style="color:white" class="btn btn-success" href="projects_clients.php" >Projects</a></li>          
 <?php if(isset($_SESSION['login'])==true){ 
      echo  "<li><a style='color:white' class='btn btn-success' href='orders.php' >Orders</a></li>";
      echo  "<li><a style='color:white' class='btn btn-success' href='client_aggrements.php' >Agreements</a></li>";
      echo  "<li><a style='color:white' class='btn btn-success' href='cart.php' >Cart <sup style='color:red'> $items </sup></a></li>";
     echo  "<li><a style='color:white' class='btn btn-success' href='logout.php' >Logout</a></li>";
     
 } 
     else{
 echo  "  <li><a style='color:white' class='btn btn-sucess' href='signin.php' >SIGN-in</a></li>";
     echo " <li><a href='signup.php'   style='color:white' class='btn btn-success'><span>SIGN-UP</span></a></li>";
     
 }
                                ?>
                                         
			
				
	
                                                   
                           
                            </ul>
      </nav>
      
                           <br><br> <br><br>

  <center>  <center>

                            <form method="post" style='width:300px'>
				
				  <label>First Name:</label>
				         
					<input type="text" class="form-control"  placeholder="Enter First Name" name="fname">
				 
				  <label>Last Name:</label>
				        
					<input type="text" class="form-control" placeholder="Enter Last Name" name="lname">
				 
				  <label>Email:</label>
				
					<input type="email" class="form-control" placeholder="Enter email" name="email">
				
				  <label>Comment:</label>
				
					<input class="form-control"name="comments" style="height:100px;width:500px"></textarea>
				
                                        <input  type="submit" class="btn btn-warning" name="send" value="Send>>">
				
</form>
		
 <?php
                            if(isset($_POST['send'])){
                                $fname=$_POST['fname'];
                                $lname=$_POST['lname'];
                                $email=$_POST['email'];
                                 $comment=$_POST['comments'];
                                 IF(ISSET($_GET['project'])){
                                     $prid=$_GET['project'];
                                 } else
                                     $prid=0;
                                  
                                       $conn=mysqli_connect('localhost','root','','enggworks');
    $register="INSERT INTO message values(null,'$comment',now(),'$fname','$lname','$email','not replied','$prid')";
    
    $result_r=mysqli_query($conn,$register);
    if($result_r){
        echo "<p class='alert alert-success' >Thanks for contacting !We Contact You Soon</p>";
                            } else {
                                echo "<p class='alert alert-danger' >Oops ,Something is wrong Send again</p>";
                            }
                            }
                            ?>

  </center>

	</body>

</html>
