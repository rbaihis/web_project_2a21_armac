<?php

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