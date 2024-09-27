<?php

class Livre
{

    private $id;
    private $ISBN;
    private $titre;

    private $datePub;

    public function __construct($ISBN, $titre, $datePub)
    {
        $this->id = time();
        $this->ISBN = $ISBN;
        $this->titre = $titre;
        $this->datePub = $datePub;
    }


    public function getDatePub()
    {
        return $this->datePub;
    }
    public function setDatePub($value)
    {
        $this->datePub = $value;
    }

    public function getId()
    {
        return $this->id;
    }


    public function getISBN()
    {
        return $this->ISBN;
    }
    public function setISBN($value)
    {
        $this->ISBN = $value;
    }

    public function getTitre()
    {
        return $this->titre;
    }
    public function setTitre($value)
    {
        $this->titre = $value;
    }
}
