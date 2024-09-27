<?php 
class Book
{
    private int $id;
    private String $ISBN;
    private String $title;
    private String $pubDate;
    private Array $authors;
    private Reader $reader;


    public function __construct(String $ISBN, String $title, String $pubDate) {
        $this->id = Time();
        $this->ISBN = $ISBN;
        $this->title = $title;
        $this->pubDate = $pubDate;
    }

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  void
     */ 
    public function setId($id): Void
    {
        $this->id = $id;

    }

    /**
     * Get the value of ISBN
     */ 
    public function getISBN()
    {
        return $this->ISBN;
    }

    /**
     * Set the value of ISBN
     *
     * @return  void
     */ 
    public function setISBN($ISBN): Void
    {
        $this->ISBN = $ISBN;

    }

    /**
     * Get the value of title
     */ 
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set the value of title
     *
     * @return  void
     */ 
    public function setTitle($title): void
    {
        $this->title = $title;

    }

    /**
     * Get the value of pubDate
     * 
     * @return string
     */ 
    public function getPubDate(): string
    {
        return $this->pubDate;
    }

    /**
     * Set the value of pubDate
     *
     * @return  void
     */ 
    public function setPubDate($pubDate): void
    {
        $this->pubDate = $pubDate;

    }

    /**
     * Get the value of authors
     */ 
    public function getAuthors(): array
    {
        return $this->authors;
    }

    /**
     * Set the value of authors
     *
     * @return  void
     */ 
    public function setAuthors(array $authors): void
    {
        $this->authors = $authors;
    }

    /**
     * Get the value of readers
     */ 
    public function getReaders(): Reader
    {
        return $this->reader;
    }

    /**
     * Set the value of readers
     *
     * @return  void
     */ 
    public function setReaders(Reader $reader): void
    {
        $this->reader = $reader;
    }
}

	
