<?php 
session_start();

if( $_SESSION['info_msg']["delete_msg"]===true  )
{
   

    
?>

<html>
    <head></head>
    <body>
        
        <p> feel free to  join our family anytime  .</p>
        <h4>Congratulations!</h4> <h3>account deleted successfully -_-' </h3>
        <h4> please <a href="../view/homepage.php" > Home_page</a> </h4>
        
    </body>
</html>

<?php 



session_destroy();


}else{

    header('location: ../view/404.php');

}

?>