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
	<!-- Hero section -->
	<section class="hero-section set-bg" data-setbg="img/bg.jpg">
		<div class="container">
			<div class="hero-text text-white">
				<h2>Online Food Corner </h2>
				
			</div>
			<div class="row">
				<div class="col-lg-8 offset-lg-1">
                                    <form class="intro-newslatter" method="post">
                                        <input type="text" placeholder="Name" name="username"class="form-control" required>
                                        <input type="password"  placeholder="Password" name="password"class="form-control" required>
						<input type="submit"class="site-btn" name="signin" value="Sign In">
                                                <a href="register.php">Register</a>
					</form>
				</div>
                            <?php
                            if(isset($_POST['signin'])){
                                $user=$_POST['username'];
                             $password=$_POST['password'];
                             $sql="SELECT * FROM accounts WHERE UserName='$user' and Password='$password'  ";
                          
                             $result=mysqli_query($db,$sql);
                             $num_row = mysqli_num_rows($result);
                                    

if($num_row > 0){
   
$row = mysqli_fetch_assoc($result);
$type=$row['Type'];
$_SESSION['type']=$type;
$_SESSION['uid']=$row['UID'];

$_SESSION['email']=$row['Email'];

$_SESSION['username']=$row['UserName'];

header('location: index.php');     
                         
                           

        
}else{
echo "<p class='alert alert-danger'>Wrong Email OR Password OR admin not accept your request.</p>";

           
                            }}?>
			</div>
		</div>
	</section>
        
     
	<!-- Hero section end -->
<?php include_once"footer.php";?>