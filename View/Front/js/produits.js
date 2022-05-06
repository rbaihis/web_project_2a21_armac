var curr_product;
var curr_panier;
function OpenProduct(i){
    var i = $('.product-image[item-data="'+i+'"] img');
    var lbi = $('.lightbox-blanket .product-image img');
    console.log($(i).attr("src"));
    $(lbi).attr("src", $(i).attr("src"));  
    $(".lightbox-blanket").toggle();
      
    $("#product-quantity-input").val("0");
    CalcPrice (0);
    
  }
  function GoBack(){
    $(".pop-up-container").toggle();
    $(".popup-overlay").toggle();
  }
  
  //Calculate new total when the quantity changes.
  function CalcPrice (qty){
    var price = $(".product-price").attr("price-data");
    var total = parseFloat((price * qty)).toFixed(2);
    $(".product-checkout-total-amount").text(total);
  }
  
  //Reduce quantity by 1 if clicked
  $(document).on("click", ".product-quantity-subtract", function(e){
    var value = $("#product-quantity-input").val();
    //console.log(value);
    var newValue = parseInt(value) - 1;
    if(newValue < 0) newValue=0;
    $("#product-quantity-input").val(newValue);
    CalcPrice(newValue);
  });
  
  //Increase quantity by 1 if clicked
  $(document).on("click", ".product-quantity-add", function(e){
    var value = $("#product-quantity-input").val();
    //console.log(value);
    var newValue = parseInt(value) + 1;
    $("#product-quantity-input").val(newValue);
    CalcPrice(newValue);
  });
  
  $(document).on("blur", "#product-quantity-input", function(e){
    var value = $("#product-quantity-input").val();
    //console.log(value);
    CalcPrice(value);
  });
  
  
  function AddToCart(e){
    e.preventDefault();

    var qty = $("#product-quantity-input").val();
    if(qty === '0'){return;}  
    var al = $("#ajouter-alert");

    setTimeout(function(){ 
      $(".pop-up-container").toggle();
      $(".popup-overlay").toggle();
    }, 100);

    $.post('http://localhost/View/Front/produits.php', {id_produit:curr_product, id_panier:curr_panier,quantite:qty},function(res){ 
      console.log(res)
    if(res!=="error"){
      setTimeout(function(){ 
          al.toggle();
        }, 700);
    
        setTimeout(function(){      
          al.toggle();
          
        }, 3000);
      } 
    });
  }

  function openPopUp(nom,prix,image,produit,panier){
    $(".pop-up-container .product-price").attr("price-data",prix);
    $(".pop-up-container #product-title").text(nom);
    $("#product-quantity-input").val(1);
    $(".pop-up-container .product-checkout-total-amount").text(prix);
    $(".pop-up-container .product-image img").attr("src","../Back/img/products/"+image)
    $(".pop-up-container").toggle();
    $(".popup-overlay").toggle();
    curr_product=produit;
    curr_panier=panier;
  }
  $(".pop-up-container").toggle();
  $(".popup-overlay").toggle();