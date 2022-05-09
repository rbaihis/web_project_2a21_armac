<?php
session_start();
require_once '../../config.php';
$name = '';
$update = false;
$id = 0;
//  Save

if (isset($_POST['submit'])){
    $name = $_POST['name'];
    if ($name==''){
        $_SESSION['message']="Veuillez remplir le champ";
        $_SESSION['msg_type']="danger";
         header("location: ../view_back/back.php");
       
    }else{
        $con->query("INSERT INTO type_reclamation (nom_type) VALUES('$name')")  ;  
        $_SESSION['message']="Record has been saved!";
        $_SESSION['msg_type']='success';
        header("location: ../view_back/back.php");
    }
}  

 //Delete
 if (isset($_GET['delete'])){
     $id = $_GET['delete'];
     $con->query("DELETE FROM type_reclamation WHERE id_type = $id") ;
     $_SESSION['message']="Record has been deleted!";
     $_SESSION['msg_type']="danger";
     header("location: back.php");
 }
  //Delete2
  if (isset($_GET['delete2'])){
    $id2 = $_GET['delete2'];
    $con->query("DELETE FROM reclamation WHERE id_recl = $id2") ;
    $_SESSION['message']="Record has been deleted!";
    $_SESSION['msg_type']="danger";
    header("location: back.php");
}
 //Edit
 if(isset($_GET['edit']))
 {
     $id = $_GET['edit'];
     $update = true;
     $result = $con->query("SELECT * FROM type_reclamation WHERE id_type = $id") ;
     if (($result->rowCount()) > 0)
     {
        while ($row = $result->fetch(PDO::FETCH_ASSOC)):
    
        $name = $row['nom_type'];
     
        endwhile;
     }
 }
 //Updates

if (isset($_POST['update']))
{
    $idR = $_POST['id'];
    $nameR = $_POST['name'];
    if ($nameR==''){
        $_SESSION['message']="Veuillez remplir le champ";
        $_SESSION['msg_type']="danger";
         header("location: ../view_back/back.php");
    }else{
        $con->query("UPDATE type_reclamation SET nom_type='$nameR' WHERE id_type = $idR") ;
        $_SESSION['message']="Record has been updated!";
        $_SESSION['msg_type']="warning";
        header('location: ../view_back/back.php');
    }
}

?>