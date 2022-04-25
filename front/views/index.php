<html lang="en">
<head>
<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link href="css/style1.css" rel="stylesheet">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    
</head>
<body style="background-color: #FDF1F3;">

<div class="menu-outer">
		<div class="menu-icon">
			<div class="bar"></div>
			<div class="bar"></div>
			<div class="bar"></div>
		</div>
		<nav>
        <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
			<ul>
          
				<li><a href="index.html">Home</a></li>
				<li><a href="index.php">Offre et promo</a></li>
				<li><a href="store.php">Produits</a></li>
                <li><a href="etoile.php">Avis</a></li>

			</ul>
		</nav>
	</div>
	<a class="menu-close" onClick="return true">
		<div class="menu-icon">
			<div class="bar"></div>
			<div class="bar"></div>
		</div>
	</a>

</div>
<div class="fixedcallicon">
	<i class="fa fa-phone"></i><span class="hide">Réserver - 00 123 000</span>
</div>
<?php require_once '../controller/submit_rating.php'; ?> 
    <?php require_once '../controller/process.php'; ?> 
    <?php require_once '../controller/process3.php'; ?> 
    <?php
        $result = $mysqli->query("SELECT id, itemName, price FROM dataoffre") or die($mysqli->error);
        $total=0;
    ?>
        <!-- cards -->
        <section class="p-2">
            <div class="container">
                
                <div class="row text-center d-flex justify-content-between">
                    
                    <?php while ($row = $result->fetch_assoc()): ?>
                        <div class="col">
                            <div class="card bg-dark text-light">
                                <div class="h1 m-3">
                                    <i class="bi bi-hexagon"></i>
                                </div>
                                <h3 class="card-title mb-3"><?php echo $row['itemName']; ?></h3>
                                <p class="card-text mx-5 mb-3">Price: <?php echo $row['price']; ?></p>
                                <a href="../controller/process.php?commande1=<?php echo $row['id']; ?>" name="submit" class="btn btn-primary mx-5 mb-3">Réserver</a>
                         
                            </div>
                        </div>
                        
                        <?php endwhile; ?>
                        
                </div>
            </div>
        </section>
        <?php
        $commande = $mysqli->query("SELECT * FROM commande") or die($mysqli->error);
    ?>
    <div class="container border border-danger border-2 rounded mt-4">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nom de l'offre</th>
                        <th scope="col">Price</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($rowc = $commande->fetch_assoc()): ?>
                    <tr>
                        <td></td>
                        <td><?php echo $rowc['itemName']; ?></td>
                        <td><?php echo $rowc['price']; ?></td>
                        <td>
                            <a class="btn btn-danger" href="../controller/process.php?delete=<?php echo $rowc['id']; ?>">Delete</a>
                        </td>
                        <?php $total = $total + $rowc['price']; ?>
                    </tr>
                    <?php endwhile; ?>
                    <tr>
                        <td></td>
                        <td></td>
                        <td><p class="fw-bold">Total: <?php echo $total; ?></p></td>
                        <td></td>
                    </tr>
                </tbody>
            </table>
    </div>
    <div class="container mt-3 ">
        <div class="d-flex justify-content-end">  
            <div class="row align-items-center  px-3">
                <div class="col-auto">
                    <label class="form-label" for="">Coupon:</label>
                </div>
                <div class="col-auto">
                        <form action="../controller/process3.php" method="post">
                            <input name="couponInput" class="form-control" placeholder="Enter votre coupon" ></input>
                            
                        </div>
                    </div>
                    <button name="pass" class="btn btn-primary" >Passer au formulaire de paiement</button>

                 
                </form>
            </div>
        </div>



    








        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
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