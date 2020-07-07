<?php


class Book extends Database
{
   protected $bookid;
   protected $bookname;
   protected $author;
   protected $department;


    /**
     * @return mixed
     */
    public function getBookid()
    {
        return $this->bookid;
    }

    /**
     * @param mixed $bookid
     */
    public function setBookid($bookid)
    {
        $this->bookid = $bookid;
    }

    /**
     * @return mixed
     */
    public function getBookname()
    {
        return $this->bookname;
    }

    /**
     * @param mixed $bookname
     */
    public function setBookname($bookname)
    {
        $this->bookname = $bookname;
    }

    /**
     * @return mixed
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * @param mixed $author
     */
    public function setAuthor($author)
    {
        $this->author = $author;
    }

    /**
     * @return mixed
     */
    public function getDepartment()
    {
        return $this->department;
    }

    /**
     * @param mixed $department
     */
    public function setDepartment($department)
    {
        $this->department = $department;
    }

    public function addBook(){

    }

    public function deleteBook($id){

    }

    public function viewBook($table){
      return (parent::readData($table));
    }

    public function updateBook(){


    }



}