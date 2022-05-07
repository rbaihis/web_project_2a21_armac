<?php include "nav-bar.php" ?>
<?php
include('../../front/controller/reservationC.php');
$reservationC = new reservationC();
$response = $reservationC->afficherRes($reservationC->conn);
?>


    <div class="row tm-content-row tm-mt-big">
    <div class="col-xl-8 col-lg-12 tm-md-12 tm-sm-12 tm-col">
    <div class="bg-white tm-block h-100">
        <div class="row">
            <div class="col-md-8 col-sm-12">
                <h2 class="tm-block-title d-inline-block">Show reservation</h2>
            </div>

        </div>


        <div class="table-responsive">

                <table class="table table-hover table-striped tm-table-striped-even mt-3">
                    <thead>
                    <tr class="tm-bg-gray">

                        <th> email</th>
                        <th> Date</th>
                        <th> Service</th>
                        <th> Prix</th>
                        <th scope="col"></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    while ($reservationC = $response->fetch()) {
                    ?>
                    <tr>

                        <td> <?php echo $reservationC['email']; ?></td>



                        <td> <?php echo $reservationC['date']; ?></td>
                        <td> <?php echo $reservationC['nom']; ?></td>
                        <td> <?php echo $reservationC['prix']; ?></td>



                        <?php } ?>
                    </tr>
                    </tbody>
                </table>



            <h2 align="center"><a href="#">Reservation Calender</a></h2>

            <div class="container">
                <div id="calendar"></div>
            </div>
        </div>


        <div class="tm-table-mt tm-table-actions-row">
            <div class="tm-table-actions-col-left">


            </div>
        </div>
    </div>



<?php include "Footer.php" ?>