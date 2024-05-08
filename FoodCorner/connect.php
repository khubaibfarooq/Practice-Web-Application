<?php 

$db = mysqli_connect('localhost','root','',"foodcorner");

if(mysqli_connect_error($db)){
	echo $show_er = mysqli_connect_error($db);
}
	

 ?>