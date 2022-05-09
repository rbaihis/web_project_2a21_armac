<?php
session_start();


 if( isset($_SESSION['account'])  ) 
{
	header("Location: ../../front/view/homepage.php"); 
} else{
	require("../../front/controller/usercontroller.php");
	UserC :: login();

	require("../../front/view/header_seif.php");
	require "../../front/view/nav_seif.php"; 
}

?>

<div class="limiter">
	<div class="container-login100">
			<div class="wrap-login100 p-l-50 p-r-50 p-t-77 p-b-30">
				<form class="login100-form validate-form"  method="post" >
					<span class="login100-form-title p-b-55">
					password successfully updated <br>
					</span>

	
					
<?php
//


if( isset($_SESSION['errormsg']) && ! isset($_POST['account'])  ) 
{
    echo('<p style="color:red;">'.$_SESSION['errormsg']."</p>\n");
    unset($_SESSION['errormsg']);
}else if (!isset($_SESSION['errormsg']) && ! isset($_POST['account'])){ 
	 //to initialise input field in error
	$_SESSION['inputsTab'] = ["",""];  
 }



?>			
					
					<p>
					You have successfully updated and restored your password.
					navigate to the login page, enter your email and your password 
					and enjoy our services .
				    </p>
					
			
					
					
					<div class="text-center w-full p-t-115">
						<span class="txt1">
							login now ?
						</span>
						
						<a class="txt1 bo1 hov1" href="../../front/view/login.php">
							LOGIN							
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>
	
	
	
<?php require "../../front/view/footer_seif.php"?>