<?php
    require_once (dirname(__FILE__) ."/../dataAccess/DataManager.php");
    class LivreServices{
        private $data;

        public function __construct() {
            $this->data = new DataManager();
        }

        public function getListLivres() {
            return $this->data->getLivres();}

        public function ajouterLivre( $livre ) {
            $this->data->setLivre( $livre );
        }
        // public function removeAutheur( $id ) {
        //    $autheur = $this->getListAutheurs();
        //     for( $i=0;$i<count($autheur) ; $i++ ) {
        //         if ( $autheur[$i]->id == $id ) {
        //             array_splice( $autheur,$i,1);
        //         }
        //     }    
        
        // }
    }


?>