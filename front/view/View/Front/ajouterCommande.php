<?php
include_once '../../Controller/commandeC.php';

 $commandeC=new commandeC();
 if(
     
     isset($_POST['date_cmd']) && !empty($_POST['date_cmd'])
     && isset($_POST['adresse']) && !empty($_POST['adresse'])
     && isset($_POST['prix']) && !empty($_POST['prix'])
     && isset($_POST['idClient']) && !empty($_POST['idClient'])

   
 ){
     $commande = new commande($_POST['date_cmd'],$_POST['adresse'],$_POST['prix'],$_POST['idClient']);
     $commandeC->ajouterCommande($commande);
}
 else
 echo 'veuillez verifier vos données';
 header('Location: ../Back/affichageCommande.php');
 ?>