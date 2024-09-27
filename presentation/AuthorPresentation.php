<?php

require_once dirname(__FILE__) . "/../services/AuthorsService.php";
require_once dirname(__FILE__) . "/../entities/Author.php";

class AutheurPresentation 
{

  private $authorService;

  private $authors = [];

  public function __construct(){
    $this->authorService = new AuthorsService();
    $this->authors = $this->authorService->getAll();

  }

  public function viewAutheurs()
  {
    echo "\nafficher list des autheurs\n";

    if (!empty($this->authors)) {
      foreach ($this->authors as $author) {
        echo "---------------------------------\n";
        echo "NOM: " . $author->getName() . "\n";
        echo "email: " . $author->getEmail() . "\n";
        echo "list des livres: \n";
        foreach ($author->getLivres() as $livre) {
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

    $nouveauAuth = new Author($nom, $email, $listLivres);
    $this->authorService->add($nouveauAuth);
    echo "autheur ajouter avec success \n\n";
  }

  // public function modifierAutheur()
  // {
  //   echo "\nmodier un autheur\n";
  //   $nom = askQuestion("Enter le nom de l'autheur (or type 'back' to go back): ");
  //   if (strtolower($nom) === "back") {
  //     return;
  //   }
    
  //   $this->authors = $this->authorService->getAll();
  //   foreach( $this->authors as $author ) {
  //     if( $author->getName() === $nom ) {
  //         $choix = askQuestion("modifier le : nom,email,livres (or type 'back' to go back): ");
  //         if (strtolower($choix) === "back") {
  //           return;
  //         }else{
  //           echo $this->authorService->modifierAutheurs($choix)."\n\n";
  //         }
  //     }else{ echo "Il y a une erreur dans le nom de l'auteur ou il n'existe pas  \n\n";}

  //     }
    
  //   }







  // public function removeAutheurs()
  // {
  //     echo "\n suprimer un autheur\n";
  //     $nom = askQuestion("Enter le nom de l'autheur (ou ecris 'retourne' pour retourner ): ");
  //     if (strtolower($nom) === "retourne") {
  //       return;
  //     }
  //     foreach ($this->authors as $author) {

  //       if( $author->getName() === $nom ) {
  //         $this->authorService->removeAutheur($nom). "\n\n";
  //         return  "suprrimer avec succes  \n\n";
  //       }
       
  //     }
  //     echo "Il y a une erreur dans le nom de l'auteur ou il n'existe pas \n\n";
  // }
}



?>