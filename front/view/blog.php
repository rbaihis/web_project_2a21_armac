<?php
// add this to every page you create
// -------------------------------------
session_start();
 require "header.php";

 if( isset($_SESSION['account']) ) 
{
	require "navloggedin.php"; 
} else{
	require "nav.php"; 
}
// copy the last line as well " require "footer.php"; (e5er star )
// -------------------------------------
?>






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
<script src="../../assets/js/nicescroll.js"></script>






<?php
// add this to every page you create
// -------------------------------------
 require "footer.php" 
 // -----------------------------------
 ?>