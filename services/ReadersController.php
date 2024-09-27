<?php
require_once(dirname(dirname(__FILE__)) . "/controller/Controller.php");

class ReadersController extends Controller
{
    public function __construct() {
        parent::__construct(new ReaderRepo(new ReaderDao()));
    }
}
