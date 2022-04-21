<?php

class Sanitize{
       
        static function sanitizeinput($input){

            $input=trim($input);
            $input=stripslashes($input);
            $input=htmlspecialchars($input);
            return $input;
    
        }

        
        static function legitemail($email){

            // testing if email === sanitizes email => user is good /else bad user
            return filter_var($email, FILTER_VALIDATE_EMAIL) === $email;
    
        }

        
        static function sanitizelogin( $id,$password){
    
            $data[0] =  Sanitize:: sanitizeinput($id);
            $data[1] =  Sanitize:: sanitizeinput($password);
            return $data;
        }



       
        static function sanitizeform($name, $address, $postalcode, $email, $password, $len1=50, $len2=50, $len3=8, $len4=70, $len5=70){

            // testing if email === sanitized email -->if true ==> user is good /else bad user ( using invalid chars or not email format)
            $testemail= self::legitemail( $email );
 
            if( $testemail && (strlen($name) <= $len1) && (strlen($address) <= $len2) && (strlen($postalcode) <= $len3) && (strlen($email) <= $len4) && (strlen($password) <= $len5) ) {
                $data[0] =  Sanitize:: sanitizeinput($name);
                $data[1] =  Sanitize:: sanitizeinput($address);
                $data[2] =  Sanitize:: sanitizeinput($postalcode);
                $data[3] =  Sanitize:: sanitizeinput($email);
                $data[4] =  Sanitize:: sanitizeinput($password);

                return $data;
            }else{
                return false;
            }
        }

}



?>