<?php
require_once(dirname(dirname(__FILE__)) . "/services/Service.php");

class AuthorsService extends Service
{
    public function __construct() {
        parent::__construct(new AuthorRepo(new AuthorDAO()));
    }
}
