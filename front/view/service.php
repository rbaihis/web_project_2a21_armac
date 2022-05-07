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
<?php ?>
<?php
include ('../model/service.php');
include('../controller/service_C.php');
$serviceC = new service_C();
$response = $serviceC->getServiceByType($_GET['id'],$serviceC->conn);

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
                    transition-style: preserve-3d;
                }

                .cardC:hover {
                    transform: rotatez(360deg);
                }




            </style>
            <body>

            <form action="../core/addRes.php" method="post">
            <div class="container" >

                <div class="row" >
                    <label> Mail </label>
                    <input type="email" name="email" >
                    <label> choose date </label>
                    <input type="date" name="date" >

                    <?php while ($serviceC = $response->fetch()) { ?>
                        <div class="col-6">
                            <div class="cardC">
                                <label style="font-size: 30px "><?php  echo $serviceC['nom']; ?>    </label>
                                <label style="font-size: 20px "> Prix:<?php  echo $serviceC['prix']; ?>dt</label>
                                <input type="checkbox"  name="id" id="id" value="<?php echo $serviceC['id'] ?>" >

                            </div>

                        </div>

                    <?php } ?>
                </div>

            </div>

<br>
                <br>
                <button style="background: #A50965"  type="submit"   name="reserver" value="reserver"  class="btn btn-danger" href="../view/reservation.php"  >
                    reserver
                </button>

            </form>
            </body>



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