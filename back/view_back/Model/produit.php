<?php
class panier{
    private ?int $ref = null;
    private ?string $nom = null;
    private ?string $type = null;
    private ?float $prix = null;
    private ?string $image = null;
    function __construct(int $ref,string $nom,string $type,float $prix,string $image)
    {
        $this->ref=$ref;
        $this->nom=$nom;
        $this->type=$type;
        $this->prix = $prix;
        $this->image = $image;
    }

   
}
?>