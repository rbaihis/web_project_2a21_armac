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



<?php
include ('../model/categ.php');
include('../controller/categC.php');
$categC = new categC();
$response = $categC->afficherCateg($categC->conn);

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
		<h1 class="page-headline">Service</h1>
		<i class="iconstartitle textmagenta fa fa-star"></i>
           <style>



               .cardC {
                   color: #fff;
                   font-size: 110px;
                   margin: 30px;
                   text-align: center;
                   background: #751241;
                   width: 200px;
                   height: 270px;
                   transition: all 1.5s ease;
                   /* transition-style: preserve-3d; */
               }

               .cardC:hover {
                   transform: rotatez(360deg);
               }




           </style>
            <body>


            <div class="container" >

                <div class="row" >
                    <?php while ($categ = $response->fetch()) { ?>
                    <div class="col-6">
                        <div class="cardC">
                            <a style="font-size: 50px "  href="service.php?id=<?php echo $categ['type'] ?>"> <?php echo $categ['type'] ?></a>
                        </div>

                    </div>

                    <?php } ?>
                </div>

            </div>


            </body>
            <a class="btn btn-danger" style="background: #0000CC"  href="https://www.facebook.com/sharer.php?u=http://vishal.webhostingindia.racing/social/" target="_blank">Facebook</a>
<a class="btn btn-danger" style="background: #5ea4f3" href="https://www.twitter.com/share?text=text&url=http://vishal.webhostingindia.racing/social/&hashtags=#PHP" target="_blank">Twitre</a>
<a class="btn btn-danger" style="background: #28a745" href="https://api.whatsapp.com/send?phone=&text=<?php urlencode('Hi hello') ?>http://vishal.webhostingindia.racing/social/" target="_blank">Whatsapp</a>


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
<script src="../assets/js/nicescroll.js"></script>






<?php
// add this to every page you create
// -------------------------------------
require "footer_med_front.php";
 // -----------------------------------
 ?>