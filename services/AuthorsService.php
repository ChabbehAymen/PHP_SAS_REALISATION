<?php
require_once(dirname(dirname(__FILE__)) . "/services/Service.php");
require_once(dirname(dirname(__FILE__)) . "/dataAccess/AuthorDAO.php");

class AuthorsService extends Service
{
    public function __construct() {
        parent::__construct(new AuthorDAO());
    }
}
