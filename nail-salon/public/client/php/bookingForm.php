<?
$firstname  = $_REQUEST["firstname"];
$lastname  = $_REQUEST["lastname"];
$email = $_REQUEST["email"];
$phone  = $_REQUEST["phone"];
$service = $_REQUEST["service"];
$staff  = $_REQUEST["staff"];
$date   = $_REQUEST["date"];
$to    = "you@yourdomain.com"; // ENTER YOUR EMAIL ADDRESS
if (isset($email) && isset($firstname) && isset($lastname)) {
    $email_subject = "$name sent you a message via YOUR SITE NAME"; // ENTER YOUR EMAIL SUBJECT
		$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";
$headers .= "From: ".$firstname." ".$lastname." <".$email.">\r\n"."Reply-To: ".$email."\r\n" ;
$msg     = "Service: $service <br/> Staff: $staff <br/> Appointment Date: $date <br/> First Name: $firstname <br/> Last Name: $lastname <br/> Email: $email <br/> Phone Number: $phone";
	
   $mail =  mail($to, $email_subject, $msg, $headers);
  if($mail)
	{
		echo 'success';
	}

else
	{
		echo 'failed';
	}
}

?>