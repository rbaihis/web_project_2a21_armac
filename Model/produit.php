<?php
class produit{
    private ?int $ref = null;
    private ?string $nom = null;
    private ?string $type = null;
    private ?float $prix = null;
    private ?string $image = null;
    function __construct(string $nom,string $type,float $prix,string $image)
    {
        
        $this->nom=$nom;
        $this->type=$type;
        $this->prix=$prix;
        $this->image=$image;
        
    }
    function getRef(): int{
        return $this->ref;
    }
    function getNom(): string{
        return $this->nom;
    }
    function getImage(): string{
        return $this->image;
    }
    function getType(): string{
        return $this->type;
    }
    function getPrix(): float{
        return $this->prix;
    }
   
    function setNom(string $nom): void{
        $this->nom=$nom;
    }
    function setType(string $type): void{
        $this->type=$type;
    }
    function setPrix(float $prix): void{
        $this->prix=$prix;
    }
    
}
?>