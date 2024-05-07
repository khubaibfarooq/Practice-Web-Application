<?php include_once "connect.php"; 


ob_start();
session_start(); 
$user_id = $_SESSION['uid'];
$user_type = $_SESSION['type'];

?> 


<?php if($user_type  != 'admin'){ 
    header("Location: logout.php");
    
} ?>

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
          
 
                                                      <li><a href="Admin.php">Home</a></li>
                                                         <li><a href="add-Planes.php"class="btn">Planes</a></li>
                                                        <li><a href="add-Locations.php"class="btn">Locations</a></li>
                                                        <li><a href="Add-Flight-Schedule.php"class="btn">FlightSchedule</a></li>
                                                        <li><a href="View-Users.php"class="btn">Users</a></li>
                                                      
                                                      
                                                       
                                                        <li><a href="Logout.php"class="btn">Logout</a></li>
          </ul>
        </div>



 <!-- End Navigation links -->



<div class="section contact" id="contact" style="margin-top: 2em !important">
<div class="container">

<h4 class="text-center">
<span >All</span>
<span >User</span>

</h4>


<div class="container">
<div class="col-md-12">




<form method="post" >
            


     <input type="text" name="fname" class="form-control" placeholder="Full Name of mechanic" required>
   <input type="text" name="uname" class="form-control" placeholder="User Name" required>
      <input type="text" name="phone" class="form-control" placeholder="Phone number" required>
         <input type="text" name="address" class="form-control" placeholder="Address  " required>
        
    <input type="email" name="email" class="form-control" placeholder=" Email" required>

    
     <input type="password" name="password" class="form-control" placeholder=" Password " required>
Select Type of  User
 <select name="type">
        <option value="admin">Admin</option>
        <option value="user">User</option>
       
    </select>


<input type="submit" name="add" value="Add" class="btn btn-danger">


</form><hr>


    <?php 

    if(isset($_POST['add'])){

       $email = $_POST['email'];


$reg_query = "SELECT Email FROM accounts WHERE Email = '{$email}'";
$result = mysqli_query($db,$reg_query);


$rows = mysqli_num_rows($result);
if($rows > 0){
echo "<p class='alert alert-danger'>Email has been Taken, Try with new one.</p>";
}else{

$fname = $_POST['fname'];
$uname = $_POST['uname'];
$phone = $_POST['phone'];
$address = $_POST['address'];

$type =$_POST['type'];

$password = $_POST['password'];


$register_query = "INSERT INTO login_info (UserName,FullName,Email,Password,Address,ContactNo,Type) VALUES ('{$uname}','{$fname}','{$email}','{$password}','{$address}','{$contact}','{$type}')";

$register_result = mysqli_query($db,$register_query);

   if($register_result){

  header("Location: View-Users.php");
   
    }else{
     
      echo "<p class='alert alert-danger'>Try Again Please</p>";
    
    }
    }}    
    


     ?>


    <table class="table table-bordered w3-table w3-striped w3-bordered">

        <tr>
            
            <th>ID</th>
            <th>UserName</th>
                <th>FullName</th>
                  
                    <th>Address</th>
                        <th>PhoneNo</th>
                            <th>Email</th>
                                 <th>Type</th>
  
            <th>Delete</th>


        </tr>

        
        <?php 


        $shares = "SELECT * FROM login_info   ORDER BY UID DESC  ";

        $result = mysqli_query($db,$shares);

        $num = mysqli_num_rows($result);

        if($num == 0){

            echo "<tr><td>Nothing.</td></tr>";

        }else{


            $counter = 0;
            while($row = mysqli_fetch_assoc($result)){
$id=$row['UID'];
             $fname = $row['FullName'];
$uname = $row['UserName'];
$contact= $row['ContactNo'];
$address = $row['Address'];

$email= $row['Email'];
$type= $row['Type'];

            $counter++;


            ?>

            <tr>
                 <td><?php echo $counter ?></td>
                <td><?php echo $uname ?></td>
                <td><?php echo $fname ?></td>
 
  <td><?php echo $address ?></td>
   <td><?php echo $contact ?></td>
    <td><?php echo $email ?></td>
 <td><?php echo $type ?></td>
            

                
                <td><a class='btn btn-danger' href="View-Users.php?del=<?php echo $id ?>">delete</a></td>

            </tr>

            <?php

            }
            ?>
                </table>

<?php
            
            if(isset($_GET['del'])){

                $del_id = $_GET['del'];
                $del_fav = "DELETE FROM accounts WHERE UID = '{$del_id}' ";
                $result_del = mysqli_query($db,$del_fav);
                if($result_del){

                    header("Location: View-Users.php");
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
			<div class="pull-right"> <a href="Admin.php">Online Air Line Reservation System</a></div>
		</div>
	</div>
	</body>
        
</html>



