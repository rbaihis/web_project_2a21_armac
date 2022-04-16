<?php
include '../../controller/categorie_c.php';
$categorieC=new categorieC();
$categorieC->supprimerCategorie($_GET["idCategorie"]);
header('Location:affichercategorie.php');
?>


