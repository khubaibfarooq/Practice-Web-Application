<?php 
require  'credentials.php';
function invoice_details($oid,$db){
    $orders="select * from orders inner join order_details on orders.OID=order_details.OID  where orders.OID='$oid'";
 $result = $db->query($orders);

$output="<div class='table-responsive'>
<table class='table '>

<tr >
<th>OrderID</th>
<th>DetailsID</th>

<th>PID</th>
<th>Quantity</th>

<th>Price</th>
<th>Date</th>
<th>Status</th>



</tr>";

    
while ($row=$result->fetch_assoc()){
 
     
 
$output.="<tr>
    <td>{$row['OID']}</td>
    <td>{$row['OrderdetailsID']}</td>

<td>{$row['PID']}</td>
<td>{$row['quantity']}</td>

<td>{$row['price']}</td>
<td> {$row['date&time']}</td>
<td>{$row['status']}</td>

</tr>";
}
$output.="</table> </div>";

return $output; 
}





require_once 'dompdf/autoload.inc.php';
use Dompdf\Dompdf;
 function SendMail($oid,$email,$db){



$file_name= md5(rand()).'.pdf';
$html_code='<link  rel="stylesheet" href="css/bootstrap.css">';
$html_code.= invoice_details($oid,$db);


$pdf=new Dompdf();
$pdf->load_Html($html_code);
$pdf->render();
$file=$pdf->output();

file_put_contents($file_name, $file);

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

$mail->FromName='engineering.com';
$mail->addAddress("$email");
$mail->WordWrap=50;
$mail->isHtml(true);
$mail->addAttachment("$file_name");
$mail->Subject='your bill';
$mail->Body='INvoice is in pdf form ';
if($mail->send()){
    echo "Order Sucessfully sent through email.";
    
}

unlink($file_name);
}



?>