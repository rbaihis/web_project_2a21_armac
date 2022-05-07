<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard Admin Template by Tooplate.com</title>
    <!--

    Template 2108 Dashboard

	http://www.tooplate.com/view/2108-dashboard

    -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600">
    <!-- https://fonts.google.com/specimen/Open+Sans -->
    <link rel="stylesheet" href="../assets_back/css/fontawesome.min.css">
    <!-- https://fontawesome.com/ -->
    <link rel="stylesheet" href="../assets_back/css/fullcalendar.min.css">
    <!-- https://fullcalendar.io/ -->
    <link rel="stylesheet" href="../assets_back/css/bootstrap.min.css">
    <!-- https://getbootstrap.com/ -->

    <link rel="stylesheet" href="../assets_back/css/tooplate.css">

    <link rel="stylesheet" href="../../assets_back/css/tooplate.css">






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

<body class="bg03">
<div class="container">
<div class="row">
    <div class="col-12">





    <nav class="navbar navbar-expand-xl navbar-light bg-light">
                        <a class="navbar-brand" href="index.html">
                            <i class="fas fa-3x fa-tachometer-alt tm-site-icon"></i>
                            <h1 class="tm-site-title mb-0">Dashboard</h1>
                        </a>
                        <button class="navbar-toggler ml-auto mr-0" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>

                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav mx-auto">
                               
                            <li class="nav-item ">
                                
                                    <a class="nav-link" href="acceuil.php">Dashboard</a>
                                </li>

                                <li class="nav-item">
                        <a class="nav-link" href="Service.php">Service</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="categorie.php">Categorie</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="reservation.php">Reservation</a>
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
            
                              
                        </div>
                    </nav>













       
    </div>
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






