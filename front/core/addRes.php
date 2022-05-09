<?php
include('../model/reservation.php');
include('../controller/reservationC.php');
require "includeclasses/PHPmailer.php";
require "includeclasses/SMTP.php";
require "includeclasses/Exception.php";

//define name spaces
use PHPmailer\PHPmailer\PHPmailer;
//use PHPmailer\PHPmailer\SMTP;
//use PHPmailer\PHPmailer\Exception;

if(!empty($_POST['date'])&& !empty($_POST['id'])) {

    $resC = new reservationC();

    $date = $_POST['date'];
    $id = $_POST['id'];
    $email = $_POST['email'];

    $res = new reservation($date, $id,$email);
    $resC->ajouterRes($res, $resC->conn);
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
    $mail->setFrom('2a21group5@gmail.com', ''); //! moch lezem
    //Set an alternative reply-to address
    $mail->addReplyTo('mouhamed.abbassi@esprit.tn', 'reply services'); //! lchkoun ymchi mail ki ya3mel reply l user
    //Set who the message is to be sent to
    $mail->addAddress($_POST['email'], '');
    //Set the subject line
    $mail->Subject="email proto test";
    //Read an HTML message body from an external file, convert referenced images to embedded,
    //convert HTML into a basic plain-text alternative body
    $mail->msgHTML(" Mail de confirmation de la reservation ");

    //Replace the plain text body with one created manually
    $mail->AltBody = 'This is a plain-text message body';

    //send the message, check for errors
    if (!$mail->send()) {
        echo "Mailer Error:"  . $mail->ErrorInfo;
    } else {
        echo "Message sent!";
    }



    $mail->smtpClose();

    header('Location: ../view/reservation.php');
}
else{
    header('Location: ../view/service.php');
    }

?>





