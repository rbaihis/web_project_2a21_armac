<?php

require_once 'includeclasses/vendor/autoload.php';

function login_api_by_google(  & $google_client ){
    
    //Include Google Client Library for PHP autoload file
    require_once 'includeclasses/vendor/autoload.php';
    
    
    //Make object of Google API Client for call Google API
    $google_client = new Google_Client();

    //Set the OAuth 2.0 Client ID
    $google_client->setClientId('611398706568-m3mgqajl9tdqbs1motjs0ab08h6pk6mp.apps.googleusercontent.com');
    
    //Set the OAuth 2.0 Client Secret key
    $google_client->setClientSecret('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');
    
    //Set the OAuth 2.0 Redirect URI
    $google_client->setRedirectUri('https://localhost/biote/front/view/login.php');
    
    //
    $google_client->addScope('email');
    
    $google_client->addScope('profile');
    
    //start session on web page
    if(session_status() !== PHP_SESSION_ACTIVE) {
        session_start();
    }

}

function getdbconnection() {

    $servername='localhost';
    $username='root';
    $password="";
    $dbname='armac';

    try{
        $connec= new PDO("mysql:host=$servername;dbname=$dbname;", $username , $password);

        $connec->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        return $connec;

    }catch(PDOException $error)
    {
        // error message destinated for user
        echo "<h2>"."Internal error 0-0, please contact support "."</h2>";

        //putting error message in log for debug 
        error_log("configdb.php, SQL error=".$error->getMessage()  );
        return;
    }
}

?>