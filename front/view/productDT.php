
<?PHP
session_start();

include "../controller/produitC.php";
include "../controller/categorie_c.php";


$produitC = new produitC();
$listeProduit = $produitC->recupererProduit($_GET["id"]);
$categorieC = new categorieC();
$listeCategorie = $categorieC->afficherCategorie();
$categorieC = new categorieC();



?>
  <link href="../../front/assets/css/styleseif.css" rel="stylesheet"> 

<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->


<!DOCTYPE html><html class=''>
<head><script src='//production-assets.codepen.io/assets/editor/live/console_runner-079c09a0e3b9ff743e39ee2d5637b9216b3545af0de366d4b9aad9dc87e26bfd.js'></script><script src='//production-assets.codepen.io/assets/editor/live/events_runner-73716630c22bbc8cff4bd0f07b135f00a0bdc5d14629260c3ec49e5606f98fdd.js'></script><script src='//production-assets.codepen.io/assets/editor/live/css_live_reload_init-2c0dc5167d60a5af3ee189d570b1835129687ea2a61bee3513dee3a50c115a77.js'></script><meta charset='UTF-8'><meta name="robots" content="noindex"><link rel="shortcut icon" type="image/x-icon" href="//production-assets.codepen.io/assets/favicon/favicon-8ea04875e70c4b0bb41da869e81236e54394d63638a1ef12fa558a4a835f1164.ico" /><link rel="mask-icon" type="" href="//production-assets.codepen.io/assets/favicon/logo-pin-f2d2b6d2c61838f7e76325261b7195c27224080bc099486ddd6dccb469b8e8e6.svg" color="#111" /><link rel="canonical" href="https://codepen.io/enwaara/pen/dRqJMv?depth=everything&order=popularity&page=78&q=shop&show_forks=false" />
<script src="https://use.typekit.net/tsl0qfs.js"></script>
<script>try{Typekit.load({ async: true });}catch(e){}</script>

<style class="cp-pen-styles">* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  -webkit-transition: 0.2s ease-in-out;
  -moz-transition: 0.2s ease-in-out;
  -o-transition: 0.2s ease-in-out;
  transition: 0.2s ease-in-out;
  font-family: "proxima-nova", sans-serif;
  font-weight: 300;
  color: #444B54;
}
*:focus {
  outline: none;
}

body {
  background-color: #D64541;
}

#wrapper {
  position: absolute;
  top: 50%;
  margin-top: -240px;
  left: 0;
  width: 100%;
}

#container {
  width: 990px;
  height: 480px;
  margin: 0 auto;
  box-shadow: 5px 5px 20px 0px rgba(0, 0, 0, 0.7);
  -webkit-border-radius: 5px;
  -moz-border-radius: 5px;
  -ms-border-radius: 5px;
  border-radius: 5px;
  position: relative;
  background: #dadfe1;
  background: -moz-linear-gradient(45deg, #dadfe1 0%, #e8edef 30%, #f9feff 100%);
  background: -webkit-linear-gradient(45deg, #dadfe1 0%, #e8edef 30%, #f9feff 100%);
  background: linear-gradient(45deg, #dadfe1 0%, #e8edef 30%, #f9feff 100%);
  filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#dadfe1', endColorstr='#f9feff',GradientType=1 );
}

#img-wrap {
  width: 550px;
  height: 100%;
  float: left;
  position: relative;
}
#img-wrap .images {
  width: 60%;
  overflow: hidden;
  margin: 270px auto 0 auto;
}
#img-wrap .images li {
  list-style: none;
  width: 33.33%;
  float: left;
  padding: 10px;
  text-align: center;
  cursor: pointer;
  opacity: 0.7;
}
#img-wrap .images li img {
  width: 80%;
}
#img-wrap .images li:nth-child(4) {
  padding-top: 25px;
}
#img-wrap .images li:hover {
  opacity: 1;
}
#img-wrap .images .big-img {
  width: 75%;
  float: none;
  padding: 0;
  margin: 0 12.5%;
  text-align: center;
  opacity: 1;
  position: absolute;
  top: -150px;
  left: 0;
}
#img-wrap .images .big-img img {
  -webkit-filter: drop-shadow(0px 7px 3px #6C7A89);
  filter: drop-shadow(0px 7px 3px #6C7A89);
}

.colors {
  width: 125px;
  margin: 20px auto;
}
.colors li {
  width: 25px;
  height: 25px;
  margin-right: 25px;
  list-style: none;
  float: left;
  background: #F3C9BF;
  cursor: pointer;
  position: relative;
  position: relative;
  opacity: 0.7;
  -webkit-border-radius: 100%;
  -moz-border-radius: 100%;
  -ms-border-radius: 100%;
  border-radius: 100%;
  -webkit-box-shadow: 0px 1px 2px 0px rgba(0, 0, 0, 0.3);
  -moz-box-shadow: 0px 1px 2px 0px rgba(0, 0, 0, 0.3);
  box-shadow: 0px 1px 2px 0px rgba(0, 0, 0, 0.3);
}
.colors li:nth-child(2) {
  background: #87E8C6;
}
.colors li:nth-child(3) {
  margin-right: 0;
  background: #BFE6EC;
}
.colors li:hover, .colors li.target {
  opacity: 1;
  -webkit-box-shadow: 0px 1px 4px 0px rgba(0, 0, 0, 0.5);
  -moz-box-shadow: 0px 1px 4px 0px rgba(0, 0, 0, 0.5);
  box-shadow: 0px 1px 4px 0px rgba(0, 0, 0, 0.5);
}

.info {
  width: 440px;
  height: 100%;
  float: right;
  padding: 50px 50px 50px 0;
  background: url("http://enwaara.se/codepen/herschel.svg") no-repeat;
  background-position: 80% 0%;
  background-size: 65%;
}
.info h1 {
  font-size: 1.5em;
  font-weight: 400;
  float: left;
  text-transform: uppercase;
  letter-spacing: 2px;
}
.info h2 {
  font-size: 1em;
  letter-spacing: 1.5px;
  text-transform: uppercase;
  padding: 5px 0 20px 0;
  float: left;
  color: #8199A3;
}
.info p {
  clear: both;
  margin-bottom: 7px;
  line-height: 1.5em;
  font-size: 1em;
  letter-spacing: 0.5px;
}
.info #pricing, .info #coloring {
  text-transform: uppercase;
  letter-spacing: 1px;
  font-size: 0.9em;
  color: #D64541;
}
.info #price {
  margin-top: 15px;
  float: none;
}

.important {
  width: 50%;
  float: left;
  margin-top: 15px;
}

.form {
  width: 50%;
  float: right;
  margin-top: 15px;
}
.form .color {
  -webkit-appearance: none;
  -moz-appearance: none;
  appearance: none;
  padding: 0 20px;
  width: 100%;
  height: 40px;
  border: none;
  background: #F0C2C2;
  font-size: 0.9em;
  letter-spacing: 1px;
  -webkit-border-radius: 5px;
  -moz-border-radius: 5px;
  -ms-border-radius: 5px;
  border-radius: 5px;
  color: #444B54;
  cursor: pointer;
  font-weight: 400;
}
.form .color:hover {
  background: #efb7b7;
}

button {
  width: 100%;
  margin-top: 30px;
  border: none;
  background: #1abc9c;
  padding: 20px 0;
  font-size: 1.1em;
  line-height: 1.1em;
  letter-spacing: 1px;
  -webkit-border-radius: 5px;
  -moz-border-radius: 5px;
  -ms-border-radius: 5px;
  border-radius: 5px;
  color: #F2F2F2;
  cursor: pointer;
}
button:hover {
  background: #16a085;
}

@media screen and (max-width: 1440px) {
  #wrapper {
    transform: scale(0.7);
  }
}
</style></head><body>
<?php  if( isset($_SESSION['account']) ) 
{  ?>

  <!-- == LOGIN & register == -->
<div class="fixedcalliconlogout">
    <i class="fa fa-text"  style="color:rgba(255, 255, 255, 0.62)"> 
        <a  href="logout.php">
            <h3 style=" font-size: 18px;  margin: 15px 0px 0px 2px; ">
             <b>LogOut</b> 
            </h3>
        </a>
    </i>
</div>

<?php  } else{   ?>

   <!-- == LOGIN & register == -->
<div class="fixedcallicon">
<i class="fa fa-text"><a href="login.php"><h3 style=" font-size: 20px;  margin: 15px 0px 0px 2px; "> <b> LogIn </b> </h3></a></i>
 <span class="hide"> <a href="register.php" style=" font-size: 20px;  margin: 15px 0px 0px 2px; ">  <b> Register </b> </a></span>
</div>

<?php  }  ?>


<?php foreach ($listeProduit as $produit) :
						 ?>
<div id="wrapper">
	
  <div id="container">
    
    <div id="img-wrap">
      
      <ul class="images">
        <li class="big-img">
          <img src="img/cour/<?php echo $produit['img'] ?>"/>
        </li>
        <li>
          <img src="img/cour/<?php echo $produit['img'] ?>"/>
        </li>
        <li>
          <img src="img/cour/<?php echo $produit['img'] ?>"/>
        </li>
        <li>
          <img src="img/cour/<?php echo $produit['img'] ?>"/>
        </li>
      </ul>
     
      <ul class="colors">
        <li class="target"></li>
        <li></li>
        <li></li>
      </ul>
      
    </div>
    
    <div class="info">
      
      <h1> <?php echo $produit['libelle'] ?> </h1>
	   <br><br>
      
      <h2>Backpack from Boité</h2>
      
      <p><?php echo $produit['description'] ?>.</p>
      <p><?php echo $produit['description'] ?>.</p>
      <p id="coloring" > id"  <?php echo $produit['id'] ?>"</p>
      <div class="important">
		
        <p id="pricing">Price<p>
        <h1 id="price">$ <?php echo $produit['prix'] ?></h1>
		
      </div>
      
      <div class="form">
		  
        <p id="coloring">Choose color</p>
        <select class="color">
          <option>Peach Pink</option>
          <option>Mint Green</option>
          <option>Seafoam Blue</option>
        </select>
      </div>
      
      <button>Add to cart</button>
      
    </div>
	<?php endforeach; ?>
	
  </div>
</div>

</body>

</html>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<br><br><br><br><br><br><br><br>
<?php


?>