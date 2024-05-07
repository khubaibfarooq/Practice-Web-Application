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

<h4 class="rad-txt text-center">
<span class="abtxt1">ADD</span>
<span class="abtxt2">Planes</span>

</h4>


<div class="contact-form">
<div class="col-md-12">




<form method="post" >
            


<input type="text" name="name" placeholder="New Plane Name " class="form-control" required>
<input type="number" name="model" placeholder="New Plane Model " class="form-control" required>
<input type="text" name="company" placeholder="Plane Company " class="form-control" required>
<input type="number" name="seats" placeholder="Number of Seats " class="form-control" required>


<input type="submit" name="add" value="Add" class="btn btn-danger">


</form><hr>


    <?php 

    if(isset($_POST['add'])){

        
        $name= $_POST['name'];
       
       
        $company= $_POST['company'];

        
        $model= $_POST['model'];
       $seats= $_POST['seats'];
        $query = "INSERT INTO planes(Name,Company,Model,NSeats) VALUES ('{$name}','{$company}','{$model}','{$seats}')";
        $result = mysqli_query($db,$query);

        if($result){

            header("Location: add-planes.php");
        }
    }


     ?>


    <table class="table table-bordered w3-table w3-striped w3-bordered">

        <tr>
            
            <th>ID</th>
            <th>Name</th>
              <th>Company</th>
                <th>Model</th>
                  <th>Seats</th>
            <th>Edit</th>
            <th>Delete</th>


        </tr>

        
        <?php 


        $shares = "SELECT * FROM planes ORDER BY PlaneID DESC ";

        $result = mysqli_query($db,$shares);

        $num = mysqli_num_rows($result);

        if($num == 0){

            echo "<tr><td>Nothing.</td></tr>";

        }else{


            $counter = 0;
            while($row = mysqli_fetch_assoc($result)){

                $id = $row['PlaneID'];
                $name = $row['Name'];
  $company = $row['Company'];
    $model= $row['Model'];
      $nseats = $row['NSeats'];


            $counter++;


            ?>

            <tr>
                
                <td><?php echo $counter ?></td>
                <td><?php echo $name ?></td>
                <td><?php echo $company ?></td>
                <td><?php echo $model ?></td>
                <td><?php echo $nseats ?></td>
                


                <td><a class='btn btn-info' href="add-planes.php?edit=<?php echo $id ?>">Edit</a></td>

                
                <td><a class='btn btn-danger' href="add-planes.php?del=<?php echo $id ?>">delete</a></td>

            </tr>

            <?php

           }?>
            
            
              </table>

<?php

            if(isset($_GET['edit'])){

                $edit_id = $_GET['edit'];
                $edit_query = "SELECT * FROM planes WHERE PlaneID = '{$edit_id}' ";
                $result_edit = mysqli_query($db,$edit_query);
                $row_edit = mysqli_fetch_assoc($result_edit);
 $edit_id = $row_edit['PlaneID'];
                $edit_name = $row_edit['Name'];
    $edit_company = $row_edit['Company'];    
        $edit_model = $row_edit['Model'];
            $edit_seats = $row_edit['NSeats'];

                ?>

                
<form method="post" action="">



<input type="hidden" value="<?php echo $edit_id ?>" name="edit_id">


<div class="form-group col-sm-1">
    <a href="add-planes.php" class="btn btn-danger">x</a>
</div>  

Plane Name
<input type="text" value="<?php echo $edit_name ?>" name="edit_name" class="form-control" required>
Model 
<input type="number" name="edit_model"  value="<?php echo $edit_model ?>"class="form-control" required>
Company Name
<input type="text" name="edit_company" value="<?php echo $edit_company?>"class="form-control" required>
Total No of Seats
<input type="number" name="edit_seats" value="<?php echo $edit_seats ?>" class="form-control" required>

<input type="submit" name="up_plane" value="update" class="btn btn-info">









        </form>



                <?php

            }





            if(isset($_GET['del'])){

                $del_id = $_GET['del'];
                $del_fav = "DELETE FROM planes WHERE PlaneID = '{$del_id}' ";
                $result_del = mysqli_query($db,$del_fav);
                if($result_del){

                    header("Location: add-planes.php");
                }

            }
        

        }


         ?>






        <?php 


        if(isset($_POST['up_plane'])){

             $edit_id= $_POST['edit_id'];
     $edit_name= $_POST['edit_name'];
       
       
        $edit_company= $_POST['edit_company'];
   
        
        $edit_model= $_POST['edit_model'];
       $edit_seats= $_POST['edit_seats'];
            $edit_update = "UPDATE planes SET Name ='$edit_name',Company='$edit_company',Model='$edit_model' ,NSeats='$edit_seats' WHERE PlaneID = '{$edit_id}' ";
            $edit_re = mysqli_query($db,$edit_update);
            if($edit_re){

                header("Location: add-planes.php");
            }
        }   




         ?>





    </table>









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
