<?php
# Fill our vars and run on cli
# $ php -f booksData.php
require_once ('Book.php');
$book= new Book();
$book->load($_GET['id']);
$bookId=$book->getId();
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
{

  echo '<tr><td>'.$book->getId().'</td><td>'.$book->getTitle().'</td><td>'.$book->getYear().'</td>';
  //<td>'.$row['genre'].'</td>';
/*$query2 = 'select Books.*, group_concat(Authors.name SEPARATOR ",") as Author from booksAuthors inner join Books on booksAuthors.bookId=Books.bookId inner join Authors on booksAuthors.authorId=Authors.authorId where Books.bookId='.$row['bookId'].' group by Books.bookId';

$result2 = mysqli_query($connect,$query2);
while($row2 = mysqli_fetch_array($result2)){
echo '<td>'.$row2['Author'].'</td>';
}*/
'</tr>';
}
?>
</table>
</body>
</html>
