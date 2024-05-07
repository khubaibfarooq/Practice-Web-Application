<?php include_once "connect.php"; 


ob_start();
session_start(); 
$user_id = $_SESSION['uid'];
$user_type = $_SESSION['type'];

?> 


<?php if($user_type  != 'user'){ 
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
          
 
                                                      <li><a href="index.php">Home</a></li>
                                                         <li><a href='User-Reserved-Seats.php' class='btn'>Reserved Seats</a></li>
                                                                <li><a href='Logout.php' class='btn'>Logout</a></li>
                                                      
                                                       
                                                       
          </ul>
        </div>



 <!-- End Navigation links -->




<h1>Your Reservations</h1>
<div class="contact-form">
    <div class="col-md-12">
       
      
        
    
<?php 





$sql = "Select * from  reservations where UID='$user_id'  ";


$result = mysqli_query($db,$sql);
$num = mysqli_num_rows($result);
if($num>0){?>

     <table class="w3-table-all table table-bordered">

<tr class="w3-red">
<th>ID</th>



<th>UserName</th>
<th>FlightID</th>
<th>TotalPrice</th>
<th>	FlightDate</th>
<th>	FlightTime</th>
<th>	ReservationDate</th>
<th>	BasicPrice</th>
<th>	Seats</th>

<th>Status</th>






</tr>
<?php $counter = 0;
while($row = mysqli_fetch_assoc($result)){


$rid= $row['ResID'];


$username=$_SESSION['username'];

$fid = $row['FID'];
$totalprice=$row['TotalPrice'];
$flightdate=$row['FlightDate'];
$flighttime=$row['FlightTime'];
$resdate=$row['ResDate'];
$basicprice=$row['BasicPrice'];
$seats=$row['Seats'];

$status=$row['Status'];







$counter++;


?>



<tr>

<td><?php echo $counter ?></td>


<td><?php echo $username ?></td>

<td><?php echo $fid ?></td>



<td><?php echo $totalprice ?></td>
<td><?php echo $flightdate ?></td>
<td><?php echo $flighttime ?></td>
<td><?php echo $resdate ?></td>
<td><?php echo $basicprice ?></td>
<td><?php echo $seats ?></td>
<td><?php echo $status ?></td>





</tr>




<?php


}?></table>


<?php
}?>
</div></div>


<div class="clearfix"></div>
<div class="footerBottomSection">
		<div class="container">
			&copy; 2019, Allright reserved. <a href="#">Terms and Condition</a> | <a href="#">Privacy Policy</a> 
			<div class="pull-right"> <a href="index.php">Online Air Line Reservation System</a></div>
		</div>
	</div>
	</body>
        
</html>
