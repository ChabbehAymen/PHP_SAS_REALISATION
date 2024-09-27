<?php

require_once dirname(__FILE__) . "/../services/AuthorsService.php";
require_once dirname(__FILE__) . "/../entities/Author.php";

class AutheurPresentation 
{

  private $AuthorService;

  private $Authors = [];

  public function __construct(){
    $this->AuthorService = new AuthorService();
    $this->Authors = $this->AuthorService->getListAutheurs();

  }

  public function viewAutheurs()
  {
    echo "\nafficher list des autheurs\n";

    if (!empty($this->Authors)) {
      foreach ($this->Authors as $author) {
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
    $this->AuthorService->ajouteAutheur($nouveauAuth);
    echo "autheur ajouter avec success \n\n";
  }

  public function modifierAutheur()
  {
    echo "\nmodier un autheur\n";
    $nom = askQuestion("Enter le nom de l'autheur (or type 'back' to go back): ");
    if (strtolower($nom) === "back") {
      return;
    }
    
    $this->Authors = $this->AuthorService->getListAutheurs();
    foreach( $this->Authors as $author ) {
      if( $author->getName() === $nom ) {
          $choix = askQuestion("modifier le : nom,email,livres (or type 'back' to go back): ");
          if (strtolower($choix) === "back") {
            return;
          }else{
            echo $this->AuthorService->modifierAutheurs($choix)."\n\n";
          }
      }else{ echo "Il y a une erreur dans le nom de l'auteur ou il n'existe pas  \n\n";}

      }
    
    }







  public function removeAutheurs()
  {
      echo "\n suprimer un autheur\n";
      $nom = askQuestion("Enter le nom de l'autheur (ou ecris 'retourne' pour retourner ): ");
      if (strtolower($nom) === "retourne") {
        return;
      }
      foreach ($this->Authors as $author) {

        if( $author->getName() === $nom ) {
          $this->AuthorService->removeAutheur($nom). "\n\n";
          return  "suprrimer avec succes  \n\n";
        }
       
      }
      echo "Il y a une erreur dans le nom de l'auteur ou il n'existe pas \n\n";
  }
}



?>