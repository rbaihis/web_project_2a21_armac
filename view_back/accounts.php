<?php 
session_start();
require "../controller_back/admincontroller.php";

$adminC=new AdminController();

$statment = $adminC->displayUsers();



include "nav-bar.php" ;




?>
        <!-- row -->
        <div class="row tm-content-row tm-mt-big">
            <div class="tm-col tm-col-big">
                <div class="bg-white tm-block">
                    <div class="row">
                        <div class="col-12"> 
                            <h2 class="tm-block-title d-inline-block">Accounts</h2>
                        </div>
                    </div>
                    <table  border="1"  class="tm-list-group tm-list-group-alternate-color tm-list-group-pad-big">
                   

                    <!-- tm-list-group ---------------------------------------------------------------------------------------->

<?php 
    $i=0; $j=0;

    while( $row = $statment->fetch( PDO::FETCH_ASSOC ))
    {  ?>
        
        <tr class="tm-list-group-item"><td id="<?= "l".$i."r".$j?>">
            <?php echo( htmlentities( $row['name'] ) );  $j++; ?>  
        </td><td id="<?= "l".$i."r".$j?>" >
            <?php echo( htmlentities( $row['address'] ) ); $j++; ?>
        </td><td id="<?= "l".$i."r".$j?>">
            <?php echo( htmlentities( $row['postalcode'] ) );  $j++; ?>
        </td><td id="<?= "l".$i."r".$j?>">
            <?php echo( htmlentities( $row['email'] ) ); $j++; ?>
        </td><td id="<?= "l".$i."r".$j?>">

    <!-- passing user_id value as a get request to the destinated page to know the user we want to handle directly by his primary key -->
            <?php  echo( '<a id="l".$i."r".($j-=7). " href="update.php?user_id='.$row['user_id'].' ">Update</a> / ');  $j++; ?>
            <?php echo( '<a id="l".$i."r".($j-=7). " href="delete.php?user_id='.$row['user_id'].' ">Delete</a> ');  $i++;  $j=0;    ?>

        </td></tr>

    <?php
    }   
?>      
                </table >

                    

                    <!-- tm-list-group ---------------------------------------------------------------------------------------->
                    
                </div>
            </div>
            <div class="tm-col tm-col-big">
                <div class="bg-white tm-block">
                    <div class="row">
                        <div class="col-12">
                            <h2 class="tm-block-title">Edit Account</h2>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">




                            <!--======================================================================================================================================= -->
                            <form  class="tm-signup-form"  method="post">
                                <!--======================================================================================================================================= -->
                                
                                
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input placeholder="Vulputate Eleifend Nulla" id="name" name="name" type="text" class="form-control validate">
                                </div>
                                <div class="form-group">
                                    <label for="email">Address</label>
                                    <input placeholder="vulputate@eleifend.co" id="address" name="address" type="text" class="form-control validate">
                                </div>
                                <div class="form-group">
                                    <label for="password">Postalcode</label>
                                    <input placeholder="1000" id="postalcode" name="postalcode" type="text" class="form-control validate">
                                </div>
                                <div class="form-group">
                                    <label for="password2">Email</label>
                                    <input placeholder="aaa@bbb.ccc" id="email" name="email" type="password" class="form-control validate">
                                </div>
                                
                                <div class="row">
                                    <div class="col-12 col-sm-4">
                                        <button type="submit" class="btn btn-primary">Update
                                        </button>
                                    </div>
                                    <div class="col-12 col-sm-8 tm-btn-right">
                                            <button type="submit" class="btn btn-danger">Delete Account
                                                </button>
                                    </div>
                                </div>


                                <!--======================================================================================================================================= -->
                            </form>
                            <!--======================================================================================================================================= -->
                                    
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
        


<?php include "Footer.php" ?>