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
<span class="abtxt2">Location</span>

</h4>


<div class="contact-form">
<div class="col-md-12">




<form method="post" >
            


<input type="text" name="lname" placeholder="New Location Name " class="form-control" required>



<input type="submit" name="add" value="Add" class="btn btn-danger">


</form><hr>


    <?php 

    if(isset($_POST['add'])){

        
        $lname= $_POST['lname'];
       

        $query = "INSERT INTO Locations(LName) VALUES ('{$lname}')";
        $result = mysqli_query($db,$query);

        if($result){

            header("Location: add-Locations.php");
        }
    }


     ?>


    <table class="table table-bordered w3-table w3-striped w3-bordered">

        <tr>
            
            <th>ID</th>
            <th>Name</th>
            <th>Edit</th>
            <th>Delete</th>


        </tr>

        
        <?php 


        $shares = "SELECT * FROM Locations ORDER BY LID DESC ";

        $result = mysqli_query($db,$shares);

        $num = mysqli_num_rows($result);

        if($num == 0){

            echo "<tr><td>Nothing.</td></tr>";

        }else{


            $counter = 0;
            while($row = mysqli_fetch_assoc($result)){

                $id = $row['LID'];
                $name = $row['LName'];



            $counter++;


            ?>

            <tr>
                
                <td><?php echo $counter ?></td>
                <td><?php echo $name ?></td>


                <td><a class='btn btn-info' href="add-Locations.php?edit=<?php echo $id ?>">Edit</a></td>

                
                <td><a class='btn btn-danger' href="add-Locations.php?del=<?php echo $id ?>">delete</a></td>

            </tr>

            <?php

           }?>
            
            
              </table>

<?php

            if(isset($_GET['edit'])){

                $edit_id = $_GET['edit'];
                $edit_query = "SELECT * FROM Locations WHERE LID = '{$edit_id}' ";
                $result_edit = mysqli_query($db,$edit_query);
                $row_edit = mysqli_fetch_assoc($result_edit);

                $edit_name = $row_edit['LName'];


                ?>

                
<form method="post">



<input type="hidden" value="<?php echo $edit_id ?>" name="edit_id">


<div class="form-group col-sm-1">
    <a href="add-Locations.php" class="btn btn-danger">x</a>
</div>  


<input type="text" value="<?php echo $edit_name ?>" name="lname" class="form-control" required>



<input type="submit"  name="up_loc" value="update" class="btn btn-info">









</form>



                <?php

            }





            if(isset($_GET['del'])){

                $del_id = $_GET['del'];
                $del_fav = "DELETE FROM Locations WHERE LID = '{$del_id}' ";
                $result_del = mysqli_query($db,$del_fav);
                if($result_del){

                    header("Location: add-Locations.php");
                }

            }
        

        }


         ?>






        <?php 


        if(isset($_POST['up_cat'])){

            $edit_id = $_POST['edit_id'];
            $edit = $_POST['lname'];

            $edit_update = "UPDATE Locations SET LName ='$edit' WHERE LID = '{$edit_id}' ";
            $edit_re = mysqli_query($db,$edit_update);
            if($edit_re){

                header("Location: add-Locations.php");
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
