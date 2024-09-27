<?php 
require_once dirname(dirname(__FILE__))."/data/DataBase.php";

abstract class DataAccess
{
    protected array $data;
    protected DataBase $db;
    private String $table;

    function construct(array $data) {
         $this->db = new DataBase();
         $this->data = $data;
    }
    /**
     * return data [array of an entity objects]
     * @return array
     */
    public function getData(): array
    {
        return $this->data;
    }
    /**
     * push item to the database 
     * and thene saves the changes to the file
     * @param object $data
     * @return bool
     */
    public function add(object $data): bool{
        array_push($this->data, $data);
        return $this->db->save();
    }
    /**
     * update an oject data thene saves the changes
     * @param object $data
     * @return bool
     */
    public function update(object $data): bool
    {}
    /**
     * deletes an object from the db
     * @return void
     */
    public function delete(): void
    {

    }
}
