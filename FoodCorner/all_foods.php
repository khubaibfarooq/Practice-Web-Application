<?php include_once "connect.php"; 
include_once"header.php";

ob_start();
session_start(); 
$user_id = $_SESSION['uid'];
$user_role = $_SESSION['type'];

?> 


<?php if($user_role == 'admin'){ ?>


<?php include_once "nav_admin.php"; ?> 






<div class="section contact" id="contact" style="margin-top: 2em !important">
<div class="container">

<h4 class="rad-txt text-center">
<span class="abtxt1">All</span>
<span class="abtext">Foods</span>
</h4>


<div class="contact-form">
<div class="col-md-12">





<?php 



if(isset($_GET['delete'])){

$delete_id = $_GET['delete'];

$del_query = "DELETE FROM foods WHERE FID = '{$delete_id}' ";
$del_res = mysqli_query($db,$del_query);

if($del_res){

header("Location: all_foods.php");
}


}





    
            if(isset($_GET['edit'])){

                $edit_id = $_GET['edit'];
                $edit_query = "SELECT * FROM foods WHERE FID = '{$edit_id}' ";
                $result_edit = mysqli_query($db,$edit_query);
                $row_edit = mysqli_fetch_assoc($result_edit);

                $edit_name = $row_edit['FName'];
                   $edit_id = $row_edit['FID'];

$edit_det=  $row_edit['Details'];

$edit_price =  $row_edit['Price'];
$edit_quantity = $row_edit['Quantity'];
$edit_pic = $row_edit['Picture'];

                ?>

                
    <form method="post" action="all_foods.php"enctype="multipart/form-data">



<input type="hidden" value="<?php echo $edit_id ?>" name="edit_id">


<div class="form-group col-sm-1">
    <a href="all_foods.php" class="btn btn-danger">x</a>
</div>  
<br><br><br>
Name
<input type="text" name="edit_name" class="form-control" placeholder="Food Name" value="<?php echo $edit_name ?>">




Details
<textarea class="form-control" name="edit_details" rows="3" required ><?php echo $edit_id ?></textarea>


Price
<input type="number" name="edit_price" class="form-control" value="<?php echo $edit_price ?>" required>
Qunatity
<input type="number" name="edit_quantity" class="form-control"value="<?php echo $edit_quantity ?>" required>
Current Picture
<img src="img/<?php echo $edit_pic?>"style="width:170px !important; height: 218px !important;box-shadow: 0 2px 5px green">
     <input type="text" name="oldimage" class="form-control"value="<?php echo $edit_pic ?>" readonly >

IF you want to change this picture then choose new picture
<input type="file" name="image" class="form-control" >















<input type="submit"  name="up_food" value="update" class="btn btn-info">









        </form>



                <?php

            }?>

    
    
    
      <?php 


        if(isset($_POST['up_food'])){
$fid=$_POST['edit_id'];
$name=$_POST['edit_name'];
 $det= $_POST['edit_details'];

$price = $_POST['edit_price'];
$qua = $_POST['edit_quantity'];

if($_FILES['image']['name'] == ''){
$image =$_POST['oldimage']; 
}else{

$destination = __DIR__ . "/img/";
$result = move_uploaded_file($_FILES['image']['tmp_name'], $destination.$_FILES['image']['name']);
$image = $_FILES['image']['name'];

}
            $edit_update = "UPDATE foods SET FName = \"$name\",Details = \"$det\",Price = \"$price\",Quantity = \"$qua\",Picture = \"$image\" WHERE FID = '{$fid}' ";
            $edit_re = mysqli_query($db,$edit_update);
           
            if($edit_re){

                header("Location: all_foods.php");
            }
        }   




         ?>


<form method="post">











    <input type="search" name="search"  class="form-control" placeholder="Search food by name and press enter">

 




</form>



<?php if(!isset($_POST['search'])){ 
 ?>





<table class="w3-table-all table table-bordered">

<tr class="w3-red">
<th>ID</th>

<th>Name</th>
<th>Price</th>
<th>Image</th>
<th>Quantity</th>

<th>Details</th>
<th>Edit</th>
<th>Delete</th>

</tr>



<?php 

$foods = "SELECT * FROM foods ORDER BY FID DESC  ";
$result = mysqli_query($db,$foods);

$num = mysqli_num_rows($result);

if($num == 0){

echo "<tr><td>Nothing</td></tr>";

}else{
$counter = 0;
while($row =mysqli_fetch_assoc($result)){

$id = $row['FID'];





$name = $row['FName'];
$price = $row['Price'];
$image = $row['Picture'];
$details= $row['Details'];
$quantity= $row['Quantity'];


$counter++;


?>



<tr>

<td><?php echo $counter ?></td>
<td><?php echo $name ?></td>
<td><?php echo $price ?></td>
<td><img src="img/<?php echo $image ?>" style="width: 80px;height: 60px"></td>
<td><?php echo $quantity?></td>
<td><?php echo $details?></td>

<td><a class='btn btn-info' href="all_foods.php?edit=<?php echo $id ?>">Edit</a></td>

<td><a class="btn btn-danger btn-sm" href="all_foods.php?delete=<?php echo $id ?>">Delete</a></td>



</tr>




<?php


}


}


?>






</table>

<?php 

}else{ 


$search   = $_POST['search'];

?>



<table class="w3-table-all table table-bordered">

<tr class="w3-red">
    
<th>ID</th>

<th>Name</th>
<th>Price</th>
<th>Image</th>
<th>Quantity</th>

<th>Details</th>
<th>Delete</th>

</tr>




<?php 

$foods = "SELECT * FROM foods where FName like '%$search%' ORDER BY FID DESC  ";

$result = mysqli_query($db,$foods);

$num = mysqli_num_rows($result);

if($num == 0){

echo "<tr><td>Nothing</td></tr>";

}else{
$counter = 0;
while($row = mysqli_fetch_assoc($result)){

$id = $row['FID'];





$name = $row['FName'];
$price = $row['Price'];
$image = $row['Picture'];
$details= $row['Details'];
$quantity= $row['Quantity'];


$counter++;


?>



<tr>

<td><?php echo $counter ?></td>
<td><?php echo $name ?></td>
<td><?php echo $price ?></td>
<td><img src="img/<?php echo $image ?>" style="width: 50px;height: 50px"></td>
<td><?php echo $quantity?></td>
<td><?php echo $details?></td>



<td><a class="btn btn-danger btn-sm" href="all_foods.php?delete=<?php echo $id ?>">Delete</a></td>



</tr>


<?php


}


}


?>






</table>





<?php } ?>



















</div>

<div class="clearfix"></div>
</div>

</div>
</div>

<?php include_once "footer.php"; ?>  


<?php }else{ header("Location: logout.php"); } ?>