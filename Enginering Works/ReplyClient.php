<?php 
require  'credentials.php';


function reply($reply,$email){
     $reply = $_POST['reply'];
              $email = $_POST['email'];
require'PHPMailer/PHPMailerAutoload.php';
$mail=new PHPMailer;

$mail->isSMTP();
$mail->Host='smtp.gmail.com';
$mail->Port=587;
$mail->SMTPAuth=true;
$mail->Username=EMAIL;
$mail->Password=PASSWORD;
$mail->setFrom(EMAIL);
$mail->SMTPSecure='TLS';

$mail->FromName='enggworks.com';
$mail->addAddress("$email");
$mail->WordWrap=50;

$mail->Subject='Message Reply';
$mail->Body=$reply;
if($mail->send()){
    echo "Message sent to Client Via Email Successfully";
    
}



}

?>