<?php
include('../controller/reservationC.php');
include ('../model/reservation.php');

$res_C=new reservationC();

if (isset($_POST["id"]))
{

    $id = $_POST['id'];


    $date=$_POST['date'];
    $nom=$_POST['nom'];



    $res=new reservation($date,$id);
    $res->setId($id);
    echo  $id;

    $res_C->modifierRes($res,$res_C->conn);

    header('Location: ../view/reservation.php');
}
?>


