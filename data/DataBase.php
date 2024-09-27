<?php
/**
 *
 */
class DataBase
{
	private $books = [];
	private $authors = [];
	private $readers = [];
    private $filePath;

    public function __construct()
    {
        $this->filePath = dirname(__FILE__).'/../data/data.txt';
        $data = $this->fetch();
        if($data)
        {
        $this->books = $data->getData('books');
        $this->authors = $data->getData('authors');
        $this->readers = $data->getData('readers');
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
     * healper function that fillters the selected table
     * from the item that obtains that id
     * @param int $id
     * @param array $array
     * @return array
     */
    private function pop(int $id, array $array): array
    {
        return array_filter($array, function(object $item) use ($id){
            return $item->id !== $id;
        });
    }
    /**
     * Summary of getData
     * @param string $table
     * @return array
     */
    public function getData(string $table): Array
    {
        if($table === 'books') return $this->books;
        if($table === 'authors') return $this->authors;
        else return $this->readers;
    }
    /**
     * Summary of push
     * @param object $item
     * @param string $table
     * @return void
     */
    public function push(object $item, string $table): void 
    {
        if($table === 'books') array_push($this->books, $item);
        if($table === 'authors') array_push($this->authors, $item);
        if($table === 'readers') array_push($this->readers, $item);
    }
    public function delete(int $id, string $table): bool
    {
        if($table === 'books') $this->books = $this->pop($id, array: $this->books);
        if($table === 'authors') $this->books = $this->pop($id, $this->authors);
        if($table === 'readers') $this->books = $this->pop($id, $this->readers);
        return $this->save();
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