<?php
require_once(dirname(dirname(__FILE__)) . "/repository/BooksRepo.php");
require_once(dirname(dirname(__FILE__)) . "/dataAccess/BookDao.php");

class Controller
{
    private BooksRepo $repo;

    public function __construct(Repository $repo) {
        $this->repo = $repo;
    }
    /**
     * Gets all data from db
     * @return array
     */
    public function getAll(): array
    {
        return $this->repo->getAll();
    }
    /**
     * Create new entity object and insert it to db
     * @param object $object
     * @return bool
     */
    public function add(object $obj):bool
    {
        return $this->repo->add($obj);
    }
    /**
     * deletes the object form db by it's id
     * @param int $id
     * @return bool
     */
    public function remove(int $id):bool
    {
        return $this->repo->remove($id);
    }
    /**
     * Finds object in db by it's id
     * @param int $id
     * @return object
     */
    public function find(int $id): object
    {
        return $this->repo->find($id);
    }
}