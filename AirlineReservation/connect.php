<?php 

$db = mysqli_connect('localhost','root','',"airline");

if(mysqli_connect_error($db)){
	echo mysqli_error($db);
}
	

 ?>