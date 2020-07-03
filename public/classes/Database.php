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
            echo "success";
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
    public function readData($table){
        try{
            $conn = $this->openConnection();
            $sql = "select * from $table ";
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
    public function createData($table,$data){
       try{
           if($data != ''){
               foreach ($data as $key=>$val){
                   $fieldArr[] = $key;
                   $valueArr[] = $val;
                }
           }
           $conn = $this->openConnection();
           $field=implode(",",$fieldArr);
           $value=implode("','",$valueArr);
           $value="'".$value."'";
           $sql="insert into $table($field) values($value)";
           echo "final query : " . $sql;
           $stmt=$conn->prepare($sql);
           $stmt->execute();
           die();
       }catch (PDOException $e){
           echo "There is some problem in connection " . $e->getMessage();
       }
    }

    // update data  U


    // delete data  D
    public function deleteData($table,$id){
        $conn = $this->openConnection();
        $sql="delete from $table where id='".$id."'";
        $stmt=$conn->prepare($sql);
        $stmt->execute();
        header('location:index.php');
        die();
    }


}