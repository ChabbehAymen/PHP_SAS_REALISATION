<?php 
require_once dirname(dirname(__FILE__))."/dataAccess/DataAccess.php";
require_once dirname(dirname(__FILE__))."/entities/Loan.php";
class LoanDao extends DataAccess
{
    public function __construct() {
        parent::construct('loans');
    }
}
