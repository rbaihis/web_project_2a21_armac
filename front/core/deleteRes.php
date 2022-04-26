<?php

include('../controller/reservationC.php');
$resC=new reservationC();

$idR=$_POST["id"];
$resC->supprimerRes($idR,$resC->conn);
header('Location: ../view/reservation.php');
?>