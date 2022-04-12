<?php
include_once '../../Model/panier.php';
include_once '../../Controller/panierC.php';
include_once '../../Controller/clientC.php';

$clientC = new clientC();
$listeeee = $clientC->selectConn();
foreach($listeeee as $c){$conn=$c['id'];}
$panierC = new panierC();
      $panier= new panier(
            $conn,
            $_GET['ref'],
            $_GET['quantity'],
        );
        $panierC->ajouterPanier($panier);
        header('Location:panier.php');

?>