<?php 
 if(session_status() !== PHP_SESSION_ACTIVE) {
    session_start();    }     

    if( !isset($_SESSION['admin_on']) ){
        header("Location: loginadmin.php" );
        exit();
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
                              
                           
                                <li class="nav-item active">
                                    <a class="nav-link" href="ajout.php">Offres</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="back.php">Les réclamations</a>
                                </li>
                              
                                <li class="nav-item">
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
    
    <!-- Gestion des offres -->
    <br>
    <br>
     <!--1-->
     
        <div class="justify-content-center container border border-primary border-2 rounded bg-light">
     
            <form class="mt-3" action="../controller_back/processOffre.php" method="post">
                <input type="hidden" name="id" value="<?php echo $id; ?>">
                <div class="row align-items-center">
                    <div class="col-auto">
                            <label for="nameI" class="form-label">Nom de l'offre: </label>
                    </div>
                    <div class="col-auto">
                        <input name="nameI" id="nameI" type="text" class="form-control" placeholder="Enter le nom de l'offre" 
                        value="<?php echo $name; ?>">
                    </div>
                </div>
                <br>
                <div class="row align-items-center">
                    <div class="col-auto">
                        <label for="prixI" class="form-label">Prix: </label>
                    </div>
                    <div class="col-auto">
                        <input name="prixI" id="prixI" name="submit" type="text" class="form-control" 
                        placeholder="Entrer le prix" 
                        value="<?php echo $prix; ?>">
                    </div>
                </div>
                <br>
                <?php if ($update == true): ?>
                <button name="update" class="btn btn-secondary fs-5 border-2">Update</button>
                <?php else : ?>
                <button id="submitI"  name="submit" class="btn btn-primary fs-5 border-2">Save</button>
                <?php endif; ?>
              
            </form>
            <br>



                 <!--2-->
        </div>
        <div class="container border border-danger border-2 rounded mt-3  bg-light">
            <div class="container">
                <form class="d-flex justify-content px-5 mt-3" action="" method="post">
                    <div class="input-group px-5">
                        <input name="searchInput" class="form-control" placeholder="Search">
                        <button name="searchbtn" class="btn btn-dark">Search</button>
                    </div>
                        <div class="input-group btn-group px-5">
                            <select class="form-select" name="Make"
                                <option selected> Trier par</option>
                                <option value="1">itemName</option>
                                <option value="2">price</option>
                            </select>
                            <button class="btn btn-danger" name="trier">Trier</button>
                        </div>
                    <button class="btn btn-info px-5" name="actualiser">Actualiser</button>
                   
                </form>
                <br>
            </div>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">ID Offre</th>
                        <th scope="col">Nom de l'offre</th>
                        <th scope="col">Prix</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                      if (isset($_POST['searchbtn'])){  
                        $searchInput = $_POST['searchInput'];
                        $result = $con->query("SELECT `id`, `itemName`,`price` FROM dataoffre WHERE concat (`itemName`,`price`) LIKE  '%$searchInput%';");  
                    }else if (isset($_POST['actualiser'])){
                        $result = $con->query("SELECT `id`, `itemName`,`price` FROM dataoffre");
                    }
                    else if (isset($_POST['trier'])){
                        $makerValue = $_POST['Make'];
                        switch ($makerValue) {
                            case 1:
                                $tri_par = "itemName"; 
                                break;
                            case 2:
                                $tri_par = "price"; 
                                break;
                            default:
                            echo "Erreur, veuillez choix itemName ou price";
                        }
                            $result = $con->query("SELECT `id`, `itemName`,`price` FROM dataoffre order by $tri_par");
                    }else {
                        $result = $con->query("SELECT `id`, `itemName`,`price` FROM dataoffre");
                    }
                   // while ($row = $result->fetch_assoc()): 
                    while ($row = $result->fetch(PDO::FETCH_ASSOC)): 
                   ?>
                    <tr>
                        <td><?php echo $row['id']; ?></td>   
                        <td><?php echo $row['itemName']; ?></td>
                        <td><?php echo $row['price']; ?></td>
                        <td>
                            <a class="btn btn-info" href="ajout.php?edit=<?php echo $row['id']; ?>">Edit</a>
                            <a class="btn btn-danger" href="../controller_back/processOffre.php?delete=<?php echo $row['id']; ?>">Delete</a>
                        </td>
                    </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>
    












    <!-- Gestion des coupons -->
    <div class="container py-2 border border-dark border-3 rounded mt-3  bg-light">
        <h1 class="text-center display-2 fw-bold text-dark">Gestion des coupons</h1>
        <div class="justify-content-center container border border-primary border-2 rounded mt-1">
            <form class="mt-3" action="../controller_back/processCoupon.php" method="post">
                <input type="hidden" name="idC" value="<?php echo $idC; ?>">
                <div class="row align-items-center">
                    <div class="col-auto">
                            <label for="code" class="form-label">Code Coupon: </label>
                    </div>
                    <div class="col-auto">
                        <input name="code" type="text" class="form-control" placeholder="Enter le code du coupon" 
                        value="<?php echo $code; ?>">
                    </div>
                </div>
                <br>
                <div class="row align-items-center">
                    <div class="col-auto">
                        <label for="prixC" class="form-label">Prix discount: </label>
                    </div>
                    <div class="col-auto">
                        <input name="prixC" name="submitC" type="text" class="form-control" 
                        placeholder="Entrer le prix discount" 
                        value="<?php echo $prixC; ?>">
                    </div>
                </div>
                <br>
                <?php if ($updateC == true): ?>
                <button name="updateC" class="btn btn-secondary fs-5 border-2">Update</button>
                <?php else : ?>
                <button name="submitC" class="btn btn-primary fs-5 border-2">Save</button>
                <?php endif; ?>
            </form>
            <br>
        </div>
        <div class="container border border-danger border-2 rounded mt-3">
            <div class="container">
                <form class="d-flex justify-content px-5 mt-3" action="" method="post">
                    <div class="input-group px-5">
                        <input name="searchInputC" class="form-control" placeholder="Search">
                        <button name="searchbtnC" class="btn btn-dark">Search</button>
                    </div>
                        <div class="input-group btn-group px-5">
                            <select class="form-select" name="MakeC"
                                <option selected>Trier par</option>
                                <option value="1">Code Coupon</option>
                                <option value="2">price</option>
                            </select>
                            <button class="btn btn-danger" name="trierC">Trier</button>
                        </div>
                    <button class="btn btn-info px-5" name="actualiserC">Actualiser</button>
                    
                </form>
                <br>
            </div>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">ID Coupon</th>
                        <th scope="col">Code du coupon</th>
                        <th scope="col">prix discount</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                     if (isset($_POST['searchbtnC'])){  
                        $searchInputC = $_POST['searchInputC'];
                        $resultC = $con->query("SELECT * FROM datacoupon WHERE concat (`codeCoupon`,`priceDiscount`) LIKE  '%$searchInputC%';")  ;  
                    }else if (isset($_POST['actualiserC'])){
                        $resultC = $con->query("SELECT * FROM datacoupon");
                    }
                    else if (isset($_POST['trierC'])){
                        $makerValueC = $_POST['MakeC'];
                        switch ($makerValueC) {
                            case 1:
                                $tri_parC = "codeCoupon"; 
                                break;
                            case 2:
                                $tri_parC = "priceDiscount"; 
                                break;
                            default:
                            echo "";
                        }
                            $resultC = $con->query("SELECT * FROM datacoupon order by $tri_parC");
                    }else {
                        $resultC = $con->query("SELECT * FROM datacoupon");
                    }
                    while ($rowCo = $resultC->fetch(PDO::FETCH_ASSOC)):
                     ?>
                    <tr>
                        <td><?php echo $rowCo['id']; ?></td>   
                        <td><?php echo $rowCo['codeCoupon']; ?></td>
                        <td><?php echo $rowCo['priceDiscount']; ?></td>
                        <td>
                            <a class="btn btn-info" href="ajout.php?editC=<?php echo $rowCo['id']; ?>">Edit</a>
                            <a class="btn btn-danger" href="../controller_back/processCoupon.php?deleteC=<?php echo $rowCo['id']; ?>">Delete</a>
                        </td>
                    </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>
    <div class="container py-2 border border-warning border-5 rounded mt-3  bg-light">
        <form action="../controller_back/processEtablir.php" method="post">
            <h1 class="text-center display-2 fw-bold text-dark">Etablissement des coupons</h1>
            <div class=" container d-flex justify-content">
                <div class="input-group ">
                    <button class="btn btn-success" disabled>Coupon : </button>
                    <input name="codeCoup" type="text" class="form-control mx-1" placeholder="Entrez l'id du coupon" aria-label="Recipient's username" aria-describedby="button-addon2">
                </div>
                <div class="input-group mx-1 pe-5">   
                <button class="btn btn-success" disabled>corresspond au offre: </button>
                    <input name="idOffre" type="text" class="form-control mx-1" placeholder="Entrez l'id de l'offre" aria-label="Recipient's username" aria-describedby="button-addon2">
                </div>
                <button name="valider" class="btn btn-lg btn-primary ms-5">Valider</button>
                <br>

            </div>
        </form>
        <br>
        <table class="table">
                <thead>
                    <tr>
                        <th scope="col">ID Offre</th>
                        <th scope="col">Nom du l'offre</th>
                        <th scope="col">Prix</th>
                        <th scope="col">ID Coupon</th>
                        <th scope="col">Code Coupon</th>
                        <th scope="col">Prix remise</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $resultJ = $con->query("select dataoffre.id, dataoffre.itemName, dataoffre.price, dataoffre.idCoupon, datacoupon.codeCoupon,  datacoupon.priceDiscount from dataoffre INNER join datacoupon where dataoffre.idCoupon = datacoupon.id;");
                        while ($rowJ = $resultJ->fetch(PDO::FETCH_ASSOC)): ?>
                    <tr>
                        <td><?php echo $rowJ['id']; ?></td>   
                        <td><?php echo $rowJ['itemName']; ?></td>
                        <td><?php echo $rowJ['price']; ?></td>
                        <td><?php echo $rowJ['idCoupon']; ?></td>
                        <td><?php echo $rowJ['codeCoupon']; ?></td>
                        <td><?php echo $rowJ['priceDiscount']; ?></td>
                    </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
            <br>
    </div>
    
    



<br>

    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>