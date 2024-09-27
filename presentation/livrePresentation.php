<?php
  require_once dirname(__FILE__)."/../bibliothequeServices/livreServices.php";
  require_once dirname(__FILE__)."/../entities/livre.php";

class LivrePresentation{

    public function viewlistLivres()
    {
      echo "\nViewing the list of Books\n";
  
      $livreService = new LivreServices();
      $livres =  $livreService->getListLivres();
  
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
  
      $Nouveaulivre = new Livre($ISBN , $titre,$datePub);
      $livreServices = new LivreServices();
      $livreServices->ajouterLivre($Nouveaulivre);
      
      echo "autheur ajouter avec success \n\n";
    }




}






?>