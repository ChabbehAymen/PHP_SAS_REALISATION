<?php
require_once './controller/BooksController.php';

$runProgram = true;
$booksController = new BooksController();
$tab = str_repeat("\t", 5);

program();

function program() {
    global $runProgram, $tab, $booksController;

    echo "\n" . $tab . str_repeat('=', 50) . "\n";
    echo $tab . 'Welcome to Our Library' . "\n";
    echo $tab . str_repeat('=', 50) . "\n\n";

    echo $tab . '[u]    Login as a Reader' . "\n";
    echo $tab . '[a]    Login as an Admin' . "\n\n";

    $isAdmin = ask($tab . "Login: ") === 'a';
    
    while ($runProgram) {
        displayOptions($isAdmin);
        $op = ask($tab . 'Select An Operation: ');

        handleOperation($op, $isAdmin);
    }
}

function displayOptions($isAdmin) {
    global $tab;
    echo $tab . 'How can I help you?' . "\n";
    echo $tab . '[s]    Search Book' . "\n";
    echo $tab . '[l]    List All Books' . "\n";

    if ($isAdmin) {
        echo $tab . '[i]    Add a Book' . "\n";
        echo $tab . '[d]    Delete a Book' . "\n";
        echo $tab . '[u]    Update a Book' . "\n"; // Update function commented out in original
    }

    echo $tab . '[x]    Exit The Program' . "\n";
}

function handleOperation($op, $isAdmin) {
    if ($op === 'i' && $isAdmin) {
        addBook();
    } elseif ($op === 'd' && $isAdmin) {
        deleteBook();
    } elseif ($op === 's') {
        findBook();
    } elseif ($op === 'l') {
        listBooks();
    } elseif ($op === 'x') {
        endProgram();
    } else {
        echo 'Unknown Command' . "\n";
    }
}

function ask($query) {
    echo $query;
    return trim(fgets(STDIN));
}

function addBook() {
    global $booksController, $tab;

    echo "\n";
    $book = new Book(ISBN:ask($tab . 'Book\'s ISBN: '), title: ask($tab . 'Book\'s Title: '), pubDate: ask($tab . 'Book\'s Publication Date: '));

    if ($booksController->add($book)) {
        echoSuccessMessage('Book added successfully');
    }
}

function deleteBook() {
    global $booksController, $tab;
    $bookTitle = ask($tab . "Book's Title: ");
    
    if ($booksController->remove($bookTitle)) {
        echo $tab . 'Book deleted successfully';
    }
}

function findBook() {
    global $tab, $booksController;

    $bookTitle = ask($tab . "What is the Book Title: ");
    $book = $booksController->find($bookTitle);
    
    if ($book) {
        echoTable([$book]);
    } else {
        echo $tab . 'No Book Found With This Title';
    }
}

function listBooks() :void
{
    global $booksController, $tab;
    echoTable($booksController->getAll());
}
/**
 * print data in the console in form of table
 * @param array $data
 * @return void
 */
function echoTable(array $data) : void
{
    // Calculate the maximum width for each column
$maxWidths = [];
foreach ($data as $row) 
{
    foreach ($row as $i => $cell) {
        $maxWidths[$i] = max($maxWidths[$i] ?? 0, strlen($cell));
    }
}

// Create a horizontal border
$border = '+' . implode('+', array_map(fn($width) => str_repeat('-', $width + 2), $maxWidths)) . '+';

// Print the table
echo $border . PHP_EOL;

foreach ($data as $row) 
    {
            $row = (array) $row;
            $formattedRow = array_map(fn($cell, $width) => ' ' . str_pad($cell, $width) . ' ', $row, $maxWidths);
            echo '|' . implode('|', $formattedRow) . '|' . PHP_EOL;
            echo $border . PHP_EOL;
}
}

function endProgram() {
    global $runProgram, $tab;
    
    $runProgram = false;
    echo "\n" . $tab . str_repeat('=', 50) . "\n";
    echo $tab . 'See You Again' . "\n";
    echo $tab . str_repeat('=', 50) . "\n";
}

function echoSuccessMessage($message) {
    global $tab;
    echo $tab . str_repeat('=', 50) . "\n" . $tab . $message . "\n" . $tab . str_repeat('=', 50) . "\n";
}
