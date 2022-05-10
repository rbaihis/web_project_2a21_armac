<?php
 include_once '../../Controller/commande.php';
 $co = new commandes();
 if(isset($_GET['id'])){
     $co->supprimerCommande($_GET['id']);
 
    header('Location:affichageCommande.php');
    }

?>