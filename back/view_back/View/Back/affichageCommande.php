<?php
session_start();

if( !isset($_SESSION['admin_on']) ){
    header("Location: ../../loginadmin.php" );
    exit();
  }  


include_once '../../Controller/commande.php';
$commande = new commandes();

$listeC =$commande->getListeCommandes()?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Products Page - Dashboard Template</title>
   
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600">
    <!-- https://fonts.google.com/specimen/Open+Sans -->
    <link rel="stylesheet" href="css/fontawesome.min.css">
    <!-- https://fontawesome.com/ -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- https://getbootstrap.com/ -->
    <link rel="stylesheet" href="css/tooplate.css">
</head>

<body id="reportsPage" class="bg02">
    <div class="" id="home">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="navbar navbar-expand-xl navbar-light bg-light">
                        <a class="navbar-brand" href="../../index.php">
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
                          <a class="nav-link" href="../../accounts.php">Accounts</a>
                    </li>

		            <li class="nav-item">
                       <a class="nav-link" href="affichageCommande.php">Commande</a>
                     </li>
                   

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
                           aria-expanded="false">
                            Services 
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="../../Service.php">Service</a>
                            <a class="dropdown-item" href="../../categorie.php">Categorie</a>
                            <a class="dropdown-item" href="../../reservation.php">Reservation</a>
                        </div>
                    </li>

                    
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
                           aria-expanded="false">
                            offre
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="../../ajout.php">les promos</a>
                            <a class="dropdown-item" href="../../back.php">Les réclamations</a>
                            <a class="dropdown-item" href="../../commande.php">Les commandes</a>
                        </div>
                    </li> 


                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
                           aria-expanded="false">
                            produit
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="../../afficherproduit.php">les produits</a>
                            <a class="dropdown-item" href="../../affichercategorie.php">Les catégories</a>
                        </div>
                    </li>

                </ul>
                        </div>
                </nav>
            </div>
        </div>
    
</div>
</nav>
</div>
</div>
            <!-- row -->
            <div class="row tm-content-row tm-mt-big">
                <div class="col-xl-8 col-lg-12 tm-md-12 tm-sm-12 tm-col">
                    <div class="bg-white tm-block h-100">
                        <div class="row">
                            <div class="col-md-8 col-sm-12">
                                <h2 class="tm-block-title d-inline-block">Commandes</h2>

                            </div>
                            <div class="col-md-4 col-sm-12 text-right">
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-hover table-striped tm-table-striped-even mt-3">
                                <thead>
                                    <tr class="tm-bg-gray">
                                        <th scope="col">Date Commande</th>
                                        <th scope="col" class="text-center">Adresse</th>
                                        <th scope="col" class="text-center">Prix Totale</th>
                                        <th scope="col">Id Client</th>
                                        <th scope="col">&nbsp;</th>
                                        <th scope="col">&nbsp;</th>
                                    </tr>
                                    <?php
    foreach($listeC as $commande){
        ?>


              <tr>
                <td><?php echo $commande['date_cmd']; ?></td>
                <td><?php echo $commande['adresse']; ?></td>
                <td><?php echo $commande['totale']; ?></td>
                <td><?php echo $commande['id']; ?></td>
                <td><a href="command_details.php?id_command=<?php echo $commande['comm_id']; ?>" ><button class="btn btn-danger"> Affichier Details</button></a> </td></button>
                <td><a href="supprimerCommande.php?id=<?php echo $commande['comm_id']; ?>" ><button class="btn btn-danger"> Delete</button></a> </td></button>

              
</td>
               
           
              
              
              </td>
              </tr>
              <?php } ?>
                                </thead>
                               
            <footer class="row tm-mt-small">
                <div class="col-12 font-weight-light">
                    <p class="d-inline-block tm-bg-black text-white py-2 px-4">
                        bioté center crée par ARMAC prod
                        <a rel="nofollow" href="https://www.tooplate.com" class="text-white tm-footer-link">.</a>
                    </p>
                </div>
            </footer>
        </div>
    </div>
    <script src="js/jquery-3.3.1.min.js"></script>
    <!-- https://jquery.com/download/ -->
    <script src="js/bootstrap.min.js"></script>
    <!-- https://getbootstrap.com/ -->
    <script>
        $(function () {
            $('.tm-product-name').on('click', function () {
                window.location.href = "edit-product.html";
            });
        })
    </script>
</body>

</html>