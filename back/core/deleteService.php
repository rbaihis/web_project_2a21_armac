<?php

include('../controller_back/service_C.php');
$service_C=new service_C();

$id_Service=$_POST["id"];
$service_C->supprimerService($id_Service,$service_C->conn);
header('Location: ../view_back/Service.php');
?>