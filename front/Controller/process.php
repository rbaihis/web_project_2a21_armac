<?php
 if(session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}
require_once "../../config.php";
$itemName = '';
$price = '';
$update = false;
$id = 0;
//  Save
if (isset($_GET['commande1'])){
    $id = $_GET['commande1'];
    $result = $con->query("SELECT id, itemName, price FROM dataoffre WHERE id = $id") ;
    if (($result->rowCount()) > 0)
    {
        $row = $result->fetch(PDO::FETCH_ASSOC);
        $itemName = $row['itemName'];
        $price = $row['price'];
    }
    $con->query("INSERT INTO commande (itemName, price) VALUES('$itemName',$price)")  ; 
    header("location: ../view/index.php"); 
}
// Delete
if (isset($_GET['delete'])){
    $idc = $_GET['delete'];
    $con->query("DELETE FROM commande WHERE id = $idc") ;
    header("location: ../view/index.php");
}
?>  