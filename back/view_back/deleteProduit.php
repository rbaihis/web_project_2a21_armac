<?php
include '../controller_back/produitC.php';
$produitC=new produitC();
$produitC->supprimerProduit($_GET["id"]);
header('Location:afficherproduit.php');
?>


