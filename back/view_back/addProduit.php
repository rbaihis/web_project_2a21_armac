<?php
session_start();

if( !isset($_SESSION['admin_on']) ){
    header("Location: loginadmin.php" );
    exit();
  }  


include '../controller_back/categorie_c.php';
include_once '../controller_back/produitC.php';
include_once '../model_back/produit.php';
include_once '../model_back/categorie.php';
$categorieC = new categorieC();
$listec = $categorieC->afficherCategorie();
$error = "";

$produit = null;

$produitC = new produitC();
if (
    isset($_POST["libelle"])
) {
    if (
        !empty($_POST["libelle"])
    ) {
        $produit = new produit(
            $_POST['libelle'],
            $_POST['nb_calories'],
            $_POST['prix'],
            $_POST['description'],
            $_POST['categorie'],
            $_POST['img']
        );
        $produitC->ajoutProduit($produit);
        header('Location:afficherproduit.php');
    } else
        $error = "Missing information";
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ajouter Produit</title>


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
                    <a class="navbar-brand" href="index.php">
                        <i class="fas fa-3x fa-tachometer-alt tm-site-icon"></i>
                        <h1 class="tm-site-title mb-0">Bioté center</h1>
                    </a>
                    <button class="navbar-toggler ml-auto mr-0" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav mx-auto">
                           
                      
                               
                        <li class="nav-item">
                          <a class="nav-link" href="accounts.php">Accounts</a>
                    </li>

		    <li class="nav-item">
                       <a class="nav-link" href="view/back/affichageCommande.php">Commande</a>
                     </li>
                   

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
                           aria-expanded="false">
                            Services 
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="Service.php">Service</a>
                            <a class="dropdown-item" href="categorie.php">Categorie</a>
                            <a class="dropdown-item" href="reservation.php">Reservation</a>
                        </div>
                    </li>

                
                                    <li class="nav-item active dropdown">
                                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false">
                                            Gestion produits
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                            <a class="dropdown-item" href="afficherproduit.php">les produits</a>
                                            <a class="dropdown-item" href="affichercategorie.php">Les catégories</a>
                    
                                        </div>
                                    </li>
                              
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false">
                                            Gestion offres
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                            <a class="dropdown-item" href="ajout.php">les promos</a>
                                            <a class="dropdown-item" href="back.php">Les réclamations</a>
                                            <a class="dropdown-item" href="commande.php">Les commandes</a>
                                        </div>
                                    </li>
                        </ul>
                        <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link d-flex" href="logout.php">
                            <i class="far fa-user mr-2 tm-logout-icon"></i>
                            <span>Logout</span>
                        </a>
                    </li>
                </ul>
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
                            <h2 class="tm-block-title d-inline-block">Add product</h2>
                        </div>
                    </div>
                    <div class="details">
                        <div class="recentorders">
                            <div class="cardheader">
                                <h2>Ajouter produit</h2>

                            </div>

                            <form action="" method="POST" name="ajouterProduitForm" onsubmit="return ajouterProduit()">
                                <div>
                                    <label for="libelle" class="col-xl-4 col-lg-4 col-md-4 col-sm-5 col-form-label">Nom de produit:
                                    </label>
                                    <input type="text" name="libelle" id="libelle" maxlength="20">
                                </div>
                                <div>
                                    <label for="nb_calories" class="col-xl-4 col-lg-4 col-md-4 col-sm-5 col-form-label">Nombre de colie:
                                    </label>
                                    <input type="text" name="nb_calories" id="nb_calories">
                                </div>
                                <div>
                                    <label for="prix" class="col-xl-4 col-lg-4 col-md-4 col-sm-5 col-form-label">Prix:
                                    </label>
                                    <input type="text" name="prix" id="prix">
                                </div>
                                <div>
                                    <label for="description" class="col-xl-4 col-lg-4 col-md-4 col-sm-5 col-form-label">Description:
                                    </label>
                                    <input type="text" name="description" id="description">
                                </div>
                               
                                
                                <div class="input-group mb-3">
                                
                                
                                    
                                    <label for="categorie" class="col-xl-4 col-lg-4 col-md-4 col-sm-5 col-form-label">Categorie:
                                    </label>
                                    
                                    
                                    <div class="input-group mb-3">
                                    <select class="custom-select col-xl-9 col-lg-8 col-md-8 col-sm-7" name="categorie" id="category">
                                    <option selected>Select one</option>
                                    <?php
                                        foreach ($listec as $categorie) {
                                        ?>    
                                        
                                   
                                       
                                        <option value="1"><?php echo $categorie['nomCategorie']; ?> <?php } ?></option>
                                        
                                    </select>
                                    
                                    </div>
                              
                                </div>
                                
                                <div>
                                    <label for="img">image:
                                    </label>
                                    <input type="file" name="img" id="img">
                                </div>
                                <input type="submit" class="btn" value="Envoyer">
                                <input type="reset" class="btn" value="Annuler">
                            </form>
                            <button class="btn"><a href="afficherproduit.php">Retour à la liste des catégories</a></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <footer class="row tm-mt-big">
            <div class="col-12 font-weight-light">
                <p class="d-inline-block tm-bg-black text-white py-2 px-4">
                    Copyright &copy; 2018 Admin Dashboard . Created by
                    <a rel="nofollow" href="https://www.tooplate.com" class="text-white tm-footer-link">Tooplate</a>
                </p>
            </div>
        </footer>
    </div>

    <script src="js/jquery-3.3.1.min.js"></script>
    <!-- https://jquery.com/download/ -->
    <script src="jquery-ui-datepicker/jquery-ui.min.js"></script>
    <!-- https://jqueryui.com/download/ -->
    <script src="js/bootstrap.min.js"></script>
    <!-- https://getbootstrap.com/ -->
    <script>
        $(function() {
            $('#expire_date').datepicker();
        });
    </script>
    	<script src="addProduct.js"></script>

</body>

</html>