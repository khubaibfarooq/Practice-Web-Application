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

<h4 class=" text-center">
<span >ADD</span>
<span >Flight Schedule</span>

</h4>


<div class="contact-form">
<div class="col-md-8 col-offset-md-2">




<form method="post" >
            
 <select name="plane" class="form-control" style="width: 100%"required>

<option value="" disabled selected>Choose  Plane.....</option>


<?php 

$find_plane = "SELECT * FROM planes ORDER BY PlaneID DESC";
$result =mysqli_query($db,$find_plane);

$num = mysqli_num_rows( $result);
if($num == 0){

echo "<option value='' disabled selected>No Plane Found</option>";

}else{

while($row = mysqli_fetch_assoc( $result)){

$plane_id = $row['PlaneID'];
$plane_name = $row['Name'];



echo "<option value='$plane_id'>".ucfirst($plane_name)."</option>";



}
}


?>

</select>

     <select name="src-location" class="form-control" style="width: 100%"required>

<option value="" disabled selected>Choose  Source Location.....</option>


<?php 

$find_loc = "SELECT * FROM locations ORDER BY LID DESC";
$result =mysqli_query($db,$find_loc);

$num = mysqli_num_rows( $result);
if($num == 0){

echo "<option value='' disabled selected>No Location Found</option>";

}else{

while($row = mysqli_fetch_assoc( $result)){

$loc_id = $row['LID'];
$loc_name = $row['LName'];

echo "<option value='$loc_id'>".ucfirst($loc_name)."</option>";

}
}


?>

</select>
         <select name="dest-location" class="form-control" style="width: 100%"required>

<option value="" disabled selected>Choose  Destination Location.....</option>


<?php 

$find_loc = "SELECT * FROM locations ORDER BY LID DESC";
$result =mysqli_query($db,$find_loc);

$num = mysqli_num_rows( $result);
if($num == 0){

echo "<option value='' disabled selected>No Location Found</option>";

}else{

while($row = mysqli_fetch_assoc( $result)){

$loc_id = $row['LID'];
$loc_name = $row['LName'];

echo "<option value='$loc_id'>".ucfirst($loc_name)."</option>";

}
}


?>

</select>
    
    <input type="date" name="date" class="form-control"required>
        <input type="time" name="time" class="form-control"required>
    <input type="number" name="fair" placeholder="Fair per seat " class="form-control" required>



<input type="submit" name="add" value="Add" class="btn btn-danger">


</form><hr>
</div>
<div class="col-md-10 col-offset-md-2">
    <?php 

    if(isset($_POST['add'])){
    $plane= $_POST['plane'];
            $source= $_POST['src-location'];
        $destination= $_POST['dest-location'];
            $date= $_POST['date'];
             $time= $_POST['time'];
                $fair= $_POST['fair'];
    

        $query = "INSERT INTO flights(PlaneID,Source,Destination,Dep_Date,Dep_Time,Price) VALUES ('{$plane}','{$source}','{$destination}','{$date}','{$time}','{$fair}')";
        $result =mysqli_query($db,$query);

        if($result){

            header("Location: add-flight-schedule.php");
        }
    }


     ?>


    <table class="table table-bordered w3-table w3-striped w3-bordered">

        <tr>
            
            <th>Sr.</th>
            <th>Plane</th>
              <th>Source</th>
                <th>Destination</th>
                  <th>Departure Date</th>
                       <th>Departure Time</th>
                    <th>Price</th>
            <th>Edit</th>
            <th>Delete</th>


        </tr>

        
        <?php 


        $flights = "SELECT * FROM flights ORDER BY FID DESC ";

        $result =mysqli_query($db,$flights);

        $num = mysqli_num_rows( $result);

        if($num == 0){

            echo "<tr><td>Nothing.</td></tr>";

        }else{


            $counter = 0;
            while($row = mysqli_fetch_assoc( $result)){

                $id = $row['FID'];
                    $planeid = $row['PlaneID'];
        $planes = "SELECT * FROM planes where PlaneID='$planeid' ";

        $result_p =mysqli_query($db,$planes);
                $row_p=mysqli_fetch_assoc($result_p);
                $name = $row_p['Name'];

                 $source = $row['Source']; 
                 $destination = $row['Destination'];
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
            
                <td><a class='btn btn-info' href="add-flight-schedule.php?edit=<?php echo $id ?>">Edit</a></td>

                
                <td><a class='btn btn-danger' href="add-flight-schedule.php?del=<?php echo $id ?>">delete</a></td>

            </tr>

            <?php

            }?>
            
            
              </table>

<?php



            if(isset($_GET['edit'])){

                $edit_id = $_GET['edit'];
                $edit_query = "SELECT * FROM flights WHERE FID = '{$edit_id}' ";
                $result_edit =mysqli_query($db,$edit_query);
                $row_edit = mysqli_fetch_assoc( $result_edit);

             
                  $edit_date = $row_edit['Dep_Date'];
                  $edit_time = $row_edit['Dep_Time'];
                  
                   $edit_fair= $row_edit['Price'];

                ?>

                
<form method="post" action="">



<input type="hidden" value="<?php echo $edit_id ?>" name="edit_id">


<div class="form-group col-sm-1">
    <a href="add-flight-schedule.php" class="btn btn-danger">x</a>
</div>  

Departure Date
<input type="date" value="<?php echo $edit_date ?>" name="edit_date" class="form-control" required>
Departure Time
<input type="time" value="<?php echo $edit_time ?>" name="edit_time" class="form-control" required>
Price Per Seat
<input type="number" value="<?php echo $edit_fair ?>" name="edit_fair" class="form-control" required>


<input type="submit"  name="up_schedule" value="update" class="btn btn-info">









        </form>



                <?php

            }





            if(isset($_GET['del'])){

                $del_id = $_GET['del'];
                $del_f = "DELETE FROM flights WHERE FID = '{$del_id}' ";
                $result_del =mysqli_query($db,$del_f);
                if($result_del){

                    header("Location: add-flight-schedule.php");
                }

            }
        

        }


         ?>






        <?php 


        if(isset($_POST['up_schedule'])){

            $edit_id = $_POST['edit_id'];
            $edit_date = $_POST['edit_date'];
              $edit_time = $_POST['edit_time'];
 $edit_fair = $_POST['edit_fair'];
            $edit_update = "UPDATE flights SET Dep_Date ='$edit_date',Dep_Time ='$edit_time' ,Price='$edit_fair' WHERE FID = '{$edit_id}' ";
     
            $edit_re =mysqli_query($db,$edit_update);
            if($edit_re){

                header("Location: add-flight-schedule.php");
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
