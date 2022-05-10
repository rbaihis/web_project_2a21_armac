<?php

include_once '../../Controller/commande.php';
$commande = new commandes();
    $listePanier = $commande->afficherCart($_GET["id_command"]);

?>

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
                        <a class="navbar-brand" href="acceuil.html">
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
                                <a class="nav-link" href="accounts.html">gestion produit</a>
                            </li>
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
                        <table class="table table-cart table-mobile mt-5 ">
							<thead>
								<tr>
									<th>Prod</th>
									<th>Price</th>
									<th>Quantity</th>
									<th>Total</th>
									<th></th>
								</tr>
							</thead>

							<tbody>
								<?php $sum=0; foreach($listePanier as $p){ $sum+=$p["quatite"] * $p["prix"];?>
									<tr>
										<td class="product-col">
											<div class="product">
												<figure class="product-media">
													<a href="#">
														<img src=<?php echo "assets/images/products/".$p["image"] ?> alt="Product image">
													</a>
												</figure>

												<h3 class="product-title">
													<a href="#"><?php echo $p["nom"] ?></a>
												</h3><!-- End .product-title -->
											</div><!-- End .product -->
										</td>
										<td class="price-col"><?php echo $p["prix"]."DT"?></td>
										<td class="quantity-col">
											<div class="cart-product-quantity">
												<input disabled type="number" class="form-control" value=<?php echo $p["quatite"] ?> min="1" max="10" step="1" data-decimals="0" required>
											</div><!-- End .cart-product-quantity -->                                 
										</td>
										<td class="total-col"><?php echo $p["quatite"] * $p["prix"]."DT"?></td>
										
									</tr>
								<?php } ?>
							</tbody>
						</table>     
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
</body>

</html>