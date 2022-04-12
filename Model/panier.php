<?php
class panier{
    private ?int $id = null;
    private ?int $idClient = null;
    private ?int $refProduit = null;
    private ?int $quantite = null;
    function __construct(int $idClient,int $refProduit,int $quantite)
    {
        
        $this->idClient=$idClient;
        $this->refProduit=$refProduit;
        $this->quantite=$quantite;
    }
    function getId(): int{
        return $this->id;
    }
    function getIdClient(): int{
        return $this->idClient;
    }
   
    function getRefProduit(): int{
        return $this->refProduit;
    }
    
    function getQuantite(): int{
        return $this->quantite;
    }
    function setIdClient(string $idClient): void{
        $this->idClient=$idClient;
    }
    
    function setRefProduit(string $refProduit): void{
        $this->refProduit=$refProduit;
    }
    function setQuantite(string $quantite): void{
        $this->quantite=$quantite;
    }
   
}
?>