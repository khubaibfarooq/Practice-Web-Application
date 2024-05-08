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
<span class="abtxt1">Select</span>
<span class="abtext">Chefs</span>
</h4>


<div class="contact-form">
<div class="col-md-12">





<?php 



if(isset($_GET['delete'])){

$delete_id = $_GET['delete'];


$del_query = "DELETE FROM order_details WHERE DID = '{$delete_id}' ";
$del_res = mysqli_query($db,$del_query);

if($del_res){

header("Location: SelectChefs.php");
}


}




?>
    
    
   
    
    <form method="post">
        <input type="hidden" name="oid" class="form-control" value="<?=@$_GET['oid']?>">
        <input type="number" name="did" class="form-control" readonly  value="<?=@$_GET['did']?>">
        <select name="chef" class="form-control" style="width: 100%">

<option value="" disabled selected>Choose Chef.....</option>


<?php 

$find = "SELECT * FROM chefs ORDER BY CID DESC";
$result = mysqli_query($db,$find);

$num = mysqli_num_rows($result);
if($num == 0){

echo "<option value='' disabled selected>No chef Found</option>";

}else{

while($row = mysqli_fetch_assoc($result)){

$cid = $row['CID'];
$cname = $row['Name'];



echo "<option value='$cid'>".ucfirst($cname)."</option>";



}
}


?>

</select>  
        
        <input type="submit" name="select" value="Select" class="btn btn-info">
    </form>

    
    
    
    
    
    <?php 



if(isset($_POST['select'])){

$cid = $_POST['chef'];
$did = $_POST['did'];
$oid = $_POST['oid'];
$query = "update order_details set CID='$cid' WHERE DID = '{$did}' ";
$res = mysqli_query($db,$query);

if($res){

header("Location: SelectChefs.php?oid=$oid");
}


}




?>



<?php if(isset($_GET['oid'])){?>






<table class="w3-table-all table table-bordered">

<tr class="w3-red">
<th>ID</th>


<th>FoodName</th>
<th>Quantity</th>
<th>Price</th>

<th>TotalAmount</th>
<th>Chef</th>
<th>Delete</th>

</tr>



<?php 

$problem = "SELECT * FROM order_details where OID='{$_GET['oid']}'  ORDER BY OID DESC ";
$result = mysqli_query($db,$problem);

$num = mysqli_num_rows($result);

if($num == 0){

echo "<tr><td>Nothing</td></tr>";

}else{
$counter = 0;
while($row = mysqli_fetch_assoc($result)){

$fid = $row['FID'];
$did = $row['DID'];
$cid = $row['CID'];
$check = "SELECT FName FROM foods WHERE FID = '{$fid}' ";
$result_f = mysqli_query($db,$check);
$row_f = mysqli_fetch_assoc($result_f);
$foodname = $row_f['FName'];




$quantity = $row['Quantity'];
$price = $row['Price'];

$amount = $row['Amount'];

$counter++;


?>



<tr>

<td><?php echo $counter ?></td>

<td><?php echo $foodname ?></td>
<td><?php echo $quantity ?></td>
<td><?php echo $price ?></td>
<td><?php echo $amount ?></td>

<td><?php if($cid==""){echo"<a class='btn btn-danger btn-sm' href='SelectChefs.php?did=$did&oid={$_GET['oid']}'>Select</a>";}else{echo $cid;} ?></td>



<td><a class="btn btn-danger btn-sm" href="SelectChefs.php?delete=<?php echo $did ?>">Delete</a></td>



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