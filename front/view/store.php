<?PHP

include "../controller/produitC.php";
include "../controller/categorie_c.php";


$produitC = new produitC();
$listeProduit = $produitC->afficherProduit();
$categorieC = new categorieC();
$listeCategorie = $categorieC->afficherCategorie();
$categorieC = new categorieC();

//code pagination

$con = mysqli_connect('localhost','root','','gestionoffre');
    if(!$con)
    {
        echo ' Please Check Your Connection ';
    }

    if(isset($_GET['page']))
    {
        $page = $_GET['page'];
    }
    else
    {
        $page = 1;
    }

    $num_per_page = 03;
    $start_from = ($page-1)*02;
    
    $query = "select * from produit limit $start_from,$num_per_page";
    $result = mysqli_query($con,$query);





?>


<!DOCTYPE html>
<html lang="en">

<head>
	
<link rel="stylesheet" href="http://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<link  rel="stylesheet" href="css/nouislider.min.css" >
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>store</title>
	<link type="text/css" rel="stylesheet" href="css/slick.css" />
    <link type="text/css" rel="stylesheet" href="css/slick-theme.css" />
	<link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
	<link href="css/style1.css" rel="stylesheet">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

	
<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>

<!------ Include the above in your HEAD tag ---------->

<link rel="stylesheet" href="https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css"  media="screen">
<script src="https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>
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
			<ul>
          
				<li><a href="index.html">Home</a></li>
				<li><a href="index.php">Offre et promo</a></li>
				<li><a href="store.php">Produits</a></li>
                <li><a href="etoile.php">Avis</a></li>

			</ul>
		</nav>
	</div>
	<a class="menu-close" onClick="return true">
		<div class="menu-icon">
			<div class="bar"></div>
			<div class="bar"></div>
		</div>
	</a>

	<div class="wrapper">
		<div class="d-md-flex align-items-md-center">
			<div class="h3">Bioté</div>
		</div>

		
		<div class="content py-md-0 py-3">
		<h5 class="card-header" style="display:flex; justify-content: space-between;">
		
		<form action="" method="GET">
                                    <div class="input-group mb-3">
                                        <input type="text" name="search" required value="" class="form-control" id="searchbar" placeholder="Search data" autocomplete="off">
                                        <button type="submit" class="btn btn-primary">Search</button>
                                    </div>
                                </form>
								 <select name="sort-by" id="sort"  style="width:auto !important;" >
									 <option></option>
									 <option>Prix décroissant</option>
									 <option>Prix croissant</option>
									 <option>Titre A->Z</option>
									 <option>Titre Z->A</option>
								 </select>
        </h5>
			<section id="sidebar">
				<div class="py-3">
					<h5 class="font-weight-bold">Categories</h5>
					<ul class="list-group"  id="filter" placeholder="filter" style="height:auto;">
					<option></option>	
					<?php foreach ($listeCategorie as $categorieC) : ?>
							<option></option>
							<li class="list-group-item list-group-item-action d-flex justify-content-between align-items-center category"> <?php echo $categorieC['nomCategorie']; ?>
								<span class="badge badge-primary badge-pill">328</span>
							</li>
							
						<?php endforeach; ?>
					</ul>
				</div>
				<div >
  

  <div data-role="main" class="ui-content">
    <form method="post" action="">
      <div data-role="rangeslider"id="price-slider" >
        <label for="price-min">Price:</label>
        <input type="range" name="price-min" id="price-min" value="200" min="0" max="1000">
        
      </div>
        
       
      </form>
  </div>
</div>
				<div class="py-3">
					<h5 class="font-weight-bold">Rating</h5>
					<form class="rating">
						<div class="form-inline d-flex align-items-center py-2"> <label class="tick"><span class="fas fa-star"></span> <span class="fas fa-star"></span> <span class="fas fa-star"></span> <span class="fas fa-star"></span> <span class="fas fa-star"></span> <input type="checkbox"> <span class="check"></span> </label> </div>
						<div class="form-inline d-flex align-items-center py-2"> <label class="tick"> <span class="fas fa-star"></span> <span class="fas fa-star"></span> <span class="fas fa-star"></span> <span class="fas fa-star"></span> <span class="far fa-star px-1 text-muted"></span> <input type="checkbox"> <span class="check"></span> </label> </div>
						<div class="form-inline d-flex align-items-center py-2"> <label class="tick"><span class="fas fa-star"></span> <span class="fas fa-star"></span> <span class="fas fa-star"></span> <span class="far fa-star px-1 text-muted"></span> <span class="far fa-star px-1 text-muted"></span> <input type="checkbox"> <span class="check"></span> </label> </div>
						<div class="form-inline d-flex align-items-center py-2"> <label class="tick"><span class="fas fa-star"></span> <span class="fas fa-star"></span> <span class="far fa-star px-1 text-muted"></span> <span class="far fa-star px-1 text-muted"></span> <span class="far fa-star px-1 text-muted"></span> <input type="checkbox"> <span class="check"></span> </label> </div>
						<div class="form-inline d-flex align-items-center py-2"> <label class="tick"> <span class="fas fa-star"></span> <span class="far fa-star px-1 text-muted"></span> <span class="far fa-star px-1 text-muted"></span> <span class="far fa-star px-1 text-muted"></span> <span class="far fa-star px-1 text-muted"></span> <input type="checkbox"> <span class="check"></span> </label> </div>
					</form>
				</div>

				<?php 
        
		$pr_query = "select * from produit ";
		$pr_result = mysqli_query($con,$pr_query);
		$total_record = mysqli_num_rows($pr_result );
		
		$total_page = ceil($total_record/$num_per_page);

		if($page>1)
		{
			echo "<a href='store.php?page=".($page-1)."' class='btn btn-danger'  >Previous</a>";
		}

		
		for($i=1;$i<$total_page;$i++)
		{
			echo "<a href='store.php?page=".$i."' class='btn btn-primary'  >$i</a>";
		}

		if($i>$page)
		{
			echo "<a href='store.php?page=".($page+1)."' class='btn btn-danger'>Next</a>";
		}

?>


			</section> <!-- Products Section -->
			<section id="products">
				<div class="container py-3">
					<div class="row"> 





					
                    
					<?php
					  $con2 = mysqli_connect("localhost","root","","gestionoffre");

					 
											

					 while($produit=mysqli_fetch_assoc($result))  {
						 
						
                    
                        ?>
						 
						 
                   
						<div class="col-lg-4 col-md-6 col-sm-10 offset-md-0 offset-sm-1 product " id="products-container" >
						
							<div class="card"><a href="productDt.phpp?<?php echo $produit['id'] ?>"data_role="popup" id="img" data-toggle="popover"  data-content="Some content inside the popover" data-position="window" >
									<img src="img/cour/<?php echo $produit['img'] ?>"  class="img_thumbnail" width="200"  >
									   </a>
									   <div class="card-body ">
								
									<h6 class="font-weight-bold pt-1 product-title"  ><?php echo $produit['libelle'] ?></h6>
									<div class="container">
                                    <a href="productDT.php"data_role="popup" id="img" data-toggle="popover" title="<?php echo $produit['description'] ?>" data-content="Some content inside the popover" data-position="window" >
									
									more   </a></div>
                                    <div class="d-flex align-items-center product-id"> <span class="fas fa-star"></span> <span class="fas fa-star"></span> <span class="fas fa-star"></span> <span class="fas fa-star"></span> <span class="far fa-star"></span> </div>
									<div class="d-flex align-items-center justify-content-between pt-3">
										<div class="d-flex flex-column">
											<div class="h6 font-weight-bold product-price "><?php echo $produit['prix'] ?></div>
										</div>
										<div class="btn btn-primary" style="background-color: #2A2A2A">Buy now</div>
									</div>
								</div>
							</div>
						</div>
					
						<?php
					 }
                                        
                                            ?>
                                               
                                           
											   
						
											   <script>
											   
											   

$('.cat-checkbox').change(function() {
	if ($(this).is(':checked'))
		cats.push($(this).data('cat'))
	else
		cats.pop($(this).data('cat'))
	filterCat();

})

function filterCat() {
	let products = $('.product');
	if (!cats.length)
		products.show();
	else {
		products.each(function() {
			let category = $(this).find('.product-category').text();
			(cats.includes(category)) ? $(this).show(): $(this).hide();
		})
	}
}

//prix
$(document).ready(function() {
	var priceSlider = document.getElementById('price-slider');
	priceSlider.noUiSlider.on('update', function(values, handle) {
		filterPrice(values);
	});
});

function filterPrice(prices) {
	let products = $('.product');
	products.each(function() {
		let price = parseInt($(this).find('.product-price').text());
		let price_min = parseInt(prices[0]);
		let price_max = parseInt(prices[1]);
		(price > price_min && price < price_max) ? $(this).show(): $(this).hide();
	});

}


//tri
$(document).ready(function() {
	var mylist = $('#products-container');

	var listitems = mylist.children('div').get();

	listitems.sort(function(a, b) {
		let price_a = $(a).find('.product-price').text();
		let price_b = $(b).find('.product-price').text();
		return parseInt(price_a) - parseInt(price_b);
	});

	// console.log(listitems);
	listitems.forEach(element => {
		mylist.append(element);
	});
});


$('#sort').change(function() {
	let products_content = $('#products-container');
	let products = $('.product');
	let sort = $(this).val();

	if (sort == "Prix décroissant") {
		products.sort(function(a, b) {
			let price_a = $(a).find('.product-price').text();
			let price_b = $(b).find('.product-price').text();
			return parseInt(price_b) - parseInt(price_a);
		})
		products.appendTo(products_content);
	} else if (sort == "Prix croissant") {
		products.sort(function(a, b) {
			let price_a = $(a).find('.product-price').text();
			let price_b = $(b).find('.product-price').text();
			return parseInt(price_a) - parseInt(price_b);
		})
		products.appendTo(products_content);

	} else if (sort == "Titre A->Z") {
		products.sort(function(a, b) {
			let title_a = $(a).find('.product-title').text();
			let title_b = $(b).find('.product-title').text();
			return title_a.localeCompare(title_b);
		})
		products.appendTo(products_content);
	} else if (sort == "Titre Z->A") {
		products.sort(function(a, b) {
			let title_a = $(a).find('.product-title').text();
			let title_b = $(b).find('.product-title').text();
			return title_b.localeCompare(title_a);
		})
		products.appendTo(products_content);
	}

})
$('#searchbar').keyup(function () {
let products = $('.product'); 
let keyword = $(this).val().toLowerCase(); 
if (keyword == "") 
products.show();
else { 
products.each(function () {
	let title = $(this).find('.product-title').text().toLowerCase();
	let id = $(this).find('.product-id').text().toLowerCase();
	(title.indexOf(keyword) >= 0 || id == keyword) ? $(this).show() : $(this).hide();
});
}
});

$(document).ready(function(){ 
    $('a').tooltip({
      classes:{
       "ui-tooltip":"highlight"
      },
      position:{ my:'left center', at:'right+50 center'},
      content:function(produit){
       $.post('fetch_data.php', {
        id:$(this).attr('id')
       }, function(data){
        result(data);
       });
      }
    });
});  

</script>				  



						

					</div>
				</div>
			</section>
		</div>
	</div>
	<script src="js/slick.min.js"></script>
	<script src="js/main.js"></script>
	<script src="js/nouislider.min.js"></script>
	<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
	<script src="productsController.js"></script>
</body>

</html>