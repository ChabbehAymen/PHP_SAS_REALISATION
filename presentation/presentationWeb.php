
<?php

require_once dirname(__FILE__).'/../services/ReadersService.php';
$readerServices = new ReadersService();
$listBook = $readerServices->bookList();  
$listLoan = $readerServices->loanList();
var_dump($listLoan);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <!-- Tailwind CSS -->
     <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./public/css/output.css"> <!-- Custom CSS file -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@3.3.2/dist/tailwind.min.css" rel="stylesheet">

    <title>Bibliothèque Management</title>
</head>
<body>
<div class="container mx-auto px-4 py-4">
  <!-- Search Bar -->
  <div class="mb-4">
    <input type="text" id="searchInput" onkeyup="searchTable()" placeholder="Search for names, emails, roles..." class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md px-4 py-2">
  </div>

  <!-- Table -->
  <div class="overflow-x-auto">
    <table id="myTable" class="min-w-full text-left text-sm text-gray-500">
      <thead class="bg-gray-50">
        <tr>
          <th scope="col" class="px-6 py-3 text-xs font-medium text-gray-700 uppercase tracking-wider">ISBN</th>
          <th scope="col" class="px-6 py-3 text-xs font-medium text-gray-700 uppercase tracking-wider">TITLE</th>
          <th scope="col" class="px-6 py-3 text-xs font-medium text-gray-700 uppercase tracking-wider">DATE PUBLICATION</th>
          <th scope="col" class="px-6 py-3 text-xs font-medium text-gray-700 uppercase tracking-wider">EXISTE</th>
        </tr>
      </thead>
      <tbody class="bg-white divide-y divide-gray-200">
        <?php foreach($listBook as $book):?>
          <td class="px-6 py-4 whitespace-nowrap"><?= $book->getISBN()?></td>
          <td class="px-6 py-4 whitespace-nowrap"><?= $book->getTitle()?></td>
          <td class="px-6 py-4 whitespace-nowrap"><?= $book->getPubDate()?></td>
          <td class="px-6 py-4 whitespace-nowrap"><?= $book->getReader()===null?'Disponible':'Loaned To'.$book->getReader()->getName()?></td>
          <td class="px-6 py-4 whitespace-nowrap">
            <button class="text-indigo-600 hover:text-indigo-900">Edit</button>
            <button class="ml-4 text-red-600 hover:text-red-900">Delete</button>
            <?= $book->getReader()===null?'<button class="ml-4 text-red-600 hover:text-red-900" onclick="loan()">Loan</button>':''?>
          </td>
        </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</div>

<script>
  function searchTable() {
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("searchInput");
    filter = input.value.toLowerCase();
    table = document.getElementById("myTable");
    tr = table.getElementsByTagName("tr");

    for (i = 1; i < tr.length; i++) {  // Start from 1 to skip the header row
      tr[i].style.display = "none";  // Hide the row by default
      td = tr[i].getElementsByTagName("td");
      for (var j = 0; j < td.length; j++) {  // Loop through all columns
        if (td[j]) {
          txtValue = td[j].textContent || td[j].innerText;
          if (txtValue.toLowerCase().indexOf(filter) > -1) {
            tr[i].style.display = "";  // Show row if there's a match
            break;
          }
        }
      }
    }
  }
</script>

</body>
</html>