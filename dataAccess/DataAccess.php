<?php
require_once dirname(dirname(__FILE__)) . "/data/DataBase.php";

abstract class DataAccess
{
    protected string $table;
    private DataBase $db;

    function construct(string $table)
    {
        $this->db = new DataBase();
        $this->table = $table;
    }
    /**
     * return data [array of an entity objects]
     * @return array
     */
    public function getData(): array
    {
        return $this->db->{$this->table};
    }
    /**
     * push item to the database
     * and thene saves the changes to the file
     * @param object $data
     * @return bool
     */
    public function add(object $data): bool
    {
        array_push($this->db->{$this->table}, $data);
        return $this->db->save();
    }
    /**
     * update an oject data thene saves the changes
     * @param array $data
     * @param $data['key'] have the old value of property to search with(ex:title, name..)
     * @param $data['value'] have the new data to set
     * @return bool
     */
    public function update(array $data, string $getter, string $setter): bool
    {
        foreach($this->db->{$this->table} as $item)
        {
            if ($item->$getter() === $data['key'])
            {
                $item->$setter($data['value']); // set.Prope(data)
            }
        }
        return $this->db->save();
    }
    /**
     * deletes an object from the db
     * @return void
     */
    public function delete(string $title): bool
    {
        $this->db->{$this->table} = array_filter($this->db->{$this->table}, function ($item) use ($title) {
            return $item->getTitle() !== $title;
        });
        return $this->db->save();
    }
}
