<?php

include_once dirname(__FILE__) .'\..\config.php';


class commandes{
    function getListeCommandes(){
        $sql="SELECT commande.id comm_id,date_cmd,adresse,client.id,sum(prix*quatite) totale FROM commande,panier,client,produit_panier,produit where client.id=panier.idClient and commande.id_panier=panier.id and produit_panier.id_panier = panier.id and produit_panier.id_produit = produit.ref GROUP by panier.id;";
        $db = config::getConnexion();
        try{
            $liste = $db->query($sql);
            
            return $liste->fetchAll();
        }
        catch(Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }
    }

    function confirmerCommande(int $current_panier){
        $sql="insert into commande (date_cmd,id_panier) values('". date("Y-m-d")."' , '".$current_panier."');";
        $db = config::getConnexion();
        try{
            $db->query($sql);
            
            return true;
        }
        catch(Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }
    }

    public function supprimerCommande($id){
        $sql = "DELETE FROM commande WHERE id=".$id."";
        $db = config::getConnexion();
        $query =$db->prepare($sql);
        
        try {
            $query->execute();
        }
        catch(Exception $e){
            die('Erreur: '.$e->getMessage());

        }
    }
}