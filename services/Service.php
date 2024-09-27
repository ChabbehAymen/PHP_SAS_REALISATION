<?php
require_once(dirname(dirname(__FILE__)) . "/dataAccess/DataAccess.php");

abstract class Service
{
    private DataAccess $DAO;

    public function __construct(DataAccess $DAO) {
        $this->DAO = $DAO;
    }
    /**
     * Gets all data from db
     * @return array
     */
    public function getAll(): array
    {
        return $this->DAO->getData();
    }
    /**
     * Create new entity object and insert it to db
     * @param object $object
     * @return bool
     */
    public function add(object $obj):bool
    {
        return $this->DAO->add($obj);
    }
    /**
     * deletes the object form db by it's id
     * @param int $id
     * @return bool
     */
    public function remove(int $id):bool
    {
        return $this->DAO->remove($id);
    }
    /**
     * Finds object in db by it's id
     * @param int $id
     * @return object
     */
    public function find(int $id): object
    {
        return $this->DAO->find($id);
    }
}