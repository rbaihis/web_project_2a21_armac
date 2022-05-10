<?php
include_once '../../Model/panier.php';
include_once '../../Controller/panierC.php';

        $error = "";
    // create
 $panier = null;
    // create an instance of the controller
    $panierC = new panierC();
    if (
        isset($_POST["idClient"]) &&
		isset($_POST["refProduit"]) &&		
        isset($_POST["quantite"])  
		 )
        {
        if (
            !empty($_POST["idClient"]) && 
			!empty($_POST["refProduit"]) &&
            !empty($_POST["quantite"]) 

        ) {
            $panier = new panier(
                $_POST['idClient'],
                $_POST['refProduit'],
                $_POST['quantite']
			
            );
            $panierC->modifierPanier($panier,$_POST['id']);
        
            header('Location:affichagePanier.php');
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
                            <h2 class="tm-block-title d-inline-block">Modifier panier</h2>
                        </div>
                    </div>
                    <div class="row mt-4 tm-edit-product-row">
                        <div class="col-xl-7 col-lg-7 col-md-12">
                       
        
                <div id="error">
                <?php
                if (isset($_POST["id"])){
				$panier = $panierC->recupererPanier($_POST["id"]);
                ?>
                </div>
            <?php echo $error; ?>        			
           
        
                <form action="" method='POST'>
               
            
                    <input type="hidden" id="id" name="id" value="<?php echo $panier["id"];?> " 
                    minlength="3" maxlength="20" size="10" >
                    <br><br>
                   
                    <label for="idClient">idClient :
                    </label>
                    <input type="text" id="idClient" name="idClient"   value="<?php echo $panier["idClient"];?>"
                    minlength="3" maxlength="20" size="10" >
                    <br><br>

                    <label for="refProduit">reference Produit :
                    </label>
                    <input type="text" id="refProduit" name="refProduit"  value="<?php echo $panier["refProduit"];?>"
                    minlength="3" maxlength="20" size="10" >
                    <br><br>

                    <label for="quantite">quantite :
                    </label>
                    <input type="text" id="quantite" name="quantite" value="<?php echo $panier["quantite"];?>"
                    minlength="3" maxlength="20" size="10" >
                    <br><br>
         
                  
                   
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
       