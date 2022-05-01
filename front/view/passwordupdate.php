<?php
session_start();
require_once ("../../front/controller/usercontroller.php");
$user=new UserC();

if(isset($_GET["token"]) && isset($_GET["email"]) ){

	$email=$_SESSION["email_pass"]=$_GET["email"];
	$token=$_SESSION["token_pass"]=$_GET["token"];

	echo($_SESSION["email_pass"]);
	echo($token=$_SESSION["token_pass"]);
	
	$user->verify_token_exist_set_flag_for_update_redirect_to_password_update_page($token,$email);
}
else{

	echo ($email=$_SESSION['email_pass']);
	echo($token=$_SESSION["token_pass"]);
	
	
	$condit= isset($_SESSION["update_password"]["good_to_go"])  && ($_SESSION["update_password"]["good_to_go"] ===true) ;
	
	 if( $condit!==true ){
			header("Location: ../../front/view/homepage.php"); 
	   } 
	    else{

			if(isset($_POST["submit"])){
				$user->allow_update_password( $_POST["pw1"], $_POST["pw2"], $email);
			}
		
			require("../../front/view/header.php");
			require "../../front/view/nav.php"; 
	    }


	
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
					<div class="wrap-input100 validate-input m-b-16" data-validate = "Password is required">
						<input id="pw1" class="input100" type="password" name="pw1" placeholder="New Password"   >
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<span class="lnr lnr-lock"></span>
						</span>
						<p id="vaidateinput" ></p>
					</div>
					
					<div class="wrap-input100 validate-input m-b-16" data-validate = "Password is required">
						<input id="pw2" class="input100" type="password" name="pw2" placeholder="verify Password"   >
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<span class="lnr lnr-lock"></span>
						</span>
						<p id="vaidatepw" ></p>
					</div>
					
					
					
					<div class="container-login100-form-btn p-t-25">
						<input type="submit" class="login100-form-btn" name="submit" value="Set new password" >
							
					</div>
					
					<div class="text-center w-full p-t-115">
						<span class="txt1">
							back to home?
						</span>
						
						<a class="txt1 bo1 hov1" href="../../front/view/homepage.php">
							HOME							
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>
	
	
	
<?php require "../../front/view/footer.php"?>