


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
       <h1 class="page-headline">Commande</h1>
       <i class="iconstartitle textmagenta fa fa-star"></i>
    

       <form action="ajouterCommande.php" method='POST'>
                   
                    <label for="date_cmd">date commande:
                    </label>
                    <input type="date" id="date_cmd" name="date_cmd" 
                    minlength="3" maxlength="20" size="10" >
                    <br><br>

                    <label for="adresse">Adresse :
                    </label>
                    <input type="adresse" id="adresse" name="adresse" 
                    minlength="3" maxlength="20" size="10" >
                    <br><br>

                    <label for="prix">prix :
                    </label>
                    <input type="prix" id="prix" name="prix" 
                    minlength="3" maxlength="20" size="10" >
                    <br><br>

                    <label for="idClient">idClient :
                    </label>
                    <input type="idClient" id="idClient" name="idClient" 
                    minlength="3" maxlength="20" size="10" >
                    <br><br>


             
            <br><br>
                <button type="submit">Ajouter </button>
                </form>

   
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