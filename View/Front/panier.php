
<?php

include_once '../../Model/produit.php';
include_once '../..\Controller\panier.php';
include_once '../..\Controller\commande.php';
$panier = new paniers();
$commande = new commandes();

$current_panier = $panier->getCurrentPanier();

if( $_SERVER['REQUEST_METHOD']=="GET" && isset($_GET["id_produit"])){
    return $panier->supprimerDuPanier($_GET["id_produit"],$_GET["id_panier"]);
}
else if( $_SERVER['REQUEST_METHOD']=="POST") {
    $panier->confirmePanier($current_panier);
    $commande->confirmerCommande($current_panier);
}else{
    $listeP = $panier->afficherPanier($current_panier);
}


?>



<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="">
<link rel="icon" href="#">
<title>Bioté center</title>
<!-- CSS -->
<link href="css/style.css" rel="stylesheet">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
<link href='https://fonts.googleapis.com/css?family=Great+Vibes' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Oswald:400,700,300' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Roboto+Condensed:400,400italic,300italic,300,700,700italic' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link href='css/produits.css' rel='stylesheet' type='text/css'>
</head>
<body style="background-color:#7777773d">
<div class="popup-overlay" onClick="GoBack()"></div>


<div id="loader-wrapper" class="d-none">
<div id="loader"></div>
<div class="loader-section section-left"></div>
<div class="loader-section section-right"></div>
</div>


<div class="menu-outer">
    <div class="menu-icon">
        <div class="bar"></div>
        <div class="bar"></div>
        <div class="bar"></div>
    </div>
    <nav>
        <ul>
           <li><a href="index.html">Home</a></li>
		   <li><a href="produits.php">Produits</a></li>
           <li><a href="blog.php">Offre et promo</a></li>
		   <li><a href="panier.php">Panier</a></li>
        </ul>
   </nav>
</div>
<a class="menu-close" onClick="true">
    <div class="menu-icon">
        <div class="bar"></div>
        <div class="bar"></div>
    </div>
</a>
<div class="m-5 alert alert-success" <?php if ($_SERVER['REQUEST_METHOD']=="POST"){?>style="display:block"<?php }else{?>style="display:none"<?php }?>>Votre Commande est confirmée</div>
<div class="container mt-5 mb-5" <?php if ($_SERVER['REQUEST_METHOD']=="POST"){?>style="display:none"<?php } ?>>
    <div class="d-flex justify-content-center row">
        <div class="col-md-8">
            <div class="p-2">
                <h4  style="color:white">Panier</h4>
            </div>
            <div class="d-flex flex-row justify-content-between align-items-center p-2 bg-white mt-4 px-3 rounded">
                <div class="mr-1"><img class="rounded" src="" width="100"></div>
                <div class="d-flex flex-column align-items-center product-details"><span class="font-weight-bold ml-5">Produit</span>
                </div>
                <div class="d-flex flex-row align-items-center qty">
                    <h5 class="text-grey mt-1 mr-1 ml-5">Quantité</h5>
                </div>
                <div>
                    <h5 class="text-grey">Prix</h5> 
                </div>
                <div class="d-flex align-items-center"></div>
            </div>

            <?php $sum=0; foreach($listeP as $p){?>
            <div class="d-flex flex-row justify-content-between align-items-center p-2 bg-white mt-4 px-3 rounded">
                <div class="mr-1"><img class="rounded" src="../Back/img/products/<?php echo $p['image']?>" width="70"></div>
                <div class="d-flex flex-column align-items-center product-details"><span class="font-weight-bold"><?php echo $p["nom"] ?></span>
                </div>
                <div class="d-flex flex-row align-items-center qty">
                    <h5 class="text-grey mt-1 mr-1 ml-1"><?php echo $p["quatite"] ?></h5>
                </div>
                <div>
                    <h5 class="text-grey"><?php echo $p["quatite"] * $p["prix"];$sum+=$p["quatite"] * $p["prix"]?>DT</h5> 
                </div>
                <div class="d-flex align-items-center"><i type="submit" onclick="deleteProduct(<?php echo $p['ref'].','.$current_panier ?>)" class="fa fa-trash mb-1 text-danger"></i></div>
            </div>
            <?php } ?>
            <div class="d-flex flex-row align-items-center mt-3 p-2 mb-5 bg-white rounded"><form method="post" style="width: 50%;"><button class="btn btn-success btn-block btn-lg ml-2 pay-button" type="submit" <?php if ($listeP==[]){?>disabled<?php } ?>>Confirmer La commande</button></form><p class="badge badge-info" style="margin-left:120px;font-size:21px">Totale : <?php echo $sum ?>DT</p</div>
        </div>
    </div>
</div>

<!-- Scripts -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="js/common.js"></script>
<script src="js/home.js"></script>
<script src="js/testimonials.js"></script>
<script src="js/produits.js"></script>
<script src="js/panier.js"></script>
</body>
</html>