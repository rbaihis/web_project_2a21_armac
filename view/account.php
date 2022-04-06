<?php
// add this to every page you create
// -------------------------------------
session_start();
 require "header.php";

 if( isset($_SESSION['account']) ) 
{
    require "navloggedin.php";  
} else{ 
	header("Location:  homepage.php"); 
}
// copy the last line as well " require "footer.php"; (e5er star )
// -------------------------------------
?>




<?php require "footer.php"?>