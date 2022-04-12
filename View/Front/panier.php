<?php

include_once '../../Model/panier.php';
include_once '../../Controller/panierC.php';
include_once '../../Model/produit.php';
include_once '../../Controller/produitC.php';
include_once '../../Model/commande.php';
include_once '../../Controller/commandeC.php';
include_once '../../Model/client.php';
include_once '../../Controller/clientC.php';

$clientC = new clientC();
$panierC = new panierC();
$produitC = new produitC();
$commandeC = new commandeC();
$listeeee = $clientC->selectConn();
foreach($listeeee as $c){$conn=$c['id'];}
$prix= null;
$adresse = null;
$listeC = $panierC->afficherPanierConn($conn);
if (isset($_POST["passer"]))
{
  foreach($listeC as $p)
  {
    $produit=$produitC->afficherProduitDetail($p['refProduit']);
    foreach($produit as $pro)
    {
    $prix=$prix+($pro['prix']*$p['quantite']);
    $client = $clientC->afficherClientDetail($p['idClient']);
    foreach($client as $c)
    {$adresse = $c['adresse'];
      }
    }
  }
  $commande = new commande(
    date('l jS \of F Y h:i:s A'),
    $adresse,
    $prix,
    $p['idClient']
  );
  $commandeC->ajouterCommande($commande);
  
  $panierC->supprimerPanierCmd($p['idClient'],$conn);
  header('Location:recu.php');
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
<title>Beauttio - HTML Template by WowThemes.net</title>
<!-- CSS -->
<link href="css/style.css" rel="stylesheet">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
<link href='https://fonts.googleapis.com/css?family=Great+Vibes' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Oswald:400,700,300' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Roboto+Condensed:400,400italic,300italic,300,700,700italic' rel='stylesheet' type='text/css'>
</head>
<body style="background-image:url(img/bg7.jpg);background-attachment:fixed;background-size:cover;">

<div id="loader-wrapper">
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
           <li><a href="blog.html">Offre et</a></li>
          
       </ul>
   </nav>
</div>
<a class="menu-close" onClick="return true">
    <div class="menu-icon">
        <div class="bar"></div>
        <div class="bar"></div>
    </div>
</a>

<div class="fixedcallicon">
	<i class="fa fa-phone"></i><span class="hide">Réserver - 00 123 000</span>
</div>
<div class="container">
<div class="logoarea">
<div class="intro">
			<h1><span class="smaller wow zoomIn" data-wow-duration="2s" data-wow-delay="0.5">104 Nasr , Tunis, Tunisia</span>
			<span class="big wow pulse" data-wow-duration="1s" data-wow-delay="0s">Bioté center</span>
			<span class="small wow fadeIn" data-wow-duration="2s" data-wow-delay="0.5s">- Salon de beauté -</span>
			</h1>
		</div>
		</div>
		<div class="pagearea">
		<h1 class="page-headline">Offre et promo</h1>
		<i class="iconstartitle textmagenta fa fa-star"></i>
		<?php foreach($listeC as $pa){ ?>
            <tr>
              <td><?php $listpa=$produitC->afficherProduitDetail($pa['refProduit']);
              foreach($listpa as $po){ echo $po['nom']; }?></td>
              <td><?php echo $pa['quantite'] ?></td>
             
             
             
             
            
            
            
            
            </tr>
            <?php } ?>
            <tr> <td><form method="POST"><input type="hidden" name="passer" ><input type="submit" class="ico del" value="Passer commande"> </td></tr><form>
            
            
            
            
            
            
          
		</div>
	
</div>
<div class="clearfix"></div>
<footer class="footer">
<div class="container">
<div class="pull-left">&copy; Bioté centre crée par ARMAC.</div>
<div class="pull-right"> 
	<div class="footericons">
		<a href="#"><i class="fa fa-facebook"></i></a>
		<a href="#"><i class="fa fa-twitter"></i></a>
		<a href="#"><i class="fa fa-yelp"></i></a></a>
		<a href="#"><i class="fa fa-google-plus"></i></a>
	</div>
</div>
<div class="clearfix"></div>
</div>
</footer>	
<!-- Scripts -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="js/nicescroll.js"></script>
<script src="js/common.js"></script>
</body>
</html>