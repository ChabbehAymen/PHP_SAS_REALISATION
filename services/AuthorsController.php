<?php
require_once(dirname(dirname(__FILE__)) . "/controller/Controller.php");

class AuthorsController extends Controller
{
    public function __construct() {
        parent::__construct(new AuthorRepo(new AuthorDAO()));
    }
}
