<html lang="en">
<head>
<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link href="css/style1.css" rel="stylesheet">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
      <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
      <link href="https://fonts.googleapis.com/css2?family=Mulish:wght@600;900&display=swap" rel="stylesheet">
      <style type="text/css">
         *{
         margin:0;
         padding: 0;
         box-sizing: border-box;
         }:root{
         --f:'Mulish', sans-serif;}
         body{
         background: #26306b;
         font-family: var(--f);
         }.q{
         position: absolute;top:50%;
         left: 50%;
         transform: translate(-50% , -50%);
         }.gestionoffre{
         width:0px;
         padding: 0px;
         border-radius: 0px;
         background: grey;margin-top:5px;
         }.like{margin-top:-230px;display: flex;align-items: center;}
         .like_icon{
         width:23px;
         width:25px;margin: 15px;
         }h3{
         font-weight: lighter;
         }
      </style>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
      <script type="text/javascript">
         $(document).ready(function() {
          $(".like").click(function() {
          	var id=$(this).attr("title");
          	var i=$(this).children(".like_icon").attr("src");
          	if(i=="heart.svg"){
          		$(this).children(".like_icon").attr("src","red_heart.svg");
          		$(this).children("span").text("liked");
          	}else if(i=="red_heart.svg"){
          		$(this).children(".like_icon").attr("src","heart.svg");
          		$(this).children("span").text("unliked");
          	}
          	$.post("get.php",{data:id,how:'c'});
          });
         });
      </script>
</head>
<body style="background-color: #FDF1F3;">

<div class="menu-outer">
		<div class="menu-icon">
			<div class="bar"></div>
			<div class="bar"></div>
			<div class="bar"></div>
		</div>
		<nav>
        <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
			<ul>
          
            <li><a href="../view/homepage.php">Home</a></li>
           <!-- moh cy -->
			<li><a href="index.php">Offre et promo</a></li>
			<li><a href="store.php">Produits</a></li>
            <li><a href="etoile.php">Avis</a></li>
            <!-- end moh cy  -->
           <li><a href="../view/blog.php">Offre et promo</a></li>
           <!-- med -->
           <li><a href="categ.php">Service</a></li>
           <li><a href="reservation.php">Reservaion</a></li>
           <!-- end med -->
			</ul>
		</nav>
	</div>
	<a class="menu-close" onClick="return true">
		<div class="menu-icon">
			<div class="bar"></div>
			<div class="bar"></div>
		</div>
	</a>

</div>
<!-- <div class="fixedcallicon">
	<i class="fa fa-phone"></i><span class="hide">Réserver - 00 123 000</span>
</div> -->
<?php require_once 'submit_rating.php'; ?> 
    <?php require_once '../controller/process.php'; ?> 
    <?php require_once '../controller/process3.php'; ?> 
    <?php
        $result = $con->query("SELECT id, itemName, price FROM dataoffre") ;
        $total=0;
      
        $_SESSION['user_id']=1;
    ?>
        <!-- cards -->
        <section class="p-2">
            <div class="container">
                
                <div class="row text-center d-flex justify-content-between">
                    
                <?php while ($row = $result->fetch(PDO::FETCH_ASSOC)): ?>
                        <div class="col">
                            <div class="card bg-dark text-light">
                                <div class="h1 m-3">
                                    <i class="bi bi-hexagon"></i>
                                </div>
                                <h3 class="card-title mb-3"><?php echo $row['itemName']; ?></h3>
                                <p class="card-text mx-5 mb-3">Price: <?php echo $row['price']; ?></p>
                                <a href="../controller/process.php?commande1=<?php echo $row['id']; ?>" name="submit" class="btn btn-primary mx-5 mb-3">Réserver</a>
                               
                                <?php        
                    echo "<div class='gestionoffre'>
                              <div class='like' >     
                                 <img class='like_icon' src='heart.svg'>
                                
                               </div>
                          </div>";?>
                           <?php  $post_id= $row['itemName']; ?>
                            </div>
                        </div>
                        
                        <?php endwhile; ?>
                        
                </div>
            </div>
        </section>
        <?php
        $commande = $con->query("SELECT * FROM commande") ;
    ?>
    <div class="container border border-danger border-2 rounded mt-4">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nom de l'offre</th>
                        <th scope="col">Price</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($rowc = $commande->fetch(PDO::FETCH_ASSOC)): ?>
                
                    <tr>
                        <td></td>
                        <td><?php echo $rowc['itemName']; ?></td>
                        <td><?php echo $rowc['price']; ?></td>
                        <td>
                            <a class="btn btn-danger" href="../controller/process.php?delete=<?php echo $rowc['id']; ?>">Delete</a>
                        </td>
                        <?php $total = $total + $rowc['price']; ?>
                    </tr>
                    <?php endwhile; ?>
                    <tr>
                        <td></td>
                        <td></td>
                        <td><p class="fw-bold">Total: <?php echo $total; ?></p></td>
                        <td></td>
                    </tr>
                </tbody>
            </table>
    </div>
    <div class="container mt-3 ">
        <div class="d-flex justify-content-end">  
            <div class="row align-items-center  px-3">
                <div class="col-auto">
                    <label class="form-label" for="">Coupon:</label>
                </div>
                <div class="col-auto">
                        <form action="../controller/process3.php" method="post">
                            <input name="couponInput" class="form-control" placeholder="Enter votre coupon" ></input>
                            
                        </div>
                    </div>
                    <button name="pass" class="btn btn-primary" >Passer au formulaire de paiement</button>

                 
                </form>
            </div>
        </div>

       

        <div class="container py-2 border border-warning border-5 rounded mt-3  white">
      
        
        <table class="table">
                <thead>
                    <tr>
                     
                        <th scope="col">Nom du l'offre</th>
                        <th scope="col">Prix</th>
                     
                        <th scope="col">Code Coupon</th>
                        <th scope="col">Prix remise</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $resultJ = $con->query("select dataoffre.id, dataoffre.itemName, dataoffre.price, dataoffre.idCoupon, datacoupon.codeCoupon,  datacoupon.priceDiscount from dataoffre INNER join datacoupon where dataoffre.idCoupon = datacoupon.id;");
                        while ($rowJ = $resultJ->fetch(PDO::FETCH_ASSOC)): ?>
                    <tr>
                   
                        <td><?php echo $rowJ['itemName']; ?></td>
                        <td><?php echo $rowJ['price']; ?></td>
                   
                        <td><?php echo $rowJ['codeCoupon']; ?></td>
                        <td><?php echo $rowJ['priceDiscount']; ?></td>
                    </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
            <br>
    </div>
    
    <br>
    <br>








        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <div class="clearfix"></div>
        
<footer class="footer">
<div class="container">
<div class="pull-left">&copy; Bioté centre crée par ARMAC.</div>
<div class="pull-right"> 
	<div class="footericons">
		<a href="#"><i class="fa fa-facebook"></i></a>
		<a href="#"><i class="fa fa-twitter"></i></a>
		<a href="#"><i class="fa fa-yelp"></i></a></a>
		<a href="#"><i class="fa fa-google-plus"></i></a>
	</div>
</div>
<div class="clearfix"></div>
</div>
</footer>	
<!-- Scripts -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

<script src="js/nicescroll.js"></script>
<script src="js/common.js"></script>
   
   
</body>
</html>