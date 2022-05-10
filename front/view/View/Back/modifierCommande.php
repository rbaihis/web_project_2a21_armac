<?php
include_once '../../Model/commande.php';
include_once '../../Controller/commandeC.php';

        $error = "";
    // create
 $commande = null;
    // create an instance of the controller
    $commandeC = new commandeC();
    if (
        isset($_POST["date_cmd"]) &&
		isset($_POST["adresse"]) &&		
        isset($_POST["prix"])  &&
        isset($_POST["idClient"])
		 )
        {
        if (
            !empty($_POST["date_cmd"]) && 
			!empty($_POST["adresse"]) &&
            !empty($_POST["prix"]) &&
            !empty($_POST["idClient"]) 

        ) {
            $commande = new commande(
                $_POST['date_cmd'],
                $_POST['adresse'],
                $_POST['prix'],
                $_POST['idClient']
			
            );
            $commandeC->modifierCommande($commande,$_POST['id']);
        
            header('Location:affichageCommande.php');
        }
        else
            $error = "Missing information";
           
    }

 
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
                       
        
                <div id="error">
            <?php echo $error; ?>        			
            <?php
                if (isset($_POST["id"])){
				$commande = $commandeC->recupererCommande($_POST["id"]);
                ?>
                </div>
        
                <form action="" method='POST'>
                
                    <input type="hidden" id="id" name="id" value="<?php echo $commande["id"];?> " 
                    minlength="3" maxlength="20" size="10" >
                    <br><br>
                <label for="adresse">adresse:
                    </label>
                    <input type="adresse" id="adresse" name="adresse" value="<?php echo $commande["adresse"];?>"
                    minlength="3" maxlength="20" size="10" >
                    <br><br>
             

                    <label for="date_cmd">date commande:
                    </label>
                    <input type="text" id="date_cmd" name="date_cmd" value="<?php echo $commande["date_cmd"];?>"
                    minlength="3" maxlength="20" size="10" >
                    <br><br>
                    <label for="prix">prix:
                    </label>
                    <input type="text" id="prix" name="prix" value="<?php echo $commande["prix"];?>"
                    minlength="3" maxlength="20" size="10" >
                    <br><br>
         
                  
                    <input type="hidden" id="idClient" name="idClient" value="<?php echo $commande["idClient"];?> " 
                    minlength="3" maxlength="20" size="10" >
                    <br><br>
              <div class="buttons">
                <input type="Reset" class="button" value="Reset" />
                <input type="submit" class="button" value="submit" />
              </div>  
         
        </form>
        <?php
		}
		?>   
        </div>
                    </div>
                </div>
       