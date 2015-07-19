<!--
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
-->

<?php
if(!isset($_POST['submit']))
{
	//This page should not be accessed directly. Need to submit the form.
	echo "error; you need to submit the form!";
}
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$email = $_POST['email'];
$subject = $_POST['subject'];
$message = $_POST['message'];

//Validate first
if(empty($fname)||empty($lname)||empty($email)) 
{
    echo "Name and email are mandatory!";
    exit;
}

if(IsInjected($email))
{
    echo "Bad email value!";
    exit;
}

$email_from = 'info@peak2peakmedia.com'//<== update the email address
$email_subject = "$subject";
$email_body = "You have received a new message from the user $name.\n".
    "Here is the message:\n $message".
    
$to = "info@peak2peakmedia.com";//<== update the email address
$headers = "From: $email \r\n";
$headers .= "Reply-To: $email \r\n";
$subject = "subject: $subject";
$message = "$message";
//Send the email!
mail($to, $email_subject, $email_body, $headers);
//done. redirect to thank-you page.
header('thank-you.html');


// Function to validate against any email injection attempts
function IsInjected($str)
{
  $injections = array('(\n+)',
              '(\r+)',
              '(\t+)',
              '(%0A+)',
              '(%0D+)',
              '(%08+)',
              '(%09+)'
              );
  $inject = join('|', $injections);
  $inject = "/$inject/i";
  if(preg_match($inject,$str))
    {
    return true;
  }
  else
    {
    return false;
  }
}
   
?> 


