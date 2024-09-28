<?PHP
class Loan
{
    private int $id;
    private string $startDate;
    private string $bookCheckDate;
    private string $retunDate;

    public function __construct(string $startDate, string $bookCheckDate, string $retunDate) {
        $this->id = time();
        $this->startDate = $startDate;
        $this->bookCheckDate = $bookCheckDate;
        $this->retunDate = $retunDate;
    }

    /**
     * Get the value of id
     */ 
    public function getId(): int
    {
        return $this->id;
    }
    /**
     * Get the value of startDate
     */ 
    public function getStartDate(): string
    {
        return $this->startDate;
    }
    /**
     * Set the value of startDate
     *
     */ 
    public function setStartDate($startDate): void
    {
        $this->startDate = $startDate;
    }
    /**
     * Get the value of bookCheckDate
     */ 
    public function getBookCheckDate(): string
    {
        return $this->bookCheckDate;
    }
    /**
     * Set the value of bookCheckDate
     */ 
    public function setBookCheckDate($bookCheckDate): void
    {
        $this->bookCheckDate = $bookCheckDate;
    }

    /**
     * Get the value of retunDate
     */ 
    public function getRetunDate(): string
    {
        return $this->retunDate;
    }

    /**
     * Set the value of retunDate
     *
     * @return  self
     */ 
    public function setRetunDate($retunDate): void
    {
        $this->retunDate = $retunDate;
    }
}
