<?php

class service
{   private $id;
    private $type;
    private $nom;
    private $prix;
    private $description;

    /**
     * @param $id
     * @param $type
     * @param $nom
     * @param $prix
     * @param $description
     */
    public function __construct($type, $nom, $prix, $description)
    {
        $this->type = $type;
        $this->nom = $nom;
        $this->prix = $prix;
        $this->description = $description;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @return mixed
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * @return mixed
     */
    public function getPrix()
    {
        return $this->prix;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

}


?>