<?php
error_reporting(E_ALL ^ E_NOTICE);  
session_start();
error_reporting(E_ALL ^ E_NOTICE);  
require_once '../../config.php';

$code = '';
$prixC = '';
$updateC = false;
$idC = 0;
//  Save


    if (isset($_POST['submitC'])){
        $code = $_POST['code'];
        $prixC = $_POST['prixC'];
        if( ($code=='')||($prixC=='')){
            $_SESSION['message']="Veuillez remplir les deux champs";
            $_SESSION['msg_type']="danger";
             header("location: ../views/ajout.php");
        }else{
        $con->query("INSERT INTO datacoupon  (codeCoupon, priceDiscount) VALUES('$code',$prixC)")  ;  
        $_SESSION['message']="Record has been saved!";
        $_SESSION['msg_type']='success';
        header("location: ../views/ajout.php");
    }
}
 //Delete
 if (isset($_GET['deleteC'])){
    $idC = $_GET['deleteC'];
    $con->query("DELETE FROM datacoupon WHERE id = $idC") ;
    $_SESSION['message']="Record has been deleted!";
    $_SESSION['msg_type']="danger";
    header("location: ../views/ajout.php");
}

//Edit
if(isset($_GET['editC']))
{
    $idC = $_GET['editC'];
    $updateC = true;
    $result = $con->query("SELECT * FROM datacoupon WHERE id = $idC") ;
    if (($result->rowCount()) > 0)
    {
        while ($row= $result->fetch(PDO::FETCH_ASSOC)):
        $code = $row['codeCoupon'];
        $prixC = $row['priceDiscount'];
        endwhile;
    }
}






//update
if (isset($_POST['updateC']))
{
    $idC = $_POST['idC'];
    $codeCA = $_POST['code'];
    $prixCA = $_POST['prixC'];
    if( ($codeCA=='')||($prixCA=='')){
        $_SESSION['message']="Veuillez remplir les deux champs";
        $_SESSION['msg_type']="danger";
         header("location: ../views/ajout.php");
    }else{
        $con->query("UPDATE datacoupon SET codeCoupon='$codeCA', priceDiscount='$prixCA' WHERE id = $idC") ;
        $_SESSION['message']="Record has been updated!";
        $_SESSION['msg_type']="warning";
        header('location: ../views/ajout.php');
    }
}









?>