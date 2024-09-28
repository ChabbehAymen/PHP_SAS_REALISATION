<?php
require_once('/home/aymen/Documents/CodeProjects/PHP_SAS_REALISATION/dataAccess/BookDao.php');
$dao = new BookDao();

$result = $dao->update(array('key'=>'Poor Dad Reach Dad', 'value'=>'12345678'), 'ISBN');


var_dump($result);
