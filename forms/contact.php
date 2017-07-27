<?php 
$errors = '';
$myemail = 'uhcgospellight@gmail.com';//<-----Put Your email address here.
if(empty($_POST['name'])  || 
   empty($_POST['email']) || 
   empty($_POST['message']))
{
    $errors .= "\n Error: Name, Email, and Message are required";
    echo $errors;
}

$name = $_POST['name']; 
$phone = $_POST['phone']; 
$email_address = $_POST['email']; 
$subject = $_POST['subject']; 
$message = $_POST['message']; 


if (!preg_match(
"/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/i", 
$email_address))
{
    $errors .= "\n Error: Invalid email address";
    echo $errors;
}

if( empty($errors))
{
	$to = $myemail; 
	$email_subject = "Hello Gospel Light!";
	$email_body = "New message.".
	"\nName: $name \n Phone Number: $phone \n Email: $email_address \n Subject: $subject \n\n Message: \n $message"; 
	
	$headers = "From: $myemail\n"; 
	$headers .= "Reply-To: $email_address";
	
	mail($to,$email_subject,$email_body,$headers);
	//redirect to the 'thank you' page
	//header('Location: thank-you.html');
    
    echo "Your message has been sent.";
} 
?>