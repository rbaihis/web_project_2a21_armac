<?php
session_start();

require("../../front/view/header_seif.php");


 if( isset($_POST['submit'])  ) 
{
	require("../../front/controller/usercontroller.php");
	UserC ::send_reset_email_with_url_to_existing_users($_POST['email_account']);	
}

?>

<div class="limiter">
	<div class="container-login100">
			<div class="wrap-login100 p-l-50 p-r-50 p-t-77 p-b-30">
				<form class="login100-form validate-form"  method="post" >
					<span class="login100-form-title p-b-55">
					Reset Password <br>
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
					<div class="wrap-input100 validate-input m-b-16" data-validate = "Valid email is required: ex@abc.xyz">
						<input class="input100" type="text" name="email_account" placeholder="Enter ur current email" >
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<span class="lnr lnr-envelope"></span>
						</span>
					</div>
					
					
			
					
					<div class="container-login100-form-btn p-t-25">
						<input type="submit" class="login100-form-btn" name="submit" value="rest_password" >
						
						
					</div>
					
					<div class="text-center w-full p-t-115">
						<span class="txt1">
							is it a mistake ?
						</span>
						
						<a class="txt1 bo1 hov1" href="../../front/view/login.php">
							Log in 							
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>
	
	
	
<?php require "../../front/view/footer_seif.php"?>