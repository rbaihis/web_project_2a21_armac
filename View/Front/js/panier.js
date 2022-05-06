function deleteProduct(id_produit,id_panier){
    $.get("http://localhost/View/Front/panier.php",{id_produit:id_produit,id_panier:id_panier},(res)=>{
        location.reload();
        return false;
    })
}