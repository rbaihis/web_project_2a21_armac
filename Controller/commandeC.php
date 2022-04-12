<?php
include_once("C:/xampp/htdocs/project/config.php");
include_once("C:/xampp/htdocs/project/Model/commande.php");
class commandeC
{
    function afficherCommnade(){
        $sql="select * from commande";
        $db = config::getConnexion();
        try{
            $liste = $db->query($sql);
            return $liste;
    }
    catch(Exception $e){
        echo 'Erreur: '.$e->getMessage();
    }
}
function afficherCommnadeDer(){
    $sql="SELECT * FROM commande WHERE id=(SELECT max(id) FROM commande);";
    $db = config::getConnexion();
    try{
        $liste = $db->query($sql);
        return $liste;
}
catch(Exception $e){
    echo 'Erreur: '.$e->getMessage();
}
}
public function ajouterCommande($commande){
    $sql="insert into commande(date_cmd,adresse,prix,idClient) values(:date_cmd,:adresse,:prix,:idClient)";
    $db = config::getConnexion();
    try{
        $query=$db->prepare($sql);
        $query->execute([
        'date_cmd'=>$commande->getDate_cmd(),
        'adresse'=>$commande->getAdresse(),
        'prix'=>$commande->getPrix(),
        'idClient'=>$commande->getIdClient()
        ]);
        
    }
        catch(Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }
}

function modifierCommande($id,$commande) {
    $sql="UPDATE  commande set adresse=:adresse where id=".$id."";
    $db = config::getConnexion();
    try{
        $query = $db->prepare($sql);
    
        $query->execute([
            'adresse' => $commande->getAdresse(),
           
        ]);			
    }
    catch (Exception $e){
        echo 'Erreur: '.$e->getMessage();
    }		
  }



public function afficherCommandeDetail(int $rech1)
    {
        $sql="select * from commande where id=".$rech1."";
        
        $db = config::getConnexion();
        try{
            $liste = $db->query($sql);
            return $liste;
        }
        catch(Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }
public function supprimerCommande($id)
{
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

?>