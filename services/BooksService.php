<?php
require_once(dirname(dirname(__FILE__)) . "/services/Service.php");

class BooksController extends Controller
{
    public function __construct() {
        parent::__construct(new BooksRepo(new BookDao()));
    }
}
