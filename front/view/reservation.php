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
include ('../model/reservation.php');
include('../controller/reservationC.php');
$reservationC = new reservationC();
$response = $reservationC->afficherRes($reservationC->conn);

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



            <body>
            <div class="table-title">

            </div>

            <table class="table-fill">
                <thead>
                <tr>
                    <td class="text-left">Date</td>
                    <td  class="text-left">Service</td>
                </tr>
                </thead>
                <tbody class="table-hover">
                <?php while ($reservationC = $response->fetch()) { ?>
                <tr>

                    <td class="text-left"><?php  echo $reservationC['date']; ?></td>

                    <td class="text-left"><?php  echo $reservationC['nom']; ?></td>
                    <form action="../core/deleteRes.php" method="POST" enctype="multipart/form-data">
                    <td class="text-left">
                        <button type="submit" name="id" value="<?php echo $reservationC['idR']; ?>"
                                                   class="btn btn-danger">Delete
                        </button>
                    </td>
                    </form>
                    <form action="../core/updateRes.php" method="POST" enctype="multipart/form-data">
                        <td class="text-left">
                            <button type="submit" name="id" value="<?php echo $reservationC['idR']; ?>"
                                    class="btn btn-danger">update
                            </button>
                        </td>
                    </form>
                </tr>

                    </tr>
                <?php } ?>
                </tbody>
            </table>
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