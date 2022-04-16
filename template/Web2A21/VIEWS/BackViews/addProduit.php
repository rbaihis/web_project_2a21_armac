<?php
include '../../controller/categorie_c.php';
include_once '../../controller/produitC.php';
include_once '../../model/produit.php';
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
                               <?php require_once('navbar.php'); ?> 

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
                                
                                    <label for="category" class="col-xl-4 col-lg-4 col-md-4 col-sm-5 col-form-label">Category</label>
                                    <select class="custom-select col-xl-9 col-lg-8 col-md-8 col-sm-7" id="category">
                                    <?php
                                        foreach ($listec as $categorie) {
                                        ?>    
                                    <option selected><?php echo $categorie['idCategorie']; ?></option>
                                    <?php } ?>
                                    </select>
                                   
                                   
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