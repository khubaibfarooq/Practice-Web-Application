<?php include_once "connect.php"; 
include_once"header.php";
session_start();
 ?>
<?php include_once "nav.php"; ?>
<?php
ob_start();

 $uid= $_SESSION['uid'];
$username = $_SESSION['username'];
$user_role = $_SESSION['type'];

?> 

<?php if($user_role == 'user'){ ?>


 





<div class="section contact" id="contact" style="margin-top: 2em !important">
<div class="container">

<h4 class="rad-txt text-center">
<span class="abtxt1">Orders</span>

</h4>


<div class="contact-form">
<div class="col-md-12">





<?php 



if(isset($_GET['delete'])){

$delete_id = $_GET['delete'];


$del_query = "DELETE FROM orders WHERE OID = '{$delete_id}'";

$del_query1 = "DELETE FROM order_details WHERE OID = '{$delete_id}' ";
$del_res =mysqli_query($db,$del_query);
$del_res =mysqli_query($db,$del_query1);
if($del_res){

header("Location: UserOrders.php");
}


}




?>














<table class="w3-table-all table table-bordered">

<tr class="w3-red">
<th>ID</th>



<th>OrderDateTime</th>
<th>DeliveryDateTime</th>

<th>DeliveryStatus</th>
<th>TotalAmount</th>

<th>Delete</th>

</tr>



<?php 

$problem = "SELECT * FROM orders  where UID={$uid} order BY OID DESC ";

$result =mysqli_query($db,$problem);

$num = mysqli_num_rows($result);

if($num == 0){

echo "<tr><td>Nothing</td></tr>";

}else{
$counter = 0;
while($row = mysqli_fetch_assoc($result)){

$oid = $row['OID'];








$odate = $row['ODate'];
$ddate = $row['DDate'];

$status = $row['DStatus'];
$amount = $row['Amount'];

$counter++;


?>



<tr>

<td><?php echo $counter ?></td>


<td><?php echo $odate ?></td>
<td><?php echo $ddate ?></td>


<td><?php echo $status?></td>

<td><?php echo $amount ?></td>


<td><a class="btn btn-danger btn-sm" href="userOrders.php?delete=<?php echo $oid ?>">Delete</a></td>



</tr>




<?php


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