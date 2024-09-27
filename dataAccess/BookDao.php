<?php
require_once dirname(dirname(__FILE__))."/dataAccess/DataAccess.php";
require_once dirname(dirname(__FILE__))."/entities/Book.php";
class BookDao extends DataAccess
{
    function __construct() {
        parent::construct($this->db->books);
    }
}