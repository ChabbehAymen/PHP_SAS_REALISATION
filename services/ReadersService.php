<?php
require_once(dirname(dirname(__FILE__)) . "/services/Service.php");

class ReadersService extends Service
{
    public function __construct() {
        parent::__construct(new ReaderRepo(new ReaderDao()));
    }
}
