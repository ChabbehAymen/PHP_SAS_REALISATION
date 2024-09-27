<?php


     require_once dirname(__FILE__)."/presentation/AuthorPresentation.php";
     require_once dirname(__FILE__)."/presentation/BookPresentation.php";

    function askQuestion($question)
    {
      echo $question;
      return trim(fgets(STDIN));
    }

    $autheurPresentation = new AutheurPresentation();
    $livrePresentation = new LivrePresentation();

    
    
    function library_management()
    {
      global $autheurPresentation, $livrePresentation;
      echo chr(27) . chr(91) . 'H' . chr(27) . chr(91) . 'J';
      echo "bienvenu dans bilbliotheque manager program\n\n";
      $exitAutheurs = false;
      $exitProgram = false;
      $exitLivre = false;
      while (!$exitProgram) {
        echo "+------------------------------------+\n";
        echo "|       Bibliothèque Management      |\n";
        echo "|------------------------------------|\n";
        echo "|    Please choose an action:        |\n";
        echo "|------------------------------------|\n";
        echo "| [a] - autheurs                     |\n";
        echo "| [l] - livres                       |\n";
        echo "| [exit] - Exit le program           |\n";
        echo "+------------------------------------+\n\n";
        $class = askQuestion("Your choice: ");
        switch (strtolower( $class)) {
          case 'a':
            while (!$exitAutheurs) {
                  echo "+------------------------------------+\n";
                  echo "|        Books Management            |\n";
                  echo "|------------------------------------|\n";
                  echo "|    Please choose an action:        |\n";
                  echo "|------------------------------------|\n";
                  echo "| [l] - list d'autheurs              |\n";
                  echo "| [a] - ajouter autheur              |\n";
                  echo "| [m] - modifier autheur             |\n";
                  echo "| [s] - suprimer autheur             |\n";
                  echo "| [exit] - Exit the program          |\n";
                  echo "+------------------------------------+\n\n";
                  $autheuraction = askQuestion("Your choice: ");
                  switch (strtolower(  $autheuraction)) {
                      case 'l':
                        $autheurPresentation->viewAutheurs();
                      break;
                      case 'a':    
                          $autheurPresentation->ajoutAutheur();
                      break;
                      case 'm':
                        $autheurPresentation->modifierAutheur();
                        
                      break;
                      case 's':
                        $autheurPresentation->removeAutheurs();
                      break;
                      case 'exit':
                        $exitAutheurs = true;
                        break;
                
                      default:
                        echo "Invalid choice. Please try again.\n";
                        break;
                  }
            }
          break;
          case 'l':
                while (!$exitLivre) {
                      echo "+------------------------------------+\n";
                      echo "|        Books Management            |\n";
                      echo "|------------------------------------|\n";
                      echo "|    Please choose an action:        |\n";
                      echo "|------------------------------------|\n";
                      echo "| [l] - list des livres              |\n";
                      echo "| [a] - ajouter livre                |\n";
                      echo "| [exit] - Exit the program          |\n";
                      echo "+------------------------------------+\n\n";
                      $livreaction = askQuestion("Your choice: ");
                      switch (strtolower(  $livreaction)) {
                          case 'l':
                          $livrePresentation->viewlistLivres();
                          break;
                          case 'a':
                              $livrePresentation->ajoutLivre();
                          break;
                          case 'exit':
                            $exitLivre = true;
                            break;
                    
                          default:
                            echo "Invalid choice. Please try again.\n";
                            break;
                      } 
                }
          break;

          case 'exit':
            $exitProgram = true;
          break;
          default:
          echo "Invalid choice. Please try again.\n";
          break;
          }
        }
      echo "Exiting the program. Goodbye!\n";
}
    
    library_management();




?>