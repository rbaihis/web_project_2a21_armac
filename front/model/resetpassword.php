<?php
 
class Resetpassword{

    public $id;
    public $token;
    public $email;

    static function test_email_exist_in_table($emailTo){
        $pdo=getdbconnection();
        $already_exist=$pdo->prepare( "SELECT * FROM resetpassword WHERE email = :email ") ;
        $already_exist->execute(["email"=>$emailTo]);

        if( $already_exist ->rowCount() > 0)
            return true;
        else 
            return false;
    }

    static function test_token_exist_in_table($token_in_url){
        require_once("../../dbconfig.php");
        $pdo=getdbconnection();
        $already_exist=$pdo->prepare( "SELECT * FROM resetpassword WHERE token = :token ") ;
        $already_exist->execute(["token"=>$token_in_url]);

        if( $already_exist ->rowCount() > 0)
            return true;
        else 
            return false;
    }

    static function insert_in_resetpassword_token_and_email($token , $emailTo){
        $pdo=getdbconnection();
        $stat=$pdo->prepare("INSERT INTO resetpassword (token,email) VALUES( :token , :email)");
        $stat->execute( [ ":token"=>$token , ":email"=>$emailTo ] );

        if($stat->rowCount() > 0)
            return true;
        else 
            return false;
    }

    static function update_in_resetpassword_token_value($token , $emailTo){
        $pdo=getdbconnection();
        $stat=$pdo->prepare("UPDATE  resetpassword SET token= :token WHERE email=:email ;");
        $stat->execute( [ ":token"=>$token , ":email"=>$emailTo ] );

        if($stat->rowCount() > 0)
            return true;
        else 
             return false;
    }



    static function delete_row_via_email( $email ){
        $pdo=getdbconnection();
        $stat=$pdo->prepare("DELETE FROM resetpassword WHERE email = :email ;");
        $stat->execute( [ ":email"=>$email ] );

        if($stat->rowCount() > 0)
            return true;
        else 
             return false;

    }
    


}



?>