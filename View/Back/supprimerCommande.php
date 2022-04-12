<?php
 include_once '../../Controller/commandeC.php';
 $co = new commandeC();
 if(isset($_GET['id'])){
     $co->supprimerCommande($_GET['id']);
 
    header('Location:affichageCommande.php');
    }

 ?>