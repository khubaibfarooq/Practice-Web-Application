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
    <div class="col-md-8">

    <h3>Register your  Account :</h3><br>
     
<form method="post" action="" enctype="multipart/form-data" style="padding:2em">

  
     <input type="text" name="name" class="form-control" placeholder="Your Name" required>


    <input type="email" name="email" class="form-control" placeholder="Your Email" required>


     <input type="password" name="password" class="form-control" placeholder="Your Password " required>


    <input type="number" name="mobile" class="form-control" placeholder="Your Mobile" required>


     <input type="text" name="address" class="form-control" placeholder="Your Address" required>

  
     <select name="type" class="form-control" required>
       <option value="user">User</option>
       <option value="admin">Admin</option>
   </select><br>

    <input type="submit" class="btn-success" name="submit" value="Sign-Up">



    </form>





<?php 


if(isset($_POST['submit'])){


$email = $_POST['email'];


$reg_query = "SELECT Email FROM accounts WHERE Email = '{$email}'";
$result = mysqli_query($db,$reg_query);


$rows = mysqli_num_rows($result);

if($rows > 0){
echo "<p class='alert alert-danger'>Email has been Taken, Try with new one.</p>";
}else{

$name = $_POST['name'];
$password = $_POST['password'];
$mobile = $_POST['mobile'];
$address = $_POST['address'];

$type= $_POST['type'];

$register_query = "INSERT INTO accounts (UserName,Email,Password,PhoneNo,Address,Type) VALUES ('{$name}','{$email}','{$password}','{$mobile}','{$address}','{$type}')";

$register_result = mysqli_query($db,$register_query);

   if($register_result){

   echo "<p class='alert alert-success'>Success, Welcome to Family. Now you can Login.</p>";
   
    }else{
     
      echo "<p class='alert alert-danger'>Try Again Please</p>";
    
    }


  }

} 




?>






    </div>
 
    <div class="clearfix"></div>
</div>

</div>
</div>

<?php include_once "footer.php"; ?>  