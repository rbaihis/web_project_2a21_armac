<?php
class reservationC{
    public $conn;
    function __construct()
    {
        include ('../config/connexion.php');
        $conf= new Connexion();
        $this->conn=$conf->cnx;
    }
    function ajouterRes($res,$connection){

        $date =$res->getDate();
        $id = $res->getId();
        $sql ="INSERT INTO reservation (date ,id ) 
			VALUES ('$date','$id')";
        echo $sql;
        $connection->exec($sql);

    }
    function afficherRes($conntion)
    {
        $sql = "SELECT * FROM reservation,service WHERE reservation.id=service.id";
        $reponse = $conntion->query($sql);
        return $reponse;
    }

    function supprimerRes($idR,$connection){
        $sql="DELETE FROM reservation WHERE idR='$idR'";
        $connection->exec($sql);
    }
    function getResById($idR,$conntion)
    {
        $sql = "SELECT * FROM reservation WHERE idR = '$idR'";
        $reponse = $conntion->query($sql);
        return $reponse;
    }


    function modifierRes($reservation,$connection){
        $date=$reservation->getDate();
        $id =$reservation->getId();

        $sql ="UPDATE service SET date='$date' ,idR='$id' WHERE (idR= $id)";
        echo $sql;
        $connection->exec($sql);
    }
}
