<?php
abstract class Repository
{
    private DataAccess $dao;
    public function __construct(DataAccess $dao) {
        $this->dao = $dao;
    }

    public function getAll(): array
    {
        return $this->dao->getData();
    }

    public function find(int $id): bool | object
    {
        $found = false;
        foreach($this->dao->getData() as $ob){
            if($ob->id === $id) return $ob;
        }
        return $found;
    }

    public function add(object $ob): bool
    {
        return $this->dao->add($ob);
    }

    public function remove(int $id): bool
    {
        $this->data = array_filter($this->dao->getData(), function ($book) use ($id){
            return $book->id !== $id;
        });
        return $this->dao->add($this->data);
    }
}
