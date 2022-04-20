<?php 
session_start();
if(isset($_SESSION['account']) ){

    include "../controller/usercontroller.php";
    UserC::logout();
}
 else{
        header('Location: ../../front/view/homepage.php');
 }
?>