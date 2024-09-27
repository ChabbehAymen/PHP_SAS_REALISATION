<?php
require_once(dirname(dirname(__FILE__)) . "/services/Service.php");

class ReadersController extends Controller
{
    public function __construct() {
        parent::__construct(new ReaderRepo(new ReaderDao()));
    }
}
