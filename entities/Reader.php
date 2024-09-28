<?php
class Reader
{
    private int $id;
    private String $cardNumber;
    private String $name;
    private String $lastName;
    private String $address;
    private Array $books;

    public function __construct($cardNumber, $name, $lastName, $address) {
        $this->id = Time();
        $this->cardNumber = $cardNumber;
        $this->name = $name;
        $this->$lastName = $$lastName;
        $this->address = $address;
        $this->books = array();
    }


    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get the value of cardNumber
     */ 
    public function getCardNumber(): String
    {
        return $this->cardNumber;
    }

    /**
     * Set the value of cardNumber
     *
     * @return  void
     */ 
    public function setCardNumber($cardNumber): void
    {
        $this->cardNumber = $cardNumber;
    }

    /**
     * Get the value of name
     */ 
    public function getName():String
    {
        return $this->name;
    }

    /**
     * Set the value of name
     *
     * @return  void
     */ 
    public function setName($name): void
    {
        $this->name = $name;
    }

    /**
     * Get the value of lastName
     */ 
    public function getLastName():String
    {
        return $this->lastName;
    }

    /**
     * Set the value of lastName
     *
     * @return  void
     */ 
    public function setLastName($lastName): void
    {
        $this->lastName = $lastName;
    }

    /**
     * Get the value of address
     */ 
    public function getAddress(): String
    {
        return $this->address;
    }

    /**
     * Set the value of Address
     *
     * @return  void
     */ 
    public function setAddress($address): void
    {
        $this->address = $address;
    }

    /**
     * Get the value of books
     */ 
    public function getBooks(): array
    {
        return $this->books;
    }

    /**
     * Set the value of books
     *
     * @return  void
     */ 
    public function addBook(Book $book): void
    {
        $this->books[] = $book;
    }
}
