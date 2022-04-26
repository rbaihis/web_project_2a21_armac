<?php
include('../model/reservation.php');
include('../controller/reservationC.php');
if(!empty($_POST['date'])&& !empty($_POST['id'])) {

    $resC = new reservationC();

    $date = $_POST['date'];
    $id = $_POST['id'];

    $res = new reservation($date, $id);
    $resC->ajouterRes($res, $resC->conn);
    header('Location: ../view/reservation.php');
}
else{
    header('Location: ../view/service.php');
    }

?>





