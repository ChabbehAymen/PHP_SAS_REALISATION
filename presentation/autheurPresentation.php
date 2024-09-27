<?php

require_once dirname(__FILE__) . "/../bibliothequeServices/autheurServices.php";
require_once dirname(__FILE__) . "/../entities/Autheur.php";

class AutheurPresentation
{
  public function viewAutheurs()
  {
    echo "\nafficher list des autheurs\n";

    $autheurService = new AutheursServices();
    $autheurs = $autheurService->getListAutheurs();
    if (!empty($autheurs)) {
      foreach ($autheurs as $autheur) {
        echo "---------------------------------\n";
        echo "NOM: " . $autheur->getName() . "\n";
        echo "email: " . $autheur->getEmail() . "\n";
        echo "list des livres: \n";
        foreach ($autheur->getLivres() as $livre) {
          echo "              " . $livre . "\n";
        }


      }
    } else {
      echo "No autheurs available.\n";
    }
    echo "---------------------------------\n\n";
  }

  public function ajoutAutheur()
  {
    echo "\nAjouter nouveau autheur\n";
    $nom = askQuestion("Enter le nom de l'autheur (or type 'back' to go back): ");
    if (strtolower($nom) === "back") {
      return;
    }

    $email = askQuestion("Enter l'email de l'autheur (or type 'back' to go back): ");
    if (strtolower($email) === "back") {
      return;
    }
    $livres = askQuestion("Enter list de livres siparité avec (,) (or type 'back' to go back): ");
    if (strtolower($livres) === "back") {
      return;
    } else {
      $listLivres = explode(",", $livres);
    }

    $nouveauAuth = new Autheur($nom, $email, $listLivres);
    $AuthService = new AutheursServices();
    $AuthService->ajouteAutheur($nouveauAuth);
    echo "autheur ajouter avec success \n\n";
  }

  public function modifierAutheur()
  {
    echo "\nmodier un autheur\n";
    $nom = askQuestion("Enter le nom de l'autheur (or type 'back' to go back): ");
    if (strtolower($nom) === "back") {
      return;
    }
    $autheurService = new AutheursServices();
    $autheurs = $autheurService->getListAutheurs();
    foreach( $autheurs as $autheur ) {
      if( $autheur->getName() === $nom ) {
          $choix = askQuestion("modifier le : nom,email,livres (or type 'back' to go back): ");
          if (strtolower($choix) === "back") {
            return;
          }else{
            echo $autheurService->modifierAutheurs($choix)."\n\n";
          }
      }else{ echo "Il y a une erreur dans le nom de l'auteur ou il n'existe pas";}

      }
    
    }
  }



?>