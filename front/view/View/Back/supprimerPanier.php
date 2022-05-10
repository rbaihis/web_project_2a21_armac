<?php
 include_once '../../Controller/PanierC.php';
 $co = new panierC();
 if(isset($_GET['id'])){
     $co->supprimerPanier($_GET['id']);
 
    header('Location:affichagePanier.php');
    }

 ?>