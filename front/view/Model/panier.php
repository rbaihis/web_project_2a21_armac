<?php
class panier{

    private ?int $id = null;
    private ?int $idClient = null;
    private ?string $confirme = null;
    private ?int $ref = null;
    private ?string $nom = null;
    private ?string $type = null;
    private ?float $prix = null;
    private ?string $image = null;
    private ?int $id_panier = null;
    private ?int $id_produit = null;
    private ?int $quantite = null;
    function __construct(int $id,int $idClient,string $confirme,int $ref,string $nom,string $type,float $prix,string $image,int $id_panier,int $id_produit,int $quantite)
    {
        $this->id	=$id;
        $this->idClient	=$idClient;
        $this->confirme	=$confirme;
        $this->ref	=$ref;
        $this->nom	=$nom;
        $this->type	=$type;
        $this->prix	=$prix;
        $this->image	=$image;
        $this->id_panier	=$id_panier;
        $this->id_produit	=$id_produit;
        $this->quatite	=$quatite;
        
    }
   
}
?>