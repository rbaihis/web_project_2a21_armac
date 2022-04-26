<?php
include_once 'C:\xampp\htdocs\Gestion_Commande\config.php';
include_once 'C:\xampp\htdocs\Gestion_Commande\Model\panier.php';

class panierC
{
    function afficherPanier(){
        $sql="select * from panier";
        $db = config::getConnexion();
        try{
            $liste = $db->query($sql);
            return $liste;
    }
    catch(Exception $e){
        echo 'Erreur: '.$e->getMessage();
    }
}
// function afficherPanierConn($conn){
//     $sql="select * from panier where idClient=$conn";
//     $db = config::getConnexion();
//     try{
//         $liste = $db->query($sql);
//         return $liste;
// }
// catch(Exception $e){
//     echo 'Erreur: '.$e->getMessage();
// }
// }
public function ajouterPanier($panier){
    $sql="insert into panier(idClient,refProduit,quantite) values(:idClient,:refProduit,:quantite)";
    $db = config::getConnexion();
    try{
        $query=$db->prepare($sql);
        $query->execute([
        'idClient'=>$panier->getIdClient(),
        'refProduit'=>$panier->getRefProduit(),
        'quantite'=>$panier->getQuantite()
        ]);
    }
    catch(Exception $e){
        echo 'Erreur: '.$e->getMessage();
    }
}


// public function afficherPanierRech(string $rech1,string $selon)
// {
//     $sql="select * from panier where $selon like '".$rech1."%'";
    
//     $db = config::getConnexion();
//     try{
//         $liste = $db->query($sql);
//         return $liste;
//     }
//     catch(Exception $e){
//         die('Erreur: '.$e->getMessage());
//     }
// }

//  function afficherPanierDetail(int $rech1)
//     {
//         $sql="select * from panier where id=".$rech1."";
        
//         $db = config::getConnexion();
//         try{
//             $liste = $db->query($sql);
//             return $liste;
//         }
//         catch(Exception $e){
//             die('Erreur: '.$e->getMessage());
//         }
//     }
public function supprimerPanier($id)
{
    $sql = "DELETE FROM panier WHERE id=".$id."";
    $db = config::getConnexion();
    $query =$db->prepare($sql);
    
    try {
        $query->execute();
    }
    catch(Exception $e){
        die('Erreur: '.$e->getMessage());

    }
}
public function supprimerPanierCmd($idC,$conn)
{
    $sql = "DELETE FROM panier WHERE idClient=$conn";
    $db = config::getConnexion();
    $query =$db->prepare($sql);
    
    try {
        $query->execute();
    }
    catch(Exception $e){
        die('Erreur: '.$e->getMessage());

    }
}

function recupererPanier($id)
{
$sql="SELECT * from panier where id=$id";
$db=config::getConnexion();
try{
    $query=$db->prepare($sql);
    $query->execute();
    $panier=$query->fetch();
    return $panier;

}
catch(Exception $e)
{die ('Erreur:'.$e->getMessage());
}

}

// function modifierPanier($panier,$id) {
//     $sql="UPDATE  panier set idClient=:idClient,refProduit=:refProduit,quantite=:quantite where id=".$id."";
//     $db = config::getConnexion();
//     try{
//         $query = $db->prepare($sql);
    
//         $query->execute([
//             'idClient' => $panier->getIdClient(),
//             'refProduit' => $panier->getRefProduit(),
//             'quantite' => $panier->getQuantite(),
//             'id'=>$id
//         ]);			
//     }
//     catch (Exception $e){
//         echo 'Erreur: '.$e->getMessage();
//     }		
//   }

function modifierPanier ($panier, $id)
{ 
try {
    $db= config::getConnexion();
    $query=$db->prepare(
    
           
 "UPDATE panier SET idClient=:idClient,refProduit=:refProduit,quantite=:quantite WHERE id=:id;"

);
$query->execute ([
    'idClient'=> $panier->getIdClient(),
    'refProduit'=> $panier->getRefProduit(),
    'quantite'=> $panier->getQuantite(),
   
    'id'=>$id

]);    
echo $query->rowcount() . "records UPDATED SUCCESSFULLY <br>";
}
catch (PDOException $e){
$e->getMessage();
}

}
}

?>