<?php
include_once '../../Controller/panierC.php';

 $panierC=new panierC();
 if(
     
     isset($_POST['idClient']) && !empty($_POST['idClient'])
     && isset($_POST['refProduit']) && !empty($_POST['refProduit'])
     && isset($_POST['quantite']) && !empty($_POST['quantite'])

   
 ){
     $panier = new panier($_POST['idClient'],$_POST['refProduit'],$_POST['quantite']);
     $panierC->ajouterPanier($panier);
}
 else
 echo 'veuillez verifier vos données';
 header('Location: ../Back/affichagePanier.php');
 ?>