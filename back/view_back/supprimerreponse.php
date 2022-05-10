<?php
include 'C:\xampp\htdocs\t\back\controller_back\reponseC.php';
$reponseC=new reponse_c();
$reponseC->supprimerreponse($_GET["id"]);
header('Location:afficherreponse.php');
?>