<?php
class InfoConnexion{
 
    public $id=1;
    public $logged_in;
    public $account_created;
    public $registred_accounts;
    public $last_login;


    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of logged_in
     */ 
    public function getLogged_in()
    {
        return $this->logged_in;
    }

    /**
     * Set the value of logged_in
     *
     * @return  self
     */ 
    public function setLogged_in($logged_in)
    {
        $this->logged_in = $logged_in;

        return $this;
    }

    /**
     * Get the value of account_created
     */ 
    public function getAccount_created()
    {
        return $this->account_created;
    }

    /**
     * Set the value of account_created
     *
     * @return  self
     */ 
    public function setAccount_created($account_created)
    {
        $this->account_created = $account_created;

        return $this;
    }

    /**
     * Get the value of registred_accounts
     */ 
    public function getRegistred_accounts()
    {
        return $this->registred_accounts;
    }

    /**
     * Set the value of registred_accounts
     *
     * @return  self
     */ 
    public function setRegistred_accounts($registred_accounts)
    {
        $this->registred_accounts = $registred_accounts;

        return $this;
    }

    /**
     * Get the value of last_login
     */ 
    public function getLast_login()
    {
        return $this->last_login;
    }

    /**
     * Set the value of last_login
     *
     * @return  self
     */ 
    public function setLast_login($last_login)
    {
        $this->last_login = $last_login;

        return $this;
    }


    //============================================================
    //============================================================

    static function update_status_after_login(){
        //update connection SQL TABLE 
        require_once "../../dbconfig.php";
        $pdo=getdbconnection();
        $pdo->query("UPDATE connexion SET logged_in=logged_in+1 , registred_accounts = (SELECT COUNT(user_id) FROM users) , account_created = (SELECT MAX(user_id) from users ) , last_login= CURRENT_TIMESTAMP() ;");
        
    }
    
    //----------------------------------------------------------
    static function update_status_after_logout(){
        // update connection table for backend statistics decrement after logout
        require_once "../../dbconfig.php";
        $pdo=getdbconnection();
        $pdo->query("UPDATE connexion SET logged_in=logged_in-1 , registred_accounts = (SELECT COUNT(user_id) FROM users) , account_created = (SELECT MAX(user_id) from users ) ;");
        //end
    }
    //--------------------------------------------------------------
    static function update_status_after_account_created(){
        // update connection table for backend statistics decrement after logout
        require_once "../../dbconfig.php";
        $pdo=getdbconnection();
        $pdo->query("UPDATE connexion SET  registred_accounts = (SELECT COUNT(user_id) FROM users) , account_created = (SELECT MAX(user_id) from users ) ;");
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
        $pdo->query("UPDATE connexion SET  registred_accounts = (SELECT COUNT(user_id) FROM users) , account_created = (SELECT MAX(user_id) from users ) ;");
        //end
    }
  




}
?>