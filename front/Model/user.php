<?php
require "../../front/model/sanitize.php";



class UserModel extends Sanitize{
       public $user_id;
       public $email;
       public $password;
       public $address;
       public $verified;
       

       static function verifylogin( $id,$pw){

              $pdo=getdbconnection();

              $loginInput= self::sanitizelogin($_POST['account'],$_POST['pw']); // return array [0]loginid [1]loginpw
              try{

                     $insertquery=" SELECT * FROM users WHERE email = :email AND password = :password " ;
                     
                     $statment = $pdo->prepare($insertquery);
                     $statment->execute( 
                            array( 
                                   ':email'=> $loginInput[0],
                                   ':password'=> $loginInput[1],
                                   ) 
                            );                      
                            return $statment;
              }catch(PDOException $error){

                     //putting error message in log for debug 
                     error_log("configdb.php, SQL error=".$error->getMessage()  );

                     //error while inserting :either  email not unique || wrong sql query  .
                     echo($error->getMessage() );
              }
       }

       //-----------------------------------------------------------------------------

       static function verifyCreateForm( $name,$address,$postalcode,$email,$password ,$len1=50,$len2=50,$len3=8,$len4=70,$len5=70 ){

              // => this return false or array with (all inputs sanitized)
              $createInput = self::sanitizeform( $_POST['name'], $_POST['address'], $_POST['postalcode'], $_POST['email'], $_POST['password'] );

              // if isarray === 1 ==> data entred where legit 
              if( is_array($createInput) ){

                     $pdo=getdbconnection();
                     
                     $createquery = " INSERT INTO users (name ,address, postalcode, email, password ,verified ) VALUES (:name, :address, :postalcode, :email, :password , '0' )  ";
                     $statment = $pdo->prepare($createquery);
                     
                     try{

                            $arrayPrepared = array( 
                                   // $createInput is the sanitized array we got after sanitizing.
                                   'name' => $createInput[0],
                                   'address' => $createInput[1],
                                   'postalcode' => $createInput[2],
                                   'email' => $createInput[3],
                                   'password' => $createInput[4] ) ;
                                   
                                   if ( $statment->execute( $arrayPrepared) ){
                                          //if insert successful return the statment
                                          return $statment;
                                   }

                     }catch(PDOException $error){
                         //putting error message in log for debug 
                         error_log("dbconfig.php, SQL error=".$error->getMessage()  );

                         //error while inserting :either  email not unique || wrong sql query  .
                         return $statment="email already exist";
                     }
              

              }else{ // if isarray == false  ==> returning error message about bad user input
                     return "bad input";
              }
              
       }
       //------------------------------------------------------------------------------------------------------------------------
       
       static function verifyUpdateForm( $name,$address,$postalcode,$email,$password ,$len1=50,$len2=50,$len3=8,$len4=70,$len5=70 ){

              // => this return false or array with (all inputs sanitized)
              $updateInput = self::sanitizeform( $_POST['name'], $_POST['address'], $_POST['postalcode'], $_POST['email'], $_POST['password'] );

              // if isarray === 1 ==> data entred where legit 
              if( is_array($updateInput) ){

                     $pdo=getdbconnection();
                     $updatequery = "UPDATE users SET name= :name, address= :address, postalcode= :postalcode, email= :email  WHERE user_id= ".$_SESSION['userdatatab']['user_id']." ;" ;
                     $statment = $pdo->prepare($updatequery);
                     
                     try{

                            $arrayPrepared = array( 
                                   // $createInput is the sanitized array we got after sanitizing.
                                   'name' => $updateInput[0],
                                   'address' => $updateInput[1],
                                   'postalcode' => $updateInput[2],
                                   'email' => $updateInput[3] ) ;
                                   
                                   if ( $statment->execute( $arrayPrepared) ){
                                          //if insert successful return the statment
                                          return $statment;
                                   }

                     }catch(PDOException $error){
                         //putting error message in log for debug 
                         error_log("dbconfig.php, SQL error=".$error->getMessage()  );

                         //error while inserting :either  email not unique || wrong sql query  .
                         return $statment=" internal error:(update) contact specialist ";
                     }
              

              }else{ // if isarray == false  ==> returning error message about bad user input
                     return "bad input";
              }
              
       }
       //------------------------------------------------------------------------------------------------------------------------
       
       static function readfromDb(){
              //! i never used for not reading from db everytime i check account
              $pdo=getdbconnection();   
              
              try{
                     $statment=$pdo->prepare( " SELECT * FROM users WHERE user_id =".$_SESSION['userdatatab']['user_id'] );
                     if( $statment->execute())
                            return $statment;
                     else
                            return "read failed.";


              }catch(PDOException $error){
                     //putting error message in log for debug 
                     error_log("dbconfig.php, SQL error=".$error->getMessage()  );

                     //error while inserting :either  email not unique || wrong sql query  .
                     return $statment=" internal error:(read) contact specialist ";
              }
       }
       //------------------------------------------------------------------------------------
         
       static function deletefromDb(){
              //! i never used for not reading from db everytime i check account
              $pdo=getdbconnection();   
              
              try{
                     
                     $statment=$pdo->prepare( " DELETE FROM users WHERE user_id =".$_SESSION['userdatatab']['user_id'] );
                     if( $statment->execute())
                            return $statment;
                     else
                            return "failed to delete, "."rowcount = ".$statment->rowcount();


              }catch(PDOException $error){
                     //putting error message in log for debug 
                     error_log("dbconfig.php, SQL error=".$error->getMessage()  );

                     //error while inserting :either  email not unique || wrong sql query  .
                     return $statment=" internal error:(delete) contact specialist ";
              }

        }



        

        static function test_email_exist_in_users_table_return_bool_or_string_if_crashed( $email){
              
              $pdo=getdbconnection();   
              
              try{
                     $statment=$pdo->prepare( " SELECT * FROM users WHERE email = :email" );
                     $statment->execute([":email"=>$email] );

                     if($statment->rowCount() )
                            return true;
                     else
                            return false;


              }catch(PDOException $error){
                     //putting error message in log for debug 
                     error_log("dbconfig.php, SQL error=".$error->getMessage()  );

                     //error while inserting :either  email not unique || wrong sql query  .
                     return $statment=" internal error:(read) contact specialist ";
              }
       }


       
       static function update_password( $password , $email ){
              
              
              $updateInput = self::sanitizeinput($password);
              
              $pdo=getdbconnection();
              $updatequery = "UPDATE users SET password= :password  WHERE email= :email ;" ;
              $statment = $pdo->prepare($updatequery);
              
              
              try{
                                    
                     $statment->execute( [":password" => $updateInput , ":email" => $email ] );
                     if( $statment->rowCount() > 0 )
                            return true;
                     else
                            return false;
                                                        
              }catch(PDOException $error){
                     
                     error_log("update_pasword, SQL error=".$error->getMessage()  );
                                   
                            
                     return $statment=" internal error:(update) contact specialist ";
              }
                            
                            
                            
                            
       }

       //--- --------------------------------------------------------------------------------------------------------------
       static function readfromDb_with_email($email){
                            
              
              $pdo=getdbconnection();   
              
              try{
                     $statment=$pdo->prepare( " SELECT * FROM users WHERE email = :email");
                      $statment->execute([":email"=>$email]);
                      if($statment->rowCount()>0)
                         return $statment;
                     else 
                         return false;
                     


              }catch(PDOException $error){
                     //putting error message in log for debug 
                     error_log("dbconfig.php, SQL error=".$error->getMessage()  );

                     //error while inserting :either  email not unique || wrong sql query  .
                     return false;
              }
       }



       static function google_create_account_or_login( $name,$email ){

              $pw=rand();
              $pw=md5($pw);
              $createInput = array($name,$email,$pw,1);

              $pdo=getdbconnection();
                     
              $createquery = " INSERT INTO users (name , email, password ,verified ) VALUES (:name,  :email, :password , :verified )  ";
                     $statment = $pdo->prepare($createquery);
                     
                     try{

                            $arrayPrepared = array( 
                                   // $createInput is the sanitized array we got after sanitizing.
                                   'name' => $createInput[0],
                                   'email' => $createInput[1],
                                   'password' => $createInput[2],
                                   'verified' => $createInput[3] ) ;
                                   
                                    $statment->execute( $arrayPrepared);
                                    
                                    // using this to get data back after creating account
                                    $statment=self::readfromDb_with_email($email);
                                    return $statment;
                                          

                     }catch(PDOException $error){
                         //putting error message in log for debug 
                         error_log("google_api_create_and_login, SQL error=".$error->getMessage()  );

                         //error while inserting :either  email not unique || wrong sql query  .
                         
                         
                         $statment=self::readfromDb_with_email($email);
                         return $statment;
                     }
              

              
              
       }
       //------------------------------------------------------------------------------------------------------------------------
       
                     
                     
                     
}
?>