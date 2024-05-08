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
<span class="abtxt1">Add</span>
<span class="abtext">Food</span>
</h4>


<div class="contact-form">
<div class="col-md-12">





<form method="post"  enctype="multipart/form-data">









<input type="text" name="name" class="form-control" placeholder="Food Name" required>





<textarea class="form-control" name="details" rows="3" required placeholder="Details"></textarea>



<input type="number" name="price" class="form-control" placeholder="Food Price" required>
<input type="number" name="quantity" class="form-control"placeholder="Write Quanttity in Grams" required>



<input type="file" name="image" class="form-control" required>











<input type="submit" name="submit" value="Add Food" class="btn btn-danger">



</form>


<?php 

if(isset($_POST['submit'])){



$name = $_POST['name'];

$det= $_POST['details'];

$price = $_POST['price'];
$qua = $_POST['quantity'];

if($_FILES['image']['name'] == ''){
$image = NULL;
}else{

$destination = __DIR__ . "/img/";
$result = move_uploaded_file($_FILES['image']['tmp_name'], $destination.$_FILES['image']['name']);
$image = $_FILES['image']['name'];

}



$post = "INSERT INTO foods (FName,Details,Price,Picture,Quantity) VALUES ('{$name}','{$det}','{$price}','{$image}','{$qua}')";



$result_post = mysqli_query($db,$post);

if($result_post){

  echo "<p class='alert alert-success'>Food has been Added.</p>";      
     
}else{

  die($db->error);
}




}


?>








</div>

<div class="clearfix"></div>
</div>

</div>
</div>

<?php include_once "footer.php"; ?>  


<?php }else{ header("Location: logout.php"); } ?>