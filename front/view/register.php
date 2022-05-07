
<?php
session_start();


 if( isset($_SESSION['account'])  ) 
{
	header("Location: ../view/homepage.php"); 
} else{
	require("../controller/usercontroller.php");
    $user =new UserC();
	$user->createController();

	require("header.php");
	require "nav.php"; 
}

?>



<div class="page-wrapper bg-gra-02 p-t-130 p-b-100 font-poppins">
    <div class="wrapper wrapper--w680">
        <div class="card card-4">
            <div class="card-body">
                <h2 class="title">Registration Form</h2>
<?php

if( isset($_SESSION['errormsg']) && ! isset($_POST['name'])  ) 
{
    echo('<p class="label"  style="color:red;">'."*".$_SESSION['errormsg']."</p>\n"); 
    unset($_SESSION['errormsg']);
}else if (!isset($_SESSION['errormsg']) && ! isset($_POST['name'])){ 
	 //to initialise input field in error 
	$_SESSION['inputsTab'] =["","","","",""];  
 }


?>
                <form method="POST">
                    <div class="row row-space">
                        <div class="col-2">
                            <div class="input-group">
                                <label class="label">Full name</label>
                                <input class="input--style-4" type="text" name="name" value="<?=  htmlentities( $_SESSION['inputsTab'][0] ) ?>">
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="input-group">
                                <label class="label">Address</label>
                                    <input class="input--style-4" type="text" name="address" value="<?=  htmlentities( $_SESSION['inputsTab'][1] ) ?>">
                                </div>
                            </div>
                        </div>
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Postalcode</label>
                                    <div class="input-group-icon">
                                        <input class="input--style-4 js-datepicker" type="text" name="postalcode" value="<?=  htmlentities( $_SESSION['inputsTab'][2] ) ?>">
                                        <i class="zmdi zmdi-calendar-note input-icon js-btn-calendar"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Email</label>
                                    <input class="input--style-4" type="email" name="email" value="<?=  htmlentities( $_SESSION['inputsTab'][3] ) ?>">
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Password</label>
                                    <input class="input--style-4" type="password" name="password"  value="<?=  htmlentities( $_SESSION['inputsTab'][4] ) ?>">
                                </div>
                            </div>
                        </div>
                        <div class="p-t-15">
                            <button class="btn btn--radius-2 btn--blue" type="submit">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    




    
<?php require "footer.php"?>