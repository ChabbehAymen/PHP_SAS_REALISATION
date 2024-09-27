<?php

class Author
{
    private int $id;
    private String $name;
    private String $lastName;
    private String $nationality;
    private Array $books;

    public function __construct(String $name, String $lastName, String $nationality){
        $this->id = Time();
        $this->name = $name;
        $this->lastName = $lastName;
        $this->nationality = $nationality;
    }

    public function getId(): int
    {
        return $this->id;
    }

    private function setId(): void
    {
        $this->id = random_int(1, 100);
    }

    public function getName(): String
    {
        return $this->name;
    }
    public function setName(String $name): void
    {
        $this->name = $name;
    }

    public function getLastName(): String
    {
        return $this->lastName;
    }
    public function setLastName(String $lastName): void
    {
        $this->lastName = $lastName;
    }

    public function getNationality(): String
    {
        return $this->nationality;
    }
    public function setNationality(String $nationality): void
    {
        $this->nationality = $nationality;
    }

    public function getBooks(): Array
    {
        return $this->books;
    }

    public function setBook(array $books): void
    {
        $this->books = $books;
    }

}
