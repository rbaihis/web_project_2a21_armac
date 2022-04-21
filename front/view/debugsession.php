<?php
// add this to every page you create
// -------------------------------------
session_start();
 require "header.php";

 if( isset($_SESSION['account']))
 require "navloggedin.php";
 else
 require "nav.php";

//  if( isset($_SESSION['account']) ) 
// {
//     require "navloggedin.php";  
// } else{ 
// 	header("Location:  homepage.php"); 
// }
// copy the last line as well " require "footer.php"; (e5er star )
// -------------------------------------



//! $_SESSION['account'] =>loged in session
echo ("<p style='color:red;'> \$_SESSION['account'] = \t ". $_SESSION['account']  ."</p>");
echo('<pre style="color:green;">');
var_dump(  $_SESSION['account']);
echo ("</pre>");


//! $_SESSION['userdatatab'] => used for showing data on read and update etc ...
echo ("<p style='color:red;'> \$_SESSION['userdatatab'] = \t ".  $_SESSION['userdatatab'][0]  ."</p>");
echo('<pre style="color:green;">');
var_dump(  $_SESSION['userdatatab'] );
echo ("</pre>");

//! $_SESSION['info_msg'] => create_msg || delete_msg || 404_msg 
echo ("<p style='color:red;'> \$_SESSION['info_msg'] = \t". $_SESSION['info_msg']."</p>");
echo('<pre style="color:green; ">');
var_dump(  $_SESSION['info_msg'] );
echo ("</pre>");

/*//!  $_SESSION['inputsTab'] =>for registration and login when error */
echo ("<p  style='color:red;'> \$_SESSION['inputstab'] = \t". $_SESSION['inputsTab']   ."</p>");
echo('<pre style="color:green;">');
var_dump( $_SESSION['inputsTab']  );
echo ("</pre>");


///! $_SESSION['successlogin'] => login success msg
echo ("<p style='color:red;'> \$_SESSION['successlogin'] = \t". $_SESSION['successlogin']  ."</p>");
echo('<pre style="color:green;">');
var_dump(  $_SESSION['successlogin']);
echo ("</pre>");


///! $_SESSION['deletemsg'] => msg when deleting account
echo ("<p style='color:red;'> \$_SESSION['successlogin'] = \t". $_SESSION['successlogin']  ."</p>");
echo('<pre style="color:green;">');
var_dump(  $_SESSION['successlogin']);
echo ("</pre>");



///! $_SESSION['successmsg'] => all success type msg
echo ("<p style='color:red;'> \$_SESSION['successmsg'] = \t". $_SESSION['successmsg']  ."</p>");
echo('<pre style="color:green;">');
var_dump(  $_SESSION['successmsg']);
echo ("</pre>");

///! $_SESSION['errormsg'] => all error type msg
echo ("<p style='color:red;'> \$_SESSION['errormsg'] = \t ". $_SESSION['errormsg']  ."</p>");
echo('<pre style="color:green;">');
var_dump( $_SESSION['errormsg'] );
echo ("</pre>");


 

?>


<?php require "footer.php"?>