<?php

include('../controller_back/categC.php');
$categorie_C=new categC();

$type=$_POST["type"];
$categorie_C->supprimerCategorie($type,$categorie_C->conn);
header('Location: ../view_back/categorie.php');
?>