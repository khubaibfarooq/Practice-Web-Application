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
<?php

  if(isset($_GET['F_id'])){
    $fid=$_GET['F_id'];
    
    
     $_SESSION['items']++;
    $_SESSION['Products'][$fid]++;
    header('location: view_food.php');
    



}
?>












    <div class="container">
        <div class="row">
          
   <?php
if(isset($_GET['fid'])){

   $fid=$_GET['fid'];
    
        $sql="select * from foods  where FID='$fid'";
        $result=mysqli_query($db,$sql);
        $num_row = mysqli_num_rows($result);
               

if($num_row > 0){
     

       $row = mysqli_fetch_assoc($result);
           echo '<div class="col-lg-4 col-lg-offset-1">';
        
         
                     echo"<img src='img/{$row['Picture']}' alt='{$row['FName']}' style='width:100% !important; height: 300px !important;border:1px solid black' />";
                     echo'</div>'; 
                echo"<div class='col-lg-6'>"
                     ."<h1>Name: {$row['FName']}</h1>"
. " <h2>Price:". number_format($row['Price'])  ." Rs</h2><br>"   
                             
                                
                                     
                             
                                    . "<h2>Details:</h2><p>{$row['Quantity']}.g</P><br><hr>";
                                      
                                      
    
           echo"<a href='View_Food.php?F_id={$_GET['fid']}' class='btn btn-success'>Add to Cart</a><hr></div>";        
        }}


?>
          </div></div>

    <!-- footerBottomSection -->	
    <?php include_once"footer.php";?>