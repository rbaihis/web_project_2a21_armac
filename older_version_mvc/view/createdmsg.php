<?php 
session_start();

if( $_SESSION['info_msg']["create_msg"]===true )
{
    


    
?>

<html>
    <head>

        <style>
 *{ transition: all 0.6s; } html { height: 100%; } body{ font-family: 'Lato', sans-serif;   color: #888;  margin: 0; } #main{ display: table; width: 100%; height: 100vh; text-align: center; }  .fof{ display: table-cell;	  vertical-align: middle; } .fof h1{ font-size: 50px; display: inline-block; padding-right: 12px; animation: type .5s alternate infinite;} @keyframes type{ from{box-shadow: inset -3px 0px 0px #888;} to{box-shadow: inset -3px 0px 0px transparent;}}
        </style>
    </head>
    <body>


    <div id="main">
    	<div class="fof">
        		<h1> ACCOUNT CREATE</h1>
                <h3>Congratulations!  we are glad to have you *_* </h3>
    	         <h4>please <a href="../view/login.php" > login</a> </h4>
        
    </body>
</html>

<?php 

 session_destroy();


}else{

    header('location: ../view/404.php');

}

?>