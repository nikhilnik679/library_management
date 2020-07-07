<?php

class Database
{
    private $server = "mysql:host=localhost;dbname=libdb";
    private $user = "root";
    private $password = "";
    private $options = array( PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                              PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC);
    protected $connection;

    // Function for opening connection
   public function openConnection(){
        try{
            $this->connection = new PDO($this->server, $this->user, $this->password, $this->options);
            return $this->connection;
        }catch (PDOException $e) {
            echo "There is some problem in connection : " . $e->getMessage();
        }
    }

    // Function for closing connection
      public function closeConnection(){
          $this->connection = null;
      }

    // fetch all / read data i.e select query   R
    public function readData($table,$condition = 1){
        try{
            $conn = $this->openConnection();
          /*  if(isset($condition))
            {*/
               // echo "thisllllllllllllll";
                $sql = "select * from $table where $condition";
             //    echo "final query : " . $sql;
         /*   }else{
                $sql = "select * from $table ";
            }*/
        //    $sql = "select * from $table ";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $this->closeConnection();
        }catch (PDOException $e){
            echo "There is some problem in connection " . $e->getMessage();
        }
        if(! empty($result)){
            return $result;
        }
    }

    // create data i.e insert query C
    public function createData($table,$field,$value){
       try{
           $conn = $this->openConnection();
           $sql="insert into $table ($field) values ($value)";
          // echo "final query : " . $sql;
           $stmt=$conn->prepare($sql);
           $stmt->execute();
        //   die();
       }catch (PDOException $e){
           echo "There is some problem in connection " . $e->getMessage();
       }
    }

    // update data  U
    public function updateData($query){
        try
        {
            $conn = $this->openConnection();
            $stmt = $conn->prepare($query);
            $stmt->execute();
        }catch (PDOException $e){
            echo "There is some problem in connection " . $e->getMessage();
        }
    }

    // delete data  D
    public function deleteData($table,$condition){
        try
        {
            $conn = $this->openConnection();
            $sql="delete from $table where $condition ";
            $stmt=$conn->prepare($sql);
            $stmt->execute();
        }catch (PDOException $e){
            echo "There is some problem in connection " . $e->getMessage();
        }
    }
}