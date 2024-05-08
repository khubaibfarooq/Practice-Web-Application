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

<div class="contact-form">
    <div class="row">
<div class="col-md-9">
  
    <form method="post"  action="checkout.php" style="padding:2em">
         <?php if(isset($_SESSION['uid'])){
             ?>
        <label>UserName
        </label>
       
          <input type="text" name="logedin_username" class="form-control"  value="<?php echo $_SESSION['username'] ?>" >
          <input type="number" name="login_cardno" class="form-control" placeholder="Enter your cradit card no " >
     <input type="submit" class="btn-success" name="logedin_pay" value="Pay"><hr>
         <?php } 
         
         else  { ?>
        <label>Enter registered information or first register</label><br>

    <input type="text" name="login_username" class="form-control" placeholder="Enter your Registered UserName" >


     <input type="password" name="login_password" class="form-control" placeholder="Enter your Password "  >
     
         <input type="number" name="login_cardno" class="form-control" placeholder="Enter your cradit card no " >
     
         <input type="submit" class="btn-success" name="pay" value="Pay">
          
     <a href="register.php">Register</a>
     <hr>
    
         <?php }?>

    </form>
               
</div>
    
    </div>
 
   
        <?php 

// paying as a registered user but not login  
        if(isset($_POST['pay'])){
            
    // checking username and password from databse for conformation    
$username  = $_POST['login_username'];
$password  = $_POST['login_password'];





 $query = "SELECT * FROM accounts WHERE UserName = '{$username}' AND Password = '{$password}' ";

$result=mysqli_query($db,$query);
    $row=mysqli_fetch_assoc($result);
   
 //if username and password  is correct then proceed to order
 if((mysqli_num_rows($result))>0){
     $uid=$row['UID'];
     $date= date("Y-m-d");
  $totalprice= $_SESSION['totalprice'];
  $order="insert into  orders(UID,ODate,Amount,DStatus) values('$uid','$date','$totalprice','pending')";
  
         $r = mysqli_query($db,$order);
         $oid=mysqli_insert_id($db);
    
     foreach ($_SESSION['Products'] as $fid => $quantity) {
   $price = "SELECT * FROM foods WHERE FID = '$fid' ";

$result = mysqli_query($db,$price);
$num = mysqli_num_rows($result);

if($num > 0){
    $row=mysqli_fetch_assoc($result);
$price=$row['Price'];
$total=$price*$quantity;


     $order_foods="insert into  order_details(OID,FID,Price,Quantity,Amount) values('$oid','$fid','$price','$quantity','$total')";
         $result = mysqli_query($db,$order_foods);
        
}
     
    
     } 
     echo"Your order is successfully placed . Tracking id# $oid";
     unset($_SESSION['Products']);
       unset($_SESSION['items']);
         unset($_SESSION['totalprice']);
              
}
 
}?>
    
    <?php // paying as a  login  user
        if(isset($_POST['logedin_pay'])){
       
        
 $uid=$_SESSION['uid'];
    
 
  $date= date("Y-m-d");
     $totalprice= $_SESSION['totalprice'];
 $order="insert into  orders(UID,ODate,Amount,DStatus) values('$uid','$date','$totalprice','pending')";
         $r = mysqli_query($db,$order);
         $oid=mysqli_insert_id($db);
         
     foreach ($_SESSION['Products'] as $fid => $quantity) {
   $price = "SELECT * FROM foods WHERE FID = '$fid' ";

$result = mysqli_query($db,$price);
$num = mysqli_num_rows($result);

if($num > 0){
    $row=mysqli_fetch_assoc($result);
$price=$row['Price'];

$total=$price*$quantity;


     $order_foods="insert into  order_details(OID,FID,Price,Quantity,Amount) values('$oid','$fid','$price','$quantity','$total')";
         $result = mysqli_query($db,$order_foods);
        
}
     
    
     } 
     echo"Your order is successfully placed . Tracking id# $oid";
    
     unset($_SESSION['Products']);
       unset($_SESSION['items']);
         unset($_SESSION['totalprice']);
      
        }?>

   
<div class="clearfix"></div>
</div>


<?php include_once "footer.php"; ?>




    
        