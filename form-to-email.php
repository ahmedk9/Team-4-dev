<html>
<body>

<?php
$name = $_POST['name'];
$visitor_email = $_POST['email'];
$message = $_POST['message'];
$subject = $_POST['subject'];

//Validate first
if(empty($name)||empty($visitor_email)) 
{
    echo "Name and email are mandatory!";
    exit;
}

if(IsInjected($visitor_email))
{
    echo "Bad email value!";
    exit;
}

$email_from = "$visitor_email";//<== update the email address
$email_subject = "$subject";
$email_body = "You have received a new message from: $name.\n".
    "Here is the message:\n $message";
    
$to = "ak_ferrari@hotmail.com";//<== update the email address
$headers = "From: $email_from \r\n";
$headers .= "Reply-To: $visitor_email \r\n";
//Send the email!
mail($to,$email_subject,$email_body,$headers);
//done. redirect to thank-you page.
echo "Thank you for your email, Ryan will reply shortly";


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

</body>
</html>