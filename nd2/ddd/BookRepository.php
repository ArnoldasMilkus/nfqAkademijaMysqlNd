<?php
require_once('Book.php');

class BookRepository
{
    public function getBookById($id)
    {
        $book = new Book();
        $dbname = 'nd1';
        $dbuser = 'project';
        $dbpass = 'project';
        $dbhost = '127.0.0.1';
        $connect = mysqli_connect($dbhost, $dbuser, $dbpass) or die("Unable to Connect to '$dbhost'");
        mysqli_select_db($connect, $dbname) or die("Could not open the db '$dbname'");
        mysqli_query($connect, "set names utf8");
        $test_query = 'select * from Books where bookId=' . $id . '';

        $result = mysqli_query($connect, $test_query);
        $row = mysqli_fetch_array($result);
        {

            $book->setId($row['bookId']);
            $book->setTitle($row['title']);
            $book->setYear($row['year']);
        }
        return $book;
    }

    public function getAll()
    {
        $dbname = 'nd1';
        $dbuser = 'project';
        $dbpass = 'project';
        $dbhost = '127.0.0.1';
        $connect = mysqli_connect($dbhost, $dbuser, $dbpass) or die("Unable to Connect to '$dbhost'");
        mysqli_select_db($connect, $dbname) or die("Could not open the db '$dbname'");
        mysqli_query($connect, "set names utf8");
        $test_query = 'select * from Books ';
        $counter = 0;
        $result = mysqli_query($connect, $test_query);
        while ($row = mysqli_fetch_array($result)) {
            $book[$counter] = new Book();
            $book[$counter]->setId($row['bookId']);
            $book[$counter]->setTitle($row['title']);
            $book[$counter]->setYear($row['year']);
            $counter++;
        }
        return $book;
    }
}