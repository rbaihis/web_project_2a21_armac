<?php
session_start();


 if( isset($_SESSION['admin_on'])  ) 
{
	header("Location: ../../back/view_back/accounts.php"); 
} else{
	require("../controller_back/admincontroller.php");

	$adminC=new AdminController();

	if( isset($_POST['admin_id']) )
	$adminC->login( $_POST['admin_id'] , $_POST['admin_password'] );

	include "../../front/view/header.php" ;
	
	
}

?>

<div class="limiter">
	<div class="container-login100">
			<div class="wrap-login100 p-l-50 p-r-50 p-t-77 p-b-30">
				<form class="login100-form validate-form"  method="post" >
					<span class="login100-form-title p-b-55">
						Login <br>
					</span>

	
					
<?php
//


if( isset($_SESSION['aderror']) && ! isset($_POST['admin_id'])  ) 
{
    echo('<p style="color:red;">'.$_SESSION['aderror']."</p>\n");
    unset($_SESSION['aderror']);
}else if (!isset($_SESSION['errormsg']) && ! isset($_POST['admin_id'])){ 
	 //to initialise input field in error
	$_SESSION['inputsTab'] = ["",""];  
 }



?>			
					<div class="wrap-input100 validate-input m-b-16" data-validate = "Valid email is required: ex@abc.xyz">
						<input class="input100" type="text" name="admin_id" placeholder="Email" value="<?=  htmlentities( $_SESSION['inputsTab'][0] ) ?>">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<span class="lnr lnr-envelope"></span>
						</span>
					</div>
					
					<div class="wrap-input100 validate-input m-b-16" data-validate = "Password is required">
						<input class="input100" type="password" name="admin_password" placeholder="Password"  value="<?=  htmlentities( $_SESSION['inputsTab'][1] ) ?>" >
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<span class="lnr lnr-lock"></span>
						</span>
					</div>
					
					<div class="contact100-form-checkbox m-l-4">
						<input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
						<label class="label-checkbox100" for="ckb1">
							Show password
						</label>
					</div>
					
					<div class="container-login100-form-btn p-t-25">
						<input type="submit" class="login100-form-btn" name="submit" value="Login" >
						
						
					</div>
					
					<div class="text-center w-full p-t-115">
						<span class="txt1">
							Not a member?
						</span>
						
						<a class="txt1 bo1 hov1" href="../view/register.php">
							Sign up now							
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>
	
	



	
<?php 


require "../../front/view/footer.php";
//require "../view_back/Footer.php"


?>