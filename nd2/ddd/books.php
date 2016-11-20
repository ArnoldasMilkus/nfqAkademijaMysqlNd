<?php
require_once('BookRepository.php');
$bookRepository = new BookRepository();
$books = $bookRepository->getAll();
?>
<html>
<head>
    <meta charset="UTF-8">
</head>
<body>
<table>
    <tr>
        <td>id</td>
        <td>Title</td>
        <td>Year</td>
    </tr>
    <?php

    foreach ($books as $book) {
        echo '<tr><td>' . $book->getId() . '</td><td>' . $book->getTitle() . '</td><td>' . $book->getYear();
        echo '</tr>';
    }

    ?>
</table>
</body>
</html>
