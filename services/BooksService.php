<?php
require_once(dirname(dirname(__FILE__)) . "/services/Service.php");
require_once(dirname(dirname(__FILE__)) . "/dataAccess/BookDAO.php");

class BookService extends Service
{
    public function __construct() {
        parent::__construct(new BookDao());
    }
}
