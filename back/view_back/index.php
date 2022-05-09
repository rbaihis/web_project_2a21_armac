<?php
session_start();


if (!isset($_SESSION['admin_on'])) {
    header("Location: ../../back/view_back/loginadmin.php");
} else {
    require "header_dashboard.php";
    require "nav_only.php";

?>
	
        <div id="chartContainer" style="position: relative;  top: 20px; left: 15px; height:300px; width:500px; max-height:300px ; max-width:500px "></div>
							
				
		
	



            
<script src="../../front/assets/js/canvasjs.min.js"></script>

<script>
    
//-----------------------------------------------------------------
function display_chart (accounts_deleted,registred_accounts,logged_in,last_login ) {
var chart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
	title:{
		text: "User Accounts ",
		horizontalAlign: "left"
		
	},
	data: [{
		type: "doughnut",
		startAngle: 60,
		//innerRadius: 60,
		indexLabelFontSize: 15,
		indexLabel: "{label} - #percent%",
		toolTipContent: "<b>{label}:</b> {y} (#percent%)",
		dataPoints: [
			{ y: logged_in, label: "last log_in @("+last_login+") TOTAL ACCOUNTS LOGGED NOW :" },
			{ y: registred_accounts, label: "Accounts in use" },
			{ y: accounts_deleted, label: "Accounts deleted" }
			
		]
	}]
});
chart.render();
}
//-----------------------------------------------


const xmlhttp = new XMLHttpRequest();
    xmlhttp.open("GET", "../../back/controller_back/json_exchange.php?x=infoconnexion");
    xmlhttp.send()

    setInterval(()=>{
    xmlhttp.open("GET", "../../back/controller_back/json_exchange.php?x=infoconnexion");
    xmlhttp.send()} ,30000 );

    xmlhttp.onload = function() {
       const myObj = JSON.parse(this.responseText);
	   logged_in_at= String(myObj.last_login);

       display_chart(  ( parseInt(myObj.account_created)-parseInt(myObj.registred_accounts) ), parseInt(myObj.registred_accounts), parseInt(myObj.logged_in), logged_in_at   );
    }

</script>


<?php

require "../../back/view_back/footer_dashboard.php";


}
?>