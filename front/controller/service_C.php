<?php
class service_C{
    public $conn;
    function __construct()
    {
        include ('../../back/config/connexion.php');
        $conf= new Connexion();
        $this->conn=$conf->cnx;
    }
    function ajouterService($service,$connection){

        $type =$service->getType();
        $nom = $service->getNom();
        $prix =$service->getPrix();
        $desc =$service->getDescription();
        $sql ="INSERT INTO service (type ,nom,prix,description) 
			VALUES ('$type','$nom','$prix','$desc')";
        echo $sql;
        $connection->exec($sql);

    }

    function modifierService($service,$connection){
        $id=$service->getId();
        $type =$service->getType();
        $nom = $service->getNom();
        $prix =$service->getPrix();
        $desc =$service->getDescription();
        $sql ="UPDATE service SET type='$type' ,nom='$nom',prix='$prix',description='$desc' WHERE (id= $id)";
        echo $sql;
        $connection->exec($sql);
    }
    function supprimerRes($idR,$connection){
        $sql="DELETE FROM reservation WHERE idR='$idR'";
        $connection->exec($sql);


    }
    function getServiceByType($id,$conntion)
    {
        $sql = "SELECT * FROM service WHERE type = '$id'";
        $reponse = $conntion->query($sql);
        return $reponse;
    }
    function getServiceByid($idS,$conntion)
    {
        $sql = "SELECT * FROM service WHERE id = '$idS'";
        $reponse = $conntion->query($sql);
        return $reponse;
    }

    function afficherService($conntion)
    {
        $sql = "SELECT * FROM service";
        $reponse = $conntion->query($sql);
        return $reponse;
    }

}
