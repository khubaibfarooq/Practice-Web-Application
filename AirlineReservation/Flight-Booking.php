<?php include_once "connect.php"; 


ob_start();
session_start(); 
$user_id = @$_SESSION['uid'];
$user_type = @$_SESSION['type'];
     ?>
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
                                                <?php if($user_type=='user'){?>
                                                               <li><a href='User-Reserved-Seats.php' class='btn'>Reserved Seats</a></li>
                                                                <li><a href='Logout.php' class='btn'>Logout</a></li>
                                                <?php }else {?>
                                                                
                                                                       <li><a href='Login.php' class='btn'>Login</a></li>
                                                                <li><a href='Register.php' class='btn'>Register</a></li>
                                                <?php }?>  
                                                                 
                                                   
                           
                            </ul>
        </div>






<h1>Flight Booking</h1>
<div class="contact-form">
    <div class="col-md-8">
           
        
    
<?php 

if(isset( $_GET['fid'])){
$fid=$_GET['fid'];


$sql = "Select * from  flights where FID='$fid'  ";


$result = mysqli_query($db,$sql);
$num = mysqli_num_rows($result);
if($num>0){

$row = mysqli_fetch_assoc($result);

                $id = $row['FID'];
                    $planeid = $row['PlaneID'];
        $planes = "SELECT Name FROM planes where PlaneID='$planeid'  ";

        $result_p = mysqli_query($db,$planes);
                $row_p= mysqli_fetch_assoc($result_p);
                $name = $row_p['Name'];

                 $sourceid = $row['Source']; 
                   $srcloc = "SELECT LName FROM locations where LID='$sourceid'  ";

        $result_sl= mysqli_query($db,$srcloc);
                $row_sl= mysqli_fetch_assoc($result_sl);
                $source = $row_sl['LName'];
                
                 $destinationid = $row['Destination'];
                   $desloc = "SELECT LName FROM locations where LID='$destinationid'  ";

        $result_dl= mysqli_query($db,$desloc);
                $row_dl= mysqli_fetch_assoc($result_dl);
               $destination = $row_dl['LName'];
                  $date = $row['Dep_Date'];
                  $time = $row['Dep_Time'];
                   $fair= $row['Price'];
                   
                


}
}


?>
<form method="post" action="">
<input type="hidden" value="<?php echo @$id ?>" name="fid">






<h3>Plane Name            <?php echo @$name ?></h3>
<h3>Source Location:      <?php echo @$source ?></h3>
<h3>Destination Location: <?php echo @$destination ?></h3>
Price per Seat
<input type="text"  readonly  class="form-control"value="<?php echo @$fair ?>" name="fair">

<label>Date</label>
<input type="date" name="date" value="<?php echo @$date ?>" class="form-control"required readonly>
<label>Time</label>
<input type="time" name="time" value="<?php echo @$time ?>"  class="form-control"required readonly>
<input type="number"  name="seats" class="form-control" placeholder="Enter no of seats you want to reserve"><hr>

<?php  if(!isset($_SESSION['uid'])){?>
<h3>Please provide registered username and password to reserve seats</h3>
     <input type="text" placeholder="Enter  UserName  " name="username"class="form-control" required>
                                        <input type="password"  placeholder="Password" name="password"class="form-control" required>
    
   <?php }?>



<input type="submit"  name="reserve" value="Reserve" class="btn btn-info">




</form>
<?php  if(isset($_POST['reserve'])){
   
        $fid= $_POST['fid'];
        
        $seats= $_POST['seats'];
            $fair= $_POST['fair'];
            $totalprice=$seats*$fair;
            
      if(!isset($_SESSION['uid'])){
          $username=$_POST['username'];
          $password=$_POST['password'];
           $sql="SELECT * FROM login_info WHERE UserName='{$username}' and Password='{$password}' ; ";
              
                             $result=mysqli_query($db,$sql);
                             $num_row = mysqli_num_rows($result);
                                    

if($num_row > 0){
    $row = mysqli_fetch_assoc($result);

$user_id=$row['UID'];
}

      }

        
        if(isset($_SESSION['uid']) || isset($user_id)){

        $insert_query = "INSERT INTO reservations(UID,FID,Seats,BasicPrice,TotalPrice,FlightDate,FlightTime,ResDate,Status) VALUES ('{$user_id}','{$fid}','{$seats}','{$fair}','{$totalprice}','{$date}','{$time}',now(),'Pending')";
    
        $result = mysqli_query($db,$insert_query);

        if($result){

           echo "<p class='alert alert-success'>Flight is Successfully booked</p>";
        }}
    }
?>



</div></div>

<div class="clearfix"></div>
<div class="footerBottomSection">
		<div class="container">
			&copy; 2019, Allright reserved. <a href="#">Terms and Condition</a> | <a href="#">Privacy Policy</a> 
			<div class="pull-right"> <a href="index.html">Online Air Line Reservation System</a></div>
		</div>
	</div>
	</body>
        
</html>
