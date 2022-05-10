<?php
session_start();

if( !isset($_SESSION['admin_on']) ){
    header("Location: loginadmin.php" );
    exit();
  }  



include '../controller_back/produitC.php';
$ProduitC = new produitC();
$listep = $ProduitC->afficherproduit();
$con = mysqli_connect("localhost","root","","gestionoffre");
if(isset($_GET['recherche']))
{
    $search_value=$_GET["recherche"];
    $listep=$ProduitC->recherche($search_value);
}
if(isset($_GET['trie']))
      {
           $listep = $ProduitC->triclub($_GET["tri1"], $_GET["tri2"]);
      }
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Products Page</title>
    <!--

    Template 2108 Dashboard

	http://www.tooplate.com/view/2108-dashboard

    -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600">
    <!-- https://fonts.google.com/specimen/Open+Sans -->
    <link rel="stylesheet" href="css/fontawesome.min.css">
    <!-- https://fontawesome.com/ -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- https://getbootstrap.com/ -->
    <link rel="stylesheet" href="css/tooplate.css">
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['libelle', 'nb_calories'],
         <?php
         $sql = "SELECT * FROM produit";
         $fire = mysqli_query($con,$sql);
          while ($result = mysqli_fetch_assoc($fire)) {
            echo"['".$result['libelle']."',".$result['nb_calories']."],";
          }

         ?>
        ]);

        var options = {
          title: 'PRODUIT and their NOMBRE'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>
    
</head>

<body id="reportsPage" class="bg02">
    <div class="" id="home">
        <div class="container">
            <div class="row">
                <div class="col-12">

             


                    <nav class="navbar navbar-expand-xl navbar-light bg-light">
                        <a class="navbar-brand" href="index.php">
                            <i class="fas fa-3x fa-tachometer-alt tm-site-icon"></i>
                            <h1 class="tm-site-title mb-0">Dashboard</h1>
                        </a>
                        <button class="navbar-toggler ml-auto mr-0" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
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
            <div class="row tm-content-row tm-mt-big">
                <div class="col-xl-8 col-lg-12 tm-md-12 tm-sm-12 tm-col">
                    <div class="bg-white tm-block h-100">
                        <div class="row">
                            <div class="col-md-8 col-sm-12">
                                <h2 class="tm-block-title d-inline-block">Product</h2>

                            </div>
                            <div class="col-md-4 col-sm-12 text-right">
                                <a href="addproduit.php" class="btn btn-small btn-primary">Add New product</a>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-hover table-striped tm-table-striped-even mt-3">
                                <thead>
                                    <tr class="tm-bg-gray">
                                        <th scope="col">ID</th>
                                        <th scope="col">Product Image</th>
                                        <th scope="col">Product Name</th>
                                        <th scope="col">Description</th>
                                        <th scope="col" class="text-center">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>


                                        <?php
                                        foreach ($listep as $produit) {
                                        ?>
                                    <tr>
                                        <td><?php echo $produit['id']; ?></td>
                                        <td><img src="img/cour/<?php echo $produit['img']; ?>" alt="" style="width: 100px; height: 100px"></td>
                                        <td><?php echo $produit['libelle']; ?></td>
                                        <td><?php echo $produit['description']; ?></td>
                                        <td>
                                            <a href="updateProduit.php?id=<?php echo $produit['id']; ?>" class="btn">Modifier</a>
                                            <a href="deleteProduit.php?id=<?php echo $produit['id']; ?>" class="btn">Supprimer</a>
                                        </td>
                                    </tr>
                                <?php } ?>
                                </tr>





                                </tbody>
                            </table>
                        </div>

                        <div class="tm-table-mt tm-table-actions-row">
                            <div class="tm-table-actions-col-left">
                                <button class="btn btn-danger">Delete Selected Items</button>
                            </div>
                            <div class="tm-table-actions-col-right">
                                <span class="tm-pagination-label">Page</span>
                                <nav aria-label="Page navigation" class="d-inline-block">
                                    <ul class="pagination tm-pagination">
                                        <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                                        <li class="page-item">
                                            <span class="tm-dots d-block">...</span>
                                        </li>
                                        <li class="page-item"><a class="page-link" href="#">13</a></li>
                                        <li class="page-item"><a class="page-link" href="#">14</a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-4 col-lg-12 tm-md-12 tm-sm-12 tm-col"   >
                    <div class="bg-white tm-block h-100"  >
                        <h2 class="tm-block-title d-inline-block">options</h2>

                        <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search" method="get" action="afficherproduit.php">
                                                            <div class="input-group">
                                                                <input type="text" class="form-control bg-light border-0 small" placeholder="Rechercher un évènement "
                                                                    aria-label="Search" aria-describedby="basic-addon2" name="recherche">
                                                                <div class="input-group-append">
                                                                    <button class="btn btn-primary" type="submit" value="Chercher">
                                                                        <i class="fas fa-search fa-sm"></i>
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </form>

                        <form method="get" action="afficherproduit.php">
                        <br><br>
                      

<select class="btn btn-outline-primary" style="width: 300px; " name="tri1" id="tri1" class"form-control">


       
    <option value = id> id  </option>
    <option value = libelle> nom  </option>
    <option value = prix> prix </option>
 

</select>

<select class="btn btn-outline-primary" style="width: 300px; " name="tri2" id="tri2" class"form-control">



       <option  value = ASC> Ascendant </option>
       <option value = DESC> Descendant </option>

</select>

    <button type="submit" class="btn btn-danger" name="trie">Trie</button>
</form>


                        <table class="table table-hover table-striped mt-3">
                        <div id="piechart" style="width: 250px; "></div>    
                        </table>
                        
                        
                    </div>
                </div>
            </div>
            <footer class="row tm-mt-small">
                <div class="col-12 font-weight-light">
                    <p class="d-inline-block tm-bg-black text-white py-2 px-4">
                        Copyright &copy; 2018 Admin Dashboard . Created by
                        <a rel="nofollow" href="https://www.tooplate.com" class="text-white tm-footer-link">Tooplate</a>
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
        $(function() {
            $('.tm-product-name').on('click', function() {
                window.location.href = "edit-product.html";
            });
        })
    </script>
</body>

</html>









































































































































































































<?php

$con = mysqli_connect("localhost","root","","gestionoffre");
 

?>