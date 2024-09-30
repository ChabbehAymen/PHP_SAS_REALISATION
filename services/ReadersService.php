<?php
require_once(dirname(dirname(__FILE__)) . "/services/Service.php");
require_once(dirname(dirname(__FILE__)) . "/services/LoanService.php");
require_once(dirname(dirname(__FILE__)) . "/services/BooksService.php");
require_once(dirname(dirname(__FILE__)) . "/dataAccess/ReaderDao.php");

class ReadersService extends Service
{
   private $books;
   private $loans;

    public function __construct() {
        parent::__construct(new ReaderDao());
        $this->books = new BookService();
        $this->loans = new LoanService();

    }

    public function bookList()
    {
     
            return $this->books->getAll();
    }
    public function loanList()
    {
     
            return $this->loans->getAll();
    }
}
