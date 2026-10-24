<?php
$title = "1984";
$author = "George Orwell";
$pages = 328;
$inStock = true;

// Renamed variable for clarity
$bookTitle = $title;
$bookAuthor = $author;
$bookPages = $pages;
$bookInStock = $inStock;
?>
<!DOCTYPE html>
<html>
<head><title>Book</title></head>
<body>
  <ul>
    <li>Title: <?= $bookTitle ?></li>
    <li>Author: <?= $bookAuthor ?></li>
    <li>Pages: <?= $bookPages ?></li>
    <li>In Stock: <?= $bookInStock ? 'Yes' : 'No' ?></li>
  </ul>
  <?php var_dump($bookPages); ?>
  <?php var_dump($bookInStock); ?>
</body>
</html>
