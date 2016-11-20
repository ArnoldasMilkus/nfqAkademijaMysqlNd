<?php
require_once('BookRepository.php');
$bookRepository = new BookRepository();
$book = $bookRepository->getBookById($_GET['id']);
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
    {
        echo '<tr><td>' . $book->getId() . '</td><td>' . $book->getTitle() . '</td><td>' . $book->getYear() . '</td>';
        echo '</tr>';
    }
    ?>
</table>
</body>
</html>
