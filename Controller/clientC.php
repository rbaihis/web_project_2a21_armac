<?php
include_once("C:/xampp/htdocs/project/config.php");
include_once("C:/xampp/htdocs/project/Model/client.php");
class clientC
{
    function selectConn(){
        $sql="select * from client where token='ON'";
        $db = config::getConnexion();
        try{
            $liste = $db->query($sql);
            return $liste;
    }
    catch(Exception $e){
        echo 'Erreur: '.$e->getMessage();
    }
}

    function afficherClient(){
        $sql="select * from client";
        $db = config::getConnexion();
        try{
            $liste = $db->query($sql);
            return $liste;
    }
    catch(Exception $e){
        echo 'Erreur: '.$e->getMessage();
    }
}
function searchLogin($email,$mdp){
    $sql="select * from client where email='$email' AND mdp='$mdp'";
    $db = config::getConnexion();
    try{
        $liste = $db->query($sql);
        return $liste;
}

catch(Exception $e){
    echo 'Erreur: '.$e->getMessage();
}
}
public function ajouterClient($client){
    $sql="insert into client(nom,email,numtel,adresse,mdp) values(:nom,:email,:numtel,:adresse,:mdp)";
    $db = config::getConnexion();
    try{
        $query=$db->prepare($sql);
        $query->execute([
        'nom'=>$client->getNom(),
        'email'=>$client->getEmail(),
        'numtel'=>$client->getNumtel(),
        'mdp'=>$client->getMdp(),
        'adresse'=>$client->getAdresse()
        ]);
        
    }
        catch(Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }
}
function afficherClientTrie(string $selon){
    $sql="select * from client order by ".$selon."";
    $db = config::getConnexion();
    try{
        $liste = $db->query($sql);
        return $liste;
}

catch(Exception $e){
    echo 'Erreur: '.$e->getMessage();
}
}
public function setConn($email,$mdp)
{
    $sql="update client set token='ON' where email='$email' AND mdp='$mdp'";
    
    $db = config::getConnexion();
    try{
        $liste = $db->query($sql);
        return $liste;
    }
    catch(Exception $e){
        die('Erreur: '.$e->getMessage());
    }
}
public function setDisconn()
{
    $sql="update client set token='OFF' where token='ON'";
    
    $db = config::getConnexion();
    try{
        $liste = $db->query($sql);
        return $liste;
    }
    catch(Exception $e){
        die('Erreur: '.$e->getMessage());
    }
}
public function statistiques()
{
    $sql="SELECT email,count(*) from client group by email ";
    
    $db = config::getConnexion();
    try{
        $liste = $db->query($sql);
        return $liste;
    }
    catch(Exception $e){
        die('Erreur: '.$e->getMessage());
    }
}
public function afficherClientRech(string $rech1,string $selon)
{
    $sql="select * from client where $selon like '".$rech1."%'";
    
    $db = config::getConnexion();
    try{
        $liste = $db->query($sql);
        return $liste;
    }
    catch(Exception $e){
        die('Erreur: '.$e->getMessage());
    }
}
function modifierClient($id,$client) {
    $sql="UPDATE  client set nom=:nom,numtel=:numtel,email=:email,mdp=:mdp,adresse=:adresse where id=".$id."";
    $db = config::getConnexion();
    try{
        $query = $db->prepare($sql);
    
        $query->execute([
            'nom' => $client->getNom(),
            'numtel' => $client->getNumtel(),
            'email' => $client->getEmail(),
            'adresse' => $client->getAdresse(),
            'mdp' => $client->getMdp()
        ]);			
    }
    catch (Exception $e){
        echo 'Erreur: '.$e->getMessage();
    }		
  }
public function afficherClientDetail(int $rech1)
    {
        $sql="select * from client where id=".$rech1."";
        
        $db = config::getConnexion();
        try{
            $liste = $db->query($sql);
            return $liste;
        }
        catch(Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }
public function supprimerClient($id)
{
    $sql = "DELETE FROM client WHERE id=".$id."";
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