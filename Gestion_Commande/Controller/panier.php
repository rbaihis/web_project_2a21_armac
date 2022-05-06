<?php

include_once dirname(__FILE__) .'\..\config.php';


class paniers{
    function getCurrentPanier(){
        $sql="select id from panier where confirme='false'";
        $db = config::getConnexion();
        try{
            $liste = $db->query($sql);
            
            return $liste->fetchAll()[0]["id"];
        }
        catch(Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }
    }

    function afficherPanier(int $id){
        $sql="select * FROM panier,produit,produit_panier WHERE panier.id=produit_panier.id_panier and produit.ref=produit_panier.id_produit and panier.id=".$id;
        $db = config::getConnexion();
        try{
            $liste = $db->query($sql);
            return $liste->fetchAll();
        }
        catch(Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }
    }

    function confirmePanier(int $id){
        $sql="update panier set confirme='true' where id=".$id;
        $db = config::getConnexion();
        try{
            $db->query($sql);
            $sql="insert into panier (idClient,confirme) values(13,'false')";
            $db->query($sql);
            return true;
        }
        catch(Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }
    }

    function ajouterAuPanier(int $id_produit,int $id_panier,int $quantite){
        $sql="insert into produit_panier (id_panier	,id_produit	,quatite) values(".$id_panier." , ".$id_produit." , ".$quantite.");";
        $db = config::getConnexion();
        try{
            $db->query($sql);
            return true;
        }
        catch(Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }
    }

    function supprimerDuPanier(int $id_produit,int $id_panier){
        $sql="delete from produit_panier where id_panier=".$id_panier." and id_produit=".$id_produit;
        $db = config::getConnexion();
        try{
            $db->query($sql);
            return true;
        }
        catch(Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }
    }

    function afficherProduitsSorted(int $id){
        $sql="select * FROM panier,produit,produit_panier WHERE panier.id=produit_panier.id_panier and produit.ref=produit_panier.id_produit and panier.id=".$id." order by ".$_POST['filter'];
        $db = config::getConnexion();
        try{
            $liste = $db->query($sql);
            
            return $liste->fetchAll();
        }
        catch(Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }
    }

    function afficherProduitsSearch(int $id){
        $sql="select * FROM panier,produit,produit_panier WHERE panier.id=produit_panier.id_panier and produit.ref=produit_panier.id_produit and panier.id=".$id." and nom like '%".$_POST['keyword']."%'";
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