<?php 
session_start();

if( $_SESSION['info_msg']["create_msg"]===true )
{
    


    
?>


<html>
    <head></head>
    <body>
        <p>Thx for joining our family .</p>
        <h4>Congratulations!</h4> account created successfully *_* </h4>
        <h4> please <a href="../view/login.php" > login</a> </h4>
        
    </body>
    </html>
    

<?php 

 session_destroy();


}else{

    header('location: ../view/404.php');

}

?>