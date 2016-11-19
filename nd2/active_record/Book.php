<?php

class Book
{
    private $id;
    private $title;
    private $year;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return mixed
     */
    public function getYear()
    {
        return $this->year;
    }

    /**
     * @param mixed $year
     */
    public function setYear($year)
    {
        $this->year = $year;
    }
    public function load($id){
        $dbname = 'nd1';
        $dbuser = 'project';
        $dbpass = 'project';
        $dbhost = '127.0.0.1';
        $connect = mysqli_connect($dbhost, $dbuser, $dbpass) or die("Unable to Connect to '$dbhost'");
        mysqli_select_db($connect,$dbname) or die("Could not open the db '$dbname'");
        mysqli_query($connect,"set names utf8");
        $test_query = 'select * from Books where bookId='.$id.'';

        $result = mysqli_query($connect,$test_query);
        $row = mysqli_fetch_array($result);
        {

            $this->setId($row['bookId']);
            $this->setTitle($row['title']);
            $this->setYear($row['year']);
        }
    }

}