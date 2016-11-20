<?php
# Fill our vars and run on cli
# $ php -f booksData.php
$dbname = 'nd1';
$dbuser = 'project';
$dbpass = 'project';
$dbhost = '127.0.0.1';
$bookId=$_GET['id'];

$connect = mysqli_connect($dbhost, $dbuser, $dbpass) or die("Unable to Connect to '$dbhost'");
mysqli_select_db($connect,$dbname) or die("Could not open the db '$dbname'");
mysqli_query($connect,"set names utf8");
$query = 'select Books.*, group_concat(booksGenres.genre SEPARATOR ",") as genre,
 group_concat(Authors.name SEPARATOR ",") as Author
  from booksAuthors right join Books on booksAuthors.bookId=Books.bookId 
  left join Authors on booksAuthors.authorId=Authors.authorId 
  left join booksGenres  on booksGenres.bookId=Books.bookId where Books.bookId='.$bookId.' group by Books.bookId;';

$result = mysqli_query($connect,$query);

?>
<html>
<head>
<meta charset="UTF-8">
</head>
<body>
<table>
<tr>
<td>id</td><td>Title</td><td>Year</td><td>Genre</td><td>Author</tr>
<?php
while($row = mysqli_fetch_array($result)) {

  echo '<tr><td>'.$row['bookId'].'</td>
  <td>'.$row['title'].'</td><td>'.$row['year'].'</td>
  <td>'.$row['genre'].'</td><td>'.$row['Author'].'</td></tr>';

}
?>
</table>
</body>
</html>
