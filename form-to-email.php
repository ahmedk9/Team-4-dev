<html>
<body>

<?php

require_once('recaptchalib.php');
  $privatekey = "6LdVC-wSAAAAAHp1ys5sd3_0WrpjxpQxDJ-p5dm2";
  $resp = recaptcha_check_answer ($privatekey,
                                $_SERVER["REMOTE_ADDR"],
                                $_POST["recaptcha_challenge_field"],
                                $_POST["recaptcha_response_field"]);

  if (!$resp->is_valid) {
    // What happens when the CAPTCHA was entered incorrectly
    die ("The reCAPTCHA wasn't entered correctly. Go back and try it again.");
  } else {
    
    $name = $_POST['name'];
    $visitor_email = $_POST['email'];
    $message = $_POST['message'];
    $subject = $_POST['subject'];

    //Validation
    if(empty($name)||empty($visitor_email)) 
    {
        echo "Name and email are mandatory!";
        exit;
    }

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

    if(IsInjected($visitor_email))
    {
        echo "Bad email value!";
        exit;
    }

    $email_from = "$visitor_email";
    $email_subject = "$subject";
    $email_body = "You have received a new message from: $name.\n".
        "Here is the message:\n $message";

        // ryan@ryanclevelandservices.com

    $to = "ak_ferrari@hotmail.com";//<== update this to RYAN'S email
    $headers = "From: $email_from \r\n";
    $headers .= "Reply-To: $visitor_email \r\n";
    //Sending the email
    mail($to,$email_subject,$email_body,$headers);
    //done. redirect to thank-you page.
    echo "Thank you for your email, Ryan will reply shortly";



}



   
?> 

</body>
</html>