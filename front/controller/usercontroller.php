<?php
    require "../model/user.php";


class UserC{

    //attributes
    


// --------------- LogIn ---------------------------------------------------------------------------
// ------------------------------------------------------------------------------------------------
    static function login(){
        if(session_status() !== PHP_SESSION_ACTIVE) {
            session_start();
        }

        require_once "../../dbconfig.php";
        
        
        if ( isset($_POST['account']) && isset($_POST['pw'])  )
        { 
            // sanitize and execute select query depends on row result 
            $statment = UserModel::verifylogin( $_POST['account'], $_POST['pw'] );
    
            

            if(  $statment->rowCount() === 1  )
            {   
                //unset when login successful " no error no display needed
                unset($_SESSION['inputsTab']);

                ///!  $_session['userdatatab'] is basically used fo Read and Update template to avoid unnecessary read from database
                $userdata=$statment->fetch( PDO::FETCH_ASSOC ); 
                $_SESSION['userdatatab']=$userdata;
                ///!


                

                unset($_SESSION['account']); //unset($_SESSION['account']); // Logout current user just in case 
                
                // passing value from _POST already verified safe 
                $_SESSION['account']= $_POST['account']; 

                
                
                // saving welcome message
                $_SESSION['successlogin']= "Welcome ".$userdata['name']." enjoy our services";
                
                //succeful log in redirect to the main application page after succesful 
                header('location: ../view/login.php' ); 
                
                return;
            }
            else{
                                    
                    $_SESSION['errormsg'] = 'Incorrrect password/email or bad input.';

                    //to show the old values user put in back at login fields
                    $_SESSION['inputsTab'] =[ $_POST['account'] , $_POST['pw'] ];
                    

                    //redirecting to the same link to avoid  refresh  _post behavior
                    header('location: ../view/login.php' ); 
                    return;  
                }     
        }
    }

//-------------------logout-------------------------------------------------------------------
//-------------------------------------------------------------------------------------------
    static function logout(){
        if(session_status() !== PHP_SESSION_ACTIVE) {
            session_start();
        }
    
        unset($_SESSION['account']); // this line of code is useless i know i just like to put it in session
        session_destroy();
        header("Location: ../view/homepage.php ");
    }

//-------------------create------------------------------------------------------------------
//-------------------------------------------------------------------------------------------
function createController(){

    if(session_status() !== PHP_SESSION_ACTIVE) {
        session_start();
    }


    //! $post_isset : test if all $_POST[] are set === true/false
    $post_isset=  isset( $_POST['name']) && isset( $_POST['address']) && isset( $_POST['postalcode'])
    && isset( $_POST['email']) && isset( $_POST['password']) ;

    //! $post_not_empty : test if all $_POST[] are !(emty) === true/false
    $post_not_empty= !( empty($_POST['name'])  || empty($_POST['address']) || empty($_POST['postalcode'])
    || empty($_POST['email']) || empty($_POST['password']) ) ;


    if( $post_isset ){

        $statment=NULL;

        if(  ! $post_not_empty )
        {
            $statment= "please fill up all fields";
            
        }else{
            // call database config file
            require_once "../../dbconfig.php";

            // statment if string (error returned) else => pdo->prepare() is  returned .
            $statment = UserModel::verifyCreateForm( $_POST['name'], $_POST['address'], $_POST['postalcode'], $_POST['email'], $_POST['password'] ,50,50,8,70,70 );

        }
        

        
        if( ( is_object($statment) ) )
        {
            //I/ succesfully sql insert

            //!1/ unset the error  session storage +
            unset($_SESSION['inputsTab']);
            
            //2/ email verification should be sent to user

            //3/ option to not open info_msg pages offline
            $_SESSION['info_msg']["create_msg"]=true;
            
            //4/ redirect to info page or login page
            header('Location: ../view/createdmsg.php');
            return;

        }else{
            //1/ get the error msg from statment 
            $msg=$statment;    
            //2/ store message in session with key different then the one used for log_in
            $_SESSION['errormsg']=$msg;

            //!3/ store input in session array when failed => reason display back on inputs
            $arrayInput= array(
                $_POST['name'], $_POST['address'], $_POST['postalcode'],
                $_POST['email'], $_POST['password'] );

            $_SESSION['inputsTab']= $arrayInput;
            //!

            

            //4/ redirect to same register page to show the error and put back the input entered in form fields
            header('Location: ../view/register.php'); 
            return; 
        }
        

     }


}


//-------------------READ------------------------------------------------------------------
//-------------------------------------------------------------------------------------------
//function readfromDb(){

    //! implimented in model:user i used it in update only user_data already registred in session when login or when update
    ///! =>no need to call read everytime better avoid unnecessary access to database everytime showing the same information .

//}



//-------------------UPDATE------------------------------------------------------------------
//-------------------------------------------------------------------------------------------
function updateController(){

    if(session_status() !== PHP_SESSION_ACTIVE) {
        session_start();
    }


    ///! $post_isset : test if all $_POST[] are set === true/false
    $post_isset=  isset( $_POST['name']) && isset( $_POST['address']) && isset( $_POST['postalcode'])
    && isset( $_POST['email']) && isset( $_POST['password']) ;


    ///! $post_not_empty : test if all $_POST[] are !(emty) === true/false
    $post_ok_not_all_empty= !( empty($_POST['name'])  || empty($_POST['email']) || empty($_POST['password']) ) ;


    if( $post_isset  ){

        $statment=NULL;

        if(  ! $post_ok_not_all_empty )
        {
            $statment= "please fill up at least all required fields";

            
        }else{

            //check if password is correct before calling database
            $pwd=UserModel::sanitizeinput($_POST['password']) ;
            if( $_SESSION['userdatatab']['password'] === $pwd ) {

                // call database config file
                require_once "../../dbconfig.php";
                
                // statment if string (error returned) else => pdo->prepare() is  returned .
                $statment = UserModel::verifyUpdateForm( $_POST['name'], $_POST['address'], $_POST['postalcode'], $_POST['email'], $_POST['password'] ,50,50,8,70,70 );
            }else{
                $statment = "wrong password entred try again with the correct password.";
            }

        }
        

        
        //I/ succesfully sql update
        if( ( is_object($statment) ) )
        {

            //!1/ update $_SESSION['userdatatab'] for read mode to be shown to user
            $statment=UserModel::readfromDb();
            $userdata=$statment->fetch( PDO::FETCH_ASSOC ); 
            $_SESSION['userdatatab']=$userdata;
            ///!
            
            //2/ show succes flash message
            $_SESSION['successmsg']="successfully updated";

            //3/ redirect to info page or login page
            header('Location: ../view/account.php');
            return;

        }else{
            //1/ get the error msg from statment 
            $msg=$statment;    
            //2/ store message in session with key different then the one used for log_in
            $_SESSION['errormsg']=$msg;


            //4/ redirect to same register page to show the error and put back the input entered in form fields
            header('Location: ../view/account.php'); 
            return; 
        }
        

     }



}




//-------------------DELETE------------------------------------------------------------------
//-------------------------------------------------------------------------------------------
    function deleteController(){

        $statment=NULL;

        if( isset($_POST["password"]) )
        {

            if( empty($_POST['password']) ){

                $statment=" please insert your current password" ;
            }
             else{


                    $pw=UserModel::sanitizeinput($_POST['password']);
                    if( $_SESSION['userdatatab']['password'] === $pw )
                    {
                        require("../../dbconfig.php");
                        $statment=UserModel:: deletefromDb();
                        
                        if( is_object($statment) && ($statment->rowCount() > 0) ){

                            $_SESSION['info_msg']['delete_msg']=true;
                            
                            header("Location: ../view/deletedmsg.php");
                            return;
                        }

                    }
                      else{
                        $statment=" wrong password entred ";
                      }



                    
                    

             }
            
             // in this stage we re sure that statment it can be string only 
            $_SESSION['errormsg']=$statment;
            header('Location: ../view/account.php'); 
            return; 




        }// no more code 



    }










// ******************************************************************************************************************
// ******************************************************************************************************************
// ******************************************************************************************************************
// ******************************************************************************************************************

}
        
?>



