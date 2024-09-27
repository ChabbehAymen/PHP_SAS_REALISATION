<?php
require_once dirname(dirname(__FILE__))."/dataAccess/DataAccess.php";
require_once dirname(dirname(__FILE__))."/entities/Author.php";
class AuthorDao extends DataAccess
{
    function __construct() {
        parent::construct($this->db->authors);
    }
}