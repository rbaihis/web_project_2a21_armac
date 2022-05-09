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

    function modifierCategorie($categorie,$connection){

        $type =$categorie->getType();
        $sql ="UPDATE categorie SET type='$type' WHERE (type = $type)";
        echo $sql;
        $connection->exec($sql);
    }
    function supprimerCategorie($type,$connection){
        $sql="DELETE FROM categorie WHERE type ='$type'";
        $connection->exec($sql);


    }
    function getCategorieByType($type,$conntion)
    {
        $sql = "SELECT * FROM categorie WHERE type = '$type'";
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
