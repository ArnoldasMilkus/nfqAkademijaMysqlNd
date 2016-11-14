<?php
# Fill our vars and run on cli
# $ php -f books.php
$dbname = 'nd1';
$dbuser = 'project';
$dbpass = 'project';
$dbhost = '127.0.0.1';
$connect = mysqli_connect($dbhost, $dbuser, $dbpass) or die("Unable to Connect to '$dbhost'");
mysqli_select_db($connect,$dbname) or die("Could not open the db '$dbname'");
$test_query = "select * from Books";
$result = mysqli_query($connect,$test_query);

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
while($row = mysqli_fetch_array($result)) {
  echo '<tr><td>'.$row['bookId'].'</td><td>'.$row['title'].'</td><td>'.$row['year'].'</td></tr>';
}
?>
</table>
</body>
</html>
