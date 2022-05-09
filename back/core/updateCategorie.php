<?php
include('../controller_back/categC.php');
include ('../model_back/categ.php');

$categorie_C=new categC();

if (isset($_POST["type"]))
{
    $type = $_POST['type'];

    $categorie=new categ($type);
    $categorie->setType($type);



    $categorie_C->modifierCategorie($categorie, $categorie_C->conn);

    header('Location: ../view_back/updateCategorie.php');
}
?>


