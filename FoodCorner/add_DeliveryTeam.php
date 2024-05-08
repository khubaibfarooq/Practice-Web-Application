<?php include_once "connect.php"; 
include_once"header.php";

ob_start();
session_start(); 
$user_id = $_SESSION['uid'];
$user_role = $_SESSION['type'];

?> 
<?php include_once "header.php"; ?> 

<?php if($user_role == 'admin'){ ?>


<?php include_once "nav_admin.php"; ?> 






<div class="section contact" id="contact" style="margin-top: 2em !important">
<div class="container">

<h4 class="rad-txt text-center">
<span class="abtxt1">ADD</span>
<span class="abtxt2">DeliveryTeam</span>

</h4>


<div class="contact-form">
<div class="col-md-12">




<form method="post" >
            


<input type="text" name="team" placeholder="New DeliveryTeam " class="form-control" required>



<input type="submit" name="add" value="Add" class="btn btn-danger">


</form><hr>


    <?php 

    if(isset($_POST['add'])){

        
        $team= $_POST['team'];
    

        $query = "INSERT INTO deliveryteam(Name) VALUES ('{$team}')";
        $result = mysqli_query($db,$query);

        if($result){

            header("Location: add_deliveryteam.php");
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


        $shares = "SELECT * FROM deliveryteam ORDER BY DTID DESC ";

        $result = mysqli_query($db,$shares);

        $num = mysqli_num_rows($result);

        if($num == 0){

            echo "<tr><td>Nothing.</td></tr>";

        }else{


            $counter = 0;
            while($row = mysqli_fetch_assoc($result)){

                $id = $row['DTID'];
                $name = $row['Name'];



            $counter++;


            ?>

            <tr>
                
                <td><?php echo $counter ?></td>
                <td><?php echo $name ?></td>


                <td><a class='btn btn-info' href="add_deliveryteam.php?edit=<?php echo $id ?>">Edit</a></td>

                
                <td><a class='btn btn-danger' href="add_deliveryteam.php?del=<?php echo $id ?>">delete</a></td>

            </tr>

            <?php

            }



            if(isset($_GET['edit'])){

                $edit_id = $_GET['edit'];
                $edit_query = "SELECT * FROM deliveryteam WHERE DTID = '{$edit_id}' ";
                $result_edit = mysqli_query($db,$edit_query);
                $row_edit = mysqli_fetch_assoc($result_edit);

                $edit_name = $row_edit['Name'];


                ?>

                
<form method="post" action="">



<input type="hidden" value="<?php echo $edit_id ?>" name="edit_id">


<div class="form-group col-sm-1">
    <a href="add_deliveryteam.php" class="btn btn-danger">x</a>
</div>  


<input type="text" value="<?php echo $edit_name ?>" name="team" class="form-control" required>



<input type="submit"  name="up_team" value="update" class="btn btn-info">









        </form>



                <?php

            }





            if(isset($_GET['del'])){

                $del_id = $_GET['del'];
                $del_fav = "DELETE FROM deliveryteam WHERE DTID = '{$del_id}' ";
                $result_del = mysqli_query($db,$del_fav);
                if($result_del){

                    header("Location: add_deliveryteam.php");
                }

            }
        

        }


         ?>






        <?php 


        if(isset($_POST['up_team'])){

            $edit_id = $_POST['edit_id'];
            $edit = $_POST['team'];

            $edit_update = "UPDATE deliveryteam SET Name = \"$edit\" WHERE DTID = '{$edit_id}' ";
            $edit_re = mysqli_query($db,$edit_update);
            if($edit_re){

                header("Location: add_deliveryteam.php");
            }
        }   




         ?>





    </table>









</div>

<div class="clearfix"></div>
</div>

</div>
</div>

<?php include_once "footer.php"; ?>  


<?php }else{ header("Location: logout.php"); } ?>