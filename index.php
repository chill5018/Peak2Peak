<?php
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$email = $_POST['email'];
$subject = $_POST['subject'];
$message = $_POST['message'];

//Sending Email to form owner
$header = "From: $email\n"
. "Reply-To: $email\n";
$subject = "subject: $subject";
$email_to = "info@peak2peakmedia.com";
$message = "name: $fname . $lname\n"
. "email: $email\n";
mail($email_to, $subject ,$message ,$header ) ;

?>