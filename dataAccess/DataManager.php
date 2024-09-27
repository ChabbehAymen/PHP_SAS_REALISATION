<?php
    require_once dirname( __FILE__ ) ."/../db/DataBase.php";
    
    class DataManager{
        private $data;
   
        public function __construct(){
            $this->data = new DataBase();
        }


        public function getLivres(){
            return  $this->data->livres;
        }

        public function setLivre($livres){
            $this->data->livres[] = $livres;
            $this->data->save();
        }

        public function getEmprunts(){
            return  $this->data->emprunt;
        }
        public function setEmprunt($emprunt){
            $this->data->emprunt[] = $emprunt;
            $this->data->save();
        }

        public function setLecteur($lecteur){
            $this->data->lecteurs[] = $lecteur;
            $this->data->save();
        }
        public function getLecteurs(){
            return $this->data->lecteurs;
        }
        public function setAutheur($autheur){
            $this->data->autheur[] = $autheur;
            $this->data->save();
        }
        public function getAutheurs(){
           return $this->data->autheur ;
        }
        public function save(){$this->data->save();}


    }
    

?>