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
        require_once '../controller/processOffre.php'; 
        require_once '../controller/processCoupon.php'; 
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
     
            <form class="mt-3" action="../controller/processOffre.php" method="post">
                <input type="hidden" name="id" value="<?php echo $id; ?>">
                <div class="row align-items-center">
                    <div class="col-auto">
                            <label for="nameI" class="form-label" >Nom de l'offre: </label>
                    </div>
                    <div class="col-auto">
                        <input name="nameI" type="text" class="form-control" placeholder="Enter le nom de l'offre" maxlength="5"
                        value="<?php echo $name; ?>">
                    </div>
                </div>
                <br>
                <div class="row align-items-center">
                    <div class="col-auto">
                        <label for="prixI" class="form-label">Prix: </label>
                    </div>
                    <div class="col-auto">
                        <input name="prixI" name="submit" type="text" class="form-control"  maxlength="5"
                        placeholder="Entrer le prix" 
                        value="<?php echo $prix; ?>">
                    </div>
                </div>
                <br>
                <?php if ($update == true): ?>
                <button name="update" class="btn btn-secondary fs-5 border-2">Update</button>
                <?php else : ?>
                <button name="submit" class="btn btn-primary fs-5 border-2">Save</button>
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
                                <option selected>Trier par</option>
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
                        $result = $mysqli->query("SELECT `id`, `itemName`,`price` FROM dataoffre WHERE concat (`itemName`,`price`) LIKE  '%$searchInput%';") or  die($mysqli->error) ;  
                    }else if (isset($_POST['actualiser'])){
                        $result = $mysqli->query("SELECT `id`, `itemName`,`price` FROM dataoffre") or die($mysqli->error);
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
                            $result = $mysqli->query("SELECT `id`, `itemName`,`price` FROM dataoffre order by $tri_par") or die($mysqli->error);
                    }else {
                        $result = $mysqli->query("SELECT `id`, `itemName`,`price` FROM dataoffre") or die($mysqli->error);
                    }
                    while ($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo $row['id']; ?></td>   
                        <td><?php echo $row['itemName']; ?></td>
                        <td><?php echo $row['price']; ?></td>
                        <td>
                            <a class="btn btn-info" href="ajout.php?edit=<?php echo $row['id']; ?>">Edit</a>
                            <a class="btn btn-danger" href="../controller/processOffre.php?delete=<?php echo $row['id']; ?>">Delete</a>
                        </td>
                    </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>
    












   