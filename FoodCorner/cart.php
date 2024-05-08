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

 <?php if(isset($_GET['del'])){
        $f_id = $_GET['del'];
$_SESSION['items']-=$_SESSION['Products'][$f_id];
        unset($_SESSION['Products'][$f_id]);
 
    header('location: cart.php');
    }?>
    
    <?php if(isset($_SESSION['Products'])){
        $total_price=0;
        ?>
    <table class="table">
        <tr>
            <th>Name</th>
        <th>Price</th>
       
        <th>Quantity</th>
        <th>Total</th>
        <th>Delete</th>
        </tr>
        

        <?php
     foreach ($_SESSION['Products'] as $fid => $quantity) {
      echo"<tr>";
         $query="select * from foods where FID='$fid'";
         $result = mysqli_query($db,$query);
        $row = mysqli_fetch_assoc($result);
        $name=$row['FName'];
        $price=$row['Price'];
     
        

        $total_product_price=$price * $quantity;
        $total_price+=$total_product_price;
        echo"<td>$name</td>";
        echo"<td>$price</td>";
       
        echo"<td>$quantity</td>";
        echo"<td>$total_product_price</td>";
        echo"<td><a href='cart.php?del=$fid'>Delete</a></td>";
     echo"</tr>";
        
         
     }
     $_SESSION['totalprice']=$total_price;
}?>
            </table>
</div>
    <div class="col-md-3">
      
            <h4>Total Price</h4>
        <h5><?php echo $total_price?></h5>
        <a href="checkout.php" class="btn btn-warning">Checkout</a>
        
 
    </div>
  
   

<?php include_once"footer.php";?>




    
        