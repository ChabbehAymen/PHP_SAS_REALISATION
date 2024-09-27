<?php
  require_once dirname(__FILE__)."/../services/BookService.php";
  require_once dirname(__FILE__)."/../entities/Book.php";

class LivrePresentation{


    private $BookService;
    private $Books = [];

    public function __construct(){
      $this->BookService = new BookService();
      $this->Books = $this->BookService->ge;
    }

    public function viewlistLivres()
    {
      echo "\nViewing the list of Books\n";
  
      $this->BookService->getListLivres();
  
      if (!empty($livres)) {
        foreach ($livres as $livre) {
          echo "---------------------------------\n";
          echo "ISBN: " .$livre->ISBN . "\n";
          echo "Title:  " .$livre->title . " \n";
          echo "Date de Publication:  " .$livre->datePub . " \n";
        }
      } else {
        echo "No livres available.\n";
      }
      echo "---------------------------------\n\n";
    }
  
    public function ajoutLivre()
    {
      echo "\nAjouter nouveau autheur\n";
      $ISBN = askQuestion("Enter le ISBN de lecture (or type 'back' to go back): ");
      if (strtolower($ISBN) === "back") {
        return;
      }
  
      $titre = askQuestion("Enter le titre de livre (or type 'back' to go back): ");
      if (strtolower($titre) === "back") {
        return;
      }
      $datePub = askQuestion("Enter la date de publication (or type 'back' to go back): ");
      if (strtolower($datePub) === "back") {
        return;
      }
  
      $Nouveaulivre = new Book($ISBN , $titre,$datePub);
      $this->BookService->ajouterLivre($Nouveaulivre);
      
      echo "autheur ajouter avec success \n\n";
    }




}






?>