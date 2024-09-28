<?php
/**
 *
 */
class DataBase
{
	public array $books = [];
	public array $authors = [];
	public array $readers = [];
	public array $loans = [];
    private $filePath;

    public function __construct()
    {
        $this->filePath = dirname(__FILE__).'/../data/data.txt';
        $data = $this->fetch();
        if($data)
        {
        $this->books = $data->books;
        $this->authors = $data->authors;
        $this->readers = $data->readers;
    }
    }
    /**
     * gets the data from the db file
     * @return mixed
     */
    private function fetch()
    {
        return unserialize(file_get_contents($this->filePath));
    }
    /**
     * save data into the db file
     * @return bool
     */
    private function setData(): bool 
    {
        return file_put_contents($this->filePath, serialize($this));
    }
    /**
     * save changes into file
     * @return bool
     */
    public function save(): bool
    {
        return $this->setData();
    }
}