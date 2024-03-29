<?php
// add this to every page you create
// -------------------------------------
session_start();


if( !( isset($_SESSION['account']) )  ) 
{ header("Location: ../../front/view/homepage.php");  } 

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
$prix=0;
?>
<style>
    .table-area {
        position: relative;
        z-index: 0;
        margin-top: 50px;
    }
    table.responsive-table
    {   display: table;
        background: #111111;
        table-layout: fixed;
        width: 118%;
        height: 200%;}

</style>
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
            <h1 class="page-headline">Reservation</h1>
            <i class="iconstartitle textmagenta fa fa-star"></i>


                <div class="table-area">
                    <table class="responsive-table table">
                        <thead>
                        <tr>
                            <th style="font-size: 40px "> Date</th>
                            <th style="font-size: 40px "> </th>
                            <th style="font-size: 40px " >Service</th>
                            <th style="font-size: 40px " ></th>
                            <th style="font-size: 40px " >Prix</th>
                            <th style="font-size: 40px " ></th>
                        </tr>
                        </thead>
                        <?php while ($reservationC = $response->fetch()) { ?>

                        <tr>
                            <td style="font-size: 20px;   "  ><?php  echo $reservationC['date']; ?></td>
                            <td style="font-size: 20px;   "  ></td>
                            <td style="font-size: 20px "><?php  echo $reservationC['nom']; ?></td>
                            <td style="font-size: 20px "></td>
                            <td style="font-size: 20px "><?php  echo $reservationC['prix']; ?></td>
                            <td style="font-size: 20px "></td>
                            <?php $prix+= $reservationC['prix']; ?>
                            
                            <td >
                                <form action="../core/deleteRes.php" method="POST" enctype="multipart/form-data">
                                    <button style="background: #A50965" type="submit" name="id" value="<?php echo $reservationC['idR']; ?>"
                                    class="btn btn-danger">Delete
                                </button>
                                
                                
                            </form>
                        </td>
                        <td style="font-size: 20px "></td>
                        <td style="font-size: 20px "> </td>
                        </tr>

                            <?php } ?>
                            
                         <tr>

                             <td >
                                 <button   style="background: #A50965" type="submit" name="id" class="btn btn-danger">
                                 Prix Total:<?php echo $prix; ?>dt
                                </button>
                             </td>
                             <td >
                                 <!-- <button   style="background: #A50965" type="submit" name="id" class="btn btn-danger">
                                 Prix Total:<?php echo $prix; ?>dt
                                </button> -->
                             </td>
                             <td >
                                 <!-- <button   style="background: #A50965" type="submit" name="id" class="btn btn-danger">
                                 Prix Total:<?php echo $prix; ?>dt
                                </button> -->
                             </td>
                                <td>
                                       <a href="./PDF.php" >
                                       
                                        <button   style="background: #A50965" type="submit" name="id" class="btn btn-danger">
                                 Get ticket
                                </button></a> 
                                </td>
                            <!-- </td> -->
                        </tr>   



                    </table>
                </div>







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