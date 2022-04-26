<?php
include('../controller_back/service_C.php');
include ('../model_back/service.php');

$service_C=new service_C();

if (isset($_POST["id"]))
{

    $id = $_POST['id'];


$type=$_POST['type'];
$nom=$_POST['nom'];
$prix=$_POST['prix'];
$desc=$_POST['description'];



$service=new service ($type,$nom,$prix,$desc);
$service->setId($id);
echo  $id;

$service_C->modifierService($service,$service_C->conn);

header('Location: ../view_back/Service.php');
}
?>


