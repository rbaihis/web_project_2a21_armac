<?php
include('../controller_back/service_C.php');
include('../model_back/service.php');

$service_C = new service_C();

if (isset($_POST ['submit'])) { 

    $type = $_POST['type'];
    $nom = $_POST['nom'];
    $prix = $_POST['prix'];
    $desc = $_POST['description'];

    if (empty($type) || empty($nom) || empty($prix) || empty($desc)) {
        header("location: ../view_back/addService.php?service=empty");
        exit();
    } elseif (!preg_match("/^[a-zA-Z ]*$/", $nom)) {
        header("location: ../view_back/addService.php?service=char");
        exit();
    } elseif (!preg_match("/^[0-9]*$/", $prix)) {
        header("location: ../view_back/addService.php?service=price");
        exit();
    } elseif (!preg_match("/^[a-zA-Z ]*$/", $desc)) {
        header("location: ../view_back/addService.php?service=desc");
        exit();
    } else
        $typea = $_POST['type'];
        $noma = $_POST['nom'];
        $prixa = $_POST['prix'];
        $desca = $_POST['description'];

        $service = new service($typea, $noma, $prixa, $desca);
        $service_C->ajouterService($service, $service_C->conn);
        header('Location: ../view_back/Service.php');


}

?>





