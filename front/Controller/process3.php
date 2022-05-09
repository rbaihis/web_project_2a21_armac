<?php
 //session_start();
    require_once "../../config.php";
    // if (isset($_GET['passFormulaire'])) {
    //     header('location: ../view/formulairePaiement.php'); 
    // }
    if (isset($_POST['pass'])){
        $couponForTest = $_POST['couponInput'];
        header("location: ../view/formulairePaiement.php?coup=$couponForTest");
        // header("location: ../view/formulairePaiement.php");
    }

    if (isset($_POST['submit'])){
        $nameHolder = $_POST['nameHolder'];
        $MM = $_POST['MM'];
        $YY = $_POST['YY'];
        $cardNumber = $_POST['cardNumber'];
        $cvc = $_POST['cvc'];
        if(((($nameHolder=='')||($MM==''))||(($YY=='')||($cardNumber=='')))||($cvc=='')){
            header("location: ../view/invoice2.php");
        }else{
        $con->query("INSERT INTO clients (cardholder, mm, yy, cardnumber, cvc) VALUES('$nameHolder',$MM,$YY,$cardNumber,$cvc)")  ;  
        header("location: ../view/invoice.php");
    }}
     
?>

