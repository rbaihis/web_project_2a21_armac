<?php
session_start();


 if( isset($_SESSION['account'])  ) 
{
	header("Location: ../../front/view/homepage.php"); 
} else{
	require_once('../../dbconfig.php');
	require("../../front/controller/usercontroller.php");
	login_api_by_google($google_client);
	$login_button = '';
	$userc=new UserC();
	$userc->api_google_fetch_data_and_set_sessions( $google_client);
	UserC :: login();

	//This is for check user has login into system by using Google account, if User not login into system then it will execute if block of code and make code for display Login link for Login using Google account.
	if(!isset($_SESSION['access_token']))
	{
  		//Create a URL to obtain user authorization
  		$login_button = '<a align="center" href="'.$google_client->createAuthUrl().'"><img  src="../assets/img/icons/button_login.png" /></a>';
	}
	 else{
  		  $userc->google_api_auth($_SESSION['user_first_name'],$_SESSION['user_email_address'],);
	  }

	require("../../front/view/header.php");
	require "../../front/view/nav.php"; 
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
						<input class="input100" type="text" name="account" placeholder="Email" value="<?=  htmlentities( $_SESSION['inputsTab'][0] ) ?>">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<span class="lnr lnr-envelope"></span>
						</span>
					</div>
					
					<div class="wrap-input100 validate-input m-b-16" data-validate = "Password is required">
						<input class="input100" type="password" name="pw" placeholder="Password"  value="<?=  htmlentities( $_SESSION['inputsTab'][1] ) ?>" >
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<span class="lnr lnr-lock"></span>
						</span>
					</div>
					
					<div class="contact100-form-checkbox m-l-4">
						<label >
							<a href="../../front/view/forgetpassword.php">forget password ? </a>
						</label>
					</div>
					
					<div class="container-login100-form-btn p-t-25">
						<input type="submit" class="login100-form-btn" name="submit" value="Login" >	
					</div>

 					<br/>
				

					<?php
   if($login_button != '')
   {	echo"<br />";
      //echo"<h2 align='center'>PHP Login using Google Account</h2>";
      echo '<div class="container-login100-form-btn p-t-25">'.$login_button .'</div>';
   }?>
					
					<div class="text-center w-full p-t-115">
						<span class="txt1">
							Not a member?
						</span>
						
						<a class="txt1 bo1 hov1" href="../../front/view/register.php">
							Sign up now							
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>
	
	
	
<?php require "../../front/view/footer.php"?>