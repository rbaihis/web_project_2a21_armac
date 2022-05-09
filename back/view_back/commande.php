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


<body class="">
    <?php 
        require_once '../controller_back/processOffre.php'; 
        require_once '../controller_back/processCoupon.php'; 
        error_reporting(E_ERROR | E_PARSE);
        error_reporting(E_ALL ^ E_NOTICE);  
    ?> 
    <?php if (isset($_SESSION['message'])): ?>
        <div class="alert alert-<?=$_SESSION['msg_type']?>">
            <?php
                echo $_SESSION['message'];
                unset($_SESSION['message']); 
                ?>
        </div>
        <?php endif ?>
      


    class="bg02">
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
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="acceuil.html">acceuil</a>
                        </li>
                        <li class="nav-item">
                                    <a class="nav-link" href="affichercategorie.php">categorie</a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" href="afficherproduit.php">Produits</a>
                                </li>
                              
                           
                                <li class="nav-item ">
                                    <a class="nav-link" href="ajout.php">Offres</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="back.php">Les réclamations</a>
                                </li>
                              
                                <li class="nav-item active">
                                    <a class="nav-link" href="commande.php">Les commandes</a>
                                </li>
                       
                           
                            

                           
                     
                        </div>
                </nav> 
            </div>
        </div>
    
</div>
</nav>
</div>
</div>


    <div class="container py-2 border border-warning border-5 rounded mt-3  bg-light">
    <table class="table">
                <thead>
                    <tr>
                    <th scope="col">itemName</th>
                    <th scope="col">price</th>
                      
                    
                        <th scope="col">card holder</th>
                        <th scope="col">MM</th>
                        <th scope="col">YY</th>
                        <th scope="col">CARD number</th>
                        <th scope="col">CVC</th>
                  
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $resultJ = $con->query("SELECT `cardholder`, `MM`,`YY`,`cardnumber`,`cvc` FROM clients");
                        while ($rowJ = $resultJ->fetch(PDO::FETCH_ASSOC)): ?>

<?php
$result = $con->query("SELECT `itemName`,`price` FROM commande");
while ($row = $result->fetch(PDO::FETCH_ASSOC)): ?>
                    <tr>
                    <td><?php echo $row['itemName']; ?></td>
                        <td><?php echo $row['price']; ?></td>
                        <td><?php echo $rowJ['cardholder']; ?></td>
                        <td><?php echo $rowJ['MM']; ?></td>
                        <td><?php echo $rowJ['YY']; ?></td>
                        <td><?php echo $rowJ['cardnumber']; ?></td>
                        <td><?php echo $rowJ['cvc']; ?></td>
                     
                    </tr>
                     <?php endwhile; ?>
                    <?php endwhile; ?>
                </tbody>
            </table>
            <br>
    </div>
    <br>
<a  href="table-marketing.php"><button type="button" class="btn btn-info px-5">export</button></a>
   


<br>

    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>