<?php

class reservation{

    private $idR;
    private $date;
    private $id;

    /**
     * @param $date
     * @param $id
     */
    public function __construct($date, $id)
    {
        $this->date = $date;
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getIdR()
    {
        return $this->idR;
    }

    /**
     * @param mixed $idR
     */
    public function setIdR($idR)
    {
        $this->idR = $idR;
    }

    /**
     * @return mixed
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param mixed $date
     */
    public function setDate($date)
    {
        $this->date = $date;
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


}

?>
