<?php
    $name = $_POST['name'];
    $visitor_email = $_POST['email'];
    $message = $_POST['message'];

    $email_from = 'karenandrea12204@gmail.com';

    $email_subject = "Prueba";

    $email_body = "You have received a new message from the user $name.\n".
                            "Here is the message:\n $message".

    $to = "karenandrea12204@gmail.com";

    $headers = "From: $email_from \r\n";
    
    $headers .= "Reply-To: $visitor_email \r\n";

    function IsInjected($str){
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
    
    mail($to,$email_subject,$email_body,$headers);
?>