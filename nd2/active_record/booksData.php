<?php
require_once('Book.php');
$book = new Book();
$book->load($_GET['id']);
$bookId = $book->getId();
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
