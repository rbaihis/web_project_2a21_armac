<!DOCTYPE html>
<html>
    <head></head>
    <body>
        
        <?php

//include required php mailer files 

require "../../includeclasses/PHPmailer.php";
require "../../includeclasses/SMTP.php";
require "../../includeclasses/Exception.php";

//define name spaces 
use PHPmailer\PHPmailer\PHPmailer;
//use PHPmailer\PHPmailer\SMTP;
//use PHPmailer\PHPmailer\Exception;


$mail = new PHPMailer();
$mail->IsSMTP(); 
    $mail->SMTPDebug = 1; 
    $mail->SMTPAuth = true; 
    $mail->SMTPSecure="ssl"; 
    $mail->Host = "smtp.gmail.com";

    $mail->Port ="465"; 
    $mail->IsHTML(true);
    //Username to use for SMTP authentication
    $mail->Username = "2a21group5@gmail.com";
    $mail->Password = "123azerty*";
    //Set who the message is to be sent from
    $mail->setFrom('2a21group5@gmail.com', '2a21group @ gmail dot com');
    //Set an alternative reply-to address
    $mail->addReplyTo('2a21group5@gmail.com', 'Secure Developer');
    //Set who the message is to be sent to
    $mail->addAddress('2a21group5@gmail.com', 'Abulogicss');
    //Set the subject line
    $mail->Subject="PHPMailer SMTP test";
    //Read an HTML message body from an external file, convert referenced images to embedded,
    //convert HTML into a basic plain-text alternative body
    $mail->msgHTML("convert HTML into a basic plain-text alternative body");
    //Replace the plain text body with one created manually
    $mail->AltBody = 'This is a plain-text message body';

    //send the message, check for errors
    if (!$mail->send()) {
        echo "Mailer Error:"  . $mail->ErrorInfo;
    } else {
        echo "Message sent!";
    }



$mail1->smtpClose();

//! 2a21group5@gmail.com
//! 123azerty*



?>

    </body>
</html>