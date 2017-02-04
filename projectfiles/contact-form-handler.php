<!--
	Copyright 2014 Zachary Hebert, Patrick Gillespie
	This file is part of Methodocracy.org.

    Methodocracy.org is free software: you can redistribute it and/or modify it under the terms of the GNU General Public License as published by the Free Software Foundation, either version 3 of the License, or (at your option) any later version.

    Methodocracy.org is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU General Public License for more details.

    You should have received a copy of the GNU General Public License along with Methodocracy.org.  If not, see <http://www.gnu.org/licenses/>.
	
    Methodocracy TM and methodocracy.org TM are trademarks of Methodocracy Foundation (C)2014, and all rights to that TM are reserved. Any modified versions are required to be marked as changed, so that their problems will not be attributed erroneously to authors of previous versions. And the name Methodocracy TM should be clearly labeled as the source of your work as long as any part of this work remains intact in part or in whole.
-->
<?php 
$errors = '';
$myemail = 'contact@methodocracy.org';//<-----Put Your email address here.
if(empty($_POST['addy'])  || 
   empty($_POST['call']) || 
   empty($_POST['message']))
{
    $errors .= "\n Error: all fields are required";
}
if(!empty($_POST['name'])){
  $errors .= "\n Error: Bot Detection Triggered!";
	//header('Location: http://google.com');
  //die();
}
$name = $_POST['call']; 
$email_address = $_POST['addy']; 
$message = $_POST['message']; 

if (!preg_match(
"/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/i", 
$email_address))
{
    $errors .= "\n Error: Invalid email address";
}

if( empty($errors))
{
	$to = $myemail; 
	$email_subject = "Contact form submission: $name";
	$email_body = "New contact form submission from Methodocracy.org. ".
	" Here are the details:\n Name: $name \n Email: $email_address \n Message: \n $message"; 
	
	$headers = "From: $myemail\n"; 
	$headers .= "Reply-To: $email_address";
	
	mail($to,$email_subject,$email_body,$headers);
	//redirect to the 'thank you' page
	header('Location: contact-form-thank-you.html');
} 
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd"> 
<html>
<head>
	<title>Contact form handler</title>
</head>

<body>
<!-- This page is displayed only if there is some error -->
<?php
echo nl2br($errors);
?>
<br />
<a href="contact-form">Click here to go back</a>

</body>
</html>