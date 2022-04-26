<?php
require "../../front/model/user.php";
require "../../dbconfig.php";

class Admin extends UserModel {
       public $admin_id;
       public $admin_password;

      
       
       
       static function select_all_users(){
              $pdo=getdbconnection();
              $updatequery = "SELECT * FROM users ;";
              $statment = $pdo->prepare($updatequery);
              $statment->execute();
              return $statment;
       }

       //------------------------------------------------------------------------------------------------------------------------
       static function update_user_adminside($name, $address="" , $postalcode="" , $email){ 

              $pdo=getdbconnection();

              $updatequery = "UPDATE users SET name= :name, address= :address, postalcode= :postalcode, email= :email  WHERE email= ".parent::sanitizeinput($_POST['email'])." ;";
              $statment = $pdo->prepare($updatequery);
              
              $updateInput=[ parent::sanitizeinput( $name) , parent::sanitizeinput( $address ) , parent::sanitizeinput( $postalcode) , parent::sanitizeinput( $email) ] ;

                            try{
       
                                   $arrayPrepared = array( 
                                          // $createInput is the sanitized array we got after sanitizing.
                                          'name' => $updateInput[0],
                                          'address' => $updateInput[1],
                                          'postalcode' => $updateInput[2],
                                          'email' => $updateInput[3] ) ;
                                          
                                          if ( $statment->execute( $arrayPrepared) ){

                                                 if($statment->rowCount() > 0)
                                                        return "successfully updated";
                                                        else
                                                        return "failed updating";
                                                        
                                          }
                                          
                            }catch(PDOException $error){
                                //putting error message in log for debug 
                                error_log("configdb.php, SQL error=".$error->getMessage()  );
       
                                //error while inserting :either  email not unique || wrong sql query  .
                                return " internal error:(update) contact specialist ";
                            }

        }


       



       function delete_user_admin_side($email_or_user_id){

              $pdo=getdbconnection(); 

              try{
                     //flexibility   
                     if(  parent::legitemail($email_or_user_id)   )
                            $statment=$pdo->prepare( " DELETE FROM users WHERE email = ".$email_or_user_id );
                     else
                            $statment=$pdo->prepare( " DELETE FROM users WHERE user_id = ".$email_or_user_id );


                     if( $statment->execute()){

                            if($statment->rowcount() > 0 )
                                   return "account deleted";
                            else
                                   return "failed to delete account ";
                     }


                 }catch(PDOException $error){
                     //putting error message in log for debug 
                     error_log("configdb.php, SQL error=".$error->getMessage()  );

                     //error while inserting :either  email not unique || wrong sql query  .
                     return $statment=" internal error:(delete) contact specialist ";
                 }


       }


       //----------------------------------------------------------------------------------------------------
       //----------------------------------------------------------------------------------------------------
       //-----------Admin_functions--------------------------------------------------------------------------




       static function adminRead($admin_id,$admin_password=""){

              //! i never used for not reading from db everytime i check account
              $pdo=getdbconnection();   

              $input=NULL;
              if( $admin_password === "" ){

                     $statment=$pdo->prepare( " SELECT * FROM admin WHERE admin_id = :admin_id" );
                     $input= array( 'admin_id' => parent::sanitizeinput($admin_id)  );

              }else{
                      
                     $statment=$pdo->prepare( " SELECT * FROM admin WHERE admin_id = :admin_id AND admin_password= :admin_password" );
                     $input= array( 'admin_id' => parent::sanitizeinput($admin_id) , 'admin_password' => parent::sanitizeinput($admin_password)  );
              }
              
              try{

                     if( $statment->execute( $input ) )    
                            return $statment;
                     else
                            return "wrong id/or/password";
                     


              }catch(PDOException $error){
                     //putting error message in log for debug 
                     error_log("configdb.php, SQL error=".$error->getMessage()  );

                     //error while inserting :either  email not unique || wrong sql query  .
                     return $statment=" internal error:(read) contact specialist ";
              }

       }

       //---------------------------------------------------------------------

       static function adminUpdate($admin_id, $admin_password){

              $pdo=getdbconnection();


              $updatequery = "UPDATE admin SET admin_id= :admin_id, admin_password= :admin_password  WHERE admin_id= :admin_id ";
              $statment = $pdo->prepare($updatequery);
              
              $updateInput=[ parent::sanitizeinput( $admin_id) , parent::sanitizeinput( $admin_password ) , parent::sanitizeinput( $admin_id) ] ;
              
              try{
                     
                     // $createInput is the sanitized array we got after sanitizing.
                     $arrayPrepared = array( 
                     'admin_id' => $updateInput[0],
                     'admin_password' => $updateInput[1],
                     'admin_id' => $updateInput[2]  ) ;
                     
                     if ( $statment->execute( $arrayPrepared) ){
                            
                            if($statment->rowCount() > 0)
                            return "success";
                            else
                            return "failed updating";
                            
                     }else
                            return "last step update error query .";
                     
              }catch(PDOException $error){
                     //putting error message in log for debug 
                     error_log("configdb.php, SQL error=".$error->getMessage()  );
                     
                     //error while inserting :either  email not unique || wrong sql query  .
                     return " internal error:(update) contact specialist ";
              }
              
       }


       //---------------------------------------------------------------------

       






              

       
}
?>