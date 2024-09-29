<?php
  require_once dirname(__FILE__)."/../services/BooksService.php";
  require_once dirname(__FILE__)."/../entities/Book.php";

class LivrePresentation{


    private $bookService;
    private $Books;

    public function __construct(){
      $this->bookService = new BookService();
      $this->Books = $this->bookService->getAll();
    }

    public function viewlistLivres()
    {
      echo "\nViewing the list of Books\n";
  
  
      if (!empty($this->Books)) {
        foreach ($this->Books as $book) {
          echo "---------------------------------\n";
          echo "ISBN: " .$book->getISBN() . "\n";
          echo "Title:  " .$book->getTitle() . " \n";
          echo "Date de Publication:  " .$book->getPubDate() . " \n";
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
      $this->bookService->add($NewBook);
      
      echo "autheur ajouter avec success \n\n";
    }

    public function deleteBook(): void
    {
      $title = askQuestion("Enter Books title : ");
      if($title !== '')
      {
        $deleted = $this->bookService->remove($title);
        if ($deleted) echo 'Item Delted Successfully';
        else echo 'No Item Foud With This Title';
        
      }else echo 'Input sould not be empty';
    }

    public function updateBook(): void
    {
      $prope = askQuestion("What Property To Update (ISBN, Title, PubDate): ");
      $oldValue = askQuestion("What is The Old Value : ");
      $newValue = askQuestion("Enter The New Value : ");
      $this->bookService->update(array('key'=>$oldValue, 'value'=>$newValue), strtoupper($prope) =='ISBN'?strtoupper($prope):strtolower($prope));
    }


}
