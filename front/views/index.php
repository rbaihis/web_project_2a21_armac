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
        <br>
           <li><a href="index.html">Home</a></li>
           <li><a href="index.php">Offre et promo</a></li>
          
       </ul>
   </nav>
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
<div class="pagearea">
		<h1 class="page-headline">Offre et promo</h1>
		<i class="iconstartitle textmagenta fa fa-star"></i>
	
		</div>
	
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
                                <a commande1=<?php echo $row['id']; ?>" name="submit" class="btn btn-primary mx-5 mb-3">Réserver</a>
                            </div>
                        </div>
                        <?php endwhile; ?>
                </div>
            </div>
        </section>
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