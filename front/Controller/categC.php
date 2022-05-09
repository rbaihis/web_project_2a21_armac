<?php
class categC{
    public $conn;
    function __construct()
    {
        include ('../../connexion.php');  
        $conf= new Connexion();
        $this->conn=$conf->cnx;
    }
    function ajouterCat($cat,$connection){

        $type =$cat->getType();

        $sql ="INSERT INTO categorie (type  ) 
			VALUES ('$type' )";
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
    function supprimerService($id_Service,$connection){
        $sql="DELETE FROM service WHERE id='$id_Service'";
        $connection->exec($sql);


    }
    function getServieById($id,$conntion)
    {
        $sql = "SELECT * FROM service WHERE id = '$id'";
        $reponse = $conntion->query($sql);
        return $reponse;
    }
    function afficherCateg($conntion)
    {
        $sql = "SELECT * FROM categorie";
        $reponse = $conntion->query($sql);
        return $reponse;
    }

}
