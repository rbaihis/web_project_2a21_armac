<?php
require "../../includeclasses/mailer/PHPmailer.php";
require "../../includeclasses/mailer/SMTP.php";
require "../../includeclasses/mailer/Exception.php";

//define name spaces 
use PHPmailer\PHPmailer\PHPmailer;
//use PHPmailer\PHPmailer\SMTP;
//use PHPmailer\PHPmailer\Exception;



class MailModel{

    public $sender_Email="2a21group5@gmail.com";
    public $password_email="123azerty*";
    public $reply_to_email="no_reply@biote.tn";
    


    static function NO_HTML_body_forget_password_email_body($email , $token_link ,$contact_us ,$header_title=""){

        $body="$header_title
        We have just received a password reset request for 
        $email \n
        You are receiving this email because you have just requested to reset your Biote account  password.\n
        click here  to reset your password or alternatively, copy and paste the link below in a new browser window:\n
         $token_link \n
        If you have not requested to reset your password, please  <a href='mailto:$contact_us'> contact us </a> immediately .";

        return $body;
    }

    static function body_forget_password_email_body_html_style($email , $token_link ,$contact_us ,$header_title=""){

        $body="<h2 align='center'>$header_title</h2>
        <p style='font-size:18px' > We have just received a password reset request for 
        User : <a href='mailto:$email'>$email</a>   .<br/>
        You are receiving this email because you have just requested to reset your Biote account  password.<br/>
        <a href='$token_link' > click here </a> to reset your password or alternatively, copy and paste the link below in a new browser window:<br/>
        <a href='#' > $token_link</a> <br/>
        If you have not requested to reset your password, please  contact us  <a href='mailto:$contact_us'>$contact_us </a> immediately .
        </p>";

        return $body;
    }


    static function body_succseful_pw_reset($email , $contact_us ){

        $body="<h2 align='center'> Your new password succesffuly set </h2>
        <p style='font-size:18px' >  
        User : <a href='mailto:$email'>$email</a>   .<br/>
        You are receiving this email because you have succesffuly reseted your Biote account 's password.<br/>
       
        If this were not your actions  , please contact us  <a href='mailto:$contact_us'>$contact_us  </a> immediately .
        </p>";

        return $body;
    }

    function send_email( $sender , $sender_pw , $sendTO, $subject , $body_html  , $reply_to ,$reply_to_alias="" , $NO_HTML_body=""){
        
        
        $mail = new PHPMailer();
        $mail->IsSMTP(); 
        $mail->SMTPDebug = 0; 
        $mail->SMTPAuth = true; 
        $mail->SMTPSecure="ssl"; 
        $mail->Host = "smtp.gmail.com";
        
        $mail->Port ="465"; 
        $mail->IsHTML(true);
        //Username to use for SMTP authentication
        $mail->Username = $sender;
        $mail->Password = $sender_pw;
        //Set who the message is to be sent from
        $mail->setFrom($sender, 'Biote');
        //Set an alternative reply-to address
        $mail->addReplyTo($reply_to, $reply_to_alias);
        //Set who the message is to be sent to
        $mail->addAddress($sendTO, '');
        //Set the subject line
        $mail->Subject=$subject;
        //Read an HTML message body from an external file, convert referenced images to embedded,
        //convert HTML into a basic plain-text alternative body
        $mail->msgHTML($body_html);
        //Replace the plain text body with one created manually
        $mail->AltBody = $NO_HTML_body;
        
        //send the message, check for errors
        if (!$mail->send()) {
            echo "Mailer Error:"  . $mail->ErrorInfo;
        } else {
            echo "Message sent!";
        }
        
    }


    function send_email_v2( $sender , $sender_pw , $sendTO, $subject , $body_html  ){
        
        
        $mail = new PHPMailer();
        $mail->IsSMTP(); 
        $mail->SMTPDebug = 0; 
        $mail->SMTPAuth = true; 
        $mail->SMTPSecure="ssl"; 
        $mail->Host = "smtp.gmail.com";
        
        $mail->Port ="465"; 
        $mail->IsHTML(true);
        //Username to use for SMTP authentication
        $mail->Username = $sender;
        $mail->Password = $sender_pw;
        //Set who the message is to be sent from
        $mail->setFrom($sender, 'Biote');
        //Set an alternative reply-to address
        $mail->addReplyTo("no_reply@biote.tn", "no_reply");
        //Set who the message is to be sent to
        $mail->addAddress($sendTO, '');
        //Set the subject line
        $mail->Subject=$subject;
        //Read an HTML message body from an external file, convert referenced images to embedded,
        //convert HTML into a basic plain-text alternative body
        $mail->msgHTML($body_html);
        //Replace the plain text body with one created manually
        $mail->AltBody = "please use an email service app accept html body format ";
        
        //send the message, check for errors
        if (!$mail->send()) {
            echo "Mailer Error:"  . $mail->ErrorInfo;
        } else {
            echo "Message sent!";
        }
        
    }
    

    

    

    
    
}


//------------------------
//debug
// $x="28197096";
// $obj=new MailModel();

// echo($obj->body_forget_password_email_body_html_style("jjj@g.com","https://google.com","owner@gmail.com","Reset Password") );
// $sub=MailModel::body_forget_password_email_body_html_style("a@a.a","12345658","here@to","thx");
// $obj->send_email( $obj->sender_Email,$obj->password_email,"seifallah.rbaihi@esprit.tn","email subj",$sub,$obj->reply_to_email);    


//! 2a21group5@gmail.com
//! 123azerty*

?>