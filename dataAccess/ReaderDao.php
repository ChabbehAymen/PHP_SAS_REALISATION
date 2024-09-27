<?php
require_once dirname(dirname(__FILE__))."/dataAccess/DataAccess.php";
require_once dirname(dirname(__FILE__))."/entities/Reader.php";
class ReaderDao extends DataAccess
{
    function __construct() {
        parent::construct($this->db->readers);
    }
}