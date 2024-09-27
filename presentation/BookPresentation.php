<?php
  require_once dirname(__FILE__)."/../services/BooksService.php";
  require_once dirname(__FILE__)."/../entities/Book.php";

class LivrePresentation{


    private $BookService;
    private $Books = [];

    public function __construct(){
      $this->BookService = new BookService();
      $this->Books = $this->BookService->getAll();
    }

    public function viewlistLivres()
    {
      echo "\nViewing the list of Books\n";
  
  
      if (!empty($this->Books)) {
        foreach ($this->Books as $book) {
          echo "---------------------------------\n";
          echo "ISBN: " .$book->ISBN . "\n";
          echo "Title:  " .$book->title . " \n";
          echo "Date de Publication:  " .$book->datePub . " \n";
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
  
      $NewBook = new Book($ISBN , $titre,$datePub);
      $this->BookService->add($NewBook);
      
      echo "autheur ajouter avec success \n\n";
    }




}






?>