<?php
/**
 * contributers: CHABBEH Aymen - 2024/9/25
 */
/**
 * Entity class: data calss of a `Lecteur`
 */
class Lecteur
{
    private int $id;
    private string $name;
    private string $numeroCarte;
    private string $prenom;
    private string $address;
    private array $books;
    public function __construct(string $name, string $numeroCarte, string $prenom, string $address)
    {
        $this->name = $name;
        $this->numeroCarte = $numeroCarte;
        $this->prenom = $prenom;
        $this->address = $address;
    }
    

    /**
     * Get the value of id
     * 
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }
    /**
     * Get the value of name
     * 
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * Set the value of name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * Get the value of numeroCarte
     * 
     * @return string
     */
    public function getNumeroCarte(): string
    {
        return $this->numeroCarte;
    }

    /**
     * Set the value of numeroCarte
     */
    public function setNumeroCarte(string $numeroCarte): self
    {
        $this->numeroCarte = $numeroCarte;

        return $this;
    }

    /**
     * Get the value of prenom
     * 
     * @return string
     */
    public function getPrenom(): string
    {
        return $this->prenom;
    }

    /**
     * Set the value of prenom
     */
    public function setPrenom(string $prenom): void
    {
        $this->prenom = $prenom;
    }

    /**
     * Get the value of address
     * 
     * @return string
     */
    public function getAddress(): string
    {
        return $this->address;
    }

    /**
     * Set the value of address
     */
    public function setAddress(string $address): void
    {
        $this->address = $address;
    }

    /**
     * Get the value of books
     * 
     * @return array
     */
    public function getBooks(): array
    {
        return $this->books;
    }

    /**
     * pushs loaed book into an array of loaned books
     * 
     * @return void
     */
    public function pushLivre(Livre $livre): void
    {
        $this->books[] = $livre;
    }
}