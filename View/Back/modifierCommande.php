<?php
 include_once '../../Controller/commandeC.php';
 
 $co = new commandeC();
 if(isset($_GET['id'])){
   $commandeC = new commandeC();
   $listeC = $commandeC->afficherCommandeDetail($_GET['id']);
 
 foreach($listeC as $commande){
 ?>
 <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add Product - Dashboard Admin Template</title>
   

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600">
    <!-- https://fonts.google.com/specimen/Open+Sans -->
    <link rel="stylesheet" href="css/fontawesome.min.css">
    <!-- https://fontawesome.com/ -->
    <link rel="stylesheet" href="jquery-ui-datepicker/jquery-ui.min.css" type="text/css" />
    <!-- http://api.jqueryui.com/datepicker/ -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- https://getbootstrap.com/ -->
    <link rel="stylesheet" href="css/tooplate.css">
</head>

<body class="bg02">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav class="navbar navbar-expand-xl navbar-light bg-light">
                    <a class="navbar-brand" href="index.html">
                        <i class="fas fa-3x fa-tachometer-alt tm-site-icon"></i>
                        <h1 class="tm-site-title mb-0">Bioté center</h1>
                    </a>
                    <button class="navbar-toggler ml-auto mr-0" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav mx-auto">
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="acceuil.html">acceuil</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="promo.html">gestion offre</a>
                        </li>
                           
                            

                            <li class="nav-item">
                                <a class="nav-link" href="accounts.html">gestion produit</a>
                            </li>

                     
                        </div>
                </nav>
            </div>
        </div>
    



        <!-- row -->
        <div class="row tm-mt-big">
            <div class="col-xl-8 col-lg-10 col-md-12 col-sm-12">
                <div class="bg-white tm-block">
                    <div class="row">
                        <div class="col-12">
                            <h2 class="tm-block-title d-inline-block">Modifier Commande</h2>
                        </div>
                    </div>
                    <div class="row mt-4 tm-edit-product-row">
                        <div class="col-xl-7 col-lg-7 col-md-12">
                            <form action="" class="tm-edit-product-form">
                            <p> 
                <label>Adresse </label>
                <input type="text" class="field size1" name="adresse" value=<?php echo $commande['adresse'];?> />
              </p>
              <div class="buttons">
              <input type="Reset" class="button" value="Reset" />
              <input type="submit" class="button" value="submit" />
            </div>  
                        </div>
                    </div>
                </div>
                <?php
 // create event
 $commande = null;

 // create an instance of the controller

 $commandeC = new commandeC();
 if (
     isset($_POST["adresse"]) 
 
 ){
     if (
         !empty($_POST["adresse"]) 
      )  
      {
         $commande = new commande(
             $_POST['adresse'],
        
         );
        $commandeC->modifierCommande($_GET['id'],$commande);
         
         header('Location:affichageCommande.php');
     }
     else
         $error = "Missing information";
 }

}
}

?>
       