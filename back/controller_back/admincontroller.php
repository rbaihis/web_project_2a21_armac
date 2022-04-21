<?php
    require "../../back/model_back/adminseif.php";
    require "../../back/model_back/infoconnexion.php";

class AdminController{ 

    function update_Admin($admin_id, $admin_password){
        
        $important_empty= ( empty($admin_id) || empty($admin_password) ) ;
        
        $statmentfromselect = Admin::adminRead( $admin_id, $admin_password );

        $msg=NULL;
        
        //read return obj pdo->prepare only if select was successful
        if( ! $important_empty  ){
            
            if( is_object($statmentfromselect) ){
                
                $msg=  Admin::adminUpdate($admin_id, $admin_password);
                
                
            }else 
                $msg="wrong id or password or both";
            
        }else
            $msg="name and password must be filled .";


        // in this stage we re sure that statment it can be string only 
        $_SESSION['aderror']=$msg;
        header('Location: ../../back/view_back/accounts.php'); 
        return; 

           
    }


    //---------------------------------------------------------------------------------------------------------------

    function login($admin_id, $admin_password){

        $important_empty= ( empty($admin_id) || empty($admin_password) ) ;
        
        $statmentfromselect = Admin::adminRead( $admin_id, $admin_password );

        $msg=NULL;

        if( ! $important_empty  ){
            
            if( is_object($statmentfromselect) && $statmentfromselect->rowCount() > 0 ){


                $_SESSION['admindatatab']=$statmentfromselect->fetch(PDO::FETCH_ASSOC);
                $msg="success";
                $_SESSION['admin_on']=$admin_id;
                header("../../back/view_back/index.php");
                
            }else 
                $msg="wrong id or password or both";
            
        }else
            $msg="name and password must be filled .";


        // in this stage we re sure that statment it can be string only 
        $_SESSION['aderror']=$msg;
        header('Location: ../../back/view_back/loginadmin.php'); 
        return; 



    }


    //-------------------------------------------------------------------------
    static function logout_admin(){
        if(session_status() !== PHP_SESSION_ACTIVE) {
            session_start();
        }
    
        unset($_SESSION['admin_on']); // this line of code is useless i know i just like to put it in session
        session_destroy();
        header("Location: ../../back/view_back/loginadmin.php");
    }


    // =========user side functions==================================================================================
    // ===============================================================================================================
    // user_data on admin side functions dispaly delete and update_Admin

    function displayUsers(){

        $statment=Admin::select_all_users();
        
        return $statment;
    }

    //----------------------------------------------------

    function update_one_user_with_no_password($name, $address="" , $postalcode="" , $email){
              
        $msg=NULL;

        // didnt use this  
        $exist_empty= ( empty($name)  || empty($address) || empty($postalcode) || empty($email) ) ;

        //less restriction
        $important_empty= ( empty($name) || empty($email) ) ;

 
        // if isarray === 1 ==> data entred where legit 
        if( ! $important_empty  ){
 
               $msg= Admin::update_user_adminside($name, $address , $postalcode, $email);
               
 
        }else
               $msg= "name and password must be filled .";

        
        $_SESSION['aderror_update']=$msg;
        header('Location: ../../back/view_back/accounts.php'); 
        return; 
               
        
    }
    //------------------------------------------------------

    function delete_user_by_admin($email){

    $msg=Admin::delete_user_admin_side($email);

    if($msg==="account deleted ."){
        //start: update InfoConnexion table for backend admin use statistics  
        InfoConnexion::update_status_after_account_deleted_by_admin();
        //end
    }

    $_SESSION['aderror_delete']=$msg;
    header('Location: ../view_back/accounts.php'); 
    return; 

    }







}









?>