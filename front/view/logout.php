<?php 
session_start();


include('../../dbconfig.php');

//Reset OAuth access token

login_api_by_google($google_client);

$google_client->revokeToken();
include "../../front/controller/usercontroller.php";
UserC::logout();

if(isset($_SESSION['account']) ){

    include "../../front/controller/usercontroller.php";
    UserC::logout();
}
 else{
        header('Location: ../../front/view/homepage.php');
 }
?>