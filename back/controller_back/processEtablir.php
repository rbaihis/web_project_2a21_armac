<?php
//session_start();

require_once '../../config.php';
if (isset($_POST['valider']))
{
    $codeCoupon = $_POST['codeCoup'];
    $idOffre = $_POST['idOffre'];
    $con->query("UPDATE dataoffre SET idCoupon='$codeCoupon' WHERE id = $idOffre") ;
    $_SESSION['message']="Record has been updated!";
    $_SESSION['msg_type']="warning";
    header('location: ../view_back/ajout.php');
}


?>