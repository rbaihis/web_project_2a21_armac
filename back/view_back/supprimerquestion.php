<?php
include 'C:\xampp\htdocs\t\back\controller_back\questionC.php';
$questionC=new question_c();
$questionC->supprimerquestion($_GET["id"]);
header('Location:afficherquestion.php');
?>