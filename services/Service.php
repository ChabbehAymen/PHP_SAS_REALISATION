<?php
require_once(dirname(dirname(__FILE__)) . "/dataAccess/DataAccess.php");

abstract class Service
{
    private DataAccess $dao;

    public function __construct(DataAccess $dao) {
        $this->dao = $dao;
    }
    /**
     * Gets all data from db
     * @return array
     */
    public function getAll(): array
    {
        return $this->dao->getData();
    }
    /**
     * Create new entity object and insert it to db
     * @param object $object
     * @return bool
     */
    public function add(object $obj):bool
    {
        return $this->dao->add($obj);
    }
    /**
     * deletes the object form db by it's id
     * @param string $title
     * @return bool
     */
    public function remove(string $title)
    {
        return $this->dao->delete($title);
    }
    public function update(array $data, string $prop): bool
    {
        return $this->dao->update($data, $this->formGetter($prop), $this->formSetter($prop));
    }
    /**
     * Finds object in db by it's title
     * @param string $title
     * @return object
     */
    public function find(string $title, string $prop): object | bool
    {
        $data = $this->getAll();
        $getter = $this->formGetter($prop);
        $found = false;
        foreach($data as $item)
        {
            if ($item->$getter() === $title) {
                $found = $item;
            }
        }
        return $found;
    }
    /**
     * Hellper function that forms the getter function name for whatever entitie;
     * @param string $prop
     * @return string
     */
    private function formGetter(string $prop): string
    {
        return 'get'.strtoupper(substr($prop, 0, 1)).substr($prop, 1, strlen($prop)-1);
    }
    /**
     * Hellper function that forms the setter function name for whatever entitie;
     * @param string $prop
     * @return string
     */
    private function formSetter(string $prop): string
    {
        return 'set'.strtoupper(substr($prop, 0, 1)).substr($prop, 1, strlen($prop)-1);
    }
}