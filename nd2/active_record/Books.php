<?php
require_once('Book.php');

class Books implements Iterator
{
    private $position = 0;
    public $counter = 0;
    private $books;
    public $queryResult;

    public function __construct()
    {
        $this->position = 0;
    }

    function rewind()
    {
        $this->position = 0;
    }

    function current()
    {
        $row = mysqli_fetch_array($this->queryResult);
        $this->books[$this->position] = new Book();
        $this->books[$this->position]->setId($row['bookId']);
        $this->books[$this->position]->setTitle($row['title']);
        $this->books[$this->position]->setYear($row['year']);
        return $this->books[$this->position];
    }

    function key()
    {
        return $this->position;
    }

    function next()
    {
        ++$this->position;

    }

    function valid()
    {
        return $this->position < $this->counter;
    }

    /**
     * @return mixed
     */
    public function getBooks()
    {
        return $this->books;
    }

    /**
     * @param mixed $books
     */
    public function setBooks($books)
    {
        $this->books = $books;
    }

    public function getQueryResult()
    {

    }

    public function load()
    {
        $dbname = 'nd1';
        $dbuser = 'project';
        $dbpass = 'project';
        $dbhost = '127.0.0.1';
        $connect = mysqli_connect($dbhost, $dbuser, $dbpass) or die("Unable to Connect to '$dbhost'");
        mysqli_select_db($connect, $dbname) or die("Could not open the db '$dbname'");
        mysqli_query($connect, "set names utf8");
        $test_query = 'select * from Books ';

        $this->queryResult = mysqli_query($connect, $test_query);
        $this->counter = mysqli_num_rows($this->queryResult);


    }
}