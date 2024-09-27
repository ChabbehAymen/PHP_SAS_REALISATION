<?php

        class Autheur{

            private $name;
            private $id;
            private $email;

            private $livres = [];

            public function __construct($name,$email,$livre){   
                $this->id = time(); 
                $this->name = $name;
                $this->email = $email;
                $this->livres = $livre;
            }
            public function getId() {return $this->id;}
            public function getName(){return $this->name;}
            public function setName($name){$this->name = $name;}
            public function getEmail(){return $this->email;}
            public function setEmail($email){$this->email = $email;}
            public function getLivres(){return $this->livres;}
            public function setLivres($Livres){$this->livres = $Livres;}


        }


















?>