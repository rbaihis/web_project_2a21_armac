<?php

include_once dirname(__FILE__) .'\..\config.php';
include_once dirname(__FILE__) .'\..\Model\produit.php';

class produits{
    function afficherProduits(){
        $sql="select * from produit";
        $db = config::getConnexion();
        try{
            $liste = $db->query($sql);
            
            return $liste->fetchAll();
        }
        catch(Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }
    }

    function afficherProduitsSorted(){
        $sql="select * from produit order by ".$_POST['filter'];
        $db = config::getConnexion();
        try{
            $liste = $db->query($sql);
            
            return $liste->fetchAll();
        }
        catch(Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }
    }

    function afficherProduitsSearch(){
        $sql="select * from produit where nom like '%".$_POST['keyword']."%'";
        $db = config::getConnexion();
        try{
            $liste = $db->query($sql);
            
            return $liste->fetchAll();
        }
        catch(Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }
    }
}