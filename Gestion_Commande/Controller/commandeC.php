<?php
include_once 'C:\xampp\htdocs\Gestion_Commande\config.php';
include_once 'C:\xampp\htdocs\Gestion_Commande\Model\commande.php';


class commandeC
{

function afficherCommande(){
    $sql="SELECT * FROM commande";
    $db = config::getConnexion();
    try{
        $liste = $db->query($sql);
        return $liste;
    }
    catch(Exception $e){
        die('Erreur:' . $e->getMessage());
    }
}
// function afficherCommnadeDer(){
//     $sql="SELECT * FROM commande WHERE id=(SELECT max(id) FROM commande);";
//     $db = config::getConnexion();
//     try{
//         $liste = $db->query($sql);
//         return $liste;
// }
// catch(Exception $e){
//     echo 'Erreur: '.$e->getMessage();
// }
// }

function ajouterCommande($commande){

    $sql = "INSERT INTO commande(date_cmd,adresse,prix,idClient)
              VALUES (:date_cmd,:adresse,:prix,:idClient)";
 $db = config::getConnexion();
 var_dump($commande);
 try{
     $query = $db->prepare($sql);
     $query->execute([
         'date_cmd'=>$commande->getDate_cmd(),
         'adresse'=>$commande->getAdresse(),
         'prix'=> $commande->getPrix(),
         'idClient'=>$commande->getIdClient()
     ]);
} catch (PDOExeption $e){
 $e->getMessage();
}

 }


function recupererCommande($id)
{
$sql="SELECT * from commande where
id=$id";
$db=config::getConnexion();
try{
    $query=$db->prepare($sql);
    $query->execute();
    $commande=$query->fetch();
    return $commande;

}
catch(Exception $e)
{die ('Erreur:'.$e->getMessage());
}
}

function modifierCommande ($commande, $id)
{ 
try {
    $db= config::getConnexion();
    $query=$db->prepare(
    
           
 "UPDATE commande SET date_cmd=:date_cmd,adresse=:adresse,prix=:prix,idClient=:idClient WHERE id=:id;"

);
$query->execute ([
    'date_cmd'=> $commande->getDate_cmd(),
    'adresse'=> $commande->getAdresse(),
    'prix'=> $commande->getPrix(),
    'idClient'=> $commande->getIdClient(),
    'id'=>$id

]);    
echo $query->rowcount() . "records UPDATED SUCCESSFULLY <br>";
}
catch (PDOException $e){
$e->getMessage();
}

}

// public function afficherCommandeDetail(int $rech1)
//     {
//         $sql="select * from commande where id=".$rech1."";
        
//         $db = config::getConnexion();
//         try{
//             $liste = $db->query($sql);
//             return $liste;
//         }
//         catch(Exception $e){
//             die('Erreur: '.$e->getMessage());
//         }
//     }
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