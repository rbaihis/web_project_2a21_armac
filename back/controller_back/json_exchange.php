<?php




if(isset($_GET['x'])){
    require_once "../../back/model_back/infoconnexion.php";
    if($_GET['x'] ==="infoconnexion")
         echo(InfoConnexion:: getDataInJason_logged_in__account_created__registred_accounts__last_login()); // data must be echoed for js to grap it when visit destination must differntiate between several json in case the page is a place for different jsons
}






?>