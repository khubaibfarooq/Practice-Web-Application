  <?php ob_start();
  session_start(); 
     ?>
<?php include_once"connect.php";?>
<?php include_once"header.php";

$user_id = @$_SESSION['uid'];
$user_role = @$_SESSION['type'];

 if($user_role == 'admin'){ 


 include_once "nav_admin.php";}
else{
   include_once "nav.php"; 
} ?> 

<div class="section contact" id="contact">
<div class="container">

<h4 class="rad-txt text-center">
<span class="abtxt1">Search</span>
<span class="abtext">Foods</span>
</h4>


<div class="contact-form">
<div class="col-md-12">








<?php 

if(isset($_GET['search'])){
$search = $_GET['search'];



$recipe = "SELECT * FROM foods WHERE FName like '%$search%' ORDER BY FID DESC";

$result = mysqli_query($db,$recipe);
$num = mysqli_num_rows($result);
if($num == 0){

echo "Nothing Found.";

}else{

while($row = mysqli_fetch_assoc($result)){

$id = $row['FID'];




$picture = $row['Picture'];
$names = $row['FName'];
$price = $row['Price'];





?>


<div class="col-md-3 ">
<div class="product-chr-info chr">
<div class="thumbnail">


<a href="">
<img src="img/<?php echo $picture ?>" style="width:170px !important; height: 218px !important;box-shadow: 0 2px 5px green">
</a>

</div>
<div class="caption text-center" style="line-height: 1.2em !important">




<div class="matrlf-mid">

<br>
<h4 style="text-decoration: underline"><?php echo $names ?></h4><br>
<h4><?php echo number_format($price) . ' Rs'; ?></h4><br>

<a class='btn btn-danger' href="view_food?fid=<?php echo $id ?>">View</a>

<br><hr>


<div class="clearfix"> </div>
</div>

</div>
</div>
</div>



<?php




} 


}

?>






<?php } ?>





</div>

<div class="clearfix"></div>
</div>

</div>
</div>

 <!-- footerBottomSection -->	
    <?php include_once"footer.php";?>