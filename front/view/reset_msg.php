<?php
session_start();


 if( isset($_SESSION['account'])  ) 
{
	header("Location: ../../front/view/homepage.php"); 
} else{
	require("../../front/controller/usercontroller.php");
	

	require("../../front/view/header_seif.php");
	require "../../front/view/nav_seif.php"; 
}

?>

<div class="limiter">
	<div class="container-login100">
			<div class="wrap-login100 p-l-50 p-r-50 p-t-77 p-b-30">
				<form class="login100-form validate-form"  method="post" >
					<span class="login100-form-title p-b-55">
					Réinitialisez votre mot de passe <br>
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
					<h3>debug <?= $_SESSION['debug_result'] ?> </h3>
					<p>
					Nous vous envoyons les instructions pour réinitialiser votre mot de passe. Si vous ne recevez aucun message,
 					regardez dans votre dossier spam 
					ou assurez-vous que cette adresse e-mail est enregistrée sur notre application. 
					Si vous avez besoin d'aide, rendez-vous sur le Centre d'Aide pour les client.</p>
					
			
					
					
					<div class="text-center w-full p-t-115">
						<span class="txt1">
							back to home ?
						</span>
						
						<a class="txt1 bo1 hov1" href="../../front/view/homepage.php">
							Home							
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>
	
	
	
<?php require "../../front/view/footer_seif.php"?>