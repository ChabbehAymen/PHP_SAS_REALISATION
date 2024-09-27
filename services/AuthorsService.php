<?php
require_once(dirname(dirname(__FILE__)) . "/services/Service.php");

class AuthorsController extends Controller
{
    public function __construct() {
        parent::__construct(new AuthorRepo(new AuthorDAO()));
    }
}
