<?PHP
session_start();

if( !isset($_SESSION['admin_on']) ){
    header("Location: loginadmin.php" );
    exit();
  }  


                                    ob_start();
                                                  include_once '../controller_back/produitC.php';

                                                  include_once '../model_back/produit.php';

                                                  if (isset($_GET['id'])) {
                                                    $produitController = new produitC();
                                                    $result = $produitController->recupererProduit($_GET['id']);
                                                    
                                                    foreach ($result as $row) {
                                                      $id = $row['id'];
                                                      $libelle = $row['libelle'];
                                                      $nb_calories = $row['nb_calories'];
                                                      $prix = $row['prix'];
                                                      $description = $row['description'];
                                                      $categorie = $row['categorie'];   
                                                      $img = $row['img']; 
                                                      ?>




<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add Product</title>


    
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
                            <h2 class="tm-block-title d-inline-block">Modifier produit</h2>
                        </div>
                    </div>
                    <div class="details">
                        <div class="recentorders">
                            <div class="cardheader">
                                <h2>Modifier produit</h2>

                            </div>

                            <form method="POST" action="updateProduit.php?id=<?PHP echo $row['id']; ?> ">
                                <div>
                                    <label for="libelle">Nom du produit:
                                    </label>
                                    <input type="text" name="libelle" id="libelle" maxlength="20" value="<?PHP echo $libelle ?>">
                                </div>
                                <div>
                                    <label for="nb_colis">Nombre de colis:
                                    </label>
                                    <input type="text" name="nb_calories" id="nb_colis" value="<?PHP echo $nb_calories ?>">
                                </div>
                                <div>
                                    <label for="prix">Prix:
                                    </label>
                                    <input type="text" name="prix" id="prix" value="<?PHP echo $prix ?>">
                                </div>
                                <div>
                                    <label for="description">Description:
                                    </label>
                                    <input type="text" name="description" id="description" value="<?PHP echo $description ?>">
                                </div>
                                <div>
                                    <label for="categorie">Categorie:
                                    </label>
                                    <input type="text" name="categorie" id="categorie" value="<?PHP echo $categorie  ?>">
                                </div>
                                <div>
                                    <label for="img">image:
                                    </label>
                                    <input type="file" name="img" id="img" value="<?PHP echo $img ?>">
                                </div>
                                <input type="submit" class="btn" value="modifier" name="modifier">
                                <input type="reset" class="btn" value="Annuler">
                                </form><?PHP }
                                                  }

                                                  if (isset($_POST['modifier'])) {
                                                    $produit = new produit($_POST['libelle'], $_POST['nb_calories'], $_POST['prix'], $_POST['description'], $_POST['categorie'], $_POST['img']);
                                                    $produitController->modifierProduit($produit, $_GET['id']);
                                                    
                                                    header('Location: afficherproduit.php');
                                                    

                                                  }
                                                  ob_end_flush(); 
                                                   ?>
                            <button class="btn"><a href="é.php">Retour à la liste des catégories</a></button>
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


<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600">
    <!-- https://fonts.google.com/specimen/Open+Sans -->
    <link rel="stylesheet" href="css/fontawesome.min.css">
    <!-- https://fontawesome.com/ -->
    <link rel="stylesheet" href="jquery-ui-datepicker/jquery-ui.min.css" type="text/css" />
    <!-- http://api.jqueryui.com/datepicker/ -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- https://getbootstrap.com/ -->
    <link rel="stylesheet" href="css/tooplate.css">
</body>

</html>







