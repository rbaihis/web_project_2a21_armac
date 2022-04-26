<?php
include('../controller_back/categC.php');
include ('../model_back/categ.php');

$categC =new categC();

if (isset($_POST ['submit'])) {

$type=$_POST['type'];

    if (empty($type) ) {
        header("location: ../view_back/addCateg.php?Categ=empty");
        exit();
    }

else
    $typea = $_POST['type'];

    $categ=new categ($typea);
    $categC->ajouterCat($categ,$categC->conn);
    header('Location: ../view_back/Service.php');
}
?>





