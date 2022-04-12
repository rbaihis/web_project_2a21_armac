<?php
class commande{
    private ?int $id = null;
    private ?string $date_cmd = null;
    private ?string $adresse = null;
    private ?float $prix = null;
    private ?int $idClient = null;
    function __construct(string $date_cmd,string $adresse,float $prix,int $idClient)
    {
        
        $this->date_cmd=$date_cmd;
        $this->adresse=$adresse;
        $this->prix=$prix;
        $this->idClient=$idClient;
    }
    function getId(): int{
        return $this->id;
    }
    function getDate_cmd(): string{
        return $this->date_cmd;
    }
   
    function getAdresse(): string{
        return $this->adresse;
    }
    
    function getPrix(): float{
        return $this->prix;
    }
    function getIdClient(): int{
        return $this->idClient;
    }
    function setDate_cmd(string $date_cmd): void{
        $this->date_cmd=$date_cmd;
    }
    
    function setAdresse(string $adresse): void{
        $this->adresse=$adresse;
    }
    function setPrix(float $prix): void{
        $this->prix=$prix;
    }
    function setIdClient(float $idClient): void{
        $this->idClient=$idClient;
    }
   
}
?>