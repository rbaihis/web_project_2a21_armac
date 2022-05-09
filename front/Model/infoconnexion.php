<?php
class InfoConnexion{
 
    public $id=1;
    public $logged_in;
    public $account_created;
    public $registred_accounts;
    public $last_login;


    //============================================================
    //============================================================

    static function update_status_after_login(){
        //update connection SQL TABLE 
        require_once "../../dbconfig.php";
        $pdo=getdbconnection();
        $pdo->query("UPDATE connexion SET logged_in=logged_in+1 , registred_accounts = (SELECT COUNT(user_id) FROM users)  , last_login= CURRENT_TIMESTAMP() ;");
        
    }
    
    //----------------------------------------------------------
    static function update_status_after_logout(){
        // update connection table for backend statistics decrement after logout
        require_once "../../dbconfig.php";
        $pdo=getdbconnection();
        $pdo->query("UPDATE connexion SET logged_in=logged_in-1 , registred_accounts = (SELECT COUNT(user_id) FROM users) ;");
        //end
    }
    //--------------------------------------------------------------
    static function update_status_after_account_created(){
        // update connection table for backend statistics decrement after logout
        require_once "../../dbconfig.php";
        $pdo=getdbconnection();
        $pdo->query("UPDATE connexion SET  registred_accounts = (SELECT COUNT(user_id) FROM users) , account_created = account_created+1 ;");
        //end

    }

    static function update_status_after_account_deleted_by_user(){
        // update connection table for backend statistics decrement after logout
        self::update_status_after_logout();
        //end

    }

    
    static function update_status_after_account_deleted_by_admin(){
        // update connection table for backend statistics decrement after logout
        require_once "../../dbconfig.php";
        $pdo=getdbconnection();
        $pdo->query("UPDATE connexion SET  registred_accounts = (SELECT COUNT(user_id) FROM users)  ;");
        //end
    }
  




//--------read data for statistics ------------------------------------------------------
static function getDataInJason_logged_in__account_created__registred_accounts__last_login(){

    require_once "../../dbconfig.php";
    $pdo=getdbconnection();
    $statment=$pdo->query("SELECT * from connexion where id =1");
    
    return json_encode($statment->fetch( PDO::FETCH_ASSOC ) );
}

}





?>


