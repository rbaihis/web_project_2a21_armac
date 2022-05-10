
<?php
session_start();


include_once '../../Model/produit.php';
include_once '../..\Controller\produits.php';
include_once '../..\Controller\panier.php';
$produits = new produits();
$panier  = new paniers();
$curr_panier = $panier->getCurrentPanier();
if(isset($_POST['id_panier'])){
  try{
    return $panier->ajouterAuPanier($_POST['id_produit'],$_POST['id_panier'],$_POST['quantite']);
  }catch(Error $e){
    return "error";
  }
}else if( isset($_POST['filter']) )
{
    $listeP = $produits->afficherProduitsSorted();
}else if (isset($_POST['keyword'])){
    $listeP = $produits->afficherProduitsSearch();
}else{
    $listeP = $produits->afficherProduits(); 
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
<link href="../../../assets/css/styleseif.css" rel="stylesheet"> 

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
<div id="ajouter-alert" class="alert alert-success " role="alert">
  Produit ajouté avec succée
</div>

<div class="menu-outer">
    <div class="menu-icon">
        <div class="bar"></div>
        <div class="bar"></div>
        <div class="bar"></div>
    </div>
    <nav>
        <ul>


<?php  if( isset($_SESSION['account']) ) 
{  ?>

<li><a href="../../homepage.php">Home</a></li>
<li><a href="../../account.php">account</a></li>
<li><a href="../../index.php">Offre et promo</a></li>
<li><a href="../../store.php">Produits</a></li>
<li><a href="../../etoile.php">Avis</a></li>
<li><a href="produits.php">Store</a></li>
<li><a href="panier.php">panier</a></li>
<li><a href="../../categ.php">Service</a></li>
<li><a href="../../reservation.php">Reservaion</a></li>
<li><a href="../../forum.php">Forum</a></li>

<?php   
} else{ 
?>
        <li><a href="../../homepage.php">Home</a></li> 
        <li><a href="../../index.php">Offre et promo</a></li>
				<li><a href="../../store.php">Produits</a></li>
        <li><a href="../../etoile.php">Avis</a></li>
        <li><a href="produits.php">Store</a></li>
        <li><a href="panier.php">panier</a></li>
        <li><a href="../../categ.php">Service</a></li>
        <li><a href="../../forum.php">Forum</a></li>
        
<?php   }  ?>
        

           <!-- <li><a href="index.html">Home</a></li>
		   <li><a href="produits.php">Produits</a></li>
           <li><a href="blog.php">Offre et promo</a></li>
		   <li><a href="panier.php">Panier</a></li> -->
        </ul>
   </nav>
</div>
<a class="menu-close" onClick="true">
    <div class="menu-icon">
        <div class="bar"></div>
        <div class="bar"></div>
    </div>
</a>



<div class="pop-up-container">
      <div class="pop-up-container-vertical">
        <div class="pop-up-wrapper">
          <div class="go-back" onclick="GoBack();"><i class="fa fa-arrow-left"></i>
          </div>
          <div class="product-details">
            <div class="product-left">
              <div class="product-info">
                <div class="product-price" price-data="320.03">
                </div>
              </div>
              <div class="product-image">
                <img src="https://via.placeholder.com/300" />
              </div>
            </div>
            <div class="product-right">
                <h3 id="product-title" style="margin-top:50px;color:black" >Product Title</h3>
              <div class="product-quantity" style="margin-top:150px">
                <label for="product-quantity-input" class="product-quantity-label">Quantité</label>
                <div class="product-quantity-subtract">
                  <i class="fa fa-chevron-left"></i>
                </div>
                <div>
                  <input type="text" id="product-quantity-input" placeholder="0" value="1" />
                </div>
                <div class="product-quantity-add">
                  <i class="fa fa-chevron-right"></i>
                </div>
              </div>
            </div>
            <div class="product-bottom">
              <div class="product-checkout">
                Total Price
                <div class="product-checkout-total">
                  <span>DT</span>
                  <div class="product-checkout-total-amount">
                  
                  </div>
                </div>
              </div>
              <div class="product-checkout-actions" >
                <a class="add-to-cart" href="#" onclick="AddToCart(event)">Ajouter au panier</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  
  <nav class="navbar navbar-light  mb-5">

<?php  if( isset($_SESSION['account']) ) 
{  ?>

  <!-- == LOGIN & register == -->
<div class="fixedcalliconlogout">
    <i class="fa fa-text"  style="color:rgba(255, 255, 255, 0.62)"> 
        <a  href="../../../../front/view/logout.php">
            <h3 style=" font-size: 18px;  margin: 15px 0px 0px 2px; ">
             <b>LogOut</b> 
            </h3>
        </a>
    </i>
</div>

<?php  } else{   ?>

   <!-- == LOGIN & register == -->
<div class="fixedcallicon">
<i class="fa fa-text"><a href="../../../view/login.php"><h3 style=" font-size: 20px;  margin: 15px 0px 0px 2px; "> <b> LogIn </b> </h3></a></i>
 <span class="hide"> <a href="../../../view/register.php" style=" font-size: 20px;  margin: 15px 0px 0px 2px; ">  <b> Register </b> </a></span>
</div>

<?php  }  ?> 

  <form class="form-inline" method="post">
    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="keyword" value="<?php if(isset($_POST['keyword'])){ echo $_POST['keyword'];}else{echo "";} ?>"   >
    <button class="btn btn-danger my-2 my-sm-0" type="submit">Search</button>
  </form>
  <form style="margin-right:100px" method="post">
    <select class="form-select" aria-label="Default select example" name="filter" onchange="this.form.submit()" value="prix">
    <option value="ref">Filtrer avec</option>
    <option value="prix" <?php if(isset($_POST['filter'])){ if($_POST['filter'] == "prix") echo "selected";}?> >Prix</option>
    <option value="nom"  <?php if(isset($_POST['filter'])){ if($_POST['filter'] == "nom") echo "selected";}?> >Nom</option>
    <option value="type" <?php if(isset($_POST['filter'])){ if($_POST['filter'] == "type") echo "selected";}?> >Type</option>
    </select>
 </form>
</nav>
<div class="container" style="padding-top:100px">
 
  <div class="row">
    <?php foreach($listeP as $p){?>
    <div class="col-4" style="margin-bottom:50px">
      <!-- Card -->
      <div class="card d-block">
        <img class="card-img-top" style="width: 150px;margin-left: auto;margin-right: auto;display: block;" src="../Back/img/products/<?php echo $p['image']?>" alt="Image Description">
        <div class="card-footer text-center py-4">
          <h3 class="h5 mb-1"><?php echo $p["nom"] ?></h3>
          <span class="d-block text-muted font-size-1 mb-3"><?php echo $p["type"] ?></span>
          <span class="d-block text-muted font-size-1 mb-3"><?php echo $p["prix"] ?> DT</span>
          <button class="btn btn-sm btn-outline-primary btn-pill transition-3d-hover px-5"  onClick="openPopUp(<?php echo "'".$p["nom"]."'".","."'".$p["prix"]."'".","."'".$p["image"]."'".","."'".$p["ref"]."'".","."'".$curr_panier."'" ?>)">Ajouter au panier</button>
        </div>
      </div>
      <!-- End Card -->
    </div> 
    <?php } ?>
  </div>
</div>


<!-- Scripts -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="js/common.js"></script>
<script src="js/home.js"></script>
<script src="js/testimonials.js"></script>
<script src="js/produits.js"></script>
</body>
</html>