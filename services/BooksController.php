<?php
require_once(dirname(dirname(__FILE__)) . "/controller/Controller.php");

class BooksController extends Controller
{
    public function __construct() {
        parent::__construct(new BooksRepo(new BookDao()));
    }
}
