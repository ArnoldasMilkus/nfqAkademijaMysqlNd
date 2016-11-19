<?php
# Fill our vars and run on cli
# $ php -f booksData.php
require_once ('Books.php');
$books= new Books;
$books->load();

/*echo 'select Books.*, group_concat(booksGenres.genre SEPARATOR ",") as genre from booksGenres right join Books on booksGenres.bookId=Books.bookId where Books.bookId='.$bookId.' group by Books.bookId;';
$query = 'select Books.*, group_concat(booksGenres.genre SEPARATOR ",") as genre from booksGenres right join Books on booksGenres.bookId=Books.bookId where Books.bookId='.$bookId.' group by Books.bookId;';

$result = mysqli_query($connect,$query);*/

?>
<html>
<head>
<meta charset="UTF-8">
</head>
<body>
<table>
<tr>
<td>id</td><td>Title</td><td>Year</td></tr>
<?php

foreach($books as $key => $value) {
    //var_dump($key, $value->getId());
    echo '<tr><td>' . $value->getId() . '</td><td>' . $value->getTitle() . '</td><td>' .$value->getYear();
    echo '</tr>';
    //echo "\n";
}


?>
</table>
</body>
</html>
