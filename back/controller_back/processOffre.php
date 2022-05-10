<?php

if(session_status() !== PHP_SESSION_ACTIVE) {
    session_start();    }  

    
require_once '../../config.php';

$name = '';
$prix = '';
$update = false;
$id = 0;
//  Save

if (isset($_POST['submit'])){
    $name = $_POST['nameI'];
    $prix = $_POST['prixI'];
    if( ($name=='')||($prix=='')){
        $_SESSION['message']="Veuillez remplir les deux champs";
        $_SESSION['msg_type']="danger";
         header("location: ../view_back/ajout.php");
        //header("location: ../view_back/ajout.php?CS=1");
    }else{
    $con->query("INSERT INTO dataoffre (itemName, price) VALUES('$name',$prix)");  
    $_SESSION['message']="Record has been saved!";
    $_SESSION['msg_type']='success';
    header("location: ../view_back/ajout.php");
    }
}
 //Delete
 if (isset($_GET['delete'])){
     $id = $_GET['delete'];
     $con->query("DELETE FROM dataoffre WHERE id = $id");
     $_SESSION['message']="Record has been deleted!";
     $_SESSION['msg_type']="danger";
     header("location: ../view_back/ajout.php");
 }
 //Edit
 if(isset($_GET['edit']))
 {
     $id = $_GET['edit'];
     $update = true;
     $result = $con->query("SELECT * FROM dataoffre WHERE id = $id");
     if (($result->rowCount()) > 0)
     {
        // $row = $result->fetch_array();
        // $name = $row['itemName'];
        // $prix = $row['price'];
        while ($row = $result->fetch(PDO::FETCH_ASSOC)):
            $name = $row['itemName'];
            $prix = $row['price'];
        endwhile;
     }
 }
 //Updates
if (isset($_POST['update']))
{
    $id = $_POST['id'];
    $name = $_POST['nameI'];
    $prix = $_POST['prixI'];
    if(($name=='')||($prix=='')){
        $_SESSION['message']="Veuillez remplir les deux champs";
        $_SESSION['msg_type']="danger";
         header("location: ../view_back/ajout.php");
    }else{
    $con->query("UPDATE dataoffre SET itemName='$name', price='$prix' WHERE id = $id");
    $_SESSION['message']="Record has been updated!";
    $_SESSION['msg_type']="warning";
    header('location: ../view_back/ajout.php');}
}









