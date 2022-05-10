<?php
session_start();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../../PHPMailer/src/Exception.php';
require '../../PHPMailer/src/PHPMailer.php';
require '../../PHPMailer/src/SMTP.php';

include_once '../../Model/produit.php';
include_once '../..\Controller\panier.php';
include_once '../..\Controller\commande.php';
$panier = new paniers();
$commande = new commandes();

$current_panier = $panier->getCurrentPanier();

if( $_SERVER['REQUEST_METHOD']=="GET" && isset($_GET["id_produit"])){
    return $panier->supprimerDuPanier($_GET["id_produit"],$_GET["id_panier"]);
}else if( isset($_POST['filter']) )
{
    $listeP = $panier->afficherProduitsSorted($current_panier);
}else if (isset($_POST['keyword'])){
    $listeP = $panier->afficherProduitsSearch($current_panier);
}
else if( $_SERVER['REQUEST_METHOD']=="POST") {
    $listeP = $panier->afficherPanier($current_panier);
    $panier->confirmePanier($current_panier);
    $commande->confirmerCommande($current_panier);
    //Pdf
    $message = '';
    $output = '
    <h1 style="text-align:center;color:Green">Details De votre commande</h1>
    <table style="width:80%;font-size:18px;color:black">
        <tr style="color:blue">
            <td style="padding:10px">
                <h5 class="text-grey mt-1 mr-1 ml-5">Produit</h5>
            </td>
            <td style="padding:10px">
                <h5 >Quantité</h5> 
            </td style="padding:10px">
            <td style="padding:10px">
                <h5 >Prix</h5> 
            </td>
        </tr>
    ';
    $sum=0;
    foreach($listeP as $p)
    {
    $sum+=$p["prix"]*$p["quatite"];
     $output .= '
     <tr style="color:grey">
        <td style="padding:10px">
            <h5 class="font-weight-bold">'.$p["nom"].'</h5>
        </td>
        <td style="padding:10px">
            <h5 >'. $p["quatite"].'</h5>
        </td style="padding:10px">
        <td style="padding:10px">
            <h5 >'. $p["quatite"] * $p["prix"].'DT.</h5> 
        </td>
     </tr>';
    }
    $output .= '
    </table>
    <h2  style="margin-left:120px;font-size:21px;color:green">Totale : '. $sum .'DT</h2></div>
    ';


    try{
    include('pdf.php');
    $file_name = md5(rand()) . '.pdf';
    $html_code = '<link rel="stylesheet" href="pdfstyles.css">';
    $html_code .= $output;
    $pdf = new Pdf();
    $pdf->set_base_path("C:\xampp\htdocs\View\Front\pdfstyles.css");
    $pdf->load_html($html_code);
    $pdf->render();
    $file = $pdf->output();
    file_put_contents($file_name, $file);
    }catch(Error $e){
        die ($e);
    }


    try{


        $mail = new PHPMailer;
    
        $mail->IsSMTP();        //Sets Mailer to send message using SMTP
        $mail->Host = 'smtp.gmail.com';  //Sets the SMTP hosts of your Email hosting, this for Godaddy
        $mail->Port = '587';        //Sets the default SMTP server port
        $mail->SMTPAuth = true;       //Sets SMTP authentication. Utilizes the Username and Password variables
        $mail->Username = 'transportz.project@gmail.com';     //Sets SMTP username
        $mail->Password = 'yourpassword';     //Sets SMTP password
        $mail->SMTPSecure = '';       //Sets connection prefix. Options are "", "ssl" or "tls"
        $mail->From = 'Biote-center@gmail.com';   //Sets the From email address for the message
        $mail->FromName = 'Biote-center';   //Sets the From name of the message
        $mail->AddAddress($_POST["email"], 'Name');  //Adds a "To" address
        $mail->WordWrap = 50;       //Sets word wrapping on the body of the message to a given number of characters
        $mail->IsHTML(true);       //Sets message type to HTML    
        $mail->AddAttachment($file_name);         //Adds an attachment from a path on the filesystem
        $mail->Subject = 'Details de la commande';   //Sets the Subject of the message
        $mail->Body = 'Trouver les details de votre commande dans le fichier';    //An HTML or plain text message body
        if($mail->Send())        //Send an Email. Return true on success or false on error
        {
         $message = '<label class="text-success">Customer Details has been send successfully...</label>';
        }
        unlink($file_name);
    }catch(Error $e){
        die ($e);
    }
}else{
    $listeP = $panier->afficherPanier($current_panier);
}

?>





<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="">
<link rel="icon" href="#">
<title>Bioté center</title>
<!-- CSS -->
<link href="css/style.css" rel="stylesheet">
<link href="../../../assets/css/styleseif.css" rel="stylesheet"> 

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
<link href='https://fonts.googleapis.com/css?family=Great+Vibes' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Oswald:400,700,300' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Roboto+Condensed:400,400italic,300italic,300,700,700italic' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link href='css/produits.css' rel='stylesheet' type='text/css'>
<script src="https://www.paypal.com/sdk/js?client-id=test&currency=USD"></script>
</head>
<body style="background-color:#7777773d">
<div class="popup-overlay" onClick="GoBack()"></div>


<div id="loader-wrapper" class="d-none">
<div id="loader"></div>
<div class="loader-section section-left"></div>
<div class="loader-section section-right"></div>
</div>

<nav class="navbar navbar-light  mb-5">
  <form class="form-inline" method="post">
    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="keyword" value="<?php if(isset($_POST['keyword'])){ echo $_POST['keyword'];}else{echo "";} ?>"   >
    <button class="btn btn-danger my-2 my-sm-0" type="submit">Search</button>
  </form>
  <form style="margin-right:100px" method="post">
    <select class="form-select" aria-label="Default select example" name="filter" onchange="this.form.submit()" value="prix">
    <option value="ref">Filtrer avec</option>
    <option value="prix" <?php if(isset($_POST['filter'])){ if($_POST['filter'] == "prix") echo "selected";}?> >Prix</option>
    <option value="nom"  <?php if(isset($_POST['filter'])){ if($_POST['filter'] == "nom") echo "selected";}?> >Nom</option>
    <option value="type" <?php if(isset($_POST['filter'])){ if($_POST['filter'] == "type") echo "selected";}?> >Type</option>
    </select>
 </form>
</nav>







<?php  if( isset($_SESSION['account']) ) 
{  ?>

  <!-- == LOGIN & register == -->
<div class="fixedcalliconlogout" >
    <i class="fa fa-text"  style="color:rgba(255, 255, 255, 0.62)"> 
        <a  href="../../../../front/view/logout.php">
            <h3 style=" font-size: 18px;  margin: 15px 0px 0px 2px; ">
             <b>LogOut</b> 
            </h3>
        </a>
    </i>
</div>

<?php  } else{   ?>

   <!-- == LOGIN & register == -->
<div class="fixedcallicon">
<i class="fa fa-text"><a href="../../../view/login.php"><h3 style=" font-size: 20px;  margin: 15px 0px 0px 2px; "> <b> LogIn </b> </h3></a></i>
 <span class="hide"> <a href="../../../view/register.php" style=" font-size: 20px;  margin: 15px 0px 0px 2px; ">  <b> Register </b> </a></span>
</div>

<?php  }  ?> 

<div class="menu-outer">
    <div class="menu-icon">
        <div class="bar"></div>
        <div class="bar"></div>
        <div class="bar"></div>
    </div>
    
    <nav>
        <ul>



        <?php  if( isset($_SESSION['account']) ) 
{  ?>

<li><a href="../../homepage.php">Home</a></li>
<li><a href="../../account.php">account</a></li>
<li><a href="../../index.php">Offre et promo</a></li>
<li><a href="../../store.php">Produits</a></li>
<li><a href="../../etoile.php">Avis</a></li>
<li><a href="produits.php">Store</a></li>
<li><a href="panier.php">panier</a></li>
<li><a href="../../categ.php">Service</a></li>
<li><a href="../../reservation.php">Reservaion</a></li>
<li><a href="../../forum.php">Forum</a></li>

<?php   
} else{ 
?>
        <li><a href="../../homepage.php">Home</a></li> 
        <li><a href="../../index.php">Offre et promo</a></li>
				<li><a href="../../store.php">Produits</a></li>
        <li><a href="../../etoile.php">Avis</a></li>
        <li><a href="produits.php">Store</a></li>
        <li><a href="panier.php">panier</a></li>
        <li><a href="../../categ.php">Service</a></li>
        <li><a href="../../forum.php">Forum</a></li>
        
<?php   }  ?>

        
           <!-- <li><a href="index.html">Home</a></li>
		   <li><a href="produits.php">Produits</a></li>
           <li><a href="blog.php">Offre et promo</a></li>
		   <li><a href="panier.php">Panier</a></li> -->
        </ul>
   </nav>
</div>    
<a class="menu-close" onClick="true">
    <div class="menu-icon">
        <div class="bar"></div>
        <div class="bar"></div>
    </div>
</a>





<div class="m-5 alert alert-success" <?php if ($_SERVER['REQUEST_METHOD']=="POST" && !(isset($_POST['filter']) || isset($_POST['keyword']))){?>style="display:block"<?php }else{?>style="display:none"<?php }?>>Votre Commande est confirmée</div>
<div class="container mt-5 mb-5" <?php if ($_SERVER['REQUEST_METHOD']=="POST" && !(isset($_POST['filter']) || isset($_POST['keyword']))){?>style="display:none"<?php } ?>>
    <div class="d-flex  row">
        <div class="col-8">
            <div class="p-2">
                <h4  style="color:white">Panier</h4>
            </div>
            <div class="d-flex flex-row justify-content-between align-items-center p-2 bg-white mt-4 px-3 rounded">
                <div class="mr-1"><img class="rounded" src="" width="100"></div>
                <div class="d-flex flex-column align-items-center product-details"><span class="font-weight-bold ml-5">Produit</span>
                </div>
                <div class="d-flex flex-row align-items-center qty">
                    <h5 class="text-grey mt-1 mr-1 ml-5">Quantité</h5>
                </div>
                <div>
                    <h5 class="text-grey">Prix</h5> 
                </div>
                <div class="d-flex align-items-center"></div>
            </div>

            <?php $sum=0; foreach($listeP as $p){?>
            <div class="d-flex flex-row justify-content-between align-items-center p-2 bg-white mt-4 px-3 rounded">
                <div class="mr-1"><img class="rounded" src="../Back/img/products/<?php echo $p['image']?>" width="70"></div>
                <div class="d-flex flex-column align-items-center product-details"><span class="font-weight-bold"><?php echo $p["nom"] ?></span>
                </div>
                <div class="d-flex flex-row align-items-center qty">
                    <h5 class="text-grey mt-1 mr-1 ml-1"><?php echo $p["quatite"] ?></h5>
                </div>
                <div>
                    <h5 class="text-grey"><?php echo $p["quatite"] * $p["prix"];$sum+=$p["quatite"] * $p["prix"]?>DT</h5> 
                </div>
                <div class="d-flex align-items-center"><i type="submit" onclick="deleteProduct(<?php echo $p['ref'].','.$current_panier ?>)" class="fa fa-trash mb-1 text-danger"></i></div>
            </div>
            <?php } ?>
            <div  class="d-flex flex-row align-items-center mt-3 p-2 mb-5 bg-white rounded"><form class="row ml-5" method="post" <?php if (isset($_POST['keyword'])){?> style="display:none"<?php } ?>><input type="text" name="email" class="col" required placeholder="your email"></input><button class="btn btn-success col btn-block btn-lg ml-2 pay-button" type="submit" onclick="event.preventDefault();renderPaypal()" <?php if ($listeP==[]){?>disabled<?php } ?>>Confirmer La commande</button></form>
            <p <?php if (isset($_POST['keyword'])){?> style="display:none"<?php } ?>   class="badge badge-info" style="margin-left:120px;font-size:21px">Totale : <?php echo $sum ?>DT</p>
        </div>
        
        </div>
        <div  id="paypal-button-container" class="col-3" style="padding-top:200px"></div>
    </div>
</div>
<script>
        // Render the PayPal button into #paypal-button-container
		function renderPaypal(){
			paypal.Buttons({

// Set up the transaction
createOrder: function(data, actions) {
	return actions.order.create({
		purchase_units: [{
			amount: {
				value: <?php echo $sum ?>
			}
		}]
	});
},

// Finalize the transaction
onApprove: function(data, actions) {
	return actions.order.capture().then(function(orderData) {
		// Successful capture! For demo purposes:
		console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));
		var transaction = orderData.purchase_units[0].payments.captures[0];
		$.post("http://localhost/View/front/panier.php",(res)=>{
			alert("commande confirmée")
        	location.reload();
        	return false;
    	})
		// Replace the above to show a success message within this page, e.g.
		// const element = document.getElementById('paypal-button-container');
		// element.innerHTML = '';
		// element.innerHTML = '<h3>Thank you for your payment!</h3>';
		// Or go to another URL:  actions.redirect('thank_you.html');
	});
}


}).render('#paypal-button-container');
		}
        
    </script>
<!-- Scripts -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="js/common.js"></script>
<script src="js/home.js"></script>
<script src="js/testimonials.js"></script>
<script src="js/produits.js"></script>
<script src="js/panier.js"></script>
</body>
</html>