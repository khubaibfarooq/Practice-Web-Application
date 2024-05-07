  
<?php 
include_once"connect.php";

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




<div class="container">
    <div class="col-md-8">
        <form method="post">
      

        
     <select name="src-location" class="form-control" style="width: 100%">

<option value="" disabled selected>Choose  Source Location.....</option>


<?php 

$find_loc = "SELECT * FROM locations ORDER BY LID DESC";
$result = mysqli_query($db,$find_loc);

$num = mysqli_num_rows($result);
if($num == 0){

echo "<option value='' disabled selected>No Location Found</option>";

}else{

while($row = mysqli_fetch_assoc($result)){

$loc_id = $row['LID'];
$loc_name = $row['LName'];



echo "<option value='$loc_id '>".ucfirst($loc_name)."</option>";



}
}


?>

</select>
         <select name="dest-location" class="form-control" style="width: 100%">

<option value="" disabled selected>Choose  Destination Location.....</option>


<?php 

$find_loc = "SELECT * FROM locations ORDER BY LID DESC";
$result = mysqli_query($db,$find_loc);

$num = mysqli_num_rows($result);
if($num == 0){

echo "<option value='' disabled selected>No Location Found</option>";

}else{

while($row = mysqli_fetch_assoc($result)){

$loc_id = $row['LID'];
$loc_name = $row['LName'];

echo "<option value='$loc_id '>".ucfirst($loc_name)."</option>";



}
}


?>

</select>
    
            <input type="date" name="date" placeholder="Please choose Date and time for flight"class="form-control">




<input type="submit" name="Search" value="Search">
        </form>
        
        
        
    </div></div>
<?php 

if(isset($_POST['Search'])){




$src_loc = (!empty($_POST['src-location']))?"Source=".$_POST['src-location']:1;

$destination_loc =  (!empty($_POST['dest-location']))?"Destination=".$_POST['dest-location']:1;

$date=(!empty($_POST['date']))?"Dep_Date='".$_POST['date']."'":1;



$sql = "Select * from  flights  where $src_loc and $destination_loc and $date";



$result = mysqli_query($db,$sql);
$num = mysqli_num_rows($result);
if($num>0){?>

     <table class="w3-table-all table table-bordered">

<tr class="w3-red">
<th>ID</th>



<th>Plane Name</th>
<th>Source</th>

<th>Destination</th>
<th>Date</th>

<th>Time</th>
<th>fair</th>

<th>Booking</th>

</tr>
<?php $counter = 0;
while($row = mysqli_fetch_assoc($result)){



                $id = $row['FID'];
                    $planeid = $row['PlaneID'];
        $planes = "SELECT Name FROM planes ORDER BY PlaneID DESC ";

        $result_p = mysqli_query($db,$planes);
                $row_p= mysqli_fetch_assoc($result_p);
                $name = $row_p['Name'];

                 $s_lid = $row['Source'];
                 $source_query="SELECT LName FROM locations where LID='$s_lid'";
                   $result_s = mysqli_query($db,$source_query);
                $row_s= mysqli_fetch_assoc($result_s);
                 $source=$row_s['LName'];
               
                 $dest_lid = $row['Destination'];
                   $dest_query="SELECT LName FROM locations where LID='$dest_lid'";
                   $result_d = mysqli_query($db,$dest_query);
                $row_d= mysqli_fetch_assoc($result_d);
                 $destination=$row_d['LName'];
                 
                  $date = $row['Dep_Date'];
                  $time = $row['Dep_Time'];
                   $fair= $row['Price'];
                   
                


            $counter++;


            ?>

            <tr>
                
                <td><?php echo $counter ?></td>
                <td><?php echo $name ?></td>

    <td><?php echo $source ?></td>
        <td><?php echo $destination ?></td>
             <td><?php echo $date ?></td>
         <td><?php echo $time ?></td>
       
                <td><?php echo $fair ?></td>
            
                <td><a class='btn btn-info' href="Flight-Booking.php?fid=<?php echo $id ?>">Reserve</a></td>

                
                

            </tr>





<?php


}?>
 
     </table>           <?php


}



else{

  die($db->error);
}
}?>


<div class="clearfix"></div>
<div class="footerBottomSection">
		<div class="container">
			&copy; 2019, Allright reserved. <a href="#">Terms and Condition</a> | <a href="#">Privacy Policy</a> 
			<div class="pull-right"> <a href="index.html">Online Air Line Reservation System</a></div>
		</div>
	</div>
	</body>
        
</html>
