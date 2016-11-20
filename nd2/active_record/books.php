<?php
require_once('Books.php');
$books = new Books;
$books->load();
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

    foreach ($books as $key => $value) {
        echo '<tr><td>' . $value->getId() . '</td><td>' . $value->getTitle() . '</td><td>' . $value->getYear();
        echo '</tr>';
    }


    ?>
</table>
</body>
</html>
