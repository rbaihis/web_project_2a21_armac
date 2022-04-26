<?php

include_once dirname(__FILE__) .'\..\config.php';


class commandes{
    function getListeCommandes(){
        $sql="select * from commande";
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
}