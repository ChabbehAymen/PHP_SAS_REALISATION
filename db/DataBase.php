<?php 
class DataBase {

    public $livres=[];
    public $autheur = [];
    
    public $lecteurs = [];

    public $emprunt = [];

    public function __construct() {
        if($this->getData()){
            $this->livres = $this->getData()->livres;
            $this->autheur = $this->getData()->autheur;
            $this->lecteurs = $this->getData()->lecteurs;
            $this->emprunt = $this->getData()->emprunt;
         }
}
    private function getData(){
        if(file_exists(dirname(__FILE__)."/db.txt")){
        $dataPath = file_get_contents( dirname(__FILE__)."/db.txt");
        $Data = unserialize($dataPath );
        return  $Data;
        }
    }
    
    private function setData(){
        $jsonData = serialize($this);
        file_put_contents(dirname(__FILE__)."/db.txt", $jsonData);
        
    }
   
    public function save(){
        $this->setData();
    }
    
}    



?>