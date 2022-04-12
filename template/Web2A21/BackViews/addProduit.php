<?php

include_once '../controller/produitC.php';
include_once '../model/produit.php';

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
    <title>Add Product</title>


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
                    <button class="navbar-toggler ml-auto mr-0" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav mx-auto">
                            <li class="nav-item">
                                <a class="nav-link" href="index.html">Bioté center
                                    <span class="sr-only">(current)</span>
                                </a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="index.html" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Reports
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="#">Daily Report</a>
                                    <a class="dropdown-item" href="#">Weekly Report</a>
                                    <a class="dropdown-item" href="index.html">Yearly Report</a>
                                </div>
                            </li>
                            <li class="nav-item active">
                                <a class="nav-link" href="affichercategorie.php">categorie</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="afficherproduit.php">Produits</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Settings
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="#">Profile</a>
                                    <a class="dropdown-item" href="#">Billing</a>
                                    <a class="dropdown-item" href="#">Customize</a>
                                </div>
                            </li>
                        </ul>
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link d-flex" href="login.html">
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
                            <h2 class="tm-block-title d-inline-block">Ajouter produit</h2>
                        </div>
                    </div>
                    <div class="details">
                        <div class="recentorders">
                            <div class="cardheader">
                                <h2>Ajouter produit</h2>

                            </div>

                            <form action="" method="POST">
                                <div>
                                    <label for="libelle">Nom du produit:
                                    </label>
                                    <input type="text" name="libelle" id="libelle" maxlength="20">
                                </div>
                                <div>
                                    <label for="nb_calories">Nombre de calories:
                                    </label>
                                    <input type="text" name="nb_calories" id="nb_calories">
                                </div>
                                <div>
                                    <label for="prix">Prix:
                                    </label>
                                    <input type="text" name="prix" id="prix">
                                </div>
                                <div>
                                    <label for="description">Description:
                                    </label>
                                    <input type="text" name="description" id="description">
                                </div>
                                <div>
                                    <label for="categorie">Categorie:
                                    </label>
                                    <input type="text" name="categorie" id="categorie">
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
</body>

</html>