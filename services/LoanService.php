<?php
require_once(dirname(dirname(__FILE__)) . "/services/Service.php");
require_once(dirname(dirname(__FILE__)) . "/dataAccess/LoanDao.php");
class LoanService extends Service
{
    public function __construct() {
        parent::__construct(new LoanDao());
    }
}
