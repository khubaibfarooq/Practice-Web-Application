  <?php ob_start();
     ?>
<?php include_once"connect.php";?>
 <!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
 
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
    <title>Airline Reservation System</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">



  
   
  </head>




  <body  >
	<!-- NAVBAR
================================================== -->
  <div class="navbar" style=" background-image:url(img/airline.png);  background-size: cover;"  >
      <!-- Header Text -->
      <header> <h1>Airline Reservation System</h1></header> 


 <!-- Navigation links -->
                     <ul class="nav nav-pills navbar-right">
                        
                                                      <li><a href="index.php" >Home</a></li>
                                                       <li><a href='Login.php' class='btn'>Login</a></li>
                                                                <li><a href='Register.php' class='btn'>Register</a></li>
                                                  
                                                   
                           
                            </ul>
        </div>
 <!-- End Navigation links -->

<div class="container">
    <div class="col-md-8">

    <h3>Register your  Account :</h3><br>
     
<form method="post" style="padding:2em">

  
     <input type="text" name="fname" class="form-control" placeholder="Your Full  Name" required>
   <input type="text" name="uname" class="form-control" placeholder="User Name" required>
      <input type="text" name="contact" class="form-control" placeholder="Contact number" required>
         <input type="text" name="address" class="form-control" placeholder="Address  " required>
 
    <input type="email" name="email" class="form-control" placeholder="Your Email" required>

    <select name="type">
        <option value="admin">Admin</option>
        <option value="user">User</option>
       
    </select>
     <input type="password" name="password" class="form-control" placeholder="Your Password " required>



  

    <input type="submit" class="btn-success" name="submit" value="Sign-Up">



    </form>





<?php 


if(isset($_POST['submit'])){


$email = $_POST['email'];


$reg_query = "SELECT Email FROM login_info WHERE Email = '{$email}'";
$result = mysqli_query($db,$reg_query);


$rows = mysqli_num_rows($result);
if($rows > 0){
echo "<p class='alert alert-danger'>Email has been Taken, Try with new one.</p>";
}else{

$fname = $_POST['fname'];
$uname = $_POST['uname'];
$contact = $_POST['contact'];
$address = $_POST['address'];

$type = $_POST['type'];

$password = $_POST['password'];


$register_query = "INSERT INTO login_info (UserName,FullName,Email,Password,Address,ContactNo,Type) VALUES ('{$uname}','{$fname}','{$email}','{$password}','{$address}','{$contact}','{$type}')";

$register_result = mysqli_query($db,$register_query);

   if($register_result){

   echo "<p class='alert alert-success'>Success, Now you can Login.</p>";
   
    }else{
     
      echo "<p class='alert alert-danger'>Try Again Please</p>";
    
    }


  }

} 




?>






    </div>
 
    <div class="clearfix"></div>
</div>

</div>
</div>

<div class="clearfix"></div>
<div class="footerBottomSection">
		<div class="container">
			&copy; 2019, Allright reserved. <a href="#">Terms and Condition</a> | <a href="#">Privacy Policy</a> 
			<div class="pull-right"> <a href="index.html">Online Air Line Reservation System</a></div>
		</div>
	</div>
	</body>
        
</html>
