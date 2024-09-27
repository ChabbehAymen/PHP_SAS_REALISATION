<?php
    require_once dirname( __FILE__ ) ."/../dataAccess/DataManager.php";
    class AutheursServices {


        private $data;

        public function __construct() {
            $this->data = new DataManager();
        }

        public function getListAutheurs() {
            return $this->data->getAutheurs();}

        public function ajouteAutheur( $autheurs ) {
            $this->data->setAutheur( $autheurs );
           
        }
        public function modifierAutheurs($choix ) {
            $autheurs = $this->data->getAutheurs();
            for ($i = 0; $i < count($autheurs); $i++) {
                if ($choix == "nom") {
                  $valeur = askQuestion("nouveau valeur (or type 'back' to go back): ");
                  if (strtolower($valeur) === "back") {
                    return;
                  }
                 $autheurs[$i]->setName($valeur);
                 $message = "le nom changer avec succes !! ";
                } else if ($choix == "email") {
                  $valeur = askQuestion("nouveau valeur (or type 'back' to go back): ");
                  if (strtolower($valeur) === "back") {
                    return;
                  }
                 $autheurs[$i]->setEmail($valeur);
                 $message = "email changer avec succes !! ";
                } else if ($choix == "livres") {
                  $valeur = askQuestion("nouveau valeur (or type 'back' to go back): ");
                  if (strtolower($valeur) === "back") {
                    return;
                  }
                  $listLivres = explode(",", $valeur);
                 $autheurs[$i]->setLivres($listLivres);
                 $message = "email changer avec succes !! ";
                } else {
                    $message = "votre choix n est pas correct";
                   
                }
            }

            $this->data->save(); 
            echo $message;
        }
    
    //     public function removeAutheur( $id ) {
    //        $autheur = $this->getListAutheurs();
    //         for( $i=0;$i<count($autheur) ; $i++ ) {
    //             if ( $autheur[$i]->id == $id ) {
    //                 array_splice( $autheur,$i,1);
    //             }
    //         }    
        
    //     }

    }









?>