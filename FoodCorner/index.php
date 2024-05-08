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
              
              $sql="select * from foods ";
       
              $result=mysqli_query($db,$sql);
              $num_row = mysqli_num_rows($result);
                     
      
      if($num_row > 0){

       

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


      <?php }}?>
             


<?php include_once"footer.php";?>